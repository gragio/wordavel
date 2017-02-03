@extends('layouts.page')

@section('title', $obj->title.' - ')

@section('main')

	<div align="center" class="clearfix">
		<h1>{{$obj->title}}</h1>
		<p style="margin-top: -20px" >{{$obj['post_date']}} - {{$obj->author['user_nicename']}}</p>
		{!!$obj->content!!}
	</div>
	@foreach ($obj->comments()->get() as $comment)
		<div>
			<h4>{{$comment->comment_author}}</h4>
			<p>{!!$comment->comment_content!!}</p>
		</div>
	@endforeach

@stop
