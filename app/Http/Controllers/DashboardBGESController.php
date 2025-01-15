<?php

namespace App\Http\Controllers;

use App\Models\EditLog;
use App\Models\FeedbackPIC;
use App\Models\Order;
use App\Models\So;
use App\Models\Sto;
use App\Models\Uic;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardBGESController extends Controller
{
    public function index(Request $request)
    {
        // Query
        $data = Sto::with('sto_so')->get();
        $kendalas = Uic::get();

        // Tambahkan query untuk daftar bulan dari data Order
        $months = Order::selectRaw('MONTH(tanggal) as month, YEAR(tanggal) as year')
            ->groupBy('month', 'year')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        // Ambil filter bulan dan tahun dari request
        $selectedMonth = $request->input('month');
        $selectedYear = $request->input('year');

        // Inisialisasi variabel
        $groupedData = $data->groupBy(['sto_so.nama_so', 'nama_tl']);
        $selectedFeedbackId = $request->input('data-change');
        $feedbackPics = [];
        $ordersCount = [];
        $totalPerFeedback = [];
        $totalOverall = 0;

        // Isi
        if ($selectedFeedbackId) {
            $feedbackPics = FeedbackPic::where('id_uic', $selectedFeedbackId)->get();

            foreach ($feedbackPics as $pic) {
                $totalPerFeedback[$pic->id] = 0;

                foreach ($data as $stoRow) {
                    $query = Order::where('id_feedback', $pic->id)
                        ->where('id_sto', $stoRow->id);

                    // Tambahkan filter bulan jika dipilih
                    if ($selectedMonth && $selectedYear) {
                        $query->whereMonth('tanggal', $selectedMonth)
                            ->whereYear('tanggal', $selectedYear);
                    }

                    $ordersCount[$pic->id][$stoRow->id] = $query->count();
                    $totalPerFeedback[$pic->id] += $ordersCount[$pic->id][$stoRow->id];
                    $totalOverall += $ordersCount[$pic->id][$stoRow->id];
                }
            }
        }

        // dd($feedbackPics);
        // Return ke view
        return view('telkomsel.menus.dashboard.dashboard', compact(
            'data',
            'groupedData',
            'kendalas',
            'feedbackPics',
            'selectedFeedbackId',
            'ordersCount',
            'totalPerFeedback',
            'totalOverall',
            'months',
            'selectedMonth',
            'selectedYear'
        ));
    }
}
