const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Lato', ...defaultTheme.fontFamily.sans],
                'logo': ['Montserrat Subrayada', 'Lato', ...defaultTheme.fontFamily.sans]
            },
            colors: {
                'primary': colors.slate['700'],
                'danger': colors.red['400'],
                'light-gray': colors.slate['100'],
                'medium-gray': colors.slate['200'],
                'dark-gray': colors.slate['500'],
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/line-clamp')],
};
