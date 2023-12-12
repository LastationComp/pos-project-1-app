<?php

namespace Database\Seeders\database\seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Unit;
use App\Models\Admin;
use App\Models\Client;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Settings;
use App\Models\super_admin;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\Selling_unit; 
use Illuminate\Database\Seeder;
use App\Models\Transaction_list;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Alfa seeder
        // # super_admins
        super_admin::create([
            'username' => 'naafiul123',
            'password' => Hash::make('akucina'),
            'name' => 'Naafiul'
        ]);

        // # clients
        // license-key: 8-4-4-4-19
        $rand_license = Str::random(8) . "-" . Str::random(4) . "-" . Str::random(4) . "-" . Str::random(4) .  "-" . Str::random(19);

        Client::create([
            'super_admin_id' => 1,
            'license_key' => $rand_license,
            'client_name' => "Surya",
            'client_code' => "SEK",
            'is_active' => 1,
            'expired_at' => date("2023-12-12 08:00:00")
        ]);
        
        
        // license-key: 8-4-4-4-19
        Client::create([
            'super_admin_id' => 1,
            'license_key' => $rand_license,
            'client_name' => "Darjo",
            'client_code' => "SP",
            'expired_at' => date("2023-12-12 08:00:00")
        ]);

        // * tambah trigger ketika sudah tanggal expired maka is_active = 0
        // * clients otomatis mendapatkan akses sebagai admin ketika membeli lisensi atau

        // # admins
        Admin::create([
            'client_id' => 1,
            'username' => 'adminsurya',
            'pin' => Hash::make('12345678'),
            'name' => "Surya",
        ]);

        Admin::create([
            'client_id' => 2,
            'username' => 'admindarjo',
            'pin' => Hash::make('12345678'),
            'name' => "Darjo",
        ]);


        // * apakah admins menjadi tidak memiliki akses ketika client nya expired?

        // settings
        Settings::create([
            'admin_id' => 1,
        ]);

        Settings::create([
            'admin_id' => 2,
        ]);

        Employee::create([
            'admin_id' => 1,
            'employee_code' => 'WKWK-1',
            'pin' => Hash::make('12345678'),
            'name' => 'Kifli',
            'avatar_url' => 'https://freepngimg.com/thumb/facebook/62681-flat-icons-face-computer-design-avatar-icon-thumb.png',
        ]);

        Employee::create([
            'admin_id' => 2,
            'employee_code' => 'WKWK-2',
            'pin' => Hash::make('12345678'),
            'name' => 'Maya',
            'avatar_url' => 'https://www.pwshoponline.com/assets/images/avatars/avatar5_big.png',
        ]);

        Product::create([
            'employee_create' => "",
            'product_name' => "",
            'barcode' => "",
            'smallest_selling_unit' => "",
            'catatan_obat' => "",
        ]);
        
        Selling_unit::create([
            'product_id' => "",
            'unit_id' => "",
            'stock' => "",
            'price' => ""
        ]);

        Unit::create([
            'name' => "",
        ]);

        Customer::create([
            'employee_create' => "",
            'customer_code' => "",
            'name' => "",
            'email' => "",
            'phone' => "",
            'int' => ""
        ]);

        // * apakah saat membeli produk customer harus mengisi/dicatat nama, email, telepon nya?

        Transaction::create([
            'customers' => "",
            'employees' => "",
            'no_ref' => "",
            'total_price' => "",
        ]);

        Transaction_list::create([
            'transactions' => "",
            'selling_units' => "",
            'total_price' => "",
            'quantity' => "",
        ]);

        super_admin::create([
            'username' => 'alfaxalyca',
            'password' => Hash::make('alycadanalfa'),
            'name' => 'Alfa',
        ]);
    }
}