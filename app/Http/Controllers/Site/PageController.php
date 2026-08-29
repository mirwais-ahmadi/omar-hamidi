<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Services\ContentService;
use Illuminate\View\View;

class PageController extends Controller
{
    public function __construct(private readonly ContentService $content)
    {
    }

    public function home(): View
    {
        return view('home', [
            'hero' => $this->content->section('hero'),
            'about' => $this->content->section('about'),
            'products' => $this->content->section('products'),
            'productItems' => $this->content->items('products'),
            'network' => $this->content->section('network'),
            'partners' => $this->content->section('partners'),
            'partnerItems' => $this->content->items('partners'),
            'contact' => $this->content->section('contact'),
            'settings' => $this->content->section('settings'),
        ]);
    }

    public function about(): View
    {
        $licenses = $this->content->section('licenses');

        return view('pages.about', [
            'about' => $this->content->section('about'),
            'settings' => $this->content->section('settings'),
            'licensesTin' => $licenses['tin'] ?? '۹۰۲۷۵۵۶۷۹۵',
        ]);
    }

    public function products(): View
    {
        return view('pages.products', [
            'products' => $this->content->section('products'),
            'productItems' => $this->content->items('products'),
            'settings' => $this->content->section('settings'),
        ]);
    }

    public function network(): View
    {
        return view('pages.network', [
            'network' => $this->content->section('network'),
            'settings' => $this->content->section('settings'),
        ]);
    }

    public function licenses(): View
    {
        return view('pages.licenses', [
            'licenses' => $this->content->section('licenses'),
            'partners' => $this->content->section('partners'),
            'partnerItems' => $this->content->items('partners'),
            'settings' => $this->content->section('settings'),
        ]);
    }

    public function contact(): View
    {
        return view('pages.contact', [
            'contact' => $this->content->section('contact'),
            'settings' => $this->content->section('settings'),
        ]);
    }
}
