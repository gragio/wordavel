<?php

namespace App\Http\Controllers;

class ViewUtility extends Controller
{

    public static function getPreview($viewData) {

        if(!is_user_logged_in() && $user = wp_get_current_user() || !array_intersect(['editor', 'administrator', 'author'], $user->roles))
            return abort(404);

        $viewData['obj'] = $viewData['obj']->revision->last();

        return view($viewData['view'], $viewData);
    }

    public static function render($viewData) {


        if (!empty($viewData['obj'])) {

            $template = $viewData['obj']->template();

            if(!empty($template) && View::exists('pages.'.$template))
                return view('pages.'.$template , $viewData);

        }

        if(!empty($viewData['view']))
            return view($viewData['view'], $viewData);

        return abort(404);

    }
}
