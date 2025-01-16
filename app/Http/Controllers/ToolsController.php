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
        $settings = Setting::where('id_user', Session::id())->get();
        return view('telkomsel.menus.toolsMenu.menu1', compact('settings'));
    }

    public function update(Request $request)
    {
        // Ambil data input settings
        $updatedSettings = $request->input('settings', []);

        // Loop semua settings dan update statusnya
        $settings = Setting::all();
        foreach ($settings as $setting) {
            $setting->active = isset($updatedSettings[$setting->id]) ? 1 : 0;
            $setting->save();
        }

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }
}
