const buttonTheme = document.getElementById("toggle-theme-button");
const moon = document.getElementById("moon");
const sun = document.getElementById("sun");

buttonTheme.addEventListener("click", () => {
    document.documentElement.classList.toggle("dark");
    moon.classList.toggle("hidden");
    sun.classList.toggle("hidden");

    if (localStorage.theme === "dark") {
        localStorage.theme = "light";
    } else {
        localStorage.theme = "dark";
    }

});

if (localStorage.theme === "dark") {
    document.documentElement.classList.add("dark");
    moon.classList.add("hidden");
    sun.classList.remove("hidden");
    localStorage.theme = "dark";
} else {
    document.documentElement.classList.remove("dark");
    moon.classList.remove("hidden");
    sun.classList.add("hidden");
    localStorage.theme = "light";
}

document.documentElement.classList.toggle(
    "dark",
    localStorage.theme === "dark" ||
    (!("theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches),
);
