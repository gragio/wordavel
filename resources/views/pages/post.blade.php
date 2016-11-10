@extends('layouts.page')


@section('main')

	<div align="center" class="clearfix">
		{!!$content['content']!!}
	</div>
	<p>{{$content['post_date']}} - {{$content['author']['user_nicename']}}</p>

@stop
