<button type="submit"
    {{ $attributes->merge([
        'class' => 'py-2 px-4 rounded cursor-pointer text-white bg-gray-400 hover:bg-gray-500',
    ]) }}>
    {{ $buttonText }}
</button>
