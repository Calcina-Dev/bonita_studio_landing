<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Post;
use App\Models\Video;
use App\Models\Setting;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        $products = \App\Models\Product::where('is_active', true)->orderBy('sort_order')->take(4)->get();

        // Fetch ALL active promotions for the modal list
        $promotions = Post::where('type', 'promo')
            ->where('is_active', true)
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->get();

        // Fetch mixed posts (News + Promos) for the grid section
        $news = Post::where('is_active', true)
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(6)
            ->get();

        $videos = Video::where('is_active', true)->orderBy('sort_order')->take(4)->get();

        // Fetch settings as key-value pair for easy access
        $settings = Setting::all()->pluck('value', 'key');

        return view('welcome', compact('services', 'products', 'promotions', 'news', 'videos', 'settings'));
    }
}