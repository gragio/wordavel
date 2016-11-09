<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services;
use App\Post;

class PageController extends Controller
{
	//public $menu = get_posts('page');

    public function page( $page = 'index' ){
		$menu = Post::type('page')->published()->get();

		$slugs = [];

		for($i=0; $i<count($menu); $i++)
			$slugs[] = $menu[$i]->slug;


    	$viewData = [
	    	'slug' => $page,
	    	'menu' => $menu
	    ];


    	if (View::exists('pages.'.$page))
			return view('pages.'.$page , $viewData );
    	else return view('pages.404', $viewData );

    }
}
