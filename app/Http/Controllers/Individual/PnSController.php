<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\PnS;
use Illuminate\Http\Request;

class PnSController extends Controller
{
    public function index()
    {
        $pns_header = PnS::select('id', 'header_image', 'header_caption', 'header_body')->where('id', 1)->first();
        return view('pages.pns.header', compact('pns_header'));
    }


    public function uploadImage($imageFile): string
    { //Move Uploaded File to public folder
        $destinationPath = 'images/uploads/pns/';
        $hashed_image_name = $imageFile->hashName();
        $img_path = $destinationPath.$hashed_image_name;
        $imageFile->move(public_path($destinationPath), $hashed_image_name);

        return $img_path;
    }


    public function updatePnSHeader(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'image' => $this->imageRules(),
            'caption' => 'required',
            'body' => 'required'
        ]);

        // dd($request->file('image'));
        if(!is_null($request->file('image')))
        {
            $imagePath = $this->uploadImage($request->file('image'));
        }
        $pns_header = PnS::find(1);

        isset($imagePath) ? $pns_header->header_image = $imagePath : '';
        $pns_header->header_caption = $request->caption;
        $pns_header->header_body = $request->body;

        $pns_header->save();


        return back()->with('success', 'Changes saved.');
    }



       //  Section 1
    public function PnsSec1()
    {
        $pns = PnS::find(1);
        return view('pages.pns.section1', compact('pns'));
    }



    public function updateSection1(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'image' => $this->imageRules(),
            'caption1' => 'required',
            'body1' => 'required',
            'caption' => 'required',
            'body' => 'required'
        ]);

        if(!is_null($request->file('image')))
        {
            $imagePath = $this->uploadImage($request->file('image'));
        }

        $pns = PnS::find(1);


        $pns->sec1_caption = $request->caption1;
        $pns->sec1_body = $request->body1;

        if($request->submit == 'motor')
        {
            // dd($request->all());
            isset($imagePath) ? $pns->motor_image = $imagePath : '';
            $pns->motor_caption = $request->caption;
            $pns->motor_body = $request->body;

        }elseif($request->submit == 'travel')
        {
            isset($imagePath) ? $pns->travel_image = $imagePath : '';
            $pns->travel_caption = $request->caption;
            $pns->travel_body = $request->body;

        }elseif($request->submit == 'house')
        {
            isset($imagePath) ? $pns->house_image = $imagePath : '';
            $pns->house_caption = $request->caption;
            $pns->house_body = $request->body;
        }

        $pns->save();


        return back()->with('success', 'Changes saved.');
    }




    //  Section 2
    public function PnsSec2()
    {
        $pns = PnS::find(1);
        return view('pages.pns.section2', compact('pns'));
    }


    public function updateSection2(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'image' => $this->imageRules(),
            'caption' => 'required',
            'body' => 'required'
        ]);

        if(!is_null($request->file('image')))
        {
            $imagePath = $this->uploadImage($request->file('image'));
        }
        $pns = PnS::find(1);

        isset($imagePath) ? $pns->sec2_image = $imagePath : '';
        $pns->sec2_caption = $request->caption;
        $pns->sec2_body = $request->body;

        $pns->save();


        return back()->with('success', 'Changes saved.');
    }
}
