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
      }
    },
  },
  plugins: [require("daisyui")],
  daisyui: {
    themes: [
      {
        mytheme: {
          primary: '#1f1f26',
          secondary: '#242531',
          neutral: '#b4b7be', // titre
          accent: '#525259' // paragraphe
        }
      }
    ]
  }
}
