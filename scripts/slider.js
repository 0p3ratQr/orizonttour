document.addEventListener("DOMContentLoaded", () => {
  const sliderContainer = document.querySelector(".slider-container");
  const prevButton = document.querySelector(".slider-btn.prev");
  const nextButton = document.querySelector(".slider-btn.next");

  // Сколько блоков видны на экране
  const blocksPerView = 5;
  const totalBlocks = sliderContainer.children.length;
  const blockHeight = sliderContainer.children[0].offsetHeight + 10; // Высота блока + отступы
  const maxIndex = Math.ceil(totalBlocks / blocksPerView) - 1;

  let currentIndex = 0;

  const updateSlider = () => {
    const offset = -(currentIndex * blocksPerView * blockHeight);
    sliderContainer.style.transform = `translateY(${offset}px)`;
  };

  prevButton.addEventListener("click", () => {
    if (currentIndex > 0) {
      currentIndex--;
      updateSlider();
    }
  });

  nextButton.addEventListener("click", () => {
    if (currentIndex < maxIndex) {
      currentIndex++;
      updateSlider();
    }
  });

  // Начальная позиция
  updateSlider();
});
