<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\MotorInsurance;
use Illuminate\Http\Request;

class MotorInsuranceController extends Controller
{
    public function index()
    {
        $motor = MotorInsurance::find(1);
        return view('pages.motor_insurance.index', compact('motor'));
    }


    public function uploadImage($imageFile): string
    { //Move Uploaded File to public folder
        $destinationPath = 'images/uploads/motor-insurance/';
        $hashed_image_name = $imageFile->hashName();
        $img_path = $destinationPath.$hashed_image_name;
        $imageFile->move(public_path($destinationPath), $hashed_image_name);

        return $img_path;
    }


    public function showMotorHeader()
    {
        $motor = MotorInsurance::find(1);
        return view('pages.motor_insurance.header', compact('motor'));
    }

    public function updateMotorInsuranceHeader(Request $request)
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

        $motor = MotorInsurance::find(1);

        isset($imagePath) ? $motor->header_image = $imagePath : '';
        $motor->header_caption = $request->caption;
        $motor->header_body = $request->body;

        $motor->save();


        return back()->with('success', 'Changes saved.');
    }







    public function updateMotorInsurance(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'feature_image' => $this->imageRules(),
            'image' => $this->imageRules(),
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

        $motor = MotorInsurance::find(1);

        isset($imagePath) ? $motor->sec1_image = $imagePath : '';
        $motor->sec1_caption = $request->caption;
        $motor->sec1_body = $request->body;

        if($request->submit == 'comp')
        {
            isset($featureImagePath) ? $motor->compliance_ins_feature_image = $featureImagePath : '';
            $motor->compliance_ins_body = $request->body1;
            $motor->compliance_ins_features = $request->features;

        }elseif($request->submit == 'tpft')
        {
            isset($featureImagePath) ? $motor->tp_fire_theft_features_image = $featureImagePath : '';
            $motor->tp_fire_theft_body = $request->body1;
            $motor->tp_fire_theft_features = $request->features;

        }elseif($request->submit == 'tpo')
        {
            isset($featureImagePath) ? $motor->tp_only_features_image = $featureImagePath : '';
            $motor->tp_only_body = $request->body1;
            $motor->tp_only_features = $request->features;

        }

        $motor->save();


        return back()->with('success', 'Changes saved.');
    }



    public function showMotorBenefits()
    {
        $motor = MotorInsurance::find(1);
        return view('pages.motor_insurance.benefits', compact('motor'));
    }

    public function updateMotorBenfits(Request $request)
    {
        $request->validate([
            'benefit_body' => 'required',
            'comprehensive_benefits' => 'required',
            'third_party' => 'required',
        ]);

        $motor = MotorInsurance::find(1);

        $motor->benefits_body = $request->benefit_body;
        $motor->comprehensive_ins_benefits = $request->comprehensive_benefits;
        $motor->tp_fire_theft_benefits = $request->third_party;

        $motor->save();


        return back()->with('success', 'Changes saved.');
    }
}



