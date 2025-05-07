/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class',
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './app/Filament/**/*.php',
    './resources/views/filament/**/*.blade.php',
    './vendor/filament/**/*.blade.php',
  ],
  theme: {
    extend: {
      colors: {
        danger: {
          DEFAULT: '#ff5a5a',
        },
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
};