import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

import colors from 'tailwindcss/colors'
import typography from '@tailwindcss/typography'


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
            colors: { 
                danger: colors.rose,
                primary: colors.green,
                success: colors.green,
                warning: colors.yellow,
                'pastel-green': '#daffd6', // pastel green
                'pastel-blue': '#cce7ff' // pastel blue
            }, 
        },
    },

    plugins: [forms],

    darkMode: 'class',


};


