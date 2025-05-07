import './bootstrap';

// Add dark mode toggle functionality 
window.toggleTheme = function() {
    // Get current theme
    const isDark = document.documentElement.classList.contains('dark');
    
    if (isDark) {
        // Switch to light mode
        document.documentElement.classList.remove('dark');
        localStorage.setItem('theme', 'light');
        console.log('Switched to light mode');
    } else {
        // Switch to dark mode
        document.documentElement.classList.add('dark');
        localStorage.setItem('theme', 'dark'); 
        console.log('Switched to dark mode');
    }
};
