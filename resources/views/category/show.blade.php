@extends('layouts.app')

@section('title')
	Category | {{$category->name}}
@stop

@section('content')
	{{var_dump($category)}}
@stop