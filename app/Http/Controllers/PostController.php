<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function post($slug = null) {
        $viewData = [];

        if(empty($slug)) {
            $viewData['obj'] = Post::type('post')->slug($slug)->first();
            return view('pages.blog', $viewData);
        }

        $viewData['view'] = 'pages.single';
        $viewData['obj'] = Post::type('post')->slug($slug)->published()->first();

        if(env('APP_ENV') == 'local') {
            $viewData['meta'] = $viewData['obj']->getMeta();
        }

        if(!empty($_GET['preview_id']))
            return ViewUtility::getPreview($viewData);

    	return ViewUtility::render($viewData);
    }
}
