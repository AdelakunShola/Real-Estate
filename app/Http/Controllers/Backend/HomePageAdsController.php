<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomePageAds;
use Illuminate\Http\Request;

class HomePageAdsController extends Controller
{
    public function AdsRequest (){
        $allAds = HomePageAds::latest()->get();
        return view ('backend.ads.all_ads')
    }
} 
