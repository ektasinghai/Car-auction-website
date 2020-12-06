function responsiveNav() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

function showRegister() {
  var x = document.getElementById("registerContainer");
  if (x.style.display === "none") {
    x.style.display = "block";
    x.scrollIntoView();
  } else {
    x.style.display = "none";


    window.scrollTo(0, 0);
  }
}

function showLogin() {
  var x = document.getElementById("registerContainer");
  var y = document.getElementById("loginForm");
  var z = document.getElementById("pageHeader");

  if (x.style.display === "none") {
    x.style.display = "block";

    x.scrollIntoView();   ///pahe header
  } else {
    x.style.display = "none";
      y.style.display = "block";
      z.style.display = "block";

    window.scrollTo(0, 0);
  }
}

function showNotification() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
  setTimeout(function(){window.location.href = "catologue.php";}, 3000);


}

function showNotification2() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
