import basePreset from '../../../../tailwind.config.filament.js'

export default {
    presets: [basePreset],
    content: [
        './app/Filament/Admin/**/*.php',
        './resources/views/filament/admin/**/*.blade.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './vendor/awcodes/filament-tiptap-editor/resources/**/*.blade.php',
        './vendor/bezhansalleh/filament-language-switch/resources/views/language-switch.blade.php',
    ],
}
