<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomePageAds;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomePageAdsController extends Controller
{
    public function adsRequest (){
        $allAds = HomePageAds::latest()->get();
        return view('backend.ads.all_ads',compact('allAds'));
    }//end method


    public function AgentAds (){
        return view('agent.ads.place_ads');
    }//end method


    public function StoreAgentAds(Request $request){

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $save_url = 'upload/ads/'.$name_gen;

        HomePageAds::insert([ 

            'type' => $request->type,
            'image_dimension' => $request->image_dimension,
            'title' => $request->title,
            'url' => $request->url,
            'image' => $save_url,
            'status' => 0,
            'created_at' => Carbon::now(), 
            
        ]);

          $notification = array(
            'message' => 'Ad Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }//end method
    

} 
