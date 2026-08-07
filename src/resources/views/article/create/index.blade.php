@extends('layout')
@section('title', 'create')

@include('templates._article-form', [
    'action' => 'article.store',
    'buttonText' => 'Publish Article',
])
