<?php

namespace App\Http\Controllers\User;

use App\Models\ModelDetail;
use App\Models\SharePackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function switchLang(Request $request)
    {
        $lang = $request->language;
        if (in_array($lang, ['en', 'ur'])) {
            Session::put('locale', $lang);
            App::setLocale($lang);
        }
        return redirect()->back();
    }
    
    public function aboutPage()
    {
        return view('users.pages.about');
    }

    public function contactPage()
    {
        return view('users.pages.contact');
    }

    public function galleryPage()
    {
        return view('users.pages.gallery');
    }

    public function teamPage()
    {
        return view('users.pages.team');
    }

    public function faqPage()
    {
        return view('users.pages.faq');
    }

    public function packagesPage()
    {
        $packages = SharePackage::paginate(12);
        return view('users.pages.investment',compact('packages'));
    }

    public function dashboardPage()
    {
        if (!Auth::user()) {
            return back()->with('error', 'You have to first create account for buying shares!');
        }
        return view('users.pages.dashboard');
    }
}
