<main class="flex justify-center mt-40">
    <x-message></x-message>

    <section class="w-sm flex flex-col gap-2">
        <div class="flex flex-col items-center gap-2">
            <h1>{{ $headerTitle }}</h1>
            <p class="text-theme-color-400">{{ $subText }}</p>
        </div>

        @if ($errors->any())
            <ul class="mb-4 ml-4 text-error list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route($action) }}" class="flex flex-col gap-3" method="POST">
            @csrf

            @if ($isCreateUser)
                <input type="text" placeholder="Nickname" name="name" value="{{ old('name') }}"
                    class="border border-gray-300 rounded py-2 px-4 w-full">
            @endif
            <input type="text" placeholder="Email" class="border border-gray-300 rounded py-2 px-4 w-full"
                name="email" value="{{ old('email') }}">
            <input type="password" placeholder="Password" class="border border-gray-300 rounded py-2 px-4 w-full"
                name="password">
            <div class="flex justify-end">
                <x-button buttonText="{{ $buttonText }}"
                    class="bg-theme-color-400 text-white hover:bg-theme-color-700 w-24" />
            </div>
        </form>
    </section>
</main>
