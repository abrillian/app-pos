<?php
namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Sale;

class TransactionController extends Controller
{
    public function index()
{
    $transactions = Transaction::with(['sale','item'])->paginate(10);
    return view('transactions.index', compact('transactions'));
}


    public function show(Transaction $transaction){
        $transaction->load('sale.customer','item');
        return view('transactions.show', compact('transaction'));
    }

    public function destroy(Transaction $transaction){
        $transaction->delete();
        return back()->with('success','Transaksi dihapus');
    }
}
