function myFunction() {
  var x = document.getElementById("myLinks");
  
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

function switchPage() {
  var menu =  document.getElementById("myLinks");
  menu.style.display = "none";
};
