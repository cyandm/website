/** @type {import('tailwindcss').Config} */

module.exports = {
  content: ["./**/*.{php,js}"],
  theme: {
    colors: {
      black: {
        1: "hsla(227, 44%, 6%, 1)",
        2: "#10121D",
        3: "#050507",
      },
      white: {
        1: "hsla(194, 100%, 96%, 1)",
        2: "hsla(194, 100%, 96%, 1)",
      },
      gray: {
        1: "hsla(0, 0%, 46%, 1)",
        2: "#A6B2B9",
        3: "#292626",
      },
      alert: {
        success: "#688b62",
        warning: "#ff6347",
        error: "#f2b463",
      },
      blue: {
        1: "#1dbacf",
        2: "#1dbacf",
      },
      cyn: {
        1: "#3DE2F2",
        // '2': '#1dbacf',
      },
    },
    extend: {},
  },
  plugins: [
    require("@tailwindcss/typography"),
    // ...
  ],
};
