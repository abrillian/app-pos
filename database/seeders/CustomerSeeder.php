<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void {
        Customer::create(['nama_customer'=>'PT Maju Jaya','alamat'=>'Jl. Sudirman No.1','telp'=>'021111111']);
        Customer::create(['nama_customer'=>'CV Sumber Rejeki','alamat'=>'Jl. Merdeka No.2','telp'=>'021222222']);
    }
}
