<?php

namespace App\Console\Commands;

use App\Article;
use App\Project;
use App\Tag;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap';

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
        // blog urls
        $xml = '<urlset urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $xml .= '<url>
                    <loc>https://limix.eu</loc>
                    <lastmod>2021-</lastmod>
                </url>';
        foreach ( Article::whereActive('1')->get() as $article ) {
            $xml .= '<url>
                        <loc>https://blog.limix.eu/' . $article->slug . '</loc>
                        <changefreq>daily</changefreq>
                        <priority>0.80</priority>
                    </url>';
        }
        foreach ( Tag::all() as $tag ) {
            $xml .= '<url>
                        <loc>https://blog.limix.eu/tag/' . $tag->slug . '</loc>
                        <changefreq>daily</changefreq>
                        <priority>0.80</priority>
                    </url>';
        }
        $xml .= '</urlset>';

        File::put(public_path('sitemap.xml'), $xml);
    }
}
