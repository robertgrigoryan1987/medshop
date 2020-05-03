<?php

namespace App\Http\Controllers;

use App\AboutAvard;
use App\AboutExperience;
use App\AboutHeader;
use App\AboutService;
use App\ContactUs;
use App\Faquestion;
use App\QuestionsImage;
use Illuminate\Http\Request;
use App\OrderingProduct;
use Session;


class AboutController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();
        $about_headers = AboutHeader::where('id',1)->first();
        $about_services = AboutService::all();
        $about_faquestions = Faquestion::all();
        $about_questions_images = QuestionsImage::all();
        $about_avards = AboutAvard::all();
        $about_experiences = AboutExperience::all();
        $contact_us = ContactUs::where('id', 1)->firstOrFail();

        return view('medshop.about')->with([
            'ordering_products_count'=>$ordering_products_count,
            'about_headers' => $about_headers,
            'about_services' => $about_services,
            'about_faquestions' => $about_faquestions,
            'about_questions_images' => $about_questions_images,
            'about_avards' => $about_avards,
            'contact_us' => $contact_us,
            'about_experiences' => $about_experiences,
        ]);
    }
}
