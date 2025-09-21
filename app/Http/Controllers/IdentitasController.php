<?php
namespace App\Http\Controllers;

use App\Models\Identitas;
use Illuminate\Http\Request;

class IdentitasController extends Controller
{
    public function index(){
        $identitas = Identitas::first();
        return view('identitas.index', compact('identitas'));
    }

    public function edit(Identitas $identitas){
        return view('identitas.form', compact('identitas'));
    }

    public function update(Request $request, Identitas $identitas){
        $identitas->update($request->all());
        return redirect()->route('identitas.index')->with('success','Identitas diperbarui');
    }
}
