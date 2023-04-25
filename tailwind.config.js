/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php", // tous les fichiers .php qui sont à la racine du projet
    "./global/*.php",
    "./page/*.php",
    "./page/**/*.php",
    "./components/*.php"
  ],
  theme: {
    extend: {
      fontFamily: {
        'korium': ['T1 Korium'],
        'poppins': ['Poppins'],
        'toxi': ['Toxigenesis'],
      },
      gridTemplateColumns: {
        // custom grille
        'layout': '300px 1fr',
        'post': '90px 1fr'
      },
      fontWeight: {
        'leger': 500
      },
      backgroundColor: {
        modal: 'rgba(0, 0, 0, 0.5)'
      },
      maxWidth: {
        web: '1920px'
      },
      fontFamily: {
        'toxigenesis' :['toxigenesis', 'sans-serif']
      }
    },
  },
  plugins: [require("daisyui")],
  daisyui: {
    themes: [
      {
        mytheme: {
          accent: '#1991FF',
          neutral: '#2a2b2f',
          primary: '#AFAFAF',
          secondary: 'white',
          lightgray: '#E9E9E9'
        }
      }
    ]
  }
}
