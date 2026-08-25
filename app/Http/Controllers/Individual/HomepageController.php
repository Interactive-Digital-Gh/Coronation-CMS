<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\Homepage;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home_header = Homepage::select('id', 'header_image', 'header_caption', 'header_body')->where('id', 1)->first();
        return view('pages.homepage.header', compact('home_header'));
    }

    public function uploadImage($imageFile): string
    { //Move Uploaded File to public folder
        $destinationPath = 'images/uploads/homepage/';
        $hashed_image_name = $imageFile->hashName();
        $img_path = $destinationPath.$hashed_image_name;
        $imageFile->move(public_path($destinationPath), $hashed_image_name);

        return $img_path;
    }


    public function updateHomeHeader(Request $request)
    {
        // dd($request->file('image'));
        // dd($request->hasFile('image'));
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
        $home_header = Homepage::find(1);

        isset($imagePath) ? $home_header->header_image = $imagePath : '';
        $home_header->header_caption = $request->caption;
        $home_header->header_body = $request->body;

        $home_header->save();

        toastr()->success('Homepage Header Updated');

        return back();
    }






    // Homepage Section 1

    public function homeSec1()
    {
        $home = Homepage::first();
        return view('pages.homepage.section1', compact('home'));
    }

    public function updateSection1(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'image' => $this->imageRules(),
            'caption' => 'required',
            'body' => 'required',
            'text' => 'required',
            'link' => 'required'
        ]);

        // dd($request->file('image'));
        if(!is_null($request->file('image')))
        {
            $imagePath = $this->uploadImage($request->file('image'));
        }
        $home_header = Homepage::find(1);

        if($request->submit == 'left')
        {
            isset($imagePath) ? $home_header->tile1_image = $imagePath : '';
            $home_header->tile1_caption = $request->caption;
            $home_header->tile1_text = $request->body;
            $home_header->tile1_btn_text = $request->text;
            $home_header->tile1_btn_link = $request->link;
        }else{
            isset($imagePath) ? $home_header->tile2_image = $imagePath : '';
            $home_header->tile2_caption = $request->caption;
            $home_header->tile2_text = $request->body;
            $home_header->tile2_btn_text = $request->text;
            $home_header->tile2_btn_link = $request->link;
        }

        $home_header->save();

        toastr()->success('Homepage Section 1 Updated');

        return back();
    }

















        // Homepage Section 2

        public function homeSec2()
        {
            $home = Homepage::first();
            return view('pages.homepage.section2', compact('home'));
        }

        public function updateSection2(Request $request)
        {
            $request->validate([
                'caption' => 'required',
                'body' => 'required'
            ]);

            $home_header = Homepage::find(1);

            $home_header->insight_caption = $request->caption;
            $home_header->insight_body = $request->body;

            $home_header->save();

            toastr()->success('Homepage Section 2 Updated');

            return back();
        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
