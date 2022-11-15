const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {

    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/**/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans,],
                display: ["Inter", "san-serif"], tesla: ["TESLA"], kanit: ["Kanit"]
            },
            colors: {
                "light": '#fca311',
                "dark": '#14213d',
                "bgdark": '#14213d',
                "bglight": '#ffffff',
                "txtdark": '#ffffff',
                "txtlight": '#000000',
                "filldark": '#fca311',
                "filllight": '#fca311',
              }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('tailwindcss-textshadow')],
};
