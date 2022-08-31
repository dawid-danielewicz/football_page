<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteLastArticle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'articles:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete last articles';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return DB::table('articles')->orderBy('created_at')->limit(10)->delete();
    }
}
