<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Locality;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{
    public function __construct()
    {
        header("Content-type: text/xml");
        echo '<?xml version="1.0" encoding="UTF-8"?>'."\n";
    }
    public function index()
    {
        $return = "\n" . '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        $return .= "\n\t<sitemap>";
        $return .= "\n\t\t<loc>". URL::route('sitemap.main') .'</loc>';
        $return .= "\n\t\t<lastmod>". date('Y-m-d') .'</lastmod>';
        $return .= "\n\t</sitemap>";

        $return .= "\n\t<sitemap>";
        $return .= "\n\t\t<loc>" . URL::route('sitemap.localities') .'</loc>';
        $return .= "\n\t\t<lastmod>". date('Y-m-d') .'</lastmod>';
        $return .= "\n\t</sitemap>";

        $count = Company::count();
        $count = ceil($count / 20000);
        $i = 1;
        while ($i <= $count) {

            $return .= "\n\t<sitemap>";
            $return .= "\n\t\t<loc>" . URL::route('sitemap.items', $i).'</loc>';
            $return .= "\n\t\t<lastmod>" . date('Y-m-d') . '</lastmod>';
            $return .= "\n\t</sitemap>";
            $i++;
        }

        $return .= "\n" . '</sitemapindex>';

        echo $return;
    }

    public function main()
    {
        $return = "\n" . '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">';
        // home
        $return .= "\n\t<url>";
        $return .= "\n\t\t<loc>" .URL::route('home'). '</loc>';
        $return .= "\n\t\t" . '<changefreq>daily</changefreq>';
        $return .= "\n\t" . '</url>';

        // regions
        $return .= "\n\t<url>";
        $return .= "\n\t\t<loc>" .URL::route('all-regions'). '</loc>';
        $return .= "\n\t\t" . '<changefreq>daily</changefreq>';
        $return .= "\n\t" . '</url>';

        //regions url
        $url=Region::select('url')->toBase()->get();
        if ($url) {
            foreach ($url as $value) {
                $return .= "\n\t" . '<url>';
                $return .= "\n\t\t" .'<loc>'. URL::route('region', $value->url) . '/</loc>';
                $return .= "\n\t\t" . '<changefreq>daily</changefreq>';
                $return .= "\n\t" . '</url>';
            }
        }

        //categories url
        $url=Category::select('url')->toBase()->get();
        if ($url) {
            foreach ($url as $value) {
                $return .= "\n\t" . '<url>';
                $return .= "\n\t\t" .'<loc>'. URL::route('category', $value->url) . '/</loc>';
                $return .= "\n\t\t" . '<changefreq>daily</changefreq>';
                $return .= "\n\t" . '</url>';
            }
        }



        $return .= "\n" . '</urlset>';
        echo $return;
    }

    public function localities()
    {
        $url=Locality::select('url')->toBase()->get();
        $return = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">';
        if ($url) {
            foreach ($url as $value) {
                $return .= "\n\t" . '<url>';
                $return .= "\n\t\t" .'<loc>'. URL::route('city', $value->url) . '/</loc>';
                $return .= "\n\t\t" . '<changefreq>daily</changefreq>';
                $return .= "\n\t" . '</url>';
            }
        }

        $return .= "\n" . '</urlset>';

        echo $return;
    }

    public function items($id)
    {
        $from=($id-1)*20000;
        $limit=20000;
        $url_array=Company::join('category', 'companies.category_id', '=', 'category.id')
            ->join('locality', 'companies.locality_id', '=', 'locality.id')
            ->join('region', 'companies.region_id', '=', 'region.id')
            ->select('companies.id', 'companies.url', 'locality.url as locality_url', 'region.url as region_url')
            ->limit($limit)
            ->offset($from)
            ->toBase()
            ->get();
        $return = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">';
        if ($url_array) {
            foreach ($url_array as $value) {
                $return .= "\n\t" . '<url>';
                $return .= "\n\t\t" .'<loc>'. URL::route('company', [$value->region_url, $value->locality_url, $value->url]) . '/</loc>';
                $return .= "\n\t\t" . '<changefreq>daily</changefreq>';
                $return .= "\n\t" . '</url>';
            }
        }
        $return .= "\n" . '</urlset>';
        echo $return;
    }

}
