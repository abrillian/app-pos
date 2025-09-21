<?php
namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Transaction;
use App\Models\TransactionTemp;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index(){
        $sales = Sale::with('customer')->latest()->paginate(10);
        return view('sales.index', compact('sales'));
    }

    public function create(){
        $customers = Customer::all();
        $items = Item::all();
        return view('sales.create', compact('customers','items'));
    }

    public function addTemp(Request $request){
        $item = Item::findOrFail($request->item_id);
        $amount = $request->quantity * $item->harga_jual;

        TransactionTemp::create([
            'item_id'=>$item->id,
            'quantity'=>$request->quantity,
            'price'=>$item->harga_jual,
            'amount'=>$amount,
            'session_id'=>session()->getId()
        ]);

        return back()->with('success','Item ditambahkan ke transaksi sementara');
    }

    public function store(Request $request){
        $sale = Sale::create([
            'tgl_sales'=>now(),
            'customer_id'=>$request->customer_id,
            'do_number'=>'DO-'.time(),
            'status'=>'final'
        ]);

        $temps = TransactionTemp::where('session_id',session()->getId())->get();
        foreach($temps as $t){
            Transaction::create([
                'sale_id'=>$sale->id,
                'item_id'=>$t->item_id,
                'quantity'=>$t->quantity,
                'price'=>$t->price,
                'amount'=>$t->amount
            ]);
            $t->delete();
        }

        return redirect()->route('sales.index')->with('success','Transaksi berhasil disimpan');
    }

    public function show(Sale $sale){
        $sale->load('customer','transactions.item');
        return view('sales.show', compact('sale'));
    }
}
