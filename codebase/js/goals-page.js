function openWeightModal() {
  document.getElementById("myWeightModal").style.display = "block";
  // Add the "show" class to animate the modal
  setTimeout(function () {
      document.getElementById("myWeightModal").querySelector('.weight-modal-content').classList.add('show');
  }, 10);
}

function openGainWeightModal() {
  document.getElementById("myGainWeightModal").style.display = "block";
  // Add the "show" class to animate the modal
  setTimeout(function () {
      document.getElementById("myGainWeightModal").querySelector('.gainweight-modal-content').classList.add('show');
  }, 10);
}

function closeWeightModal() {
  document.getElementById("myWeightModal").querySelector('.weight-modal-content').classList.remove('show');
  // Remove the "show" class to animate the modal
  setTimeout(function () {
      document.getElementById("myWeightModal").style.display = "none";
  }, 300); // Wait for the animation to finish
}

function closeGainWeightModal() {
  document.getElementById("myGainWeightModal").querySelector('.gainweight-modal-content').classList.remove('show');
  // Remove the "show" class to animate the modal
  setTimeout(function () {
      document.getElementById("myGainWeightModal").style.display = "none";
  }, 300); // Wait for the animation to finish
}


window.onclick = function (event) {
  if (event.target == document.getElementById("myWeightModal") || event.target == document.getElementById("myGainWeightModal")
  ) {
      closeWeightModal();
      closeGainWeightModal();
  }
}

$("#slider").roundSlider({
	radius: 72,
	circleShape: "half-top",
  sliderType: "min-range",
	mouseScrollAction: true,
  value: localStorage.getItem("weight"),
	handleSize: "+5",
	min: 30,  
	max: localStorage.getItem("weight")
});

$(".gain-slider").roundSlider({
	radius: 72,
	circleShape: "half-top",
  sliderType: "min-range",
	mouseScrollAction: true,
  value: localStorage.getItem("weight"),
	handleSize: "+5",
	min: localStorage.getItem("weight"),  
	max: 500
});


function handleGoal(){
  let weights = document.getElementsByClassName("rs-tooltip");
  let target_weight = weights[0].innerText;
  localStorage.setItem('target_weight', target_weight);
  window.location.href = 'progress.php';
}

function handleGainGoal(){
  let weights = document.getElementsByClassName("rs-tooltip");
  let target_weight = weights[1].innerText;
localStorage.setItem('target_weight', target_weight);
  window.location.href = 'progress.php';
}