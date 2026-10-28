<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\BOD;
use App\Models\ExecutiveMember;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutUsController extends Controller
{

    public function index()
    {
        $about_header = AboutUs::select('id', 'header_image', 'header_caption', 'header_body')->where('id', 1)->first();
        return Inertia::render('About/Header', compact('about_header'));
    }

    public function uploadImage($imageFile): string
    { //Move Uploaded File to public folder
        $destinationPath = 'images/uploads/about-us/';
        $hashed_image_name = $imageFile->hashName();
        $img_path = $destinationPath.$hashed_image_name;
        $imageFile->move(public_path($destinationPath), $hashed_image_name);

        return $img_path;
    }


    public function updateAboutHeader(Request $request)
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
        $about_header = AboutUs::find(1);

        isset($imagePath) ? $about_header->header_image = $imagePath : '';
        $about_header->header_caption = $request->caption;
        $about_header->header_body = $request->body;

        $about_header->save();

        toastr()->success('About Us banner updated');

        return back();
    }





       //  Section 1

       public function aboutSec1()
       {
           $about = AboutUs::select('id', 'sec1_caption_left', 'sec1_body_left', 'sec1_caption_right', 'sec1_body_right')->where('id', 1)->first();
           return Inertia::render('About/Section1', compact('about'));
       }


    public function updateSection1(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'caption_right' => 'required',
            'body_right' => 'required',
            'caption_left' => 'required',
            'body_left' => 'required'
        ]);

        $about_header = AboutUs::find(1);

        $about_header->sec1_caption_left = $request->caption_right;
        $about_header->sec1_body_left = $request->body_right;
        $about_header->sec1_caption_right = $request->caption_left;
        $about_header->sec1_body_right = $request->body_left;

        $about_header->save();

        toastr()->success('Our Journey updated');

        return back();
    }



    //  Section 2

    public function aboutSec2()
    {
        $about = AboutUs::select('id', 'sec2_image', 'sec2_caption', 'sec2_body')->where('id', 1)->first();
        return Inertia::render('About/Section2', compact('about'));
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

        $about_header = AboutUs::find(1);

        isset($imagePath) ? $about_header->sec2_image = $imagePath : '';
        $about_header->sec2_caption = $request->caption;
        $about_header->sec2_body = $request->body;

        $about_header->save();

        toastr()->success('What We Do updated');

        return back();
    }





        //  Section 3

    public function aboutSec3()
    {
        $about = AboutUs::select('id', 'sec3_image', 'sec3_caption', 'sec3_body')->where('id', 1)->first();
        return Inertia::render('About/Section3', compact('about'));
    }


    public function updateSection3(Request $request)
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

        $about_header = AboutUs::find(1);

        isset($imagePath) ? $about_header->sec3_image = $imagePath : '';
        $about_header->sec3_caption = $request->caption;
        $about_header->sec3_body = $request->body;

        $about_header->save();

        toastr()->success('What We Offer updated');

        return back();
    }









    //  Section 4

    public function aboutSec4()
    {
        $about = AboutUs::select('id', 'sec4_image', 'sec4_caption', 'sec4_body')->where('id', 1)->first();
        return Inertia::render('About/Section4', compact('about'));
    }


    public function updateSection4(Request $request)
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

        $about_header = AboutUs::find(1);

        isset($imagePath) ? $about_header->sec4_image = $imagePath : '';
        $about_header->sec4_caption = $request->caption;
        $about_header->sec4_body = $request->body;

        $about_header->save();

        toastr()->success('Our History updated');

        return back();
    }








    //  Section 5

    public function aboutSec5()
    {
        $bods = BOD::all();
        $about = AboutUs::select('id', 'bod_caption', 'bod_body')->where('id', 1)->first();
        return Inertia::render('About/BoardMembers', compact('bods', 'about'));
    }

    public function updateBoDText(Request $request)
    {
        $request->validate([
            'caption' => 'required|max:255',
            'body' => 'required'
        ]);

        $about = AboutUs::find(1);

        $about->bod_caption = $request->caption;
        $about->bod_body = $this->cleanRichText($request->body);

        $about->save();

        toastr()->success('Board of Directors text updated');

        return back();
    }

    public function createBoD()
    {
        return Inertia::render('About/BoardMemberForm');
    }


    public function storeBoD(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'image' => $this->imageRules(true),
            'name' => 'required',
            'body' => 'required',
            'title' => 'required'
        ]);

        if(!is_null($request->file('image')))
        {
            $imagePath = $this->uploadImage($request->file('image'));
        }

        BOD::create([
            'image' => $imagePath,
            'name' => $request->name,
            'body' => $this->cleanRichText($request->body),
            'title' => $request->title
        ]);

        toastr()->success('Board member added');

        return redirect()->route('about-sec5');
    }



    public function editBoD($id)
    {
        $bod = BOD::find($id);
        return Inertia::render('About/BoardMemberForm', compact('bod'));
    }

    public function updateBoD(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'image' => $this->imageRules(),
            'name' => 'required',
            'body' => 'required',
            'title' => 'required'
        ]);

        if(!is_null($request->file('image')))
        {
            $imagePath = $this->uploadImage($request->file('image'));
        }

        $bod = BOD::find($id);

        isset($imagePath) ? $bod->image = $imagePath : '';
        $bod->name = $request->name;
        $bod->title = $request->title;
        $bod->body = $this->cleanRichText($request->body);

        $bod->save();

        toastr()->success('Board member updated');

        return redirect()->route('about-sec5');
    }

    public function deleteBoD($id)
    {
        BOD::destroy($id);

        toastr()->success('Board member deleted');

        return back();
    }


    public function executiveMembersTable()
    {
        $executives = ExecutiveMember::all();
        return Inertia::render('About/Executives', compact('executives'));
    }

    public function createExecutiveMember()
    {
        return Inertia::render('About/ExecutiveForm');
    }

    public function storeExecutiveMember(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'image' => $this->imageRules(true),
            'name' => 'required',
            'body' => 'required',
        ]);

        if(!is_null($request->file('image')))
        {
            $imagePath = $this->uploadImage($request->file('image'));
        }

        ExecutiveMember::create([
            'image' => $imagePath,
            'name' => $request->name,
            'description' => $request->body,
        ]);

        toastr()->success('Executive added');

        return redirect()->route('executive-table');
    }

    public function editExecutiveMember($id)
    {
        $executive = ExecutiveMember::find($id);
        return Inertia::render('About/ExecutiveForm', compact('executive'));
    }

    public function updateExecutiveMember(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'image' => $this->imageRules(),
            'name' => 'required',
            'body' => 'required',
        ]);

        if(!is_null($request->file('image')))
        {
            $imagePath = $this->uploadImage($request->file('image'));
        }

        $executive = ExecutiveMember::find($id);

        isset($imagePath) ? $executive->image = $imagePath : '';
        $executive->name = $request->name;
        $executive->description = $request->body;
        $executive->save();

        toastr()->success('Executive updated');

        return redirect()->route('executive-table');
    }

    public function deleteExecutiveMember($id)
    {
        ExecutiveMember::destroy($id);

        toastr()->success('Executive deleted');
        return back();
    }

}
