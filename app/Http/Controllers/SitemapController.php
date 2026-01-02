<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $siteUrl = config('app.url', url('/'));
        
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">' . "\n";
        
        // Home page
        $xml .= $this->url($siteUrl, now(), '1.0', 'weekly');
        
        // Products listing
        $xml .= $this->url($siteUrl . '/products', now(), '0.9', 'daily');
        
        // Individual products
        $products = Product::where('is_active', true)->get();
        foreach ($products as $product) {
            $xml .= $this->url(
                $siteUrl . '/products/' . $product->slug,
                $product->updated_at,
                '0.8',
                'weekly'
            );
        }
        
        // Categories
        $categories = Category::where('is_active', true)->get();
        foreach ($categories as $category) {
            $xml .= $this->url(
                $siteUrl . '/products?category=' . $category->id,
                $category->updated_at,
                '0.7',
                'weekly'
            );
        }
        
        // Routine page
        $xml .= $this->url($siteUrl . '/routine', now(), '0.8', 'monthly');
        
        // About page
        $xml .= $this->url($siteUrl . '/about', now(), '0.7', 'monthly');
        
        // Contact page
        $xml .= $this->url($siteUrl . '/contact', now(), '0.7', 'monthly');
        
        $xml .= '</urlset>';
        
        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }
    
    private function url(string $loc, $lastmod, string $priority, string $changefreq): string
    {
        $lastmodFormatted = $lastmod instanceof \DateTime ? $lastmod->format('Y-m-d') : date('Y-m-d', strtotime($lastmod));
        
        return "  <url>\n" .
               "    <loc>" . htmlspecialchars($loc) . "</loc>\n" .
               "    <lastmod>{$lastmodFormatted}</lastmod>\n" .
               "    <changefreq>{$changefreq}</changefreq>\n" .
               "    <priority>{$priority}</priority>\n" .
               "  </url>\n";
    }
}

