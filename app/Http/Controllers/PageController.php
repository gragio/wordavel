<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services;
use App\Post;

class PageController extends Controller
{

    public function page($page = 'index') {
		$menu = Post::type('page')->published()->get();
        $content = ($page != 'index') ? Post::type('page')->slug($page)->first() : get_posts();

        $viewData = [
    		'menu' => $menu,
            'content' => $content
    	];

    	if (View::exists('pages.'.$page))
			return view('pages.'.$page , $viewData);
        else if (!empty($content))
            return view('pages.post_page', $viewData);
    	else return view('pages.404', $viewData);

    }

    public function blog($slug) {
        $menu = Post::type('page')->published()->get();
        $content = Post::slug($slug)->first();

        $viewData = [
    		'menu' => $menu,
            'content' => $content
    	];

    	if (!empty($content))
            return view('pages.post', $viewData);
    	else return view('pages.404', $viewData);
    }

    public function preview($ID) {
        $menu = Post::type('page')->published()->get();
        $viewData = [
    		'menu' => $menu
        ];

        $user = wp_get_current_user();

        if(!is_user_logged_in() || !array_intersect(['editor', 'administrator', 'author'], $user->roles))
            return view('pages.404', $viewData);


        $content = Post::where('ID', $ID)->with('revision')->first();

        $viewData['content'] =  $content->revision->last();

    	if (!empty($content) && count($content))
            return view('pages.post_page', $viewData);
    	else return view('pages.404', $viewData);
    }

}
