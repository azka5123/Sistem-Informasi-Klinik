<?php

namespace Database\Seeders;

use App\Models\Tindakan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TindakanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(public_path('dbJson/Tindakan.json'));
        $data = json_decode($json, true);

        foreach ($data as $item) {
            // Check if 'category' key exists in the current item
            if (array_key_exists('category', $item)) {
                Tindakan::create([
                    'name' => $item['name'],
                    'category' => $item['category'],
                    'created_at' => Carbon::now(),
                    'updated_at' => null,
                ]);
            }
        }
    }
}
