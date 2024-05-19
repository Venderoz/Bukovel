function calculateSettingAsThemeString({
  localStorageTheme,
  systemSettingDark,
}) {
  if (localStorageTheme !== null) {
    return localStorageTheme;
  }

  if (systemSettingDark.matches) {
    return "dark";
  }

  return "light";
}

//-------------------------------------------------------------------------
function updateButton({ menuElement, themeButtonElements, mainLogo, isDark }) {
  const newModeTogglerLogo = isDark
    ? "./public/assets/icons/light_mode.svg"
    : "./public/assets/icons/dark_mode.svg";
  const newMainLogoToggler = isDark
    ? "./public/assets/white_bukovel_logo.svg"
    : "./public/assets/black_bukovel_logo.svg";
  const newMenuTogglerLogo = isDark
    ? "./public/assets/icons/light_menu.svg"
    : "./public/assets/icons/dark_menu.svg";

  menuElement.innerHTML = `<img src="${newMenuTogglerLogo}" alt="" id="theme-logo">`;

  themeButtonElements.forEach((button) => {
    button.innerHTML = `<img src="${newModeTogglerLogo}" alt="" id="theme-logo">`;
  });
  mainLogo.innerHTML = `<img src="${newMainLogoToggler}" alt="" id="theme-logo">`;
}

//--------------------------------------------------------------------------
function updateThemeOnHtmlEl({ theme }) {
  document.querySelector("html").setAttribute("data-theme", theme);
}

const menuButton = document.getElementById("show-sidebar-btn");
const themeButtonArr = document.querySelectorAll("[data-theme-toggle]");
const mainPageLogo = document.getElementById("main-logo-box");
const localStorageTheme = localStorage.getItem("theme");
const systemSettingDark = window.matchMedia("(prefers-color-scheme: dark)");

//----------------------------------------------------------------------------
let currentThemeSetting = calculateSettingAsThemeString({
  localStorageTheme,
  systemSettingDark,
});

updateButton({
  menuElement: menuButton,
  themeButtonElements: themeButtonArr,
  mainLogo: mainPageLogo,
  isDark: currentThemeSetting === "dark",
});
updateThemeOnHtmlEl({ theme: currentThemeSetting });

//-----------------------------------------------------------------------------
themeButtonArr.forEach((button) => {
  button.addEventListener("click", (event) => {
    const newTheme = currentThemeSetting === "dark" ? "light" : "dark";

    localStorage.setItem("theme", newTheme);
    updateButton({
      menuElement: menuButton,
      themeButtonElements: themeButtonArr,
      mainLogo: mainPageLogo,
      isDark: newTheme === "dark",
    });
    updateThemeOnHtmlEl({ theme: newTheme });

    currentThemeSetting = newTheme;
  });
});
