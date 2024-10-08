import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],

    safelist: [
        {
            pattern: /bg-(red|yellow|green|blue|indigo|purple|pink|gray|slate|emerald|teal|cyan|rose|fuchsia|violet|amber|lime)-(100|200|300|400|500|600|700|800|900)|ring-(red|yellow|green|blue|indigo|purple|pink|gray|slate|emerald|teal|cyan|rose|fuchsia|violet|amber|lime)-(100|200|300|400|500|600|700|800|900)/,
            variants: ['hover', 'focus', 'active'], // This will include hover and other variants
        },
    ],
};
