const toggleBtn = document.getElementById("toggle-options");
const optionsContainer = document.getElementById("options");
const displayArea = document.getElementById("display-area");

var beards = [];
var hats = [];
var heads = [];
var itembeard = 0;
var itemhat = 0;
var itemhead = 0;

async function LoadHat() {
  const res = await fetch("/api/custom/hat/");
  const data = await res.json();
  data.images.map((img) => hats.push(img));
}

async function LoadHead() {
  const res = await fetch("/api/custom/head/");
  const data = await res.json();
  data.images.map((img) => heads.push(img));
}

async function loadBeard() {
  const res = await fetch("/api/custom/beard/");
  const data = await res.json();
  data.images.map((img) => beards.push(img));
}

function showBeard(image) {
  const previousIndex = (itembeard + 1) % beards.length;
  const nextIndex = (itembeard - 1 + beards.length) % beards.length;
  beard = `
      <div class=" h-64 flex items-center justify-center gap-6 border-t border-b border-gray-300 border-dotted py-12 px-6 w-full max-w-3xl"> 
          <div class="relative h-full flex flex-col justify-center items-center">
            <div class=" absolute" style="top: 82px;">
              <img src="data:image/png;base64,${beards[previousIndex].image}" alt=""/>
            </div>
             <div class="w-20 h-20rounded-full flex">
             </div> 
       </div>
       </div>
       <div class=" h-64 flex items-center justify-center gap-6 border-t border-b border-gray-300 border-dotted py-12 px-6 w-full max-w-3xl"> 
        <button id="beard-minus" class="text-gray-600 hover:text-black text-xl">&lt;</button>
          <div class="relative h-full flex flex-col justify-center items-center">
            <div class=" absolute" style="top: 82px;">
              <img src="data:image/png;base64,${image.image}" alt=""/>
            </div>
             <div class="w-20 h-20 bg-gray-300 rounded-full flex">
             </div> 
       </div>
         <button id="beard-plus" class="text-gray-600 hover:text-black text-xl">&gt;</button>
       </div><div class=" h-64 flex items-center justify-center gap-6 border-t border-b border-gray-300 border-dotted py-12 px-6 w-full max-w-3xl"> 
          <div class="relative h-full flex flex-col justify-center items-center">
            <div class=" absolute" style="top: 82px;">
              <img src="data:image/png;base64,${beards[nextIndex].image}" alt=""/>
            </div>
             <div class="w-20 h-20 rounded-full flex">
             </div> 
       </div>
       </div>
  `;
  displayArea.innerHTML = beard;
}

function showHat(image) {
  const previousIndex = (itemhat + 1) % hats.length;
  const nextIndex = (itemhat - 1 + hats.length) % hats.length;
  hat = `
      <div class=" h-64 flex items-center justify-center gap-6 border-t border-b border-gray-300 border-dotted py-12 px-6 w-full max-w-3xl"> 
          <div class="relative h-full flex flex-col justify-center items-center">
            <div class=" absolute h-20 w-20" style="top:-8px;">
              <img src="data:image/png;base64,${hats[previousIndex].image}" alt=""/>
            </div>
             <div class="w-20 h-20rounded-full flex">
             </div> 
       </div>
       </div>
       <div class=" h-64 flex items-center justify-center gap-6 border-t border-b border-gray-300 border-dotted py-12 px-6 w-full max-w-3xl"> 
        <button id="hat-minus" class="text-gray-600 hover:text-black text-xl">&lt;</button>
          <div class="relative h-full flex flex-col justify-center items-center">
            <div class=" absolute h-20 w-20" style="top:-8px;">
              <img src="data:image/png;base64,${image.image}" alt=""/>
            </div>
             <div class="w-20 h-20 bg-gray-300 rounded-full flex">
             </div> 
       </div>
         <button id="hat-plus" class="text-gray-600 hover:text-black text-xl">&gt;</button>
       </div><div class=" h-64 flex items-center justify-center gap-6 border-t border-b border-gray-300 border-dotted py-12 px-6 w-full max-w-3xl"> 
          <div class="relative h-full flex flex-col justify-center items-center">
            <div class=" absolute h-20 w-20" style="top:-8px;">
              <img src="data:image/png;base64,${hats[nextIndex].image}" alt=""/>
            </div>
             <div class="w-20 h-20 rounded-full flex">
             </div> 
       </div>
       </div>
  `;
  displayArea.innerHTML = hat;
}

