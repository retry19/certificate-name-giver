const optionSection = document.querySelector("#options").style;
const previewSection = document.querySelector("#preview").style;
let image = document.querySelector("#img-preview");
let canvas = document.querySelector("#canvas");
let ctx = canvas.getContext("2d");

let fontSize;
let cY;

const loadImage = (e) => {
  image.src = URL.createObjectURL(event.target.files[0]);
  image.onload = () => {
    URL.revokeObjectURL(image.src);
  };

  optionSection.display = "block";
  previewSection.display = "block";
};

const reloadCanvas = setInterval(() => {
  if (canvas.height != image.height) {
    image = document.querySelector("#img-preview");
    canvas.width = image.width;
    canvas.height = image.height;
    canvas.crossOrigin = "Anonymous";
    ctx.drawImage(image, 0, 0);
  }
}, 500);

const editCanvas = () => {
  fontSize = document.querySelector("#fsize").value;
  cY = document.querySelector("#y").value;

  ctx.clearRect(0, 0, canvas.width, canvas.height);
  ctx.drawImage(image, 0, 0);

  ctx.font = `${fontSize}pt Arial`;
  ctx.fillStyle = "black";
  ctx.fillText("Your Name", canvas.width / 2, (canvas.height / 100) * cY);
  ctx.textAlign = "center";
};
