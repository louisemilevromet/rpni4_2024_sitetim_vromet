const svgFinaux = document.getElementById("stages-finaux-svg");
const infoFinaux = document.getElementById("stages-finaux-info");
let estInvicibleFinaux = true;

svgFinaux.addEventListener("click", () => {
  if (estInvicibleFinaux) {
    svgFinaux.style.rotate = "180deg";
    infoFinaux.style.display = "flex";
    infoFinaux.style.flexDirection = "column";
    infoFinaux.style.gap = "1rem";
    estInvicibleFinaux = false;
  } else {
    svgFinaux.style.rotate = "0deg";
    infoFinaux.style.display = "none";
    estInvicibleFinaux = true;
  }
});

const svgAte = document.getElementById("stages-ate-svg");
const infoAte = document.getElementById("stages-ate-info");
let estInvicibleAte = true;

svgAte.addEventListener("click", () => {
  if (estInvicibleAte) {
    svgAte.style.rotate = "180deg";
    infoAte.style.display = "flex";
    infoAte.style.flexDirection = "column";
    infoAte.style.gap = "1rem";
    estInvicibleAte = false;
  } else {
    svgAte.style.rotate = "0deg";
    infoAte.style.display = "none";
    estInvicibleAte = true;
  }
});
