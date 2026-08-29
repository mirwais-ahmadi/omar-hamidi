<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ContentService;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(ContentService $content): View
    {
        return view('admin.dashboard', [
            'sectionsCount' => 8,
            'productCount' => $content->items('products')->count(),
            'partnerCount' => $content->items('partners')->count(),
        ]);
    }
}
