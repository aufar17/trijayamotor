<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $services = [
            [
                'code' => 'S01',
                'name' => 'Ganti Oli',
                'description' => 'Pengisian ulang oli',
                'price' => 20000,
            ],
            
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
