<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display about page.
     *
     * @return \Illuminate\View\View
     */
    /**
     * Display about page.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('front.pages.about');
    }

    /**
     * Display contact page.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('front.pages.contact');
    }

    /**
     * Display privacy policy page.
     *
     * @return \Illuminate\View\View
     */
    public function privacy()
    {
        return view('front.pages.privacy');
    }

    /**
     * Display terms and conditions page.
     *
     * @return \Illuminate\View\View
     */
    public function terms()
    {
        return view('front.pages.terms');
    }
}
