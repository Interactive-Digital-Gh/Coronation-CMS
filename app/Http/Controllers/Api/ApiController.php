<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\BOD;
use App\Models\Career;
use App\Models\Contact;
use App\Models\EngineeringInsurance;
use App\Models\ExecutiveMember;
use App\Models\HomeInsurance;
use App\Models\Homepage;
use App\Models\Insight;
use App\Models\InsightCategory;
use App\Models\InstituteMotorInsurance;
use App\Models\InstitutePns;
use App\Models\MarineInsurance;
use App\Models\MotorInsurance;
use App\Models\PnS;
use App\Models\TravelInsurance;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function homepage()
    {
        $homepage = Homepage::all();
        return response()->json($homepage);
    }

    public function aboutpage()
    {
        $about = AboutUs::all();
        return response()->json($about);
    }

    public function bod()
    {
        $bod = BOD::all();
        return response()->json($bod);
    }

    public function pns()
    {
        $pns = PnS::all();
        return response()->json($pns);
    }

    public function individualMotorInsurance()
    {
        $motor = MotorInsurance::all();
        return response()->json($motor);
    }

    public function individualTravelInsurance()
    {
        $travel = TravelInsurance::all();
        return response()->json($travel);
    }

    public function individualHomeInsurance()
    {
        $home = HomeInsurance::all();
        return response()->json($home);
    }

    public function formatDate($date)
    {
        $get_date = explode(' ', $date);
        $get_date = $get_date[0];
        $ymd = explode('-', $get_date);
        $year = $ymd[0];
        $month_digi = $ymd[1];
        $day = $ymd[2];

        switch ($month_digi) {
            case '1':
                $month_str = 'January';
                break;
            case '2':
                $month_str = 'February';
                break;
            case '3':
                $month_str = 'March';
                break;
            case '4':
                $month_str = 'April';
                break;
            case '5':
                $month_str = 'May';
                break;
            case '6':
                $month_str = 'June';
                break;
            case '7':
                $month_str = 'July';
                break;
            case '8':
                $month_str = 'August';
                break;
            case '9':
                $month_str = 'September';
                break;
            case '10':
                $month_str = 'October';
                break;
            case '11':
                $month_str = 'November';
                break;
            case '12':
                $month_str = 'December';
                break;
            default:
                $month_str = 'Error';
                break;
        }

        $full_date = $month_str.' '.$day.', '.$year;

        return $full_date;
        // 2024-10-15 10:43:01
    }

    public function fetchPublishedBlogs()
    {
        $data = Insight::select('id', 'caption', 'category', 'body', 'main_image', 'excerpt', 'publish_date', 'pdf_file')
        ->where('publish', true)
        ->get();

        foreach ($data as $blog) {
            $full_date = $this->formatDate($blog['publish_date']);
            $blog['publish_date'] = $full_date;
        }

        return response()->json($data);
    }

    public function fetchPublishedBlogsCards()
    {
        $data = Insight::where('publish', true)
        ->select('caption', 'category', 'main_image', 'excerpt', 'id', 'created_at', 'publish_date')
        ->orderBy('created_at', 'desc')
        ->get();

        foreach ($data as $blog) {
            $full_date = $this->formatDate($blog['publish_date']);
            $blog['publish_date'] = $full_date;
        }

        return response()->json($data);
    }

    public function fetchPublishedBlogsCardsLatestTwo()
    {
        $data = Insight::where('publish', true)
        ->select('caption', 'category', 'main_image', 'excerpt', 'id', 'created_at', 'publish_date')
        ->orderBy('created_at', 'desc')
        ->take(2)
        ->get();

        foreach ($data as $blog) {
            $full_date = $this->formatDate($blog['publish_date']);
            $blog['publish_date'] = $full_date;
        }

        return response()->json($data);
    }

    public function fetchBlogDetail(String $id)
    {
        $data = Insight::where('id', $id)
        ->where('publish', true)
        ->get();

        foreach ($data as $blog) {
            $full_date = $this->formatDate($blog['publish_date']);
            $blog['publish_date'] = $full_date;
        }

        return response()->json($data);
    }

    public function getBlogCategories()
    {
        $data = InsightCategory::select('category')
        ->get();
        return response()->json($data);
    }

    public function getCareersPage()
    {
        $data = Career::get();
        return response()->json($data);
    }

    public function getContactPage()
    {
        $data = Contact::get();
        return response()->json($data);
    }

    public function institutePnS()
    {
        $data = InstitutePns::get();
        return response()->json($data);
    }

    public function instituteMotorInsurance()
    {
        $data = InstituteMotorInsurance::get();
        return response()->json($data);
    }

    public function instituteEngInsurance()
    {
        $data = EngineeringInsurance::get();
        return response()->json($data);
    }

    public function instituteMarineInsurance()
    {
        $data = MarineInsurance::get();
        return response()->json($data);
    }



    public function downloadPDP($id)
    {
        $data = Insight::find($id)->toArray();

        $pdf = FacadePdf::loadView('article-pdf-view', $data);

        return $pdf->download('article-pdf-view.pdf');
    }

    // public function viewPDFPage($id)
    // {
    //     $data = Insight::find($id);

    //     return view('article-pdf-view', compact('data'));
    // }


    public function fetchExecutiveMembers()
    {
        $data = ExecutiveMember::all();
        return response()->json($data);
    }
}
