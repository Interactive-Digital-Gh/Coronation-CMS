<?php

namespace App\Http\Controllers\Institute;

use App\Http\Controllers\Controller;
use App\Models\MarineInsurance;
use Illuminate\Http\Request;

class MarineInsuranceController extends Controller
{
    public function showHeader()
    {
        $marine = MarineInsurance::find(1);
        return view('pages.Institute.marine_insurance.header', compact('marine'));
    }

    public function uploadImage($imageFile): string
    { //Move Uploaded File to public folder
        $destinationPath = 'images/uploads/insitute/marine-insurance/';
        $hashed_image_name = $imageFile->hashName();
        $img_path = $destinationPath.$hashed_image_name;
        $imageFile->move(public_path($destinationPath), $hashed_image_name);

        return $img_path;
    }


    public function updateMarineInsuranceHeader(Request $request)
    {
        $request->validate([
            'image' => $this->imageRules(),
            'caption' => 'required',
            'body' => 'required'
        ]);


        if(!is_null($request->file('image')))
        {
            $imagePath = $this->uploadImage($request->file('image'));
        }

        $marine = MarineInsurance::find(1);

        isset($imagePath) ? $marine->header_image = $imagePath : '';
        $marine->header_caption = $request->caption;
        $marine->header_body = $request->body;

        $marine->save();

        toastr()->success('Marine Insurance Header Updated');

        return back();
    }

    public function showMarinePage()
    {
        $marine = MarineInsurance::find(1);
        return view('pages.Institute.marine_insurance.index', compact('marine'));
    }


    public function updateMarineInsurance(Request $request)
    {

        $request->validate([
            'image' => $this->imageRules(),
            'caption' => 'required',
            'body' => 'required',
            'insurance_body' => 'required',
            'features' => 'required',
        ]);



        if(!is_null($request->file('image')))
        {
            $imagePath = $this->uploadImage($request->file('image'));
        }

        $marine = MarineInsurance::find(1);

        $marine->sec1_caption = $request->caption;
        $marine->sec1_body = $request->body;

        if($request->submit == 'cargo')
        {
            isset($imagePath) ? $marine->marine_cargo_features_image = $imagePath : '';
            $marine->marine_cargo_body = $request->insurance_body;
            $marine->marine_cargo_features = $request->features;

        }elseif($request->submit == 'hull')
        {
            isset($imagePath) ? $marine->marine_hull_features_image = $imagePath : '';
            $marine->marine_hull_body = $request->insurance_body;
            $marine->marine_hull_features = $request->features;

        }

        $marine->save();

        toastr()->success('Marine Insurance Page Updated');

        return back();
    }


    public function showMarineBenefits()
    {
        $marine = MarineInsurance::find(1);
        return view('pages.Institute.marine_insurance.benefits', compact('marine'));
    }

    public function updateMarineBenfits(Request $request)
    {
        $request->validate([
            'benefits_body' => 'required',
            'image' => $this->imageRules(),
            'benefits' => 'required',
        ]);

        if(!is_null($request->file('image')))
        {
            $imagePath = $this->uploadImage($request->file('image'));
        }

        $marine = MarineInsurance::find(1);

        isset($imagePath) ? $marine->benefits_image = $imagePath : '';
        $marine->benefits_body = $request->benefits_body;
        $marine->marine_benefits = $request->benefits;

        $marine->save();

        toastr()->success('Marine Insurance Benefits Updated');

        return back();
    }
}
