<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services;
use App\Page;

class PageController extends Controller
{

    public function page($page = null) {

        $viewData = [];

        if(empty($page))
            return $this->index();

        $viewData['obj'] = Page::slug($page)->published()->first();

        if(empty($viewData['obj']))
            return abort(404);

        $viewData['view'] = 'pages.page';

        if($viewData['obj']->slug != $page) {
            header( "HTTP/1.1 301 Moved Permanently" );
            header( "location: ".$viewData['obj']->link() );
        }

        if(env('APP_ENV') == 'local' && $viewData['obj'] instanceof Page) {
            $viewData['meta'] = $viewData['obj']->getMeta();
        }

        if(!empty($_GET['preview_id']))
            return ViewUtility::getPreview($viewData);

        return ViewUtility::render($viewData);

    }

    private function index() {

        $viewData = ['view' => 'pages.index'];
        $homeID = get_option('page_on_front');

        if(!empty($homeID)) {

            $viewData['obj'] = Page::where('ID', $homeID)->first();

            if(env('APP_ENV') == 'local') {
                $viewData['meta'] = $viewData['obj']->getMeta();
            }

            if(!empty($_GET['preview_id']))
                return ViewUtility::getPreview($viewData);

        }

        return ViewUtility::render($viewData);
    }

}
