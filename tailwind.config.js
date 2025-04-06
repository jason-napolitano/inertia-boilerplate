import forms from '@tailwindcss/forms'

/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class',
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './resources/views/**/*.blade.php',
    './storage/framework/views/*.php',
    './resources/vue/**/*.vue',
  ],

  theme: {
    extend: {
      // fontFamily: {
      //   sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      // },
    },
  },

  plugins: [forms],
}
