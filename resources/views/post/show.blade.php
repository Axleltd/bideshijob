@extends('layouts.app')

@section('title')
	{{$post->title}}
@stop

@section('content')
	{{var_dump($post)}}
@stop