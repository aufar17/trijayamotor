<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $suppliers = [
            [
                'code' => '101',
                'name' => 'PT XYZ',
                'email' => 'xyz@gmail.com',
                'phone' => '081345679281',
                'address' => 'Jl. Delima Blok G7/40',
                'province' => 'Jawa Barat',
                'cities' => 'Kota Bekasi',
                'bank' => 'BRI',
                'bank_account' => '12983712983',
            ],
            
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}
