<?php

namespace App\Http\Controllers\Institute;

use App\Http\Controllers\Controller;
use App\Models\InstituteMotorInsurance;
use Illuminate\Http\Request;

class MotorInsuranceController extends Controller
{
    public function showHeader()
    {
        $motor = InstituteMotorInsurance::find(1);
        return view('pages.Institute.motor_insurance.header', compact('motor'));
    }

    public function uploadImage($imageFile): string
    { //Move Uploaded File to public folder
        $destinationPath = 'images/uploads/insitute/motor-insurance/';
        $hashed_image_name = $imageFile->hashName();
        $img_path = $destinationPath.$hashed_image_name;
        $imageFile->move(public_path($destinationPath), $hashed_image_name);

        return $img_path;
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

        $motor = InstituteMotorInsurance::find(1);

        isset($imagePath) ? $motor->header_image = $imagePath : '';
        $motor->header_caption = $request->caption;
        $motor->header_body = $request->body;

        $motor->save();

        toastr()->success('Motor Insurance Header Updated');

        return back();
    }

    public function showMotorPage()
    {
        $motor = InstituteMotorInsurance::find(1);
        return view('pages.Institute.motor_insurance.index', compact('motor'));
    }



    public function updateMotorInsurance(Request $request)
    {

        $request->validate([
            'image' => $this->imageRules(),
            'background_image' => $this->imageRules(),
            'caption' => 'required',
            'body' => 'required',
            'body1' => 'required',
            'features' => 'required',
        ]);



        if(!is_null($request->file('image')))
        {
            $imagePath = $this->uploadImage($request->file('image'));
        }

        if(!is_null($request->file('background_image')))
        {
            $background_imagePath = $this->uploadImage($request->file('background_image'));
        }

        $motor = InstituteMotorInsurance::find(1);

        isset($imagePath) ? $motor->sec1_image = $imagePath : '';
        $motor->sec1_caption = $request->caption;
        $motor->sec1_body = $request->body;

        if($request->submit == 'comp')
        {
            isset($background_imagePath) ? $motor->comprehensive_ins_image = $background_imagePath : '';
            $motor->comprehensive_ins_body = $request->body1;
            $motor->comprehensive_ins_features = $request->features;

        }elseif($request->submit == 'tpft')
        {
            isset($background_imagePath) ? $motor->tp_fire_theft_image = $background_imagePath : '';
            $motor->tp_fire_theft_body = $request->body1;
            $motor->tp_fire_theft_features = $request->features;

        }elseif($request->submit == 'tpo')
        {
            isset($background_imagePath) ? $motor->tp_only_image = $background_imagePath : '';
            $motor->tp_only_body = $request->body1;
            $motor->tp_only_features = $request->features;
        }

        $motor->save();

        toastr()->success('Motor Insurance Page Updated');

        return back();
    }


    public function showMotorBenefits()
    {
        $motor = InstituteMotorInsurance::find(1);
        return view('pages.Institute.motor_insurance.benefits', compact('motor'));
    }

    public function updateMotorBenfits(Request $request)
    {
        $request->validate([
            'benefit_body' => 'required',
            'comprehensive_benefits' => 'required',
            'third_party' => 'required',
        ]);

        $motor = InstituteMotorInsurance::find(1);

        $motor->benefit_body = $request->benefit_body;
        $motor->comprehensive_benefits = $request->comprehensive_benefits;
        $motor->tp_fire_theft_benefits = $request->third_party;

        $motor->save();

        toastr()->success('Institute Motor Insurance Benefits Updated');

        return back();
    }
}
