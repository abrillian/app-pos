<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run(): void {
        Item::create(['nama_item'=>'Pulpen','uom'=>'pcs','harga_beli'=>1000,'harga_jual'=>2000]);
        Item::create(['nama_item'=>'Buku Tulis','uom'=>'pcs','harga_beli'=>3000,'harga_jual'=>5000]);
    }
}
