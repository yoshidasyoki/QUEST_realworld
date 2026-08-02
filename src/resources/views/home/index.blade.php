@extends('layout')
@section('title', 'RealWorld')

@section('content')
    <header class="bg-theme-color text-white text-lg py-8 text-center">
        <h1>conduit</h1>
        <p>A place to share your knowledge.</p>
    </header>

    <main class="mx-auto max-w-5xl">
        <div class="grid grid-cols-12 gap-6 py-10">
            {{-- 投稿一覧 --}}
            <section class="col-span-9">
                {{-- 切り替えボタン --}}
                <nav class="px-6 py-3 border-b border-gray-200">
                    <ul class="flex gap-6 text-lg">
                        <li><a href=""
                                class="text-theme-color font-bold hover:border-b-2 hover:border-theme-color">Your
                                Feed</a>
                        </li>
                        <li><a href=""
                                class="text-theme-color font-bold hover:border-b-2 hover:border-theme-color">Global
                                Feed</a>
                        </li>
                    </ul>
                </nav>

                {{-- 記事の表示 --}}
                <div>
                    <article class="pt-12 text-sub-color border-t border-gray-200">
                        <h2 class="text-xl text-heading-color font-bold">How to build webapps that scale</h2>
                        <p>This is the description for the post.</p>

                        <div class="py-5 flex justify-between">
                            <span class="text-xs">Read more...</span>
                            <div class="flex gap-3">
                                <span class="text-xs border border-gray-300 px-2.5 py-0.3 rounded-2xl">realworld</span>
                                <span
                                    class="text-xs border border-gray-300 px-2.5 py-0.3 rounded-2xl">implementations</span>
                            </div>
                        </div>
                    </article>

                    <article class="pt-12 text-sub-color border-t border-gray-200">
                        <h2 class="text-xl text-heading-color font-bold">The song you won't ever stop singing. No matter
                            how hard you try.</h2>
                        <p>This is the description for the post.</p>

                        <div class="py-5 flex justify-between">
                            <span class="text-xs">Read more...</span>
                            <div class="flex gap-3">
                                <x-tag tag="realworld" />
                                <x-tag tag="implementations" />
                            </div>
                        </div>
                    </article>
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
