<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banesa;
use App\Models\Objekt;

class BanesaController extends Controller
{
    public function index($id)
    {
        $banesat = Banesa::select('id','kati','m2','statusi','description')->where('objektid', '=', $id)->orderBy('kati')->orderBy('m2')->paginate(10);
        $objekti = Objekt::find($id);

        if($objekti != NULL && $banesat!= NULL)
        {
            return view('banesat', compact('banesat','objekti'));
        }
        else
        {
            return redirect('/');
        }
            
    }

    public function create($id)
    {
        $objekti = Objekt::find($id);

        if($objekti != NULL)
        {
            return view('createbanesa', compact('objekti'));
        }
        else
        {
            return redirect('/admin');
        }
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'm2' => 'required|numeric',
            'ngakati'  => 'required|numeric',
            'numriikateve' => 'required|numeric',
        ],[
            'm2.required' => 'M2 janë të domosdoshme.',
            'm2.numeric' => 'M2 mund të jenë vetëm numra.',
            'ngakati.required' => 'Fusha nga kati është e domosdoshme.',
            'ngakati.numeric' => 'Fusha nga kati mund të jetë vetëm numër.',
            'numriikateve.required' => 'Fusha numri i kateve është e domosdoshme.',
            'numriikateve.numeric' => 'Fusha numri i kateve mund të jetë vetëm numër.',
        ]);

        $input = $request->all();
        $input['objektid'] = $id;
        $input['statusi'] = 0;

            $index = $input['ngakati'];
            for($index ;$index< $input['numriikateve']+$input['ngakati'];$index++)
{
    $input['kati'] = $index;
    Banesa::create($input);
}
    
      
        return redirect()->route('admin', [$id])->with('success', 'U shtua me sukses banesa ' .$input["m2"]. 'm2.');
    }

    public function edit($id)
    {
        $banesa = Banesa::find($id);
        if($banesa != NULL)
        {
            return view('editbanesa', compact('banesa'));
        }
        else
        {
            return redirect('/');
        }
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
    
        return redirect()->route('banesat', [$banesa->objektid])->with('success', 'Statusi u ndërrua me sukses.');
    }

    public function editdescription($id)
    {
        $banesa = Banesa::find($id);
        if($banesa != NULL)
        {
            return view('editdescription', compact('banesa'));
        }
        else
        {
            return redirect('/');
        }
    }

    public function updatedescription(Request $request, $id)
    {

        $banesa = Banesa::find($id);
        // Getting values from the blade template form
        $banesa->description = $request->get('description');
        $banesa->save();
    
        return redirect()->route('banesat', [$banesa->objektid])->with('success', 'Përshkrimi u ndërrua me sukses.');
    }

    public function readdescription($id)
    {
        $banesa = Banesa::find($id);
        if($banesa != NULL)
        {
            return view('readdescription', compact('banesa'));
        }
        else
        {
            return redirect('/');
        }
    }
    
}
