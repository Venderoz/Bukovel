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
function updateButton({ menuElement, themeButtonElements, aElements, isDark }) {
  const newModeTogglerLogo = isDark
    ? "./public/assets/icons/light_mode.svg"
    : "./public/assets/icons/dark_mode.svg";
  const newBasketTogglerLogo = isDark
    ? "./public/assets/icons/light_shopping_basket.svg"
    : "./public/assets/icons/dark_shopping_basket.svg";
  const newAccountTogglerLogo = isDark
    ? "./public/assets/icons/light_account_circle.svg"
    : "./public/assets/icons/dark_account_circle.svg";
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

  aElements.forEach((a) => {
    switch (a.id) {
      case "shopping-basket-logo-box":
        a.innerHTML = `<img src="${newBasketTogglerLogo}" alt="">`;
        break;
      case "account-logo-box":
        a.innerHTML = `<img src="${newAccountTogglerLogo}" alt="">`;
        break;
      case "main-logo-box":
        a.innerHTML = `<img src="${newMainLogoToggler}" alt="">`;
        break;
      default:
        break;
    }
  });
}

//--------------------------------------------------------------------------
function updateThemeOnHtmlEl({ theme }) {
  document.querySelector("html").setAttribute("data-theme", theme);
}

const menuButton = document.getElementById("show-sidebar-btn");
const themeButtonArr = document.querySelectorAll("[data-theme-toggle]");
const aElementsArr = document.querySelectorAll("a");
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
  aElements: aElementsArr,
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
      aElements: aElementsArr,
      isDark: newTheme === "dark",
    });
    updateThemeOnHtmlEl({ theme: newTheme });

    currentThemeSetting = newTheme;
  });
});
