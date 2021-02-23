const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php'],

    theme: {
        extend: {
            backgroundImage: theme => ({
                'footer': "url('/images/footer/bg.jpg')",
            }),

            backgroundColor: theme => ({
               ...theme('colors'),
               'custom': '#f55d00',
               'primary': '#3490dc',
               'secondary': '#ffed4a',
               'danger': '#e3342f',
              }),

            width: {
                '123' : '30rem',
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        }
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
