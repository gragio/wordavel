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


    private function setMenu($menu = null) {
        if($menu == null)
            $this->viewData['menu'] = Post::type('page')->published()->get();
        else $this->viewData['menu'] = $menu;
    }

    public function page($page = 'index') {
        $this->setMenu();

        if(!empty($_GET['preview_id']) || !empty($_GET['page_id']) || !empty($_GET['p']))
            return $this->getPreview($_GET['preview_id'].$_GET['p'].$_GET['page_id']);

        $this->viewData['content'] = ($page != 'index') ? Post::type('page')->slug($page)->first() : get_posts();

    	if (View::exists('pages.'.$page))
			return view('pages.'.$page , $this->viewData);
        else if (!empty($this->viewData['content']))
            return view('pages.page', $this->viewData);
    	else return abort(404);

    }

    public function blog($slug = null) {
        $this->setMenu();

        if(empty($slug)) {
            $this->viewData['content'] = get_posts();

            return view('pages.blog', $this->viewData);
        }

        if(!empty($_GET['preview_id']))
            return $this->getPreview($_GET['preview_id']);

        $this->viewData['content'] = Post::type('post')->slug($slug)->first();

    	if (!empty($this->viewData['content']))
            return view('pages.single', $this->viewData);
    	else return abort(404);
    }

    private function getPreview($ID) {

        if(!is_user_logged_in() && $user = wp_get_current_user() || !array_intersect(['editor', 'administrator', 'author'], $user->roles))
            return abort(404);


        $content = Post::where('ID', $ID)->with('revision')->first();
        $this->viewData['content'] =  $content->revision->last();

        if($content->type == 'post')
    	   return view('pages.single', $this->viewData);
    	else return view('pages.page', $this->viewData);
    }

}
