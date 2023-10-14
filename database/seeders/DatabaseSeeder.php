<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\buku;
use App\Models\bukukategori;
use App\Models\User;
use Illuminate\Database\Seeder;

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

        $bukus = [
            [

                'judul' => 'Marmut Merah Jambu',
                'penulis' => 'Raditya Dika',
            ],
            [

                'judul' => 'Kambing Jantan',
                'penulis' => 'Raditya Dika',
            ],
            [

                'judul' => 'Cara Membangunkan Adick',
                'penulis' => 'Anonymus',
            ],
        ];
        foreach($bukus as $buku) {
            buku::create($buku);
        }

        $bukukategoris = [
            [

                'kategori' => 'Misteri'
            ],
            [

                'kategori' => 'Petualangan'
            ],
            [

                'kategori' => 'Komedi'
            ],
            [

                'kategori' => 'Romantis'
            ],
        ];
        foreach($bukukategoris as  $bukukategori) {
            bukukategori::create($bukukategori);
        }

        $users = [
            [
                'id_users' => '001',
                'name' => 'Mahasiswa',
                'email' => 'users@gmail.com',
                'password' => '1234',
                'role' => 'users',
            ],
            [

                'id_users' => '002',
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => '1234',
                'role' => 'admin',
            ],
            [

                'id_users' => '003',
                'name' => 'Manager',
                'email' => 'manager@gmail.com',
                'password' => '1234',
                'role' => 'manager',
            ],
        ];
        foreach($users as  $user) {
            User::create($user);
        }
    }
}
