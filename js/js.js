function toggleByClass(className, displayState){
  var elements = document.getElementsByClassName(className);

  for (var i = 0; i < elements.length; i++){
      elements[i].style.display = displayState;
  }
}

function toggleById(elementId, displayState){
var BANANA = document.getElementById(elementId);

if (!BANANA) {return;}
BANANA.style.display = displayState;
}


//toggle('float_form', 'block'); // Shows
toggle('float_form', 'none'); // hides
