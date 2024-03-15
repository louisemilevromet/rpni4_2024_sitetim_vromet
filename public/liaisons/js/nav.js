const hamburger = document.querySelector(".hamburger");
const openHamburger = document.querySelector(".openHamburger");
openHamburger.style.display = "none";

const closeHamburger = document.querySelector(".closeHamburger");
closeHamburger.style.display = "none";

const html = document.getElementsByTagName("html")[0];

if (window.innerWidth <= 650) {
  document.querySelector(".ul-nav").style.display = "none";
  document.querySelector(".hamburger").style.display = "block";
}

window.addEventListener("resize", () => {
  if (window.innerWidth <= 650) {
    document.querySelector(".ul-nav").style.display = "none";
    document.querySelector(".hamburger").style.display = "block";
  } else {
    document.querySelector(".ul-nav").style.display = "flex";
    document.querySelector(".hamburger").style.display = "none";
    openHamburger.style.display = "none";
    closeHamburger.style.display = "none";
    document.querySelector(".hero").style.backgroundColor = "";
    html.style.overflow = "auto";
  }
});

// Hamburger
hamburger.addEventListener("click", () => {
  if (openHamburger.style.display === "none") {
    document.getElementById("scroll").style.display = "none";
    openHamburger.style.display = "flex";
    document.querySelector(".hero").style.backgroundColor = "#000000";
    hamburger.style.display = "none";
    closeHamburger.style.display = "block";
    html.style.overflow = "hidden";
  } else {
    openHamburger.style.display = "none";
    document.querySelector(".hero").style.backgroundColor = "";
    html.style.overflow = "auto";
  }
});

closeHamburger.addEventListener("click", () => {
  if (closeHamburger.style.display === "block") {
    document.getElementById("scroll").style.display = "flex";
    closeHamburger.style.display = "none";
    openHamburger.style.display = "none";
    document.querySelector(".hero").style.backgroundColor = "";
    hamburger.style.display = "block";
    html.style.overflow = "auto";
  }
});
