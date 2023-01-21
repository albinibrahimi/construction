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

    public function destroy(Request $request, $m2, $objektid)
    {
        $banesa = Banesa::where('m2', $m2)->where('objektid', $objektid)->delete();
        return back()->with('success', 'Banesa '.$m2. 'm2 u fshi me sukses.');;
    }

    public function destroybuilding(Request $request)
    {
        $banesa = Banesa::where('objektid', $request->objektid)->delete();
        $objekti = Objekt::where('id', $request->id)->delete();

        return redirect('/admin');
    }

    public function editapartment($m2,$objektid)
    {
        $metrat = $m2;
        $objekt = Objekt::find($objektid);
            return view('admin.editapartment', compact('metrat','objekt'));
    }

    public function updateapartment(Request $request, $m2, $objektid)
    {
        $banesas = Banesa::where('m2', $m2)->where('objektid', $objektid)->get();

        foreach($banesas as $banesa)
    {
        $banesa->m2 = $request->get('m2');
        $banesa->save();
    }       
    
        return redirect()->route('apartments', [$objektid])->with('success', 'Madhësi e banesës u ndërrua me sukses.');
    }
}
