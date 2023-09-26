/** @type {import('tailwindcss').Config} */
module.exports = {
  //prefix: 'tw-', //REMOVE this
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    //"./resources/**/*.{blade.php,js,jsx,ts,tsx,vue}",
  ],
  theme: {
  /*
    colors: {
      'blue': '#1fb6ff',
      'purple': '#7e5bef',
      'pink': '#ff49db',
      'orange': '#ff7849',
      'green': '#13ce66',
      'yellow': '#ffc82c',
      'gray-dark': '#273444',
      'gray': '#8492a6',
      'gray-light': '#d3dce6',
    },
    fontFamily: {
      sans: ['Graphik', 'sans-serif'],
      serif: ['Merriweather', 'serif'],
    },
    */
    extend: {},
  },
  plugins: [],
}

