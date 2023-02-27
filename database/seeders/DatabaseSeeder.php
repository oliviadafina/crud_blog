<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PostModel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        PostModel::create([
            'title'     => 'Post 1',
            'content'   => 'Halo, ini adalah Post 1',
            'slug'      => 'post-1',
            'status'    => 1,
            'user_id'   => 2
        ]);

        PostModel::create([
            'title'     => 'Post 2',
            'content'   => 'Halo, ini adalah Post 2, olivia dafina keren',
            'slug'      => 'post-2',
            'status'    => 2,
            'user_id'   => 2
        ]);
        
        PostModel::create([
            'title'     => 'Post 3',
            'content'   => 'Halo, ini adalah Post 3, annisa amelia',
            'slug'      => 'post-3',
            'status'    => 1,
            'user_id'   => 3
        ]);

        PostModel::create([
            'title'     => 'Post 4',
            'content'   => 'Halo, ini adalah Post 4, masih annisa',
            'slug'      => 'post-4',
            'status'    => 1,
            'user_id'   => 3
        ]);

        PostModel::create([
            'title'     => 'Post 5',
            'content'   => 'Halo, ini adalah Post 5, abelina',
            'slug'      => 'post-5',
            'status'    => 1,
            'user_id'   => 4
        ]);

        PostModel::create([
            'title'     => 'Post 6',
            'content'   => 'Halo, ini adalah Post 6, masih abel lagi',
            'slug'      => 'post-6',
            'status'    => 1,
            'user_id'   => 4
        ]);

        PostModel::create([
            'title'     => 'Post 7',
            'content'   => 'Halo, ini adalah Post 7, sekarang rika',
            'slug'      => 'post-7',
            'status'    => 1,
            'user_id'   => 5
        ]);
    }
}
