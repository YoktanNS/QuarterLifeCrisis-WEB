/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                // Palet Utama Elegan
                beige: {
                    DEFAULT: '#F4F1EA', 
                    dark: '#E6E1D6',    
                },
                sage: {
                    light: '#A3B18A',   
                    DEFAULT: '#7A8B76', 
                    dark: '#586445',    
                },
                surface: '#FFFFFF',     
                ink: '#2C3524',         
            },
            fontFamily: {
                sans: ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'sans-serif'],
            }
        },
    },
    plugins: [
        // require('@tailwindcss/forms'), // Kita matikan dulu agar tidak error jika belum di-install
    ],
}