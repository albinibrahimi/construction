<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banesa;
use App\Models\Objekt;

class AdminController extends Controller
{
    public function index()
    {
        $objekts = Objekt::all();
            return view('admin.panel', compact('objekts'));
    }

    public function editbuilding($id)
    {
        $objekt = Objekt::find($id);
            return view('admin.editbuilding', compact('objekt'));
    }

    public function showapartments($id)
    {
        $objekt = Objekt::find($id);
        $apartments = Banesa::select('m2')->where('objektid', '=', $id)->distinct('m2')->get();
            return view('admin.apartments', compact('apartments','objekt'));
    }

    public function destroy(Request $request)
    {
        $banesa = Banesa::where('m2', $request->m2)->where('objektid', $request->objektid)->delete();
        return back();
    }
}
