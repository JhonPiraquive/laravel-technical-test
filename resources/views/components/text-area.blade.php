@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge([
    'class' => $disabled
        ? 'border-none resize-none bg-gray-100 rounded-md shadow-sm mb-2'
        : 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm resize-none'
]) }}>{{ old($attributes->get('name'), $attributes->get('value')) }}</textarea>
