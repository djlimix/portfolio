<?php

namespace App\Console\Commands;

use App\LetsDance;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

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
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        URL::forceHttps();
        $out = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $change = LetsDance::query()
            ->latest('updated_at')
            ->select('updated_at')
            ->first();

        $out .= '<url>
                    <loc>'.route('home').'</loc>
                    <lastmod>'.$change->updated_at->format('Y-m-d').'</lastmod>
                </url>';

        foreach (LetsDance::lazy() as $item) {
            $out .= '<url>
                        <loc>'.route('ld.show', $item->number).'</loc>
                        <lastmod>'.$change->updated_at->format('Y-m-d').'</lastmod>
                    </url>';
        }

        $out .= '</urlset>';

        File::put(public_path('sitemap.xml'), $out);
    }
}
