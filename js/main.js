const navItems = document.querySelector(".nav__items");
const navAbrirBtn = document.querySelector("#abrir__nav-btn");
const navCerrarBtn = document.querySelector("#cerrar__nav-btn");

const abrirNav = () => {
  navItems.style.display = "flex";
  navAbrirBtn.style.display = "none";
  navCerrarBtn.style.display = "inline-block";
};

const cerrarNav = () => {
  navItems.style.display = "none";
  navAbrirBtn.style.display = "inline-block";
  navCerrarBtn.style.display = "none";
};

navAbrirBtn.addEventListener("click", abrirNav);
navCerrarBtn.addEventListener("click", cerrarNav);
