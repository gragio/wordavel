@extends('layouts.page')

@section('title', $obj->title.' - ')

@section('main')

	<div align="center" class="clearfix">
		<h1>{{$obj->title}}</h1>
		{!!$obj->content!!}
	</div>

@stop
