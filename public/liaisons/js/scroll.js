const scroll = document.getElementById("scroll");
const main = document.querySelector("main");

scroll.addEventListener("click", () => {
  main.scrollIntoView({ behavior: "smooth" });
});
