@extends('layouts.page')

@section('title', 'Blog - ')

@section('main')

	<div align="center" class="clearfix">
		<h1>Blog</h1>
	</div>
	@foreach ( Post::type('post')->published()->get() as $article )
	<div>
		<a href="{{get_permalink($article->ID)}}"><h2>{{$article->title}}</h2></a>
		<p>{!!$article->content!!}</p>
	</div>
	@endforeach

@stop
