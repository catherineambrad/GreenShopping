/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./assets/**/*.{css,html,js,php}",
        "./*.html",
        "./**/*.php"
    ],

    theme: {
        extend: {
            fontFamily: {
                'cera-pro': ['"Cera Pro"', 'sans-serif'],
            },
            container: {
                center: true,
                padding: '1rem',
            },
            maxWidth: {
                '1232': '1232px',
            },
        }
    },


    plugins:
        [],
}

