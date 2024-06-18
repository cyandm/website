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
        'success': 'rgba(#4caf50, 0.3)',
        'warning': ' rgba(#ff9800, 0.3)',
        'error': 'rgba(#ef5350, 0.3)',
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