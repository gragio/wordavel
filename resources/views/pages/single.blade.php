@extends('layouts.page')


@section('main')

	<div align="center" class="clearfix">
		<h1>{{$content['title']}}</h1>
		<p style="margin-top: -20px" >{{$content['post_date']}} - {{$content['author']['user_nicename']}}</p>
		{!!$content['content']!!}
	</div>

@stop
