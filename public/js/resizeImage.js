const img = document.getElementById("image");

window.onload = function () {
    console.log("hi");
    img.style.height = `${window.innerHeight}px`;
    img.style.width = `${(1000 * window.innerHeight) / 1500}px`;
}

document.getElementById("size25").addEventListener('click', e => {
    img.style.width = '250px';
    img.style.height = '375px';
});

document.getElementById("size50").addEventListener('click', e => {
    img.style.width = '500px';
    img.style.height = '750px';
});

document.getElementById("size75").addEventListener('click', e => {
    img.style.width = '750px';
    img.style.height = '1125px';
});

document.getElementById("size100").addEventListener('click', e => {
    img.style.width = '1000px';
    img.style.height = '1500px';
});

document.getElementById("sizeFit").addEventListener('click', e => {
    img.style.height = `${window.innerHeight}px`;
    img.style.width = `${(1000 * window.innerHeight) / 1500}px`;
})