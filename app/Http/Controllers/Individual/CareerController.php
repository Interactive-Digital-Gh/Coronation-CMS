<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function showCareersHeader()
    {
        $career = Career::select('header_image', 'header_caption', 'header_body')
        ->find(1);
        return view('pages.careers.header', compact('career'));
    }

    public function showCareersSection1()
    {
        $career = Career::select('sec1_image', 'sec1_caption', 'sec1_body')
        ->find(1);
        return view('pages.careers.section1', compact('career'));
    }

    public function showCareersSection2()
    {
        $career = Career::select('sec2_image', 'sec2_caption', 'sec2_body')
        ->find(1);
        return view('pages.careers.section2', compact('career'));
    }


    public function showCareersSection3()
    {
        $career = Career::select('card1_image',
         'card1_caption',
          'card1_body',
          'card2_image',
          'card2_caption',
          'card2_body',
          'card3_image',
          'card3_caption',
          'card3_body',
          'card4_image',
          'card4_caption',
          'card4_body',
          'card5_image',
          'card5_caption',
          'card5_body',
          )
        ->find(1);
        return view('pages.careers.section3', compact('career'));
    }



    public function uploadImage($imageFile): string
    { //Move Uploaded File to public folder
        $destinationPath = 'images/uploads/career/';
        $hashed_image_name = $imageFile->hashName();
        $img_path = $destinationPath.$hashed_image_name;
        $imageFile->move(public_path($destinationPath), $hashed_image_name);

        return $img_path;
    }

    public function updateCareersHeader(Request $request)
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

        $career = Career::find(1);

        isset($imagePath) ? $career->header_image = $imagePath : '';
        $career->header_caption = $request->caption;
        $career->header_body = $request->body;

        $career->save();

        toastr()->success('Careers Header Updated');

        return back();
    }


    public function updateCareersSection1(Request $request)
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

        $career = Career::find(1);

        isset($imagePath) ? $career->sec1_image = $imagePath : '';
        $career->sec1_caption = $request->caption;
        $career->sec1_body = $request->body;

        $career->save();

        toastr()->success('Careers Section 1 Updated');

        return back();
    }

    public function updateCareersSection2(Request $request)
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

        $career = Career::find(1);

        isset($imagePath) ? $career->sec2_image = $imagePath : '';
        $career->sec2_caption = $request->caption;
        $career->sec2_body = $request->body;

        $career->save();

        toastr()->success('Careers Section 2 Updated');

        return back();
    }


    public function updateCareersSection3(Request $request)
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

        $career = Career::find(1);

        switch ($request->submit) {
            case 'card1':
                isset($imagePath) ? $career->card1_image = $imagePath : '';
                $career->card1_caption = $request->caption;
                $career->card1_body = $request->body;
                break;
            case 'card2':
                isset($imagePath) ? $career->card2_image = $imagePath : '';
                $career->card2_caption = $request->caption;
                $career->card2_body = $request->body;
                break;
            case 'card3':
                isset($imagePath) ? $career->card3_image = $imagePath : '';
                $career->card3_caption = $request->caption;
                $career->card3_body = $request->body;
                break;
            case 'card4':
                isset($imagePath) ? $career->card4_image = $imagePath : '';
                $career->card4_caption = $request->caption;
                $career->card4_body = $request->body;
                break;
            case 'card5':
                isset($imagePath) ? $career->card5_image = $imagePath : '';
                $career->card5_caption = $request->caption;
                $career->card5_body = $request->body;
                break;
            default:
                toastr()->error('Something Went Wront');
                return back();
        }

        $career->save();

        toastr()->success('Careers Card Updated');

        return back();
    }


}
