@extends('layouts.page')


@section('main')

	<div align="center" class="clearfix">
		Welcome to Wordavel
	</div>
	@foreach ( $content as $article )
	<div>
		<a href="blog/{{$article->post_name}}"><h2>{{$article->post_title}}</h2></a>
		<p>{{$article->post_content}}</p>
	</div>
	@endforeach

@stop
