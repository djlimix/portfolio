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
        $xml = '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

        $xml .= '<url>
                    <loc>https://blog.limix.eu</loc>
                    <changefreq>daily</changefreq>
                    <priority>1.00</priority>
                </url>';
        foreach ( Article::all() as $article ) {
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

        // DJ urls
        $xml = '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
        $xml .= '<url>
                    <loc>https://dj.limix.eu</loc>
                    <changefreq>daily</changefreq>
                    <priority>1.00</priority>
                </url>';
        $xml .= '<url>
                    <loc>https://dj.limix.eu/about</loc>
                    <changefreq>daily</changefreq>
                    <priority>0.80</priority>
                </url>';
        $xml .= '<url>
                    <loc>https://dj.limix.eu/production</loc>
                    <changefreq>daily</changefreq>
                    <priority>0.80</priority>
                </url>';
        $xml .= '<url>
                    <loc>https://dj.limix.eu/contact</loc>
                    <changefreq>daily</changefreq>
                    <priority>0.80</priority>
                </url>';
        $xml .= '</urlset>';

        File::put(public_path('dj/sitemap.xml'), $xml);

        // MEDIA urls
        $xml = '<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
        $xml .= '<url>
                    <loc>https://limixmedia.com</loc>
                    <changefreq>daily</changefreq>
                    <priority>1.00</priority>
                </url>';
        $xml .= '<url>
                    <loc>https://limixmedia.com/about</loc>
                    <changefreq>daily</changefreq>
                    <priority>0.80</priority>
                </url>';
        $xml .= '<url>
                    <loc>https://limixmedia.com/projects</loc>
                    <changefreq>daily</changefreq>
                    <priority>0.80</priority>
                </url>';
        foreach ( Project::all() as $project ) {
            $xml .= '<url>
                    <loc>https://limixmedia.com/projects/' . $project->slug . '</loc>
                    <changefreq>daily</changefreq>
                    <priority>0.80</priority>
                </url>';
        }
        $xml .= '<url>
                    <loc>https://dj.limix.eu/contact</loc>
                    <changefreq>daily</changefreq>
                    <priority>0.80</priority>
                </url>';
        $xml .= '</urlset>';

        File::put(public_path('media/sitemap.xml'), $xml);
    }
}
