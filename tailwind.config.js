
const defaultTheme = require('tailwindcss/defaultTheme')
const flyonDefaultTheme = require('sneat/src/theming/themes')

export default {
    content: [
        "./resources/**/*.blade.php",
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/bezhansalleh/filament-language-switch/resources/views/language-switch.blade.php',
        './node_modules/sneat/dist/js/**/*.js',
    ],
    darkMode: 'class',
    theme: {
      extend: {
        fontFamily: {
          'sans': ['"Inter"', ...defaultTheme.fontFamily.sans],
        },
      },
    },
    plugins: [require("sneat"), require('sneat/plugin')],
    sneatui:{
      darkTheme:'dark',
      themes: [
      {
        light: {
          ...flyonDefaultTheme.light,
          'base-100': '#f4f5f9',
          '--card-bg': '255,255,255',
        },
      },
      {
        dark: {
          ...flyonDefaultTheme.dark,
          '--card-bg': '28, 32, 43',
        },
      }
    ]

    }
}
