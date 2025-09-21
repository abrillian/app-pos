<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Level;

class UserSeeder extends Seeder
{
    public function run(): void {
        $admin = Level::where('level','Admin')->first();
        $kasir = Level::where('level','Kasir')->first();
        $manager = Level::where('level','Manager')->first();

        User::create([
            'nama_user'=>'Administrator',
            'username'=>'admin',
            'password'=>password_hash('admin123', PASSWORD_DEFAULT),
            'level_id'=>$admin->id
        ]);

        User::create([
            'nama_user'=>'Kasir',
            'username'=>'kasir',
            'password'=>password_hash('kasir123', PASSWORD_DEFAULT),
            'level_id'=>$kasir->id
        ]);

        User::create([
            'nama_user'=>'Manager',
            'username'=>'manager',
            'password'=>password_hash('manager123', PASSWORD_DEFAULT),
            'level_id'=>$manager->id
        ]);
    }
}
