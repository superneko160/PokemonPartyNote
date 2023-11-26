<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => 'inline-flex items-center px-2 py-1 
    bg-green-400 border border-transparent rounded-md font-semibold 
    text-xs text-white uppercase tracking-widest hover:bg-green-300 
    focus:bg-green-300 active:bg-green-500 focus:outline-none 
    focus:ring-2 focus:ring-green-300 focus:ring-offset-2 
    transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
