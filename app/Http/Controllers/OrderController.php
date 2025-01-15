<?php

namespace App\Http\Controllers;

use App\Imports\OrderImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\FeedbackPIC;
use App\Models\Order;
use App\Models\Sto;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function index()
    {
        // return ke view
        return view('telkomsel.menus.dashboard.menu2');
    }

    public function preview(Request $request)
    {
        // Log Check
        if (!Auth::check()) {
            session()->flash('info', 'Mohon Login Kembali untuk Melanjutkan aktivitas');
            return redirect('/login');
        }
        $user = Auth::user();
        if ($user->role !== 'team leader' || $user->division !== 'aso') {
            session()->flash('error', 'Anda tidak memiliki aksess untuk fungsi ini.');
            return redirect()->back();
        }

        // Validasi
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        // Log::info('File Name:', ['request' => $request->all()]);

        // Preview prosess
        try {
            $import = new OrderImport();
            Excel::import($import, $request->file('file'));

            $data = $import->getData();

            // Log::info('Data:', ['request' => $data->all()]);
            // dd($data);

            return view('telkomsel.menus.dashboard.menu2', compact('data'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage() . ', Pastikan template file Excel Anda benar');
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        // Log check
        if (!Auth::check()) {
            session()->flash('info', 'Mohon Login Kembali untuk Melanjutkan aktivitas');
            return redirect('/login');
        }
        $user = Auth::user();
        if ($user->role !== 'team leader' || $user->division !== 'aso') {
            session()->flash('error', 'Anda tidak memiliki aksess untuk fungsi ini.');
            return redirect()->back();
        }

        // Log::info('==============================================================================================');
        // Log::info('Begin...');

        // Log::info('Data:', ['request' => $request->all()]);

        // Validasi data
        try {
            $validatedData = $request->validate([
                'data' => 'required|array',
            ]);
            // Log::info('Validate Complete');
        } catch (\Exception $e) {
            // Log::warning('Gagal validasi: ' . $e->getMessage());
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }

        // Inisiasi
        $chunkSize = 100;
        $dataChunks = array_chunk($validatedData['data'], $chunkSize);

        // Store prosess
        DB::beginTransaction();
        try {
            // Log::info('Importing Start...');
            $errors = [];
            $updatedRows = [];
            $skippedRows = [];
            if (Order::count() === 0) {
                // Log::warning('Tabel Order kosong. Semua data akan diteruskan ke store.');
                // Anda bisa langsung memproses semua data jika tabel kosong.


                foreach ($dataChunks as $chunkIndex => $chunk) {
                    // Log::info('Processing chunk: ' . ($chunkIndex + 1), ['chunk_size' => count($chunk)]);

                    foreach ($chunk as $rowIndex => $row) {
                        try {
                            // Log::info('Processing row in chunk: ', ['chunk' => $chunkIndex + 1, 'row' => $rowIndex + 1]);

                            // Kendala checker
                            if (!empty($row['feedback_pic'])) {
                                preg_match('/^(\d+)\.(\d+)\.?\s*(.*?)\s*\((.*?)\)$/', $row['feedback_pic'], $matches);
                                // Log::info(['matches' => $matches]);

                                if ($matches) {
                                    $id_uic = $matches[1];
                                    $id_feedback_unused = $matches[2];
                                    $nama_uic = $matches[3];
                                    $nama_feedbackpic = $matches[4];

                                    // Log::info('Parsed Feedback PIC', [
                                    //     'id_uic' => $id_uic,
                                    //     'id_feedback_unused' => $id_feedback_unused,
                                    //     'nama_uic' => $nama_uic,
                                    //     'nama_feedbackpic' => $nama_feedbackpic,
                                    // ]);

                                    $record = FeedbackPIC::where('id_uic', $id_uic)
                                        ->where('feedback_pic', $nama_feedbackpic)
                                        ->first();

                                    // $id_feedback = $record->id;

                                    if ($record) {
                                        $id_feedback = $record->id;
                                    } else {
                                        $id_feedback = null;
                                        Log::warning('FeedbackPIC record not found', [
                                            'id_uic' => $id_uic,
                                            'feedback_pic' => $nama_feedbackpic,
                                        ]);
                                    }
                                } else {
                                    Log::warning('Failed to parse Feedback PIC', ['feedback_pic' => $row['feedback_pic']]);
                                }
                            } else {
                                $id_feedback = null;
                                switch ($row['kendala']) {
                                    case 'KENDALA TIANG':
                                        if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan'])) {
                                            $id_feedback = 1;
                                        } else {
                                            $id_feedback = 2;
                                        }
                                        break;

                                    case 'KENDALA MAINTENANCE':
                                        if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan']) || empty($row['id_valins'])) {
                                            $id_feedback = 10;
                                        } else {
                                            $id_feedback = 12;
                                        }
                                        break;

                                    case 'ODP LOSS':
                                        if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan']) || empty($row['id_valins'])) {
                                            $id_feedback = 10;
                                        } else {
                                            $id_feedback = 12;
                                        }
                                        break;

                                    case 'ODP TIDAK ADA TUTUP':
                                        if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan']) || empty($row['id_valins'])) {
                                            $id_feedback = 10;
                                        } else {
                                            $id_feedback = 12;
                                        }
                                        break;

                                    case 'REDAMAN TINGGI':
                                        if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan']) || empty($row['id_valins'])) {
                                            $id_feedback = 10;
                                        } else {
                                            $id_feedback = 12;
                                        }
                                        break;

                                    case 'ONU > 32':
                                        if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan']) || empty($row['id_valins'])) {
                                            $id_feedback = 10;
                                        } else {
                                            $id_feedback = 12;
                                        }
                                        break;

                                    case 'TIDAK ADA PIT':
                                        if (empty($row['id_valins'])) {
                                            $id_feedback = 62;
                                        } else {
                                            $id_feedback = 66;
                                        }
                                        break;

                                    case 'ODP FULL KAP 8':
                                        if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan']) || empty($row['id_valins'])) {
                                            $id_feedback = 20;
                                        } else {
                                            $id_feedback = 22;
                                        }
                                        break;

                                    case 'ODP FULL KAP 16':
                                        if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan']) || empty($row['id_valins'])) {
                                            $id_feedback = 20;
                                        } else {
                                            $id_feedback = 22;
                                        }
                                        break;

                                    case 'ODP BELUM GOLIVE':
                                        if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan']) || empty($row['id_valins'])) {
                                            $id_feedback = 20;
                                        } else {
                                            $id_feedback = 28;
                                        }
                                        break;

                                    case 'TIDAK ADA ODP':
                                        if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan'])) {
                                            $id_feedback = 34;
                                        } else {
                                            $id_feedback = 36;
                                        }
                                        break;

                                    case 'ODP JAUH':
                                        if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan'])) {
                                            $id_feedback = 34;
                                        } else {
                                            $id_feedback = 36;
                                        }
                                        break;

                                    default:
                                        $id_feedback = null;
                                        break;
                                }
                            }

                            if (!empty($errors)) {
                                Log::warning('Validation failed for row', ['row' => $row, 'errors' => $errors]);
                                continue;
                            }

                            // sto checker
                            $sto = Sto::where('nama_sto', $row['sto'])->value('id') ?? null;

                            // Create data in Database Order
                            Order::create([
                                'tanggal' => Carbon::createFromFormat('d-m-Y', $row['tanggal'])->format('Y-m-d'),
                                'bulan' => $row['bulan'],
                                'chanel' => $row['chanel'],
                                'agency' => $row['agency'],
                                'track_id_myir' => $row['track_id_myir'],
                                'trackid' => $row['trackid'],
                                'status_duplicate' => $row['status_duplicate'],
                                'nomor_sc' => $row['nomor_sc'],
                                'nama_pelanggan' => $row['nama_pelanggan'],
                                'alamat_pelanggan' => $row['alamat_pelanggan'],
                                'cp' => $row['cp'],
                                'tipe_transaksi' => $row['tipe_transaksi'],
                                'layanan' => $row['layanan'],
                                'jenis_layanan' => $row['jenis_layanan'],
                                'id_sto' => $sto,
                                'mitra' => $row['mitra'],
                                'team' => $row['team'],
                                'kategori' => $row['kategori'],
                                'detail_progres' => $row['detail_progres'],
                                'kendala' => $row['kendala'],
                                'ket_detail' => $row['ket_detail'],
                                'label_odp' => $row['label_odp'],
                                'label_odp_alternatif' => $row['label_odp_alternatif'],
                                'ket_label_odp' => $row['ket_label_odp'],
                                'kap_odp' => $row['kap_odp'],
                                'port_odp' => $row['port_odp'],
                                'sisa_port_odp' => $row['sisa_port_odp'],
                                'tagging_lokasi_odp' => $row['tagging_lokasi_odp'],
                                'tagging_lokasi_pelanggan' => $row['tagging_lokasi_pelanggan'],
                                'status_tagging_pelanggan' => $row['status_tagging_pelanggan'],
                                'id_valins' => $row['id_valins'],
                                'segmen' => $row['segmen'],
                                'produk' => $row['produk'],
                                'id_feedback' => $id_feedback,
                                'ket_feedback' => $row['detail_feedback_pic'],
                                'created_by' => Auth::id(),
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);
                            $updatedRows[] = ['row' => $rowIndex + 1, 'nomor_sc' => $row['nomor_sc']];
                        } catch (\Exception $e) {
                            Log::error('Error on chunk ' . ($chunkIndex + 1) . ', row ' . ($rowIndex + 1), ['error' => $e->getMessage(), 'row' => $row]);
                            throw $e;
                        }
                    }
                }
                // return redirect()->back()->with('success', 'Semua data berhasil diproses karena tabel kosong.');
            } else {
                foreach ($dataChunks as $chunkIndex => $chunk) {
                    foreach ($chunk as $rowIndex => $row) {
                        // Cari nomor SC di database
                        $sc = Order::where('nomor_sc', $row['nomor_sc'])->first();

                        if ($sc === null && $sc !== $row['nomor_sc']) {
                            // Log::info('Nomor SC tidak ditemukan, data akan diteruskan ke store.', ['nomor_sc' => $row['nomor_sc']]);
                            try {
                                // Log::info('Processing row in chunk: ', ['chunk' => $chunkIndex + 1, 'row' => $rowIndex + 1]);

                                // Kendala checker
                                if (!empty($row['feedback_pic'])) {
                                    preg_match('/^(\d+)\.(\d+)\.?\s*(.*?)\s*\((.*?)\)$/', $row['feedback_pic'], $matches);

                                    if ($matches) {
                                        $id_uic = $matches[1];
                                        $id_feedback_unused = $matches[2];
                                        $nama_uic = $matches[3];
                                        $nama_feedbackpic = $matches[4];

                                        // Log::info('Parsed Feedback PIC', [
                                        //     'id_uic' => $id_uic,
                                        //     'id_feedback_unused' => $id_feedback_unused,
                                        //     'nama_uic' => $nama_uic,
                                        //     'nama_feedbackpic' => $nama_feedbackpic,
                                        // ]);

                                        $record = FeedbackPIC::where('id_uic', $id_uic)
                                            ->where('feedback_pic', $nama_feedbackpic)
                                            ->first();

                                        // $id_feedback = $record->id;

                                        if ($record) {
                                            $id_feedback = $record->id;
                                        } else {
                                            $id_feedback = null;
                                            Log::warning('FeedbackPIC record not found', [
                                                'id_uic' => $id_uic,
                                                'feedback_pic' => $nama_feedbackpic,
                                            ]);
                                        }

                                    } else {
                                        Log::warning('Failed to parse Feedback PIC', ['feedback_pic' => $row['feedback_pic']]);
                                    }
                                } else {
                                    $id_feedback = null;
                                    switch ($row['kendala']) {
                                        case 'KENDALA TIANG':
                                            if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan'])) {
                                                $id_feedback = 1;
                                            } else {
                                                $id_feedback = 2;
                                            }
                                            break;

                                        case 'KENDALA MAINTENANCE':
                                            if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan']) || empty($row['id_valins'])) {
                                                $id_feedback = 10;
                                            } else {
                                                $id_feedback = 12;
                                            }
                                            break;

                                        case 'ODP LOSS':
                                            if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan']) || empty($row['id_valins'])) {
                                                $id_feedback = 10;
                                            } else {
                                                $id_feedback = 12;
                                            }
                                            break;

                                        case 'ODP TIDAK ADA TUTUP':
                                            if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan']) || empty($row['id_valins'])) {
                                                $id_feedback = 10;
                                            } else {
                                                $id_feedback = 12;
                                            }
                                            break;

                                        case 'REDAMAN TINGGI':
                                            if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan']) || empty($row['id_valins'])) {
                                                $id_feedback = 10;
                                            } else {
                                                $id_feedback = 12;
                                            }
                                            break;

                                        case 'ONU > 32':
                                            if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan']) || empty($row['id_valins'])) {
                                                $id_feedback = 10;
                                            } else {
                                                $id_feedback = 12;
                                            }
                                            break;

                                        case 'TIDAK ADA PIT':
                                            if (empty($row['id_valins'])) {
                                                $id_feedback = 62;
                                            } else {
                                                $id_feedback = 66;
                                            }
                                            break;

                                        case 'ODP FULL KAP 8':
                                            if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan']) || empty($row['id_valins'])) {
                                                $id_feedback = 20;
                                            } else {
                                                $id_feedback = 22;
                                            }
                                            break;

                                        case 'ODP FULL KAP 16':
                                            if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan']) || empty($row['id_valins'])) {
                                                $id_feedback = 20;
                                            } else {
                                                $id_feedback = 22;
                                            }
                                            break;

                                        case 'ODP BELUM GOLIVE':
                                            if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan']) || empty($row['id_valins'])) {
                                                $id_feedback = 20;
                                            } else {
                                                $id_feedback = 28;
                                            }
                                            break;

                                        case 'TIDAK ADA ODP':
                                            if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan'])) {
                                                $id_feedback = 34;
                                            } else {
                                                $id_feedback = 36;
                                            }
                                            break;

                                        case 'ODP JAUH':
                                            if (empty($row['label_odp']) || empty($row['tagging_lokasi_odp']) || empty($row['tagging_lokasi_pelanggan'])) {
                                                $id_feedback = 34;
                                            } else {
                                                $id_feedback = 36;
                                            }
                                            break;

                                        default:
                                            $id_feedback = null;
                                            break;
                                    }
                                }

                                if (!empty($errors)) {
                                    Log::warning('Validation failed for row', ['row' => $row, 'errors' => $errors]);
                                    continue;
                                }

                                // sto checker
                                $sto = Sto::where('nama_sto', $row['sto'])->value('id') ?? null;

                                // Create data in Database Order
                                Order::create([
                                    'tanggal' => Carbon::createFromFormat('d-m-Y', $row['tanggal'])->format('Y-m-d'),
                                    'bulan' => $row['bulan'],
                                    'chanel' => $row['chanel'],
                                    'agency' => $row['agency'],
                                    'track_id_myir' => $row['track_id_myir'],
                                    'trackid' => $row['trackid'],
                                    'status_duplicate' => $row['status_duplicate'],
                                    'nomor_sc' => $row['nomor_sc'],
                                    'nama_pelanggan' => $row['nama_pelanggan'],
                                    'alamat_pelanggan' => $row['alamat_pelanggan'],
                                    'cp' => $row['cp'],
                                    'tipe_transaksi' => $row['tipe_transaksi'],
                                    'layanan' => $row['layanan'],
                                    'jenis_layanan' => $row['jenis_layanan'],
                                    'id_sto' => $sto,
                                    'mitra' => $row['mitra'],
                                    'team' => $row['team'],
                                    'kategori' => $row['kategori'],
                                    'detail_progres' => $row['detail_progres'],
                                    'kendala' => $row['kendala'],
                                    'ket_detail' => $row['ket_detail'],
                                    'label_odp' => $row['label_odp'],
                                    'label_odp_alternatif' => $row['label_odp_alternatif'],
                                    'ket_label_odp' => $row['ket_label_odp'],
                                    'kap_odp' => $row['kap_odp'],
                                    'port_odp' => $row['port_odp'],
                                    'sisa_port_odp' => $row['sisa_port_odp'],
                                    'tagging_lokasi_odp' => $row['tagging_lokasi_odp'],
                                    'tagging_lokasi_pelanggan' => $row['tagging_lokasi_pelanggan'],
                                    'status_tagging_pelanggan' => $row['status_tagging_pelanggan'],
                                    'id_valins' => $row['id_valins'],
                                    'segmen' => $row['segmen'],
                                    'produk' => $row['produk'],
                                    'id_feedback' => $id_feedback,
                                    'ket_feedback' => $row['detail_feedback_pic'],
                                    'created_by' => Auth::id(),
                                    'created_at' => now(),
                                    'updated_at' => now(),
                                ]);
                                $updatedRows[] = ['row' => $rowIndex + 1, 'nomor_sc' => $row['nomor_sc']];
                            } catch (\Exception $e) {
                                Log::error('Error on chunk ' . ($chunkIndex + 1) . ', row ' . ($rowIndex + 1), ['error' => $e->getMessage(), 'row' => $row]);
                                throw $e;
                            }
                        } else {
                            // Log::info('Nomor SC ditemukan di database. Data akan di-skip.', ['nomor_sc' => $sc->nomor_sc]);
                            $skippedRows[] = ['row' => $rowIndex + 1, 'nomor_sc' => $sc->nomor_sc];
                        }
                    }
                }
            }

            DB::commit();
            $successCount = count($validatedData['data']) - count($errors);

            if (!empty($updatedRows)) {
                $successMessage = "$successCount Data berhasil ditambahkan! Berikut baris yang berhasil di-update:\n";
                foreach ($updatedRows as $row) {
                    $successMessage .= "Di row nomer {$row['row']} dengan Nomor SC: {$row['nomor_sc']},\n";
                }
                session()->flash('success', $successMessage);
            }

            if (!empty($skippedRows)) {
                $skippedMessage = "Beberapa data sudah ada di database:\n";
                foreach ($skippedRows as $row) {
                    $skippedMessage .= "{$row['nomor_sc']},\n";
                }
                session()->flash('info', $skippedMessage);
            }

            if (empty($updatedRows) && empty($skippedRows)) {
                session()->flash('warning', 'Tidak ada data yang berhasil di-update atau di-skip.');
            }
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error('Transaction failed', ['error' => $e->getMessage()]);
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage() . ", Mohon Ulangi Kembali Setelah Beberapa Saat");
            return redirect()->back();
        }
    }
}
