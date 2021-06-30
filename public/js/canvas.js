
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

let thickness = document.getElementById('thickness');
thickness.addEventListener('input', (e) => {
    if (e.target.value > 50) thickness.value = 50;
    if (e.target.value < 1) thickness.value = 1;
})

let submit = document.getElementById('formCanvas');
if (submit) {
    submit.addEventListener('submit', e => {
        document.getElementById('png').value = canvas.toDataURL();
    })
}


// Drawing previous image
let prevCanvas = document.getElementById('prevCanvas');
let resCanvas = document.getElementById('result');
resCanvas.hidden = true;
if (prevCanvas) {
    prevCanvas.height = 100;
    prevCanvas.width = 1000;
    const prevContext = prevCanvas.getContext('2d');
    const prevPng = new Image;
    const src = document.getElementById('prevDrawing');
    prevPng.onload = function () {
        prevContext.drawImage(prevPng, 0, 650, prevCanvas.width, prevCanvas.height, 0, 0, prevCanvas.width, prevCanvas.height);
    };
    prevPng.src = src.value;
    //---------

    //Combine two images
    let submitEdit = document.getElementById('formEditCanvas');
    if (submitEdit) {
        console.log("works");
        resCanvas.height = 1500;
        resCanvas.width = 1000;
        const resContext = resCanvas.getContext('2d');
        var imageObj1 = new Image();
        var imageObj2 = new Image();

        imageObj1.src = src.value;
        submitEdit.addEventListener('submit', e => {
            e.preventDefault();
            resContext.drawImage(imageObj1, 0, 0, 1000, 750);
            imageObj2.src = canvas.toDataURL();
            imageObj2.onload = function () {
                resContext.drawImage(imageObj2, 0, 750, 1000, 750);
                document.getElementById('png').value = resCanvas.toDataURL();
                submitEdit.submit();
            }
        })
    }
}