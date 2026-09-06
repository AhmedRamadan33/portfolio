<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $lastmod = optional(Profile::first())->updated_at?->toAtomString() ?? now()->toAtomString();

        $xml = view('sitemap', compact('lastmod'))->render();

        return response($xml, 200)->header('Content-Type', 'text/xml');
    }
}
