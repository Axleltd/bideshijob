@extends('layouts.app')

@section('title')
Homepage
@stop

@section('content') 
	<h1>Frontent Page</h1>	
	{{dd($company->toArray())}}
@stop