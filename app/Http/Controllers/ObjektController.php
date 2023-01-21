<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Objekt;

class ObjektController extends Controller
{
    public function index()
    {
        $objekts = Objekt::all();
        return view('objektet', compact('objekts'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ],[
            'name.required' => 'Emri është i domosdoshëm.',
            'image.required' => 'Foto është e domosdoshme.',
        ]);
   
        $input = $request->all();
   
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
     
        Objekt::create($input);
      
        return redirect()->route('admin')->with('success', 'Objekti u shtua me sukses');
    }

    public function admin()
    {
        return view('admin.panel');
    }
}
