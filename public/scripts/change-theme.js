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
function updateButton({ themeButtonElements, aElements, isDark }) {
  const newModeTogglerLogo = isDark
    ? "./assets/icons/light_mode.svg"
    : "./assets/icons/dark_mode.svg";
  const newBasketTogglerLogo = isDark
    ? "./assets/icons/light_shopping_basket.svg"
    : "./assets/icons/dark_shopping_basket.svg";
  const newAccountTogglerLogo = isDark
    ? "./assets/icons/light_account_circle.svg"
    : "./assets/icons/dark_account_circle.svg";
  const newMainLogoToggler = isDark
    ? "./assets/white_bukovel_logo.svg"
    : "./assets/black_bukovel_logo.svg";

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
      themeButtonElements: themeButtonArr,
      aElements: aElementsArr,
      isDark: newTheme === "dark",
    });
    updateThemeOnHtmlEl({ theme: newTheme });

    currentThemeSetting = newTheme;
  });
});
