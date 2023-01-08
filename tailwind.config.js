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
                // brown
                // 'theme': {
                //     100: '#7c6765',
                //     200: '#755e5d',
                //     300: '#6c5452',
                //     400: '#674e4c',
                //     500: '#614746',
                //     600: '#5c4240',
                //     700: '#533735',
                //     800: '#4A2C2A',
                //     900: '#4B1B19',
                // },
                // dark blue
                // 'theme': {
                //     50: '#b5bed4',
                //     100: '#a6b1c6',
                //     200: '#919db4',
                //     300: '#7b8ca4',
                //     400: '#677890',
                //     500: '#536779',
                //     600: '#3e5367',
                //     700: '#2b4057',
                //     800: '#142e43',
                //     900: '#071d2f',
                // },
                // teal
                'theme': {
                    900: '#001419',
                    800: '#012129',
                    700: '#042f38',
                    600: '#0b3d48',
                    500: '#144b59',
                    400: '#1d5a69',
                    300: '#286a7b',
                    200: '#33798c',
                    100: '#3f899e',
                    50: '#5aaac1',
                },
                //purple
                // 'theme': {
                //     900: '#200132',
                //     800: '#32054a',
                //     700: '#430b62',
                //     600: '#55147a',
                //     500: '#671e93',
                //     400: '#7a29ab',
                //     300: '#8c35c4',
                //     200: '#9f41dc',
                //     100: '#a85de0',
                //     50: '#b176e2',
                // },
                /**
                 * #4A2C2A - Brown
                 * #3CACFF - Light Blue
                 */
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/line-clamp'),
    ],
    darkMode: 'class'
};
