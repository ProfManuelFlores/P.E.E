/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {},
    colors:{
      'primary-color': '#FF671F',
      'secondary-color': '#693f23',
      'terciary-color': '#BCBCBC'
    }
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

