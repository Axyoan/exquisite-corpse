
const canvas = document.querySelector(".drawing-canvas");

canvas.height = 750;
canvas.width = 1000;

const context = canvas.getContext('2d');

let pos = { x: 0, y: 0 };

context.lineWidth = 5;
context.lineCap = "round";
context.lineJoin = "round";

//EventListeners
canvas.addEventListener('mousedown', e => {
    context.beginPath();
    context.moveTo(pos.x, pos.y);
    canvas.addEventListener('mousemove', onPaint, false);
}, false);

canvas.addEventListener('mouseup', e => {
    canvas.removeEventListener('mousemove', onPaint, false);
}, false);

canvas.addEventListener('mouseout', e => {
    canvas.removeEventListener('mousemove', onPaint, false);
}, false);

canvas.addEventListener('mousemove', function (e) {
    pos.x = e.pageX - this.offsetLeft;
    pos.y = e.pageY - this.offsetTop;
}, false);

//functions

const onPaint = function () {
    context.lineTo(pos.x, pos.y);
    context.stroke();
}

const changeThickness = () => {
    context.lineWidth = Math.min(50, document.getElementById("thickness").value);
}

const changeColor = () => {
    context.strokeStyle = document.getElementById("color").value;
}