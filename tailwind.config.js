/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors') 
module.exports = {
  content: [
    "./resources/**/*.blade.php",
  ],
  mode: 'jit',
  theme: {
    extend: {
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      green: {
        50: '#25D500',
      100:  '#25D500',
      400: '#25D500',
      500: '#25D500',
      600: '#25D500',
      700: '#25D500',
      800: '#25D500',
      900: '#25D500',
      },
      red:{
        400: '#F60018',
        500: '#F60018',
      },
      blue: {
        100: '#0D56A6',
      },
      black: '#1b1b1b',
      gray: '#d9d9d9',
    },
  },
  },
  pagination: theme => ({
    // Customize the color only. (optional)
    color: theme('colors.teal.600'),

    // Customize styling using @apply. (optional)
    wrapper: 'flex justify-center list-reset',

    // Customize styling using CSS-in-JS. (optional)
    wrapper: {
        'display': 'flex',
        'justify-items': 'center',
        '@apply list-reset': {},
    },
}),
  plugins: [
    require('@tailwindcss/forms'),
    
  ],
}

