@extends('layout')
@section('title', 'Article')

@section('content')
    <article>
        <header class="flex bg-gray-800 text-white justify-center">
            <div class="flex flex-col gap-4 max-w-3xl py-4">
                <h1>How to build webapps that scale</h1>
                <div class="flex gap-5">
                    <form action="">
                        <button type="submit" class="text-sm text-gray-400 p-1 border border-gray-400 rounded">Edit
                            Article</button>
                    </form>
                    <form action="">
                        <button type="submit" class="text-sm text-red-600 p-1 border border-red-600 rounded">Delete
                            Article</button>
                    </form>
                </div>
            </div>
        </header>

        <div class="flex flex-col gap-4 max-w-3xl py-6 mx-auto border-b border-gray-300">
            {{-- サブタイトル表示 --}}
            <div>
                <p>Web development technologies have evolved at an incredible clip over the past few years.</p>
            </div>

            {{-- 本文表示 --}}
            <div>
                <h2>Introducing RealWorld.</h2>
                <p>It's a great solution for learning how other frameworks work.</p>
            </div>

            {{-- タグ表示 --}}
            <div class="flex gap-2 text-sub-color">
                <x-tag tag="realworld" />
                <x-tag tag="implementations" />
            </div>
        </div>

    </article>
@endsection
