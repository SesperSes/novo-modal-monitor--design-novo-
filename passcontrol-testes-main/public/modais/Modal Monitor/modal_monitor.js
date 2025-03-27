const buttonAbrir = document.querySelector(".open");
const modalContainer = document.querySelector(".modal-container");

buttonAbrir.addEventListener("click", () => {
    modalContainer.classList.add("show");
});
