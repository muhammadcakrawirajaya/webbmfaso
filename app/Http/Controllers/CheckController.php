<?php

namespace App\Http\Controllers;

use App\Imports\CheckImport;
use App\Models\FeedbackPIC;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckController extends Controller
{
    public function index()
    {
        // return ke view
        return view('telkomsel.menus.dashboard.menu4');
    }

    public function preview(Request $request)
    {
        // Log Check
        if (!Auth::check()) {
            session()->flash('info', 'Mohon Login Kembali untuk Melanjutkan aktivitas');
            return redirect('/login');
        }
        // $user = Auth::user();
        // if ($user->role !== 'team leader' || $user->division !== 'aso') {
        //     session()->flash('error', 'Anda tidak memiliki aksess untuk fungsi ini.');
        //     return redirect()->back();
        // }

        // Validasi
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        // Log::info('File Name:', ['request' => $request->all()]);

        // Preview prosess
        try {
            $import = new CheckImport();
            Excel::import($import, $request->file('file'));

            $data = $import->getData();

            // Log::info('Data:', ['request' => $data->all()]);
            // dd($data);

            return view('telkomsel.menus.dashboard.menu4', compact('data'));
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage() . ', Pastikan template file Excel Anda benar');
            return redirect()->back();
        }
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            session()->flash('info', 'Mohon Login Kembali untuk Melanjutkan aktivitas');
            return redirect('/login');
        }

        try {
            $validatedData = $request->validate([
                'data' => 'required|array',
            ]);
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }

        $chunkSize = 100;
        $dataChunks = array_chunk($validatedData['data'], $chunkSize);

        DB::beginTransaction();
        try {
            $updatedRows = [];
            $skippedRows = [];

            foreach ($dataChunks as $chunkIndex => $chunk) {
                foreach ($chunk as $rowIndex => $row) {
                    if ($row['status_resume'] === 'Completed (PS)') {
                        try {
                            $sc = Order::where('nomor_sc', $row['order_id'])->first();
                            if ($sc && $sc->nomor_sc === $row['order_id']) {
                                $feedback = FeedbackPIC::where('id', $sc->id_feedback)->first();
                                // dd($feedback);
                                if (isset($feedback->id_uic)) {
                                    switch ($feedback->id_uic) {
                                        case 1:
                                            $id_feedback = 7;
                                            break;
                                        case 2:
                                            $id_feedback = 14;
                                            break;
                                        case 3:
                                            $id_feedback = 31;
                                            break;
                                        case 4:
                                            $id_feedback = 45;
                                            break;
                                        case 5:
                                            $id_feedback = 59;
                                            break;
                                        case 6:
                                            $id_feedback = 69;
                                            break;
                                        default:
                                            $id_feedback = null;
                                    }
                                    if ($id_feedback !== null) {
                                        if ($sc->id_feedback === $id_feedback) {
                                            // Log::info("Skip update untuk Nomor SC: {$sc->nomor_sc} karena id_feedback sudah sama.");
                                            $skippedRows[] = ['row' => $rowIndex + 1, 'nomor_sc' => $sc->nomor_sc];
                                            continue;
                                        }

                                        $sc->update(['id_feedback' => $id_feedback]);
                                        $updatedRows[] = ['row' => $rowIndex + 1, 'nomor_sc' => $sc->nomor_sc];
                                    }
                                }
                            }
                        } catch (\Exception $e) {
                            Log::error('Error on chunk ' . ($chunkIndex + 1) . ', row ' . ($rowIndex + 1), [
                                'error' => $e->getMessage(),
                                'row' => $row
                            ]);
                            throw $e;
                        }
                    }
                }
            }

            DB::commit();

            if (!empty($updatedRows)) {
                $successMessage = "Data berhasil di-upload! Berikut baris yang berhasil di-update:\n";
                foreach ($updatedRows as $row) {
                    $successMessage .= "Di row nomer {$row['row']} dengan Nomor SC: {$row['nomor_sc']},\n";
                }
                session()->flash('success', $successMessage);
            }

            if (!empty($skippedRows)) {
                $skippedMessage = "Beberapa data tidak di-update karena sudah yang closed:\n";
                foreach ($skippedRows as $row) {
                    $skippedMessage .= "Di row nomer {$row['row']} dengan Nomor SC: {$row['nomor_sc']},\n";
                }
                session()->flash('info', $skippedMessage);
            }

            if (empty($updatedRows) && empty($skippedRows)) {
                session()->flash('warning', 'Tidak ada data yang berhasil di-update atau di-skip.');
            }

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage() . ", Mohon Ulangi Kembali Setelah Beberapa Saat");
            return redirect()->back();
        }
    }
}
