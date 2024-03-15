const openLinks = (lien) => {
  window.open(lien, "_blank");
};

const changePage = (lien) => {
  const inputs = document.querySelectorAll("input");
  inputs.forEach((input) => {
    input.checked = false;
  });
  window.location.href = lien;
};
