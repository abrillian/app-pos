<?php
namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(){
        $items = Item::paginate(15);
        return view('items.index', compact('items'));
    }

    public function create(){
        return view('items.form');
    }

    public function store(Request $request){
        $request->validate(['nama_item'=>'required']);
        Item::create($request->all());
        return redirect()->route('items.index')->with('success','Item ditambahkan');
    }

    public function edit(Item $item){
        return view('items.form', compact('item'));
    }

    public function update(Request $request, Item $item){
        $item->update($request->all());
        return redirect()->route('items.index')->with('success','Item diperbarui');
    }

    public function destroy(Item $item){
        $item->delete();
        return redirect()->route('items.index')->with('success','Item dihapus');
    }
}
