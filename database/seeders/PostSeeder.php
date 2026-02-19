<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat User dummy umum (bukan nama kamu)
        $user = User::create([
            'name' => 'SocialUser',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
        ]);

        // 2. Buat postingan dummy yang umum (Pemandangan & Kopi)
        Post::create([
            'user_id' => $user->id,
            'image_path' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085', // Foto Kopi Umum
            'caption' => 'Morning coffee vibes. ☕️ #CoffeeTime',
        ]);

        Post::create([
            'user_id' => $user->id,
            'image_path' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb', // Foto Pemandangan
            'caption' => 'What a beautiful sunset today! 🌅 #Nature #Peace',
        ]);

        Post::create([
            'user_id' => $user->id,
            'image_path' => 'https://images.unsplash.com/photo-1537151608828-ea2b11777ee8?q=80&w=500&auto=format&fit=crop', // Foto Anjing Lucu
            'caption' => 'Met this cute friend today. 🐶 #PuppyLove',
        ]);
    }
}
