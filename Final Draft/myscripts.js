var btns = document.getElementsByClassName("a");

for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function () {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

let browse = document.getElementById("addButton");

browse.addEventListener("click" , function(){
  document.getElementById("courseList").style.display = "block";
  document.getElementById("addMessage").style.display = "none";
  document.getElementById("addButton").style.display = "none";
});

