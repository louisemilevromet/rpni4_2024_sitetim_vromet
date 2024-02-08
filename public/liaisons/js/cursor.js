const cursorDot = document.querySelector(".cursor-dot");
const cursorOutline = document.querySelector(".cursor-outline");
const a = document.querySelectorAll("a");

console.log(a, "ici");

const cursor = (e) => {
  const posX = e.clientX;
  const posY = e.clientY;

  if (cursorDot && cursorOutline) {
    cursorDot.style.left = `${posX}px`;
    cursorDot.style.top = `${posY}px`;

    cursorOutline.animate(
      {
        left: `${posX}px`,
        top: `${posY}px`,
      },
      { duration: 300, fill: "forwards" }
    );
  }
};

a.forEach((links) => {
  links.addEventListener("mouseover", () => {
    cursorDot.classList.add("cursor-dot-hover");
    cursorOutline.classList.add("cursor-outline-hover");
    cursorDot.style.animation = "none";
    cursorOutline.style.animation = "none";
  });
  links.addEventListener("mouseleave", () => {
    cursorDot.classList.remove("cursor-dot-hover");
    cursorOutline.classList.remove("cursor-outline-hover");
  });
});

window.addEventListener("mousemove", cursor);
