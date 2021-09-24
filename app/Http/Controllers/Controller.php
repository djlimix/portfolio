<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sitemap() {
        $out = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $out .= "<url>
                    <loc>https://{$_SERVER['SERVER_NAME']}</loc>
                    <lastmod>2021-09-24</lastmod>
                </url>";

        foreach (Article::whereActive('1')->get(['slug', 'updated_at']) as $article) {
            $out .= "<url>
                        <loc>https://{$_SERVER['SERVER_NAME']}/writing/{$article->slug}</loc>
                        <lastmod>{$article->updated_at->format('Y-m-d')}</lastmod>
                    </url>";
        }

        $out .= '</urlset>';

        return response($out, 200, ['Content-Type' => 'application/xml']);
    }
}
