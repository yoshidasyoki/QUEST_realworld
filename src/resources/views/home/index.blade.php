@extends('layout')
@section('title', 'RealWorld')

@section('content')
    <x-message></x-message>

    <header class="bg-theme-color-400 text-white text-lg py-8 text-center">
        <h1>conduit</h1>
        <p>A place to share your knowledge.</p>
    </header>

    <main class="mx-auto max-w-5xl">
        <div class="grid grid-cols-12 items-start gap-6 py-10">
            {{-- 投稿一覧 --}}
            <section class="col-span-9">
                {{-- 切り替えボタン --}}
                <nav class="px-6 py-3 border-b border-gray-200">
                    <ul class="flex gap-6 text-lg">
                        <li><a href=""
                                class="text-theme-color-400 font-bold hover:border-b-2 hover:border-theme-color-400">Your
                                Feed</a>
                        </li>
                        <li><a href=""
                                class="text-theme-color-400 font-bold hover:border-b-2 hover:border-theme-color-400">Global
                                Feed</a>
                        </li>
                    </ul>
                </nav>

                {{-- 記事の表示 --}}
                <div class="mb-6">
                    @foreach ($articles as $article)
                        <article class="pt-12 text-sub-color border-t border-gray-200">
                            <h2 class="text-xl text-heading-color font-bold">
                                <a href={{ route('article.show', $article->id) }}>
                                    {{ $article->title }}
                                </a>
                            </h2>
                            <p>{{ $article->meta_description }}</p>

                            <div class="py-5 flex justify-between">
                                <span class="text-xs">Read more...</span>
                                <div class="flex gap-3">
                                    @foreach ($article->tags as $tag)
                                        <x-tag tag="{{ $tag->name }}" />
                                    @endforeach
                                </div>
                            </div>
                        </article>
                    @endforeach

                </div>
                <div class="justify-end flex w-full">
                    <a href={{ route('article.create') }}>
                        <x-button buttonText="Create Article"
                            class="bg-theme-color-400 text-white hover:bg-theme-color-700" />
                    </a>
                </div>
            </section>

            {{-- 人気ジャンル --}}
            <aside class="col-span-3 p-2 bg-gray-200 rounded-lg">
                <p>Popular Tags</p>
                <div class="flex py-2 flex-wrap gap-1">
                    <x-tag tag="programming" class="text-white bg-gray-500" />
                    <x-tag tag="javascript" class="text-white bg-gray-500" />
                    <x-tag tag="emberjs" class="text-white bg-gray-500" />
                    <x-tag tag="angularjs" class="text-white bg-gray-500" />
                    <x-tag tag="react" class="text-white bg-gray-500" />
                    <x-tag tag="mean" class="text-white bg-gray-500" />
                    <x-tag tag="node" class="text-white bg-gray-500" />
                    <x-tag tag="rails" class="text-white bg-gray-500" />
                </div>
            </aside>
        </div>
    </main>
@endsection
