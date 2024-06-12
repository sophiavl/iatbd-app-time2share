/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue"
    ],
    theme: {
        extend: {
            borderWidth: {
                "1": "1px"
            },
            width: {
                "30": "7.5rem"
            }
        },
        colors: {
            accent: "#77C288",
            section: "#D0E1D4",
            bgcolor: "#F8FFFB",
            text: "#1E1E1E",
            section2: "#DEE8E0",
            grey: "#5B5B5B"
        }
    },
    plugins: []
};
