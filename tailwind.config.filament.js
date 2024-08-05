import common from './tailwind.common.js'
import preset from './vendor/filament/filament/tailwind.config.preset'

module.exports = {
  presets: [preset],
  darkMode: 'class',
  theme: {
    fontSize: {
        xs: ['0.75rem','1rem'],
        sm: ['0.875rem','1.25rem'],
        base: ['1rem','1.375rem'],
        lg: ['1.125rem','1.5rem'],
        xl: ['1.25rem','1.625rem'],
        '2xl': ['1.5rem','2rem'],
        '3xl': ['1.875rem','2.25rem'],
        '4xl': ['2.25rem','2.5rem'],
        '5xl': ['3rem','normal'],
        '6xl': ['3.75rem','normal'],
        '7xl': ['4.5rem','normal'],
        '8xl': ['6rem','normal'],
        '9xl': ['8rem','normal'],
      },
      extend: {
        colors: {
          primary: common.colors.primary,
          secondary: common.colors.secondary,
          warning: common.colors.warning,
          success: common.colors.success,
          info: common.colors.info,
          error: common.colors.error,
          accent:common.colors.accent,
          'body-l': '#3F404D',
          'body-d': '#B8B6C0',
        },
      },
    },
    plugins: [require("sneat"), require('sneat/plugin')],

}
