
const iconUpDown =  document.querySelectorAll(".icon");
iconUpDown.forEach(icon => {
  icon.addEventListener("click", e => {
    icon.classList.toggle("icon-rotate")
    icon.parentElement.classList.toggle("open");
  })
})

