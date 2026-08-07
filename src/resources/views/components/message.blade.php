@if (session()->has('success') || session()->has('error'))
    <div class="fixed top-20 left-1/2 -translate-x-1/2 animate-fadeout">
        <div @class([
            'flex',
            'items-center',
            'justify-center',
            'border',
            'rounded',
            'gap-2',
            'px-4',
            'h-15',
            'border-green-400' => session()->has('success'),
            'border-red-500' => session()->has('error'),
            'bg-green-100' => session()->has('success'),
            'bg-red-100' => session()->has('error'),
        ])>
            @if (session()->has('success'))
                <i class="fa-solid fa-check text-green-600"></i>
                <p class="text-green-900 text-lg">{{ session()->get('success') }}</p>
            @elseif (session()->has('error'))
                <i class="fa-solid fa-xmark text-red-500"></i>
                <p class="text-red-700 text-lg">{{ session()->get('error') }}</p>
            @endif
        </div>
    </div>
@endif
