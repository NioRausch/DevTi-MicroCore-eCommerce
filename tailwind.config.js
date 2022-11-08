/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',

  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      "fontFamily" : {display: ["Inter", "san-serif"], tesla: ["TESLA"], kanit: ["Kanit"]},
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
  plugins: [  require('tailwindcss-textshadow') ],
}
