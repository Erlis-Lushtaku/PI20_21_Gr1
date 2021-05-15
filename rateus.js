// grey track
let track = document.getElementById('track');
let context = track.getContext('2d');

context.beginPath();
context.arc(130, 130, 120, 1 * Math.PI, 0 * Math.PI, false);
context.lineWidth = 20;
context.strokeStyle = '#efefef';
context.lineCap = 'round';
context.stroke();

// gradient stroke
let maxScore = 10;

let progress = document.querySelector('#my-score');

progress.addEventListener('keyup', function() {

  const pre = document.getElementById('stroke').getContext('2d');
  pre.clearRect(0, 0, 300, 140);
    
  let myScore = progress.value;
  // let score = document.querySelector('#score').innerHTML;
  
  drawStroke(myScore, maxScore)
  
  document.querySelector('#score').innerHTML = myScore;
});

let drawStroke = function(value, max) {
      if (value <= maxScore) {
      // get the arc ending angle and its corresponding horizontal length based on score number
      let angle = 1 + (180 / max * value) / 180;
      let len = (180 / max * value) / 180 * 240;

      const c = document.getElementById('stroke');
      let ctx = c.getContext('2d');
      let x = 130;
      let y = 130;
      let radius = 120;
      let startAngle = 1 * Math.PI;
      let endAngle = angle * Math.PI;
      let counterClockwise = false;

      ctx.beginPath();
      ctx.arc(x, y, radius, startAngle, endAngle, counterClockwise);
      ctx.lineWidth = 20;
      ctx.lineCap = 'round';

      // dynamically apply gradient to the stroke
      let grad;
      if (value <= 5) {
        grad = ctx.createLinearGradient(0, 200, len, 0)
      } else if (value > 5) {
        grad = ctx.createLinearGradient(0, 200, len, 200)
      }
      grad.addColorStop(0, "#f3db52");
      grad.addColorStop(1, "#ee3f21");

      ctx.strokeStyle = grad;
      ctx.stroke();

    } else {
      value = 0;
    };

  };
  function myFunction() {
    var message, x;
    message = document.getElementById("p01");
    message.innerHTML = "";
    x = document.getElementById("my-score").value;
    try { 
      if(x == "")  throw "empty";
      if(isNaN(x)) throw "not a number";
      x = Number(x);
      if(x < 0)  throw "too low";
      if(x > 10)   throw "too high";
    }
    catch(err) {
      message.innerHTML = "Input is " + err;
    }
  }

Array.prototype.check=function(){

  for(var i=0;i<this.length;i++){
if(document.getElementById("my-score").value==parseInt(this[i])){

  alert("Thank you for your time!");
}

  }
}
function myfunc(){
var vlerat=["1","2","3","4","5","6","7","8","9","10"];
vlerat.check();
}




