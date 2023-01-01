<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-8 py-2 text-gray-100 bg-blue-600 dark:bg-blue-400 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-100 uppercase tracking-widest hover:bg-blue-500 dark:hover:bg-blue-300 focus:bg-blue-500 dark:focus:bg-white active:bg-blue-600 dark:active:bg-blue-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-blue-500 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
