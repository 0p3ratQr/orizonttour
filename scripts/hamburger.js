document.addEventListener("DOMContentLoaded", () => {
  const hamburger = document.querySelector(".hamburger");
  const pagesContainer = document.querySelector(".pages-conteiner");

  hamburger.addEventListener("click", () => {
    pagesContainer.classList.toggle("active");
  });
});
