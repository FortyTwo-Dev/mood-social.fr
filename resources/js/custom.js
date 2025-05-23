const toggleBtn = document.getElementById("toggle-options");
const optionsContainer = document.getElementById("options");
const displayArea = document.getElementById("display-area");

var beards = [];
var item = 0;

async function loadBeards() {
  const res = await fetch("/api/custom/beard/");
  const data = await res.json();
  data.images.map((img) => beards.push(img));
}

function showBeard(image) {
  const previousIndex = (item + 1) % beards.length;
  const nextIndex = (item - 1 + beards.length) % beards.length;
  beard = `
      <div class=" h-64 flex items-center justify-center gap-6 border-t border-b border-gray-300 border-dotted py-12 px-6 w-full max-w-3xl"> 
          <div class="relative h-full flex flex-col justify-center items-center">
            <div class=" absolute" style="top: 82px;">
              <img src="data:image/png;base64,${beards[previousIndex]}" alt=""/>
            </div>
             <div class="w-20 h-20rounded-full flex">
             </div> 
       </div>
       </div>
       <div class=" h-64 flex items-center justify-center gap-6 border-t border-b border-gray-300 border-dotted py-12 px-6 w-full max-w-3xl"> 
        <button id="beard-minus" class="text-gray-600 hover:text-black text-xl">&lt;</button>
          <div class="relative h-full flex flex-col justify-center items-center">
            <div class=" absolute" style="top: 82px;">
              <img src="data:image/png;base64,${image}" alt=""/>
            </div>
             <div class="w-20 h-20 bg-gray-300 rounded-full flex">
             </div> 
       </div>
         <button id="beard-plus" class="text-gray-600 hover:text-black text-xl">&gt;</button>
       </div><div class=" h-64 flex items-center justify-center gap-6 border-t border-b border-gray-300 border-dotted py-12 px-6 w-full max-w-3xl"> 
          <div class="relative h-full flex flex-col justify-center items-center">
            <div class=" absolute" style="top: 82px;">
              <img src="data:image/png;base64,${beards[nextIndex]}" alt=""/>
            </div>
             <div class="w-20 h-20 rounded-full flex">
             </div> 
       </div>
       </div>
  `;
  displayArea.innerHTML = beard;
}

toggleBtn.addEventListener("click", function () {
  const isHidden = optionsContainer.classList.contains("hidden");
  if (isHidden) {
    optionsContainer.classList.remove("hidden");
  } else {
    optionsContainer.classList.add("hidden");
    displayArea.innerHTML = "";
  }
});

document.getElementById("btn-hat").addEventListener("click", () => {
  displayArea.innerHTML = hatContent;
});
document.getElementById("btn-head").addEventListener("click", () => {
  displayArea.innerHTML = headContent;
});

document.getElementById("btn-beard").addEventListener("click", () => {
  showBeard(beards[item], beards[item + 1], beards[item + 2]);
});

displayArea.addEventListener("click", (event) => {
  if (event.target && event.target.id === "beard-minus") {
    item = item > 0 ? item - 1 : beards.length - 1;
    showBeard(beards[item]);
  }
  if (event.target && event.target.id === "beard-plus") {
    item = item < beards.length - 1 ? item + 1 : 0;
    showBeard(beards[item]);
  }
});
loadBeards();
