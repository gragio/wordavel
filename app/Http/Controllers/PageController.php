<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services;
use App\Post;
use App\Menu;

class PageController extends Controller
{

    private $viewData;

    private $blogPage = 'blog';

    private function setMenu($menu = null) {
        if($menu == null)
            $this->viewData['menu'] = Post::type('page')->published()->get();
        else $this->viewData['menu'] = $menu;
    }

    public function page($page = 'index') {
        $this->setMenu();

        if(!empty($_GET['preview_id']))
            return $this->getPreview($_GET['preview_id']);

        $this->viewData['content'] = ($page != 'index' || $page != $blogPage) ? Post::type('page')->slug($page)->first() : get_posts();

    	if (View::exists('pages.'.$page))
			return view('pages.'.$page , $this->viewData);
        else if (!empty($this->viewData['content']))
            return view('pages.post_page', $this->viewData);
    	else return view('pages.404', $this->viewData);

    }

    public function blog($slug) {
        $this->setMenu();

        $this->viewData['content'] = Post::type('post')->slug($slug)->first();

    	if (!empty($this->viewData['content']))
            return view('pages.post', $this->viewData);
    	else return view('pages.404', $this->viewData);
    }

    private function getPreview($ID) {

        $user = wp_get_current_user();

        if(!is_user_logged_in() || !array_intersect(['editor', 'administrator', 'author'], $user->roles))
            return view('pages.404', $this->viewData);


        $content = Post::where('ID', $ID)->with('revision')->first();
        $this->viewData['content'] =  $content->revision->last();

    	return view('pages.post_page', $this->viewData);
    }

}
