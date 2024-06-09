<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Announcement;


class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Announcement::create([
            'title' => 'Duyuru Başlığı 1',
            'content' => 'Duyuru İçeriği 1',
        ]);

        Announcement::create([
            'title' => 'Duyuru Başlığı 2',
            'content' => 'Duyuru İçeriği 2',
        ]);
    }
}
