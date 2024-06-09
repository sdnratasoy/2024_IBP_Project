<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->take(3)->get();
        $products = Product::all();
        return view('dashboard.index', compact('announcements','products'));
    }
}
