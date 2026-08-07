@extends('layout')
@section('title', 'sign in')

@include('templates._auth-form', [
    'headerTitle' => 'Sign in',
    'subText' => 'Need an account?',
    'action' => 'user.store',
    'isCreateUser' => true,
    'buttonText' => 'Sign in',
])
