<?php

namespace App\Http\Controllers\Individual;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function showContactHeader()
    {
        $contact = Contact::select('header_image', 'header_caption', 'header_body')
        ->find(1);
        return view('pages.contact.header', compact('contact'));
    }

    public function showContacts()
    {
        $contact = Contact::select(
            'gh_call_no',
            'gh_email',
            'gh_headoffice',
            'ng_call_no',
            'ng_email',
            'ng_headoffice'
         )
        ->find(1);
        return view('pages.contact.contacts', compact('contact'));
    }


    public function uploadImage($imageFile): string
    { //Move Uploaded File to public folder
        $destinationPath = 'images/uploads/contact/';
        $hashed_image_name = $imageFile->hashName();
        $img_path = $destinationPath.$hashed_image_name;
        $imageFile->move(public_path($destinationPath), $hashed_image_name);

        return $img_path;
    }

    public function updateContactHeader(Request $request)
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

        $contact = Contact::find(1);

        isset($imagePath) ? $contact->header_image = $imagePath : '';
        $contact->header_caption = $request->caption;
        $contact->header_body = $request->body;

        $contact->save();


        return back()->with('success', 'Changes saved.');
    }


    public function updateContacts(Request $request)
    {
        $request->validate([
            'number' => 'required',
            'email' => 'required|email',
            'location' => 'required'
        ]);

        $contact = Contact::find(1);

        switch ($request->submit) {
            case 'gh':
                $contact->gh_call_no = $request->number;
                $contact->gh_email = $request->email;
                $contact->gh_headoffice = $request->location;
                break;
            case 'ng':
                $contact->ng_call_no = $request->number;
                $contact->ng_email = $request->email;
                $contact->ng_headoffice = $request->location;
                break;
            default:
                return back()->with('success', 'Changes saved.');
        }



        $contact->save();


        return back()->with('success', 'Changes saved.');
    }

}
