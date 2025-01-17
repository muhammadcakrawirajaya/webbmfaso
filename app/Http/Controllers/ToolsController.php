<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ToolsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::where('id_user', Auth::id())->first();

        // dd($settings);

        return view('telkomsel.menus.toolsMenu.menu1', compact('settings'));
    }

    public function update(Request $request, Setting $setting)
    {
        $validatedData = $request->validate([
            'so' => 'nullable|in:1,2',
            'sto' => 'nullable|in:1,2',
            'bulan' => 'nullable|in:1,2',
            'telda' => 'nullable|in:1,2',
            'segmen' => 'nullable|in:1,2',
            'uic' => 'nullable|in:1,2',
            'feedback' => 'nullable|in:1,2',
            'status' => 'nullable|in:1,2',
            'search' => 'nullable|in:1,2',
            'export' => 'nullable|in:1,2',
        ]);

        $setting->update([
            'so' => $request->has('so') ? 1 : 2,
            'sto' => $request->has('sto') ? 1 : 2,
            'bulan' => $request->has('bulan') ? 1 : 2,
            'telda' => $request->has('telda') ? 1 : 2,
            'segmen' => $request->has('segmen') ? 1 : 2,
            'uic' => $request->has('uic') ? 1 : 2,
            'feedback' => $request->has('feedback') ? 1 : 2,
            'status' => $request->has('status') ? 1 : 2,
            'search' => $request->has('search') ? 1 : 2,
            'export' => $request->has('export') ? 1 : 2,
        ]);

        session()->flash('info', 'Filter Diperbaharui');
        return redirect()->back();
    }
}
