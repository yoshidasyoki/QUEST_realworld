@extends('layout')
@section('title', 'create')

@section('content')
    <main class="mx-auto max-w-3xl">
        <div class="py-4">
            <ul class="m-4 text-error list-disc list-inside">
                <li>That title is required</li>
            </ul>
            {{-- TODO：flex-colを用いて実装する --}}
            <form action="" class="flex flex-col gap-4">
                <input type="text" name="title" id="title" value="" placeholder="Article Title"
                    class="border border-gray-300 rounded py-2 px-4 w-full">
                <input type="text" name="subtitle" id="subtitle" value="" placeholder="What's this article about?"
                    class="border border-gray-300 rounded py-2 px-4 w-full">
                <textarea name="description" id="description" placeholder="Write your article"
                    class="border border-gray-300 rounded py-2 px-4 w-full h-40"></textarea>
                <div class="w-full">
                    <input type="text" name="tag" id="tag" value="" placeholder="Enter tags"
                        class="border border-gray-300 rounded py-2 px-4 w-full">
                    <x-tag tag="tag" class="text-white bg-gray-500" />
                </div>

                <div class="justify-end flex w-full">
                    <button type="submit" class="bg-theme-color text-white py-2 px-4 rounded cursor-pointer">Publish Article</button>
                </div>
            </form>
        </div>
    </main>
@endsection
