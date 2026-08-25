<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\HomeInsurance;
use Illuminate\Http\Request;

class HomeInsuranceController extends Controller
{
    public function index()
    {
        $home = HomeInsurance::find(1);
        return view('pages.home_insurance.index', compact('home'));
    }

    public function showHomeHeader()
    {
        $home = HomeInsurance::find(1);
        return view('pages.home_insurance.header', compact('home'));
    }


    public function uploadImage($imageFile): string
    { //Move Uploaded File to public folder
        $destinationPath = 'images/uploads/home-insuracne/';
        $hashed_image_name = $imageFile->hashName();
        $img_path = $destinationPath.$hashed_image_name;
        $imageFile->move(public_path($destinationPath), $hashed_image_name);

        return $img_path;
    }

    public function updateHomeInsuranceHeader(Request $request)
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

        $home = HomeInsurance::find(1);

        isset($imagePath) ? $home->header_image = $imagePath : '';
        $home->header_caption = $request->caption;
        $home->header_body = $request->body;

        $home->save();

        toastr()->success('Home Insurance Header Updated');

        return back();
    }




    public function updateHomeInsurance(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'image' => $this->imageRules(),
            'feature_image' => $this->imageRules(),
            'caption' => 'required',
            'body' => 'required',
            'body1' => 'required',
            'features' => 'required',
        ]);


        if(!is_null($request->file('image')))
        {
            $imagePath = $this->uploadImage($request->file('image'));
        }
        if(!is_null($request->file('feature_image')))
        {
            $featureImagePath = $this->uploadImage($request->file('feature_image'));
        }

        $home = HomeInsurance::find(1);

        $home->sec1_caption = $request->caption;
        $home->sec1_body = $request->body;

        if($request->submit == 'homeowner')
        {
            isset($imagePath) ? $home->homeowner_ins_image = $imagePath : '';
            isset($featureImagePath) ? $home->homeowner_feature_image = $featureImagePath : '';
            $home->homeowner_ins_body = $request->body1;
            $home->homeowner_ins_features = $request->features;

        }elseif($request->submit == 'householder')
        {
            isset($imagePath) ? $home->householder_ins_image = $imagePath : '';
            isset($featureImagePath) ? $home->householder_feature_image = $featureImagePath : '';
            $home->householder_ins_body = $request->body1;
            $home->householder_ins_features = $request->features;

        }

        $home->save();

        toastr()->success('Home Insurance Page Updated');

        return back();
    }

    public function showHomeBenefits()
    {
        $home = HomeInsurance::find(1);
        return view('pages.home_insurance.benefits', compact('home'));
    }


    public function updateHomeBenfits(Request $request)
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

        $home = HomeInsurance::find(1);

        isset($imagePath) ? $home->benefit_image = $imagePath : '';
        $home->benefit_body = $request->benefits_body;
        $home->home_benefits = $request->benefits;

        $home->save();

        toastr()->success('Home Insurance Benefits Updated');

        return back();
    }


}
