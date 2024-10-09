/** @type {import('tailwindcss').Config} */
export default {
    content: ["./views/**/*.php"],

    theme: {
        extend: {
            fontFamily: {
                poppins: ['Poppins', 'sans-serif'],
            },
            colors: {
                'primary': {
                    300: '#F5D251',  // Variación más clara de #EFAE00
                    400: '#F1C729',  // Variación intermedia
                    500: '#EFAE00',  // Color base
                },

                'primary-light': 'rgba(239, 174, 0, 0.45)', // Color con opacidad
                'gray': '#F0F0F0', // Color con opacidad

                'secondary': {
                    300: '#58C236',  // Variación más clara de #2D8E00
                    400: '#3C9F14',  // Variación intermedia
                    500: '#2D8E00',  // Color base
                },
                'tertiary': {
                    300: '#FFFFFF',  // Variación más clara de #F0F0F0
                    400: '#F8F8F8',  // Variación intermedia
                    500: '#F0F0F0',  // Color base
                }
            },
        },
        container: {
            center: true,
            padding: '3rem',
        },
    },
    plugins: [],
}

