/** @type {import('tailwindcss').Config} */

module.exports = {
  content: ["./**/*.{php,js}"],
  theme: {
    colors: {
      'black': {
        '1': 'hsla(227, 44%, 6%, 1)',
        '2': '#151823',
      },
      'white': {
        '1': 'hsla(194, 100%, 96%, 1)',
        '2': 'hsla(194, 100%, 96%, 1)',
      },
      'gray': {
        '1': 'hsla(0, 0%, 46%, 1)',
        '2': '#767676',
        '3': '#292626',
      },
      'alert': {
        'success': '#688b62',
        'warning': '#ff6347',
        'error': '#f2b463',
      },
    },
    gradient: {
      blue_start: "#1dbacf",
      blue_end: "#0d8bff",
      blue_1: "",
    },
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
    // ...
  ],
}