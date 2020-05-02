<?php

namespace App\Http\Controllers;

use App\AboutAvard;
use App\AboutHeader;
use App\AboutService;
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

        return view('medshop.about')->with([
            'ordering_products_count'=>$ordering_products_count,
            'about_headers' => $about_headers,
            'about_services' => $about_services,
            'about_faquestions' => $about_faquestions,
            'about_questions_images' => $about_questions_images,
            'about_avards' => $about_avards,
        ]);
    }
}
