<?php

namespace Androidizay\Http\Controllers;

use Backpack\PageManager\app\Models\Page;
use Androidizay\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index($slug)
    {
        $page = Page::findBySlug($slug);

        if (!$page)
        {
            abort(404, 'Please go back to our <a href="'.url('').'">homepage</a>.');
        }

        $this->data['title'] = $page->title;
        $this->data['page'] = $page->withFakes();

        return view('cmspages.'.$page->template, $this->data);
    }
}