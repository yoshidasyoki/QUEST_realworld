@extends('layout')
@section('title', 'create')

@include('article._form', [
    'action' => 'article.store',
    'buttonText' => 'Publish Article',
])
