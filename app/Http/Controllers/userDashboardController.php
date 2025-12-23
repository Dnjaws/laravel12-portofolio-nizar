<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class userDashboardController extends Controller
{
    public function index()
    {
        $destinations = Destination::where('status', 'approved')->whereNotNull('category_id')->whereNotNull('city_id')->get();
        return view('user.index', compact('destinations'));
    }

}
