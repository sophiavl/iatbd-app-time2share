/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
    colors: {
      'accent': '#77C288',
      'section': '#D0E1D4',
      'background': '#EFEFEF',
      'text': '#1E1E1E',
    },
  },
  plugins: [],
}