/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            backgroundColor: {
                "custom-50": "#418363",
                "custom-51": "#F9F8F5",
                "custom-52": "#F6F6F6",
                "custom-100": "#5DA07F",
                "custom-101": "#DCEDDD",
                "custom-102": "#9CCA9E",
                "custom-103": "#D8DFD8",
                "custom-150": "#A4DEC4",
                "custom-200": "#418363",
                "custom-300": "#E7E7E7",
                "custom-400": "#5C9F7F",
                "custom-500": "#91C794",
                "custom-600": "#00AB98",
                "custom-700": "#F9F8F5",
                "custom-800": "#1f2937",
                "custom-900": "#111827",
                "custom-901": "#D8DFD8",
            },
            colors: {
                custom: "#418363", // Replace '#ff69b4' with your custom color code
            },
        },
    },
    plugins: [],
};
