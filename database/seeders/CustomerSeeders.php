<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $customers = [
            [
                'code' => 'C1',
                'name' => 'Muammar Aufar',
                'phone' => '085714505031',
                'address' => 'Jl. Delima Blok G7/40',
                'province' => 'Jawa Barat',
                'cities' => 'Kota Bekasi',
            ],
            
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
