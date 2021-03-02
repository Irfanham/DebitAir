<?php

use App\Tanam;
use Illuminate\Database\Seeder;

class TanamPeriodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tanam::create([
            'id' => '1',
            'user_id' => '1',
            'name' => 'Padi Rendeng/ Padi Gadu Izin',
            'parent' => null,
        ]);
        Tanam::create([
            'id' => '1000',
            'user_id' => '1',
            'name' => 'Pengolahan tanah + Persemaian',
            'parent' => '1',
        ]);
        Tanam::create([
            'id' => '1001',
            'user_id' => '1',
            'name' => 'Pertumbuhan / Pemasakan',
            'parent' => '1',
        ]);
        Tanam::create([
            'id' => '1002',
            'user_id' => '1',
            'name' => 'Panen',
            'parent' => '1',
        ]);

        Tanam::create([
            'id' => '2',
            'user_id' => '1',
            'name' => 'Tebu',
            'parent' => null,
        ]);
        Tanam::create([
            'id' => '1003',
            'user_id' => '1',
            'name' => 'Pengolahan tanah + Persemaian',
            'parent' => '2',
        ]);
        Tanam::create([
            'id' => '1004',
            'user_id' => '1',
            'name' => 'Tebu Muda (MT. 1)',
            'parent' => '2',
        ]);

        Tanam::create([
            'id' => '1005',
            'user_id' => '1',
            'name' => 'Tebu Tua (MT. 2)',
            'parent' => '2',
        ]);
        Tanam::create([
            'id' => '3',
            'user_id' => '1',
            'name' => 'Palawija',
            'parent' => null,
        ]);
        Tanam::create([
            'id' => '1006',
            'user_id' => '1',
            'name' => 'Yang perlu banyak air',
            'parent' => '3',
        ]);
        Tanam::create([
            'id' => '1007',
            'user_id' => '1',
            'name' => 'Yang perlu sedikit air',
            'parent' => '3',
        ]);

        Tanam::create([
            'id' => '4',
            'user_id' => '1',
            'name' => 'Lain-lain',
            'parent' => null,
        ]);
        Tanam::create([
            'id' => '1008',
            'user_id' => '1',
            'name' => 'Jumlah di Sawah (l/det)',
            'parent' => '4',
        ]);
    }
}
