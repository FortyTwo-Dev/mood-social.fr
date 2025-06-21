let canvas, ctx;
let color = "#000000";
let colors = {
  default: "#000000",
  yellow: "#FDCA40",
  red: "#DF2935",
  blue: "#8FADF3",
  purple: "#8B4E9A",
};
let isDrawing = false;
let currentX = 0;
let currentY = 0;

function isTabletDevice() {
  const userAgent = navigator.userAgent.toLowerCase();
  const screenWidth = window.screen.width;
  const screenHeight = window.screen.height;
  const minDimension = Math.min(screenWidth, screenHeight);
  const maxDimension = Math.max(screenWidth, screenHeight);

  const isTabletSize =
    (minDimension >= 768 && maxDimension <= 1366) ||
    (minDimension >= 600 && maxDimension >= 960 && maxDimension <= 1280);

  const isTabletUA =
    /ipad|android(?!.*mobile)|tablet|kindle|silk|playbook|bb10/i.test(
      userAgent
    );

  const hasTouchSupport =
    "ontouchstart" in window || navigator.maxTouchPoints > 0;

  return (isTabletSize || isTabletUA) && hasTouchSupport;
}

function initCanvas() {
  canvas = document.getElementById("drawing-canvas");
  ctx = canvas.getContext("2d");

  ctx.strokeStyle = colors[canvas.dataset.color];
  ctx.lineWidth = 2;
  ctx.lineCap = "round";
  ctx.lineJoin = "round";

  canvas.addEventListener("mousedown", startDrawing);
  canvas.addEventListener("mousemove", draw);
  canvas.addEventListener("mouseup", stopDrawing);
  canvas.addEventListener("mouseout", stopDrawing);

  canvas.addEventListener("touchstart", handleTouch);
  canvas.addEventListener("touchmove", handleTouch);
  canvas.addEventListener("touchend", stopDrawing);
}

function startDrawing(e) {
  isDrawing = true;
  const rect = canvas.getBoundingClientRect();
  currentX = e.clientX - rect.left;
  currentY = e.clientY - rect.top;
}

function draw(e) {
  if (!isDrawing) return;

  const rect = canvas.getBoundingClientRect();
  const x = e.clientX - rect.left;
  const y = e.clientY - rect.top;

  ctx.beginPath();
  ctx.moveTo(currentX, currentY);
  ctx.lineTo(x, y);
  ctx.stroke();

  currentX = x;
  currentY = y;
}

function stopDrawing() {
  isDrawing = false;
}

function handleTouch(e) {
  e.preventDefault();
  const touch = e.touches[0];
  const mouseEvent = new MouseEvent(
    e.type === "touchstart"
      ? "mousedown"
      : e.type === "touchmove"
      ? "mousemove"
      : "mouseup",
    {
      clientX: touch.clientX,
      clientY: touch.clientY,
    }
  );
  canvas.dispatchEvent(mouseEvent);
}

function clearCanvas() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  hidePreview();
}

function saveCanvas() {
  const dataURL = canvas.toDataURL("image/png");

  const preview = document.getElementById("drawing-preview");
  const previewContainer = document.getElementById("preview-container");

  preview.src = dataURL;
  previewContainer.classList.remove("hidden");

  canvas.toBlob(function (blob) {
    if (blob) {
      const file = new File([blob], "drawing.png", { type: "image/png" });

      try {
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        document.getElementById("drawing-data").files = dataTransfer.files;
        console.log("Dessin sauvegardé et prévisualisé !");
      } catch (error) {
        console.log(
          "DataTransfer non supporté, utilisation d'une méthode alternative"
        );
        const hiddenInput = document.getElementById("drawing-data-hidden");
        if (!hiddenInput) {
          const newInput = document.createElement("input");
          newInput.type = "hidden";
          newInput.name = "drawing_data";
          newInput.id = "drawing-data-hidden";
          newInput.value = dataURL;
          document.querySelector("form").appendChild(newInput);
        } else {
          hiddenInput.value = dataURL;
        }
        console.log("Dessin sauvegardé en base64 !");
      }
    }
  }, "image/png");
}

function hidePreview() {
  const previewContainer = document.getElementById("preview-container");
  previewContainer.classList.add("hidden");

  const fileInput = document.getElementById("drawing-data");
  fileInput.value = "";

  const hiddenInput = document.getElementById("drawing-data-hidden");
  if (hiddenInput) {
    hiddenInput.remove();
  }
}

function openModal() {
  const dialog = document.getElementById("post-dialog");
  dialog.showModal();

  if (isTabletDevice()) {
    const container = document.getElementById("drawing-container");
    container.classList.remove("hidden");
    initCanvas();
    console.log("Mode dessin activé automatiquement pour tablette");
  }
}

function closeModal() {
  const dialog = document.getElementById("post-dialog");
  dialog.close();
  hidePreview();
}
document.addEventListener("DOMContentLoaded", function () {
  const shareButton = document.getElementById("button-post");
  if (shareButton) {
    shareButton.addEventListener("click", openModal);
  }

  document
    .getElementById("post-dialog")
    .addEventListener("click", function (e) {
      if (e.target === this) {
        closeModal();
      }
    });

  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
      closeModal();
    }
  });

  document
    .getElementById("clear-canvas")
    .addEventListener("click", clearCanvas);

  document.getElementById("save-canvas").addEventListener("click", saveCanvas);

  document.querySelector("form").addEventListener("submit", function (e) {
    console.log(
      "Formulaire soumis avec dessin:",
      document.getElementById("drawing-data").files.length > 0 ? "Oui" : "Non"
    );
  });
});
