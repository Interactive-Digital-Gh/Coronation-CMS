<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\Insight;
use App\Models\InsightCategory;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InsightsController extends Controller
{
    public function allBlogPage()
    {
        // Only the columns the list shows; bodies can be large.
        $blogs = Insight::select('id', 'caption', 'main_image', 'publish', 'created_at')->get();
        return Inertia::render('Insights/Index', compact('blogs'));
    }


    public function showAddBlogPage()
    {
        $categories = InsightCategory::all();
        return Inertia::render('Insights/Create', compact('categories'));
    }

    public function uploadImage($imageFile): string
    { //Move Uploaded File to public folder
        $destinationPath = 'images/uploads/insights/';
        $hashed_image_name = $imageFile->hashName();
        $img_path = $destinationPath.$hashed_image_name;
        $imageFile->move(public_path($destinationPath), $hashed_image_name);

        return $img_path;
    }

    public function addBlog(Request $request)
    {
        // dd($request);
        $request->validate([
            'main_image' => $this->imageRules(true),
            'pdf_file' => 'required|mimes:pdf|max:10000|file',
            'blog_image1' => $this->imageRules(),
            'blog_image2' => $this->imageRules(),
            'blog_image3' => $this->imageRules(),
            'caption' => 'required',
            'body' => 'required',
            'excerpt' => 'required',
        ]);

        // dd($request);
        if(!is_null($request->new_category))
        {
            $categoryCheck = InsightCategory::firstOrNew(
                ['category' => strtolower($request->new_category)],  // Search condition
                ['category' => strtolower($request->new_category)]   // Values if not found
            );
            if (!$categoryCheck->exists) {
                $categoryCheck->save();
            }
            $category = strtolower($request->new_category);

        }elseif(!is_null($request->existing_category)){
            $category = strtolower($request->existing_category);
        }else{
            toastr()->error('A Blog Category Must Be Added');
            return back();
        }
        // dd($request);

        $main_image = $this->uploadImage($request->file('main_image'));
        $pdf_file = $this->uploadImage($request->file('pdf_file'));

        Insight::create([
            'caption' => $request->caption,
            'category' => $category,
            'body' => $request->body,
            'excerpt' => $request->excerpt,
            'main_image' => $main_image,
            'pdf_file' => $pdf_file
        ]);

        // isset($imagePath) ? $blog->header_image = $imagePath : '';
        // $blog->caption = $request->caption;
        // $blog->category = $request->category;
        // $blog->body = $request->body;
        // $blog->main_image = $main_image;
        // $blog->category = $request->category;
        // $blog->category = $request->category;

        // $blog->save();

        toastr()->success('Post created');

        return redirect()->route('blogs-all');
    }

    public function deleteBlog(String $id)
    {
        Insight::destroy($id);
        toastr()->success('Post deleted');
        return back();
    }

    public function publishBlog(String $id)
    {
        $insight = Insight::find($id);
        if($insight->publish == false)
        {
            $insight->publish = true;
            $insight->publish_date = now();
            toastr()->success('Post published');
        }else{
            $insight->publish = false;
            toastr()->success('Post unpublished');
        }

        $insight->save();

        return back();
    }


    public function editBlog(String $id)
    {
        $blog = Insight::find($id);
        $categories = InsightCategory::all();
        return Inertia::render('Insights/Edit', compact('blog', 'categories'));
    }



    public function updateBlog(Request $request, String $id)
    {
        $request->validate([
            'main_image' => $this->imageRules(),
            'pdf_file' => 'mimes:pdf|max:10000|file',
            'blog_image1' => $this->imageRules(),
            'blog_image2' => $this->imageRules(),
            'blog_image3' => $this->imageRules(),
            'caption' => 'required',
            'body' => 'required',
            'category' => 'required',
            'excerpt' => 'required'
        ]);

        $categoryCheck = InsightCategory::firstOrNew(
            ['category' => strtolower($request->category)],  // Search condition
            ['category' => strtolower($request->category)]   // Values if not found
        );
        if (!$categoryCheck->exists) {
            $categoryCheck->save();
        }
        $category = strtolower($request->category);

        if(!is_null($request->file('main_image')))
        {
            $main_image = $this->uploadImage($request->file('main_image'));
        }

        if(!is_null($request->file('pdf_file')))
        {
            $pdf_file = $this->uploadImage($request->file('pdf_file'));
        }


        $blog = Insight::find($id);

        isset($main_image) ? $blog->main_image = $main_image : '';
        isset($pdf_file) ? $blog->pdf_file = $pdf_file : '';

        $blog->caption = $request->caption;
        $blog->category = $category;
        $blog->body = $request->body;
        $blog->excerpt = $request->excerpt;

        $blog->save();

        toastr()->success('Post updated');

        return redirect()->route('blogs-all');
    }

}
