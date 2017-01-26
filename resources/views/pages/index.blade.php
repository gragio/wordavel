@extends('layouts.page')


@section('main')

	<div align="center" class="clearfix">
		Welcome to Wordavel
	</div>
	@foreach ( Post::type('post')->published()->get() as $article )
	<div>
		<a href="{{get_permalink($article->IS)}}"><h2>{{$article->title}}</h2></a>
		<p>{{$article->content}}</p>
	</div>
	@endforeach

@stop
