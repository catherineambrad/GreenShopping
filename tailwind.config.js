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
            colors: {
                'grey': '#727272',
                'dark-grey': '#3D3D3D'
            },
            boxShadow: {
                'custom': '0px 0px 20px 0px rgba(0, 0, 0, 0.06)',
            },
        }
    },


    plugins:
        [],
}

