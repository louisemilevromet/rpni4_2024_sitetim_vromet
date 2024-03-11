window.addEventListener("resize", () => {
  if (window.innerWidth <= 500) {
    document.querySelector(".ul-nav").style.display = "none";
    document.querySelector(".hamburger").style.display = "block";
  } else {
    document.querySelector(".ul-nav").style.display = "flex";
    document.querySelector(".hamburger").style.display = "none";
  }
});
