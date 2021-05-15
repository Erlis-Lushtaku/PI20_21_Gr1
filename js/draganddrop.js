const fill = document.querySelector('.fill');
const empties = document.querySelectorAll('.empty');


fill.addEventListener('dragstart', dragStart); // the event that we listened here is called dragstart, dragStart is a function
fill.addEventListener('dragend', dragEnd);

// Loop through empty boxes and add listeners
for (const empty of empties) {
  empty.addEventListener('dragover', dragOver); // when we dragover the empty box we call a function called dragover
  empty.addEventListener('dragenter', dragEnter);
  empty.addEventListener('dragleave', dragLeave);
  empty.addEventListener('drop', dragDrop);
}

// Drag Functions

function dragStart() {
  console.log('start');
  this.className += ' hold'; // when we hold it, the class 'hold' is added, 'this' means the fill element that we grab
  setTimeout(() => (this.className = 'invisible'), 0); // => callback? this whole thing means that the pic will disappear from the first box after we drag it, if it wasnt for the setTimeout(() => it would disappear the moment we would click on it and we wouldnt have been able to pull it out of the box
}

function dragEnd() {
    console.log('end');
  this.className = 'fill'; // when we drag it a then let it go it doesnt dissappear, it goes back where it was
}

function dragOver(e) { // it prevents the default 
    console.log('over');
    e.preventDefault(); // e is response or call back for an event parameter, when we add e.preventDefault the last thing to show in console after we drop it lol is Drop
}

function dragEnter(e) {
    console.log('enter');
  e.preventDefault();
  this.className += ' hovered';
}
// when we enter it has the class of empty and hovered, but when we leave it goes back to just empty
function dragLeave() {
    console.log('leave');
  this.className = 'empty'; // it prevents the "hover"
}

function dragDrop() {
    console.log('drop');
  this.className = 'empty';
  this.append(fill); // append the fill element which we defined in the beginning and append it into the empty div
}