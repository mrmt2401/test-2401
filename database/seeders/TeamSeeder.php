<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('teams')->insert([
            [
            'owner_id' => 1,
            'name' => 'チーム名',
            'information' => 'チーム情報',
            'is_active' => true
            ],
            [
            'owner_id' => 2,
            'name' => 'チーム名',
            'information' => 'チーム情報',
            'is_active' => true
            ],
        ]);
    }
}
