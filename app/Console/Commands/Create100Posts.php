<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

class Create100Posts extends Command
{
    protected $signature = 'posts:create100';

    protected $description = 'Create 100 posts';

    public function handle()
    {
        for ($i = 0; $i < 100; $i++) {
            Post::create([
                'user_id' => User::query()->value('id'),
                'title' => 'Заголовок поста ' . ($i + 1),
                'content' => 'Содержание поста ' . ($i + 1),
                'published_at' => now(), // или укажите желаемую дату
               //'published' => rand(0, 1), // 0 или 1 для опубликованного или неопубликованного поста
               'published' => 1,

            ]);
        }

        $this->info('100 постов успешно созданы.');
    }
}

