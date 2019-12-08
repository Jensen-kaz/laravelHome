<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;
use App\Library\Services\GenerateXmlFile;
use Illuminate\Support\Carbon;

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

    private $xmlGenerator;

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
    public function handle(GenerateXmlFile $xmlGenerator)
    {
        $artcles = Article::all();
        $urlsXml = [];

        foreach ($artcles as $article) {
            $urlsXml[] = "
                <url>
                    <loc>" . route('article-view', [$article->id]) . "</loc>
                    <lastmod>" . Carbon::today()->format('M d Y') . "</lastmod>
                    <priority>0.2</priority>
                    <changefreq>weekly</changefreq>
                </url>";
            echo route('article-view', [$article->id]) . "\n";
        }

        $xmlGenerator->generateXml('articlesSitemap', $urlsXml);
    }
}
