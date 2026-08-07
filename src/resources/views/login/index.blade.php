@extends('layout')
@section('title', 'login')

@include('templates._auth-form', [
    'headerTitle' => 'Sign up',
    'subText' => 'Already have an account?',
    'action' => 'login.auth',
    'isCreateUser' => false,
    'buttonText' => 'Sign up',
])
