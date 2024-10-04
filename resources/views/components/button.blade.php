@props(['type' => null, 'route' => null])

<button
    {{ isset($action) ? $action : 'type="' . ($route ? 'button' : 'submit') . '"' }}
    {{ $attributes->merge([
        'class' => 'inline-flex items-center px-4 py-2 ' . $getButtonClass($type),
        'onclick' => $route ? "window.location.href='$route'" : '',
    ]) }}>
    {{ $slot }}
</button>
