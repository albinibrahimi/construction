<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banesa;
use App\Models\Objekt;

class BanesaController extends Controller
{
    public function index($id)
    {
        $banesat = Banesa::select('id','kati','m2','statusi')->where('objektid', '=', $id)->orderBy('kati')->paginate(10);
        $objekti = Objekt::find($id);
            return view('banesat', compact('banesat','objekti'));
    }

    public function create($id)
    {
        $objekti = Objekt::find($id);
        return view('createbanesa', compact('objekti'));
    }

    public function store(Request $request, $id)
    {
        
        $input = $request->all();
        $input['objektid'] = $id;
        $input['statusi'] = 0;

            $index = $input['ngakati'];
            for($index ;$index< $input['numriikateve']+$input['ngakati'];$index++)
{
    $input['kati'] = $index;
    Banesa::create($input);
}
    
      
        return redirect()->route('/')
        ->with('success','Banesa u shtua me sukses');
    }

    public function edit($id)
    {
        $banesa = Banesa::find($id);
        return view('editbanesa', compact('banesa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'statusi'=>'required',
        ]); 
        $banesa = Banesa::find($id);
        // Getting values from the blade template form
        $banesa->statusi = $request->get('statusi');
        $banesa->save();
    
        return redirect('/')->with('success', 'Stock updated.');
    }
    
}
