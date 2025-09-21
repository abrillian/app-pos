<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers = Customer::paginate(15);
        return view('customers.index', compact('customers'));
    }

    public function create(){
        return view('customers.form');
    }

    public function store(Request $request){
        $request->validate(['nama_customer'=>'required']);
        Customer::create($request->all());
        return redirect()->route('customers.index')->with('success','Customer ditambahkan');
    }

    public function edit(Customer $customer){
        return view('customers.form', compact('customer'));
    }

    public function update(Request $request, Customer $customer){
        $customer->update($request->all());
        return redirect()->route('customers.index')->with('success','Customer diperbarui');
    }

    public function destroy(Customer $customer){
        $customer->delete();
        return redirect()->route('customers.index')->with('success','Customer dihapus');
    }
}
