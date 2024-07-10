<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(public_path('dbJson/MedicinesData.json'));
        $data = json_decode($json, true);

        foreach ($data as $item) {
            DB::table('medicines')->insert([
                'kode' => $item['kode'],
                'name' => $item['name'],
                'harga' => 10000,
                'created_at' => Carbon::now(),
                'updated_at' => null,
            ]);
        }
    }
}
