document.getElementById('theme-toggle').addEventListener('click', function() {
  toggleTheme()
});
  function toggleTheme() {
    
    const htmlElement = document.documentElement;
    const currentTheme = htmlElement.getAttribute('data-bs-theme');
    
    if (currentTheme === 'light') {
      htmlElement.setAttribute('data-bs-theme', 'dark');
      document.getElementById('theme-icon');
    } else {
      htmlElement.setAttribute('data-bs-theme', 'light');
      document.getElementById('theme-icon');
    }
  }
