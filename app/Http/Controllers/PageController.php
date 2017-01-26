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

    private $viewData = [];

    private $template = null;


    public function page($page = null) {

        if(!empty($_GET['preview_id']) || !empty($_GET['page_id']) || !empty($_GET['p']))
            return $this->getPreview($_GET['preview_id'].$_GET['p'].$_GET['page_id']);

        // case index
        if(empty($page)) {
            $homeID = get_option('page_on_front');
            if(is_int($homeID)) {
                $this->viewData['content'] = Post::where('ID', $homeID)->first();
                $this->viewData['meta'] = $this->viewData['content']->getMeta();
            }
            return view('pages.index', $this->viewData);
        }


        $this->viewData['content'] = Post::type('page')->slug($page)->published()->first();

        if($this->viewData['content']->name != $page) {
            header( "HTTP/1.1 301 Moved Permanently" );
            header( "location: ".get_permalink($this->viewData['content']));
        }
        //$this->setPost($this->viewData['content']);
        if($this->viewData['content'] instanceof Post) {
            $this->viewData['meta'] = $this->viewData['content']->getMeta();
            $this->template = $this->viewData['content']->template();
        }

        return $this->render($page);

    }

    public function blog($slug = null) {

        if(empty($slug)) {
            $this->viewData['content'] = Post::type('post')->slug($slug)->first();
            return view('pages.blog', $this->viewData);
        }

        if(!empty($_GET['preview_id']))
            return $this->getPreview($_GET['preview_id']);

        $this->viewData['content'] = Post::type('post')->slug($slug)->published()->first();
        $this->viewData['meta'] = $this->viewData['content']->getMeta();

    	return $this->render($page);
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

    private function render($page = null) {

        if(!empty($this->template) && View::exists('pages.'.$this->template)) {
            return view('pages.'.$this->template , $this->viewData);
        } else if (!empty($this->viewData['content'])) {

            if($this->viewData['content']->post_type == 'page') {
                return view('pages.page', $this->viewData);
            } else {
                return view('pages.index', $this->viewData);
            }

        } else return abort(404);

    }

}
