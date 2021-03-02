<?php

use App\DebitLocation;
use Illuminate\Database\Seeder;

class DebitLocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DebitLocation::create([
            'user_id' => 1,
            'name' => 'Debit Limpas Bendung',
        ]);
        DebitLocation::create([
            'user_id' => 1,
            'name' => 'Debit Pintu Masuk Pengambilan',
        ]);
        DebitLocation::create([
            'user_id' => 1,
            'name' => 'Debit Sungai',
        ]);
    }

}
