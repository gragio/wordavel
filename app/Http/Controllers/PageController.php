<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services;
use App\Post;
use App\Page;

class PageController extends Controller
{

    public function page($page = null) {

        $viewData = [];

        if(!empty($_GET['preview_id']) || !empty($_GET['page_id']) || !empty($_GET['p']))
            return $this->getPreview($_GET['preview_id'].$_GET['p'].$_GET['page_id']);

        // case index
        if(empty($page)) {
            $homeID = get_option('page_on_front');
            if(!empty($homeID)) {
                $viewData['obj'] = Page::where('ID', $homeID)->first();
                $viewData['meta'] = $viewData['obj']->getMeta();
            }
            return view('pages.index', $viewData);
        }

        $viewData['obj'] = Page::slug($page)->published()->first();
        $viewData['view'] = 'pages.page';

        if($viewData['obj']->slug != $page) {
            header( "HTTP/1.1 301 Moved Permanently" );
            header( "location: ".$viewData['obj']->link() );
        }
        //$setPost($viewData['obj']);
        if($viewData['obj'] instanceof Page) {
            $viewData['meta'] = $viewData['obj']->getMeta();
            $template = $viewData['obj']->template();
        }

        return ViewUtility::render($viewData);

    }

}
