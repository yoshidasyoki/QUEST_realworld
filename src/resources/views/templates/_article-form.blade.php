<main class="mx-auto max-w-3xl">
    <div class="py-16">
        <x-message></x-message>
        @if ($errors->any())
            <ul class="mb-4 ml-4 text-error list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action={{ route($action, $params ?? null) }} class="flex flex-col gap-4 text-sub-color" method="POST">
            @csrf
            @if (isset($method))
                @method($method)
            @endif

            <input type="text" name="title" id="title" value="{{ old('title', $article->title ?? null) }}"
                placeholder="Article Title" class="border border-gray-300 rounded py-2 px-4 w-full">
            <input type="text" name="meta_description" id="meta_description"
                value="{{ old('meta_description', $article->meta_description ?? null) }}"
                placeholder="What's this article about?" class="border border-gray-300 rounded py-2 px-4 w-full">
            <textarea name="body" id="body" placeholder="Write your article"
                class="border border-gray-300 rounded py-2 px-4 w-full h-40">{{ old('body', $article->body ?? null) }}</textarea>

            <section>
                <p class="text-lg">Please check the applicable tags.</p>
                <div class="flex flex-wrap gap-x-4 gap-y-1 px-6 py-2 text-sm">
                    @foreach ($tags as $tag)
                        <div>
                            <input class="cursor-pointer" type="checkbox" id="{{ $tag->id }}" name="tags[]"
                                value="{{ $tag->id }}" @checked(in_array($tag->id, old('tags', isset($article) ? $article->tags->pluck('id')->toArray() : [])))>
                            <label class="cursor-pointer" for="{{ $tag->id }}">{{ $tag->name }}</label>
                        </div>
                    @endforeach
                </div>
            </section>

            <div class="justify-end flex w-full">
                <x-button type="submit" buttonText="{{ $buttonText }}"
                    class="bg-theme-color-400 text-white hover:bg-theme-color-700" />
            </div>

        </form>
    </div>
</main>
