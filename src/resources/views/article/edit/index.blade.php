@extends('layout')
@section('title', 'edit')

@include('article._form', [
    'action' => 'article.update',
    'method' => 'PATCH',
    'params' => $article->id,
    'buttonText' => 'Update Article',
])
