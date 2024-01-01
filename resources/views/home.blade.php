@extends('layouts.app')

@section('title')
    Página de inicio
@endsection

@section('content')
   <x-list-post :posts="$posts" />
@endsection
