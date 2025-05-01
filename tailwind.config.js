/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php", // ページネーション用に設定
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require("@tailwindcss/typography"), require("daisyui"),
  ],
}

