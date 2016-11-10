<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services;
use App\Post;

class PageController extends Controller
{
    public function page($page = 'index')
    {
		$menu = Post::type('page')->published()->get();
        $content = ($page != 'index') ? Post::slug($page)->first() : get_posts();


        $viewData = [
    		'slug' => $page,
    		'menu' => $menu,
            'content' => $content
    	];

    	if (View::exists('pages.'.$page))
			return view('pages.'.$page , $viewData);
        else if (!empty($content))
            return view('pages.post_page', $viewData);
    	else return view('pages.404', $viewData);

    }

}
