<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;

class GenerateXmlArticle extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:xmlArticle';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $artcles = Article::all();
        $urlsXml = [];

        foreach ($artcles as $article) {
            $urlsXml[] = route('article-view', [$article->id]);
            echo route('article-view', [$article->id]) . "\n";
        }
    }
}
