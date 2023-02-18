/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"

  ],
  theme: {
    extend: {
      backgroundImage: {
        'landing_page': "url('../../public/assets/image/landing_page_1.jpg')",
        'room_type': "url('../../public/assets/image/room_type2.jpg')",
      },
    },
  },
  plugins: [
    require('flowbite/plugin'),
    require("daisyui"),
  ],
}
