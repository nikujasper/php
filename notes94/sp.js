var classObject = {
  "B.Tech CS": {
    "Maths": ["Maths1", "Maths2", "Maths3", "Maths4"],
    "Automata": ["Automata1", "Automata2", "Automata3", "Automata4"],
    "Java": ["Java1", "Java2", "Java3", "Java4"]
  },
  "B.Tech Ele": {
    "Signal Sys": ["Signal Sys1", "Signal Sys2", "Signal Sys3"],
    "Micro-processor": ["Micro-processor1", "Micro-processor2", "Micro-processor3"]
  }
}
window.onload = function() {
  var classSel = document.getElementById("class");
  var subjectSel = document.getElementById("subject");
  var topicSel = document.getElementById("topic");
  for (var x in classObject) {
    classSel.options[classSel.options.length] = new Option(x, x);
  }
  classSel.onchange = function() {
    //empty topics- and subjects- dropdowns
    topicSel.length = 1;
    subjectSel.length = 1;
    //display correct values
    for (var y in classObject[this.value]) {
      subjectSel.options[subjectSel.options.length] = new Option(y, y);
    }
  }
  subjectSel.onchange = function() {
    //empty topics dropdown
    topicSel.length = 1;
    //display correct values
    var z = classObject[classSel.value][this.value];
    for (var i = 0; i < z.length; i++) {
      topicSel.options[topicSel.options.length] = new Option(z[i], z[i]);
    }
  }
}