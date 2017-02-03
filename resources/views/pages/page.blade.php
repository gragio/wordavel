@extends('layouts.page')

@section('title', $obj['title'].' - ')

@section('main')

	<div align="center" class="clearfix">
		{!!$obj['content']!!}
	</div>

@stop
