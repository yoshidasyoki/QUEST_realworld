@extends('layout')
@section('title', 'edit')

@include('templates._article-form', [
    'action' => 'article.update',
    'method' => 'PATCH',
    'params' => $article->id,
    'buttonText' => 'Update Article',
])
