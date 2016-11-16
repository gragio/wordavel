@extends('layouts.page')


@section('main')

	<div align="center" class="clearfix">
		<h1>{{$content['title']}}</h1>
		<p style="margin-top: -20px" >{{$content['post_date']}} - {{$content['author']['user_nicename']}}</p>
		{!!$content['content']!!}
	</div>
	@foreach ($content->comments()->get() as $comment)
		<div>
			<h4>{{$comment->comment_author}}</h4>
			<p>{!!$comment->comment_content!!}</p>
		</div>
	@endforeach

@stop