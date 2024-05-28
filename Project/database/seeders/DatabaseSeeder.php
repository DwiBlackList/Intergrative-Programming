<?php

namespace Database\Seeders;

use App\Models\Warga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');
        $this->call(BooksTableSeeder::class);
        // $this->call(IuransTableSeeder::class);
        $warga1 = Warga::create(['nama' => 'John Doe', 'alamat' => 'Jl. Mawar No. 10']);
        $warga2 = Warga::create(['nama' => 'Jane Smith', 'alamat' => 'Jl. Melati No. 5']);

        $warga1->iuran()->createMany([
            ['bulan' => '2023-01', 'jumlah_iuran' => 50000, 'status' => 'selesai'],
            ['bulan' => '2023-02', 'jumlah_iuran' => 50000, 'status' => 'selesai'],
            ['bulan' => '2024-03', 'jumlah_iuran' => 50000, 'status' => 'selesai'],
            ['bulan' => '2024-04', 'jumlah_iuran' => 50000, 'status' => 'pending'],
            ['bulan' => '2025-05', 'jumlah_iuran' => 50000, 'status' => 'pending'],
            ['bulan' => '2025-06', 'jumlah_iuran' => 50000, 'status' => 'pending'],
        ]);

        $warga2->iuran()->createMany([
            ['bulan' => '2023-03', 'jumlah_iuran' => 50000, 'status' => 'selesai'],
            ['bulan' => '2024-04', 'jumlah_iuran' => 50000, 'status' => 'pending'],
            ['bulan' => '2025-05', 'jumlah_iuran' => 50000, 'status' => 'pending'],
        ]);
    }
}
