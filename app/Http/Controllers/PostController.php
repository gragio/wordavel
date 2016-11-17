<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        $post = Post::where('ID', 1)->first();
        //$post->setMeta('titolo', 'poppa');
        var_dump($post->acf());
    }
}
