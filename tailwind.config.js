/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'selector',

    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./vendor/livewire/flux-pro/stubs/**/*.blade.php",
        "./vendor/livewire/flux/stubs/**/*.blade.php",
    ],
    theme: {
        fontFamily: {
            sans: ['Inter', 'sans-serif'],
        },
        extend: {},
    },
    plugins: [],
}

