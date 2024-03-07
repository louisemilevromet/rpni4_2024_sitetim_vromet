const projets = document.querySelectorAll(".container-images__container");

projets.forEach((projet) => {
  projet.addEventListener("mouseover", (e) => {
    e.currentTarget.getElementsByTagName("div")[0].style.display = "flex";
    e.currentTarget.getElementsByTagName("img")[0].style.filter =
      "brightness(0.35)";
  });
  projet.addEventListener("mouseout", (e) => {
    e.currentTarget.getElementsByTagName("div")[0].style.display = "none";
    e.currentTarget.getElementsByTagName("img")[0].style.filter =
      "brightness(1)";
  });
});
