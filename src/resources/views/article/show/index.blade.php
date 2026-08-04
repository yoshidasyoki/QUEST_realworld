@extends('layout')
@section('title', 'Article')

@section('content')
    <article>
        <header class="flex bg-gray-800 text-white justify-center">
            <div class="flex flex-col gap-4 max-w-3xl py-4">
                <h1>{{ $article->title }}</h1>
                <div class="flex gap-5">
                    <a href={{ route('article.edit', $article->id) }}>
                        <button type="submit" class="text-sm text-gray-400 p-1 border border-gray-400 rounded cursor-pointer">Edit
                            Article</button>
                    </a>
                    <form action={{ route('article.destroy', $article->id) }} method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="text-sm text-red-600 p-1 border border-red-600 rounded cursor-pointer">Delete
                            Article</button>
                    </form>
                </div>
            </div>
        </header>

        <div class="flex flex-col gap-4 max-w-3xl py-6 mx-auto border-b border-gray-300">
            {{-- サブタイトル表示 --}}
            <section class="flex flex-col gap-2">
                <p class="text-gray-400">meta description :</p>
                <p>{{ $article->meta_description }}</p>
            </section>

            {{-- 本文表示 --}}
            <section class="flex flex-col gap-2">
                <p class="text-gray-400">body :</p>
                <p class="border border-gray-300 p-6 rounded-xl">{{ $article->body }}</p>
            </section>

            {{-- タグ表示 --}}
            <section class="flex flex-col gap-2 text-sub-color">
                <p class="text-gray-400">tags :</p>
                <div class="flex gap-2">
                    @foreach ($article->tags as $tag)
                        <x-tag tag="{{ $tag->name }}" />
                    @endforeach
                </div>
            </section>
        </div>

    </article>
@endsection
