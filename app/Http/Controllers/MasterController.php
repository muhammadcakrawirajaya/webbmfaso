<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use App\Models\EditLog;
use App\Models\FeedbackPIC;
use App\Models\Karyawan;
use App\Models\Order;
use App\Models\Setting;
use App\Models\So;
use App\Models\StatusKendala;
use App\Models\Sto;
use App\Models\Uic;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class MasterController extends Controller
{
    public function index(Request $request)
    {
        // Validasi input
        $request->validate([
            'start_date' => 'date|nullable',
            'end_date' => 'date|nullable|after_or_equal:start_date',
        ]);

        // Pagination default
        $perPage = $request->get('per_page', 10);

        // Query STO
        $sto = Sto::get();

        // Query Bulan dan Tahun
        $months = Order::select(
            DB::raw('YEAR(tanggal) as year'),
            DB::raw('MONTH(tanggal) as month'),
            DB::raw('COUNT(*) as total_orders')
        )
            ->groupBy(DB::raw('YEAR(tanggal)'), DB::raw('MONTH(tanggal)'))
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        // Query data utama
        $query = Order::with(['feedback_order.uic', 'feedback_order.status_kendalas', 'order_sto.sto_so'])
            ->select('*', DB::raw('DATEDIFF(CURDATE(), tanggal) AS umur'));

        // Filter pencarian teks
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('id', 'LIKE', "%$search%")
                    ->orWhere('tanggal', 'LIKE', "%$search%")
                    ->orWhere('bulan', 'LIKE', "%$search%")
                    ->orWhere('chanel', 'LIKE', "%$search%")
                    ->orWhere('agency', 'LIKE', "%$search%")
                    ->orWhere('track_id_myir', 'LIKE', "%$search%")
                    ->orWhere('trackid', 'LIKE', "%$search%")
                    ->orWhere('status_duplicate', 'LIKE', "%$search%")
                    ->orWhere('nomor_sc', 'LIKE', "%$search%")
                    ->orWhere('nama_pelanggan', 'LIKE', "%$search%")
                    ->orWhere('alamat_pelanggan', 'LIKE', "%$search%")
                    ->orWhere('cp', 'LIKE', "%$search%")
                    ->orWhere('tipe_transaksi', 'LIKE', "%$search%")
                    ->orWhere('layanan', 'LIKE', "%$search%")
                    ->orWhere('jenis_layanan', 'LIKE', "%$search%")
                    ->orWhere('id_sto', 'LIKE', "%$search%")
                    ->orWhere('mitra', 'LIKE', "%$search%")
                    ->orWhere('team', 'LIKE', "%$search%")
                    ->orWhere('kategori', 'LIKE', "%$search%")
                    ->orWhere('detail_progres', 'LIKE', "%$search%")
                    ->orWhere('kendala', 'LIKE', "%$search%")
                    ->orWhere('ket_detail', 'LIKE', "%$search%")
                    ->orWhere('label_odp', 'LIKE', "%$search%")
                    ->orWhere('label_odp_alternatif', 'LIKE', "%$search%")
                    ->orWhere('ket_label_odp', 'LIKE', "%$search%")
                    ->orWhere('kap_odp', 'LIKE', "%$search%")
                    ->orWhere('port_odp', 'LIKE', "%$search%")
                    ->orWhere('sisa_port_odp', 'LIKE', "%$search%")
                    ->orWhere('tagging_lokasi_odp', 'LIKE', "%$search%")
                    ->orWhere('tagging_lokasi_pelanggan', 'LIKE', "%$search%")
                    ->orWhere('status_tagging_pelanggan', 'LIKE', "%$search%");
            });
        }

        // Filter tanggal
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $query->whereBetween('tanggal', [$startDate, $endDate]);
        }

        // Filter STO
        if ($request->filled('sto')) {
            $query->where('id_sto', $request->input('sto'));
        }

        // Filter SO
        if ($request->filled('so')) {
            $soId = $request->input('so');
            $query->whereHas('order_sto', function ($stoQuery) use ($soId) {
                $stoQuery->whereHas('sto_so', function ($soQuery) use ($soId) {
                    $soQuery->where('id', $soId);
                });
            });
        }

        // Filter Telda
        if ($request->filled('telda')) {
            $namaTelda = $request->input('telda');
            $query->whereHas('order_sto.sto_so', function ($q) use ($namaTelda) {
                $q->where('nama_telda', $namaTelda);
            });
        }

        // Filter Segmen
        if ($request->filled('segmen')) {
            $query->where('segmen', $request->input('segmen'));
        }

        // Filter UIC
        if ($request->filled('uic')) {
            $uicId = $request->input('uic');
            $query->whereHas('feedback_order', function ($uicQuery) use ($uicId) {
                $uicQuery->whereHas('uic', function ($uicQuery) use ($uicId) {
                    $uicQuery->where('id', $uicId);
                });
            });
        }

        // Filter STO
        if ($request->filled('pic')) {
            $query->where('id_feedback', $request->input('pic'));
        }

        // Filter Status Kendala
        if ($request->filled('status')) {
            $statusId = $request->input('status');
            $query->whereHas('feedback_order', function ($statusQuery) use ($statusId) {
                $statusQuery->whereHas('status_kendalas', function ($statusQuery) use ($statusId) {
                    $statusQuery->where('id', $statusId);
                });
            });
        }

        // Filter bulan dan tahun
        if ($request->filled('month')) {
            $query->whereMonth('tanggal', $request->input('month'))
                ->whereYear('tanggal', $request->input('year'));
        }

        // Paginate data utama
        $data = $query->paginate($perPage)->withQueryString();

        // Query tambahan untuk edit_logs
        $editLogs = DB::table('edit_logs')
            ->join('karyawan', DB::raw("JSON_EXTRACT(edit_logs.edit_data, '$.updated_by')"), '=', 'karyawan.id')
            ->where('edit_logs.model_type', 'order')
            ->select(
                'edit_logs.model_id',
                'karyawan.nama',
                'edit_logs.created_at',
                DB::raw("JSON_EXTRACT(edit_logs.edit_data, '$.updated_by') as updated_by")
            )
            ->orderBy('edit_logs.created_at', 'desc')
            ->get();

        // Data get for dropdown
        $kendalas = Uic::with('feedbacks')->get();
        $so = So::with('so_sto')->get();
        $seacruic = Uic::get();
        $status = StatusKendala::get();
        $segmen = Order::select('segmen')->distinct()->get();
        $setting = Setting::where('id_user', Auth::id())->first();

        // dd($data);

        // Return ke view
        return view('telkomsel.menus.dashboard.menu3', compact('data', 'kendalas', 'editLogs', 'months', 'sto', 'so', 'seacruic', 'status', 'segmen', 'setting'));
    }

    public function store(Request $request)
    {
        // Log::info('Store data to Database Begin:', ['request' => $request->all()]);

        // Log check
        if (!Auth::check()) {
            session()->flash('info', 'Mohon Login Kembali untuk Melanjutkan aktivitas');
            return redirect('/login');
        }

        // Validasi data
        try {
            $request->validate([
                'data.*.id' => 'required|exists:order,id',
                'data.*.tanggal' => 'required|string|max:10',
                'data.*.ket_feedback' => 'nullable|string|max:500',
            ]);
            // Log::info('Validation passed successfully');
        } catch (ValidationException $e) {
            session()->flash('warning', 'Mohon Periksa Kembali Data yang anda Masukkan');
            return redirect()->back();
        }

        // Update Prosess
        try {
            Log::info('Updating Order');

            DB::beginTransaction();

            foreach ($request['data'] as $row) {
                // ID Checker
                if (empty($row['id'])) {
                    Log::error('ID tidak ditemukan pada data', ['data' => $row]);
                    return response()->json([
                        'success' => false,
                        'message' => 'ID tidak ditemukan pada data yang dikirim.'
                    ], 422);
                }

                // Query
                $order = Order::where('id', $row['id'])->first();

                // Log Create
                if ($order) {
                    try {
                        $editData = array_merge($row, ['updated_by' => Auth::id()]);
                        $log = EditLog::create([
                            'model_type' => 'order',
                            'model_id' => $order->id,
                            'edit_data' => json_encode($editData),
                        ]);

                        // Log::info('Data to log', [
                        //     'edit_data' => $editData,
                        // ]);

                        // Log::info('EditLog created successfully', ['log' => $log]);
                    } catch (\Exception $e) {
                        Log::error('Failed to create EditLog', ['error' => $e->getMessage()]);
                    }

                    $logCount = EditLog::where('model_type', 'order')
                        ->where('model_id', $order->id)
                        ->count();

                    if ($logCount > 5) {
                        EditLog::where('model_type', 'order')
                            ->where('model_id', $order->id)
                            ->orderBy('created_at', 'asc')
                            ->limit($logCount - 5)
                            ->delete();

                        // Log::info('Log lama berhasil dihapus', ['deleted_logs' => $logCount - 5]);
                    }

                    $order->update(array_merge($row, ['updated_by' => Auth::id()]));
                }

                // Log::info('Order updated successfully', ['order_id' => $order->id]);
            }

            DB::commit();

            // Log::info('Transaction committed successfully');

            session()->flash('success', 'Data Berhasil Dibuat!');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            // Log::error('Error updating user', ['error' => $e->getMessage()]);

            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
            return redirect()->back();
        }
    }

    public function multiEdit(Request $request)
    {
        // Log::info('Store data to Database Begin:', ['request' => $request->all()]);

        // Log check
        if (!Auth::check()) {
            session()->flash('info', 'Mohon Login Kembali untuk Melanjutkan aktivitas');
            return redirect('/login');
        }

        // Inisiasi
        $ids = $request->input('ids');
        $idFeedback = $request->input('id_feedback');

        if (!$ids || !$idFeedback) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: Data tidak valid.',
            ], 500);
        }

        // Edit prosess
        try {
            DB::beginTransaction();
            // Log::info('Transaction started for multiEdit');

            // Query
            $orders = DB::table('order')
                ->whereIn('id', $ids)
                ->get();

            // Log Create
            foreach ($orders as $order) {
                try {
                    $log = EditLog::create([
                        'model_type' => 'order',
                        'model_id' => $order->id,
                        'edit_data' => json_encode([
                            'old_id_feedback' => $order->id_feedback,
                            'new_id_feedback' => $idFeedback,
                            'updated_by' => Auth::id(),
                        ]),
                    ]);

                    // Log::info('Data to log', [
                    //     'old_id_feedback' => $order->id_feedback,
                    //     'new_id_feedback' => $idFeedback
                    // ]);

                    // Log::info('EditLog created successfully', ['log' => $log]);
                } catch (\Exception $e) {
                    Log::error('Failed to create EditLog', ['error' => $e->getMessage()]);
                }

                $logCount = EditLog::where('model_type', 'order')
                    ->where('model_id', $order->id)
                    ->count();

                if ($logCount > 5) {
                    EditLog::where('model_type', 'order')
                        ->where('model_id', $order->id)
                        ->orderBy('created_at', 'asc')
                        ->limit($logCount - 5)
                        ->delete();

                    // Log::info('Log lama berhasil dihapus', ['deleted_logs' => $logCount - 5]);
                }
            }

            // Update in database order
            $updated = DB::table('order')
                ->whereIn('id', $ids)
                ->update([
                    'id_feedback' => $idFeedback,
                    'updated_by' => Auth::id(),
                ]);

            // Log::info('Rows updated', ['updated_count' => $updated]);

            DB::commit();
            // Log::info('Transaction committed successfully for multiEdit');

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diperbarui.',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            // Log::error('Error during multiEdit', ['error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui data.',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }

    public function multiDelete(Request $request)
    {
        // Log check
        if (!Auth::check()) {
            session()->flash('info', 'Mohon Login Kembali untuk Melanjutkan aktivitas');
            return redirect('/login');
        }
        $user = Auth::user();
        if ($user->role !== 'admin' || $user->division !== 'aso') {
            return response()->json([
                'success' => false,
                'message' => 'Anda tidak memiliki aksess untuk fungsi ini.',
            ], 500);
        }

        // Validasi data
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:order,id',
        ]);

        // Delete prosess
        try {
            DB::table('order')->whereIn('id', $request->ids)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diperbarui.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data.',
                'errors' => $e->getMessage(),
            ], 500);
        }
    }

    public function export(Request $request)
    {
        // Validasi input
        $request->validate([
            'start_date' => 'date|nullable',
            'end_date' => 'date|nullable|after_or_equal:start_date',
        ]);

        // Query data utama
        $query = Order::with([
            'feedback_order.uic',
            'feedback_order.status_kendalas',
            'order_sto.sto_so',
            'createdByUser'
        ])->select('*', DB::raw('DATEDIFF(CURDATE(), tanggal) AS umur'));


        // Filter pencarian teks
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('id', 'LIKE', "%$search%")
                    ->orWhere('tanggal', 'LIKE', "%$search%")
                    ->orWhere('bulan', 'LIKE', "%$search%")
                    ->orWhere('chanel', 'LIKE', "%$search%")
                    ->orWhere('agency', 'LIKE', "%$search%")
                    ->orWhere('track_id_myir', 'LIKE', "%$search%")
                    ->orWhere('trackid', 'LIKE', "%$search%")
                    ->orWhere('status_duplicate', 'LIKE', "%$search%")
                    ->orWhere('nomor_sc', 'LIKE', "%$search%")
                    ->orWhere('nama_pelanggan', 'LIKE', "%$search%")
                    ->orWhere('alamat_pelanggan', 'LIKE', "%$search%")
                    ->orWhere('cp', 'LIKE', "%$search%")
                    ->orWhere('tipe_transaksi', 'LIKE', "%$search%")
                    ->orWhere('layanan', 'LIKE', "%$search%")
                    ->orWhere('jenis_layanan', 'LIKE', "%$search%")
                    ->orWhere('id_sto', 'LIKE', "%$search%")
                    ->orWhere('mitra', 'LIKE', "%$search%")
                    ->orWhere('team', 'LIKE', "%$search%")
                    ->orWhere('kategori', 'LIKE', "%$search%")
                    ->orWhere('detail_progres', 'LIKE', "%$search%")
                    ->orWhere('kendala', 'LIKE', "%$search%")
                    ->orWhere('ket_detail', 'LIKE', "%$search%")
                    ->orWhere('label_odp', 'LIKE', "%$search%")
                    ->orWhere('label_odp_alternatif', 'LIKE', "%$search%")
                    ->orWhere('ket_label_odp', 'LIKE', "%$search%")
                    ->orWhere('kap_odp', 'LIKE', "%$search%")
                    ->orWhere('port_odp', 'LIKE', "%$search%")
                    ->orWhere('sisa_port_odp', 'LIKE', "%$search%")
                    ->orWhere('tagging_lokasi_odp', 'LIKE', "%$search%")
                    ->orWhere('tagging_lokasi_pelanggan', 'LIKE', "%$search%")
                    ->orWhere('status_tagging_pelanggan', 'LIKE', "%$search%");
            });
        }

        // Filter tanggal
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $startDate = $request->input('start_date');
            $endDate = $request->input('end_date');
            $query->whereBetween('tanggal', [$startDate, $endDate]);
        }

        // Filter STO
        if ($request->filled('sto')) {
            $query->where('id_sto', $request->input('sto'));
        }

        // Filter SO
        if ($request->filled('so')) {
            $soId = $request->input('so');
            $query->whereHas('order_sto', function ($stoQuery) use ($soId) {
                $stoQuery->whereHas('sto_so', function ($soQuery) use ($soId) {
                    $soQuery->where('id', $soId);
                });
            });
        }

        // Filter Telda
        if ($request->filled('telda')) {
            $namaTelda = $request->input('telda');
            $query->whereHas('order_sto.sto_so', function ($q) use ($namaTelda) {
                $q->where('nama_telda', $namaTelda);
            });
        }

        // Filter Segmen
        if ($request->filled('segmen')) {
            $query->where('segmen', $request->input('segmen'));
        }

        // Filter UIC
        if ($request->filled('uic')) {
            $uicId = $request->input('uic');
            $query->whereHas('feedback_order', function ($uicQuery) use ($uicId) {
                $uicQuery->whereHas('uic', function ($uicQuery) use ($uicId) {
                    $uicQuery->where('id', $uicId);
                });
            });
        }

        // Filter PIC
        if ($request->filled('pic')) {
            $query->where('id_feedback', $request->input('pic'));
        }

        // Filter Status Kendala
        if ($request->filled('status')) {
            $statusId = $request->input('status');
            $query->whereHas('feedback_order', function ($statusQuery) use ($statusId) {
                $statusQuery->whereHas('status_kendalas', function ($statusQuery) use ($statusId) {
                    $statusQuery->where('id', $statusId);
                });
            });
        }

        // Filter bulan dan tahun
        if ($request->filled('month')) {
            $query->whereMonth('tanggal', $request->input('month'))
                ->whereYear('tanggal', $request->input('year'));
        }

        // Ambil data yang telah difilter
        $filteredData = $query->get();

        $customData = $filteredData->map(function ($order) {
            return [
                'ID' => $order->id,
                'tanggal' => $order->tanggal,
                'bulan' => $order->bulan,
                'track_id_myir' => $order->track_id_myir,
                'trackid' => $order->trackid,
                'status_duplicate' => $order->status_duplicate,
                'nomor_sc' => $order->nomor_sc,
                'nama_pelanggan' => $order->nama_pelanggan,
                'alamat_pelanggan' => $order->alamat_pelanggan,
                'cp' => $order->cp,
                'tipe_transaksi' => $order->tipe_transaksi,
                'layanan' => $order->layanan,
                'jenis_layanan' => $order->jenis_layanan,
                'sto' => $order->order_sto->nama_sto,
                'mitra' => $order->mitra,
                'team' => $order->team,
                'kategori' => $order->kategori,
                'detail_progres' => $order->detail_progres,
                'kendala' => $order->kendala,
                'ket_detail' => $order->ket_detail,
                'chanel' => $order->chanel,
                'agency' => $order->agency,
                'label_odp' => $order->label_odp,
                'label_odp_alternatif' => $order->label_odp_alternatif,
                'ket_label_odp' => $order->ket_label_odp,
                'kap_odp' => $order->kap_odp,
                'port_odp' => $order->port_odp,
                'sisa_port_odp' => $order->sisa_port_odp,
                'tagging_lokasi_odp' => $order->tagging_lokasi_odp,
                'tagging_lokasi_pelanggan' => $order->tagging_lokasi_pelanggan,
                'status_tagging_pelanggan' => $order->status_tagging_pelanggan,
                'id_valins' => $order->id_valins,
                'segmen' => $order->segmen,
                'so' => optional($order->order_sto->sto_so)->nama_so,
                'telda' => optional($order->order_sto->sto_so)->nama_telda,
                'produk' => $order->produk,
                'umur' => $order->umur . ' hari',
                'Status' => optional($order->feedback_order->status_kendalas)->status_kendala,
                'uic' => optional($order->feedback_order->uic)->uic,
                'feedback' => optional($order->feedback_order)->feedback_pic,
                'ket_feedback' => $order->ket_feedback,
                'created_by' => optional($order->createdByUser)->nama,
                'created_at' => $order->created_at,
            ];
        });

        // Backend Debug
        // dd($customData);
        // dd($filteredData);

        // Ekspor ke Excel
        return Excel::download(new OrdersExport($customData), 'orders.xlsx');
    }
}
