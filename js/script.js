let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
} 

window.onscroll = () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
} 

const learnMoreButtons = document.querySelectorAll(".learn-more-button");
const popupContainer = document.getElementById("popupContainer");
const popups = popupContainer.querySelectorAll(".popup-card");

learnMoreButtons.forEach((button) => {
  button.addEventListener("click", (event) => {
    event.preventDefault();
    const popupId = button.getAttribute("data-popup");
    const popup = document.getElementById(popupId);
    popupContainer.style.display = "flex";
    popups.forEach((p) => {
      p.style.display = "none";
    });
    popup.style.display = "block";
  });
});

popupContainer.addEventListener("click", (event) => {
  if (event.target === popupContainer) {
    popupContainer.style.display = "none";
    popups.forEach((popup) => {
      popup.style.display = "none";
    });
  }
});



