@extends('layout')
@section('title', 'RealWorld')

@section('content')
    <x-message></x-message>

    <header class="w-4/5 mx-auto flex justify-between py-4 text-theme-color-700">
        @if (Auth::check())
            <p>Welcome, {{ Auth::user()->name }}!</p>
            <ul class="flex justify-end items-center gap-8 font-bold">
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="cursor-pointer">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <span>logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        @else
            <p>Welcome, guest!</p>
            <ul class="flex justify-end items-center gap-8 font-bold">
                <li>
                    <a href="{{ route('user.create') }}">
                        <i class="fa-regular fa-user"></i>
                        <span>create user</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('login') }}">
                        <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        <span>login</span>
                    </a>
                </li>
            </ul>
        @endif
    </header>

    {{-- ヒーロー部分 --}}
    <div class="bg-theme-color-400 text-white text-lg py-8 text-center">
        <h1>conduit</h1>
        <p>A place to share your knowledge.</p>
    </div>

    <main class="mx-auto max-w-5xl">
        <div class="grid grid-cols-12 items-start gap-6 py-10">
            {{-- 投稿一覧 --}}
            <section class="col-span-9">
                {{-- 切り替えボタン --}}
                <nav class="px-6 py-3 border-b border-gray-200">
                    <ul class="flex gap-6 text-lg">
                        <li>
                            <a href="{{ route('home', ['feed' => 'your']) }}" @class([
                                'text-theme-color-400',
                                'font-bold',
                                'border-b-2' => $feed === 'your',
                                'border-theme-color-400' => $feed === 'your',
                            ])>Your Feed</a>
                        </li>
                        <li>
                            <a href="{{ route('home', ['feed' => 'global']) }}" @class([
                                'text-theme-color-400',
                                'font-bold',
                                'border-b-2' => $feed === 'global',
                                'border-theme-color-400' => $feed === 'global',
                            ])>Global Feed</a>
                        </li>
                    </ul>
                </nav>

                {{-- 記事の表示 --}}
                <div class="mb-6">
                    @if ($articles->isEmpty())
                        <article class="p-4 text-sub-color border-t border-gray-200">
                            <p>Nothing Articles. Please post an article.</p>
                        </article>
                    @endif

                    @foreach ($articles as $article)
                        <article class="flex flex-col gap-2 pt-12 pb-4 text-sub-color border-t border-gray-200">
                            <div>
                                <h2 class="text-xl text-heading-color font-bold">
                                    <a href={{ route('article.show', $article->id) }}>
                                        {{ $article->title }}
                                    </a>
                                </h2>
                                <p>{{ $article->meta_description }}</p>
                            </div>

                            @if ($feed !== 'your')
                                <div class="text-sm">
                                    <i class="fa-solid fa-pencil"></i>
                                    <span>writer : {{ $article->user->name }}</span>
                                </div>
                            @endif

                            <div class="flex justify-between">
                                <span class="text-xs">Read more...</span>
                                <div class="flex gap-3">
                                    @foreach ($article->tags as $tag)
                                        <x-tag tag="{{ $tag->name }}" />
                                    @endforeach
                                </div>
                            </div>
                        </article>
                    @endforeach

                    <div class="py-8 flex justify-center">
                        {{ $articles->links() }}
                    </div>
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
