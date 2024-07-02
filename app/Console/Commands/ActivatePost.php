<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class ActivatePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:activate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $posts = Post::where('created_at', '<=', now()->subMinute())
        ->where('active', false)
        ->get();

        foreach ($posts as $post) {
        $post->update(['active' => true]);
        Log::info('Post activated: ' . $post->id);
}
    }
}
