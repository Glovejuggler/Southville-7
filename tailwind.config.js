const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'theme': {
                    100: '#7c6765',
                    200: '#755e5d',
                    300: '#6c5452',
                    400: '#674e4c',
                    500: '#614746',
                    600: '#5c4240',
                    700: '#533735',
                    800: '#4A2C2A',
                    900: '#4B1B19',
                },
                /**
                 * #4A2C2A - Brown
                 * #3CACFF - Light Blue
                 */
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
    darkMode: 'class'
};
