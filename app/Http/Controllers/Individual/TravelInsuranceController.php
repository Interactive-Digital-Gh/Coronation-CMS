<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\TravelInsurance;
use Illuminate\Http\Request;

class TravelInsuranceController extends Controller
{
    public function index()
    {
        $travel = TravelInsurance::find(1);
        return view('pages.travel_insurance.index', compact('travel'));
    }

    public function showTravelHeader()
    {
        $travel = TravelInsurance::find(1);
        return view('pages.travel_insurance.header', compact('travel'));
    }

    public function uploadImage($imageFile): string
    { //Move Uploaded File to public folder
        $destinationPath = 'images/uploads/travel-insuracne/';
        $hashed_image_name = $imageFile->hashName();
        $img_path = $destinationPath.$hashed_image_name;
        $imageFile->move(public_path($destinationPath), $hashed_image_name);

        return $img_path;
    }

    public function updateTravelInsuranceHeader(Request $request)
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

        $travel = TravelInsurance::find(1);

        isset($imagePath) ? $travel->header_image = $imagePath : '';
        $travel->header_caption = $request->caption;
        $travel->header_body = $request->body;

        $travel->save();

        toastr()->success('Travel Insurance Header Updated');

        return back();
    }





    public function updatetravelInsurance(Request $request)
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
        // dd($featureImagePath);

        $travel = TravelInsurance::find(1);

        $travel->sec1_caption = $request->caption;
        $travel->sec1_body = $request->body;

        if($request->submit == 'student')
        {
            isset($imagePath) ? $travel->student_ins_image = $imagePath : '';
            isset($featureImagePath) ? $travel->student_feature_image = $featureImagePath : '';
            $travel->student_insurance_body = $request->body1;
            $travel->student_insurance_features = $request->features;

        }elseif($request->submit == 'individual')
        {
            isset($imagePath) ? $travel->individual_ins_image = $imagePath : '';
            isset($featureImagePath) ? $travel->individual_feature_image = $featureImagePath : '';
            $travel->individual_insurance_body = $request->body1;
            $travel->individual_insurance_features = $request->features;

        }

        $travel->save();

        toastr()->success('Travel Insurance Page Updated');

        return back();
    }



    public function showTravelBenefits()
    {
        $travel = TravelInsurance::find(1);
        return view('pages.travel_insurance.benefits', compact('travel'));
    }



    public function updateTravelBenfits(Request $request)
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

        $travel = TravelInsurance::find(1);

        isset($imagePath) ? $travel->benefits_image = $imagePath : '';
        $travel->benefits_body = $request->benefits_body;
        $travel->travel_benefits = $request->benefits;

        $travel->save();

        toastr()->success('Travel Insurance Benefits Updated');

        return back();
    }







}

