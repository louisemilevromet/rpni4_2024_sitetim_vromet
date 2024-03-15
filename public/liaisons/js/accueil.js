const profession = document.getElementById("profession-svg");
const infoProfession = document.getElementById("profession-info");
const divProf = document.getElementById("div-prof");
let estInvicibleProfession = true;

divProf.addEventListener("click", () => {
  if (estInvicibleProfession) {
    profession.style.rotate = "180deg";
    infoProfession.style.display = "flex";
    infoProfession.style.flexDirection = "column";
    infoProfession.style.gap = "1rem";
    estInvicibleProfession = false;
  } else {
    profession.style.rotate = "0deg";
    infoProfession.style.display = "none";
    estInvicibleProfession = true;
  }
});

const uni = document.getElementById("uni-svg");
const infoUni = document.getElementById("uni-info");
const divUni = document.getElementById("div-uni");
let estInvicibleUni = true;

divUni.addEventListener("click", () => {
  if (estInvicibleUni) {
    uni.style.rotate = "180deg";
    infoUni.style.display = "flex";
    infoUni.style.flexDirection = "column";
    infoUni.style.gap = "1rem";
    estInvicibleUni = false;
  } else {
    uni.style.rotate = "0deg";
    infoUni.style.display = "none";
    estInvicibleUni = true;
  }
});

const type = document.getElementById("type-svg");
const infoType = document.getElementById("type-info");
const divType = document.getElementById("div-type");
let estInvicibleType = true;

divType.addEventListener("click", () => {
  if (estInvicibleType) {
    type.style.rotate = "180deg";
    infoType.style.display = "flex";
    infoType.style.flexDirection = "column";
    infoType.style.gap = "1rem";
    estInvicibleType = false;
  } else {
    type.style.rotate = "0deg";
    infoType.style.display = "none";
    estInvicibleType = true;
  }
});
