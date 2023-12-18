module.exports = {
  darkMode: 'class', // ou 'media', selon votre préférence
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          50: "#fafaf9",
          100: "#f5f5f4",
          200: "#e7e5e4",
          300: "#d6d3d1",
          400: "#a8a29e",
          500: "#78716c",  // Teinte principale 'stone'
          600: "#57534e",
          700: "#44403c",
          800: "#292524",
          900: "#1c1917",
          950: "#0c0a09"
        }
        // Ajoutez d'autres couleurs personnalisées ici si nécessaire
      }
      // Étendez d'autres aspects du thème ici
    }
  },
  plugins: [
    require('flowbite/plugin')
  ]
};
