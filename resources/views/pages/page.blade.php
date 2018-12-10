@extends('layouts.page')

@section('title', ' - '.$content['title'])

@section('main')

	<div align="center" class="clearfix">
		{!!$content->content!!}
	</div>

@stop
