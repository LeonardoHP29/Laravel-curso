import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

document.addEventListener("DOMContentLoaded", () => {

  const html = document.documentElement;
  const themeMenu = document.getElementById("theme-menu");
  if(themeMenu){
    const icons = {
    light: document.getElementById("light-icon"),
    dark: document.getElementById("dark-icon"),
    system: document.getElementById("system-icon"),
  };

  const themeOptions = document.querySelectorAll("[data-theme-option]");
  const toggleThemeMenu = document.getElementById("toggle-theme-menu");

  const isDarkMode = window.matchMedia("(prefers-color-scheme: dark)");

  let currentTheme = localStorage.getItem("theme") || "system";

  updateTheme(currentTheme);
  updateThemeUI(currentTheme);

  function updateThemeUI(theme) {
    Object.entries(icons).forEach(([key, icon]) => {
      if (!icon) return;
      key === theme
        ? icon.classList.remove("hidden")
        : icon.classList.add("hidden");
    });

    themeMenu.classList.add("hidden");
    localStorage.setItem("theme", theme);
  }

  function updateTheme(theme) {
    if (theme === "dark" || (theme === "system" && isDarkMode.matches)) {
      html.classList.add("dark");
    } else {
      html.classList.remove("dark");
    }
    currentTheme = theme;
  }

  isDarkMode.addEventListener("change", ({ matches }) => {
    if (currentTheme === "system") {
      matches ? html.classList.add("dark") : html.classList.remove("dark");
    }
  });

  themeOptions.forEach(option => {
    option.addEventListener("click", () => {
      const theme = option.dataset.themeOption;
      updateThemeUI(theme);
      updateTheme(theme);
    });
  });

  toggleThemeMenu.addEventListener("click", () => {
    themeMenu.classList.toggle("hidden");
  });
  }

});