function showHead(image) {
  const previousIndex = (itemhead + 1) % heads.length;
  const nextIndex = (itemhead - 1 + heads.length) % heads.length;
  head = `
      <div class=" h-64 flex items-center justify-center gap-6 border-t border-b border-gray-300 border-dotted py-12 px-6 w-full max-w-3xl"> 
          <div class="relative h-full flex flex-col justify-center items-center">
            <div style="position: absolute; min-width: 110px; min-height: 110px;">
              <img src="data:image/png;base64,${heads[previousIndex].image}" alt=""/>
            </div>
             <div class="w-20 h-20rounded-full flex">
             </div> 
       </div>
       </div>
       <div class=" h-64 flex items-center justify-center gap-6 border-t border-b border-gray-300 border-dotted py-12 px-6 w-full max-w-3xl"> 
        <button id="head-minus" class="text-gray-600 hover:text-black text-xl">&lt;</button>
          <div class="relative h-full flex flex-col justify-center items-center">
            <div style=" position: absolute; min-width: 110px; min-height: 110px;">
              <img src="data:image/png;base64,${image.image}" alt=""/>
            </div>
             <div class="w-20 h-20 bg-gray-300 rounded-full flex">
             </div> 
       </div>
         <button id="head-plus" class="text-gray-600 hover:text-black text-xl">&gt;</button>
       </div><div class=" h-64 flex items-center justify-center gap-6 border-t border-b border-gray-300 border-dotted py-12 px-6 w-full max-w-3xl"> 
          <div class="relative h-full flex flex-col justify-center items-center">
            <div style=" position: absolute; min-width: 110px; min-height: 110px;">
              <img src="data:image/png;base64,${heads[nextIndex].image}" alt=""/>
            </div>
             <div class="w-20 h-20 rounded-full flex">
             </div> 
       </div>
       </div>
  `;
  displayArea.innerHTML = head;
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
  showHat(hats[itemhat], hats[itemhat + 1], hats[itemhat + 2]);
});

displayArea.addEventListener("click", (event) => {
  if (event.target && event.target.id === "hat-minus") {
    itemhat = itemhat > 0 ? itemhat - 1 : hats.length - 1;
    showHat(hats[itemhat]);
    document.getElementById("hat").value = hats[itemhat].id;
  }
  if (event.target && event.target.id === "hat-plus") {
    itemhat = itemhat < hats.length - 1 ? itemhat + 1 : 0;
    showHat(hats[itemhat]);
    document.getElementById("hat").value = hats[itemhat].id;
  }
});
LoadHat();

document.getElementById("btn-head").addEventListener("click", () => {
  showHead(heads[itemhead], heads[itemhead + 1], heads[itemhead + 2]);
});

displayArea.addEventListener("click", (event) => {
  if (event.target && event.target.id === "head-minus") {
    itemhead = itemhead > 0 ? itemhead - 1 : heads.length - 1;
    showHead(heads[itemhead]);
    document.getElementById("head").value = heads[itemhead].id;
    console.log(itemhead);
  }
  if (event.target && event.target.id === "head-plus") {
    itemhead = itemhead < heads.length - 1 ? itemhead + 1 : 0;
    showHead(heads[itemhead]);
    document.getElementById("head").value = heads[itemhead].id;
    console.log(itemhead);
  }
});
LoadHead();

document.getElementById("btn-beard").addEventListener("click", () => {
  showBeard(beards[itembeard], beards[itembeard + 1], beards[itembeard + 2]);
});
displayArea.addEventListener("click", (event) => {
  if (event.target && event.target.id === "beard-minus") {
    itembeard = itembeard > 0 ? itembeard - 1 : beards.length - 1;
    showBeard(beards[itembeard]);
    document.getElementById("beard").value = beards[itembeard].id;
  }
  if (event.target && event.target.id === "beard-plus") {
    itembeard = itembeard < beards.length - 1 ? itembeard + 1 : 0;
    showBeard(beards[itembeard]);
    document.getElementById("beard").value = beards[itembeard].id;
  }
});
loadBeard();
