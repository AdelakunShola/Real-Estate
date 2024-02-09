<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Partner;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function AboutPage(){

        $about = AboutUs::find(1); 
        return view('backend.about.about_us',compact('about'));  

    }//end method



    public function UpdateAbout(Request $request){

        $about_id = $request->id;

        if ($request->file('image')) {

    $image = $request->file('image');
    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(440,570)->save('upload/about/'.$name_gen);
    $save_url = 'upload/about/'.$name_gen;

    AboutUs::findOrFail($about_id)->update([
        
        'yofexperience' => $request->yofexperience, 
        'title' => $request->title,
        'desc' => $request->desc,
        'image' => $save_url, 
        'created_at' => Carbon::now(),

    ]);

     $notification = array(
            'message' => 'About Page Updated With Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        }else{

            AboutUs::findOrFail($about_id)->update([
        
                'yofexperience' => $request->yofexperience, 
                'title' => $request->title,
                'desc' => $request->desc, 
                'created_at' => Carbon::now(),
        
            ]);

     $notification = array(
            'message' => 'About Page Updated Without Image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

        } // end else 

    }// End Method


    public function AllPartner(){

        $partners = Partner::latest()->get();
        return view('backend.about.all_partner',compact('partners'));  

    }// End Method

    public function StorePartner(Request $request)
{
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(370, 250)->save('upload/partner/' . $name_gen);
        $save_url = 'upload/partner/' . $name_gen;

        Partner::insert([
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Partner Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.partner')->with($notification);
    } else {
        // Handle the case where no file was uploaded
        $notification = array(
            'message' => 'No image file uploaded.',
            'alert-type' => 'error'
        );

        return redirect()->route('all.partner')->with($notification);
    }
}




        public function DeletePartner($id){

            $oldImg = Partner::findOrFail($id);
            unlink($oldImg->image);
    
            Partner::findOrFail($id)->delete();
    
            $notification = array(
                'message' => 'Partner Image Deleted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification); 
    
        }// End Method 


   

}
