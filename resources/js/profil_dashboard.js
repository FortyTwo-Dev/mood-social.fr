document.addEventListener("DOMContentLoaded", () => {
  const fileInput = document.getElementById("imageInput");
  const fileNameDiv = document.getElementById("fileName");
  const hiddenId = document.getElementById("hiddenId");
  const dropZone = document.getElementById("dropZone");
  const previewContainer = document.getElementById("previewContainer");
  const imagePreview = document.getElementById("imagePreview");
  function updateUIWithFile(file) {
    if (!file) return;
    fileNameDiv.textContent = "Fichier sélectionné :";
    fileNameDiv.classList.add("text-green-600");
    const reader = new FileReader();
    reader.onload = function (e) {
      imagePreview.src = e.target.result;
      previewContainer.classList.remove("hidden");
    };
    reader.readAsDataURL(file);
  }
  fileInput.addEventListener("change", function (e) {
    const file = e.target.files[0];
    updateUIWithFile(file);
  });
  ["dragenter", "dragover", "dragleave", "drop"].forEach((eventName) => {
    dropZone.addEventListener(eventName, (e) => {
      e.preventDefault();
      e.stopPropagation();
    });
  });
  ["dragenter", "dragover"].forEach((eventName) => {
    dropZone.classList.add("border-blue-400", "bg-blue-50");
  });
  ["dragleave", "drop"].forEach((eventName) => {
    dropZone.classList.remove("border-blue-400", "bg-blue-50");
  });
  dropZone.addEventListener("drop", (e) => {
    const files = e.dataTransfer.files;
    if (files.length > 0) {
      fileInput.files = files;
      const event = new Event("change", {
        bubbles: true,
      });
      fileInput.dispatchEvent(event);
    }
  });
});
