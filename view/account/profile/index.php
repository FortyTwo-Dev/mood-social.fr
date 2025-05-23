<?php include($root . '/resources/layout/account/head.php'); ?>
<body class="text-black">

<div class="mx-4 min-h-screen max-w-screen-xl sm:mx-8 xl:mx-auto">
  <h1 class="border-b py-6 text-4xl font-semibold">Settings</h1>
  <div class="grid grid-cols-8 pt-3 sm:grid-cols-10">
    <div class="col-span-2 hidden sm:block">
      <ul>
        <a href="/account/accounts/show/index.php" class="mt-5 block cursor-pointer border-l-2 border-transparent px-2 py-2 font-semibold transition hover:border-l-blue-700 hover:text-blue-700">Accounts</a>
        <a href="/account/profile/show/index.php" class="mt-5 block cursor-pointer border-l-2 border-l-blue-700 px-2 py-2 font-semibold text-blue-700 transition hover:border-l-blue-700 hover:text-blue-700">Profile</a>
        <a href="/account/billing/show/index.php" class="mt-5 block cursor-pointer border-l-2 border-transparent px-2 py-2 font-semibold transition hover:border-l-blue-700 hover:text-blue-700">Billing</a>
        <a href="/account/notification/show/index.php" class="mt-5 block cursor-pointer border-l-2 border-transparent px-2 py-2 font-semibold transition hover:border-l-blue-700 hover:text-blue-700">Notification</a>
      </ul>
    </div>

    <div class="col-span-8 overflow-hidden rounded-xl sm:bg-white sm:px-8 sm:shadow">
      <div class="pt-6">
        <h2 class="text-2xl font-semibold">Profile</h2>
      </div>

      <hr class="mt-4 mb-8" />

      <div class="flex flex-col items-center gap-4">
        <div class="relative w-32 h-32">
          <div class="w-full h-full rounded-full bg-gray-300 flex items-center justify-center"></div>
          <button id="toggle-options" class="absolute bottom-1 right-1 bg-white rounded-full p-1 shadow hover:bg-gray-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                 stroke-linecap="round" stroke-linejoin="round"
                 class="text-gray-600">
              <path d="M21.174 6.812a1 1 0 0 0-3.986-3.987L3.842 16.174a2 2 0 0 0-.5.83l-1.321 4.352a.5.5 0 0 0 .623.622l4.353-1.32a2 2 0 0 0 .83-.497z"/>
              <path d="m15 5 4 4"/>
            </svg>
          </button>
        </div>

        <div id="options" class="w-full max-w-md mt-6 hidden">
          <div class="flex items-center justify-between px-8">
            <button id="btn-hat" class="bg-ms-<?= $mood['color'] ?> hover:underline text-ms-<?= $mood['text_color'] ?> font-bold py-2 px-4 rounded">Hat</button>
            <button id="btn-head" class="bg-ms-<?= $mood['color'] ?> hover:underline text-ms-<?= $mood['text_color'] ?> font-bold py-2 px-4 rounded">Head</button>
            <button id="btn-beard" class="bg-ms-<?= $mood['color'] ?> hover:underline text-ms-<?= $mood['text_color'] ?> font-bold py-2 px-4 rounded">Beard</button>
          </div>
        </div>
      </div>

      <div id="display-area" class="flex justify-center mt-6"></div>

      <hr class="mt-8 mb-4" />
      <div class="text-center"></div>
    </div>
  </div>
</div>


<!-- <script>

  document.addEventListener("DOMContentLoaded", function () {
  const toggleBtn = document.getElementById("toggle-options");
  const optionsContainer = document.getElementById("options");
  const displayArea = document.getElementById("display-area");
  
  <?= VariableToJS("hat1") . ToJson(base64_encode(file_get_contents($root . '/storage/customs/hat/study_hat.png'))) ?>;
  <?= VariableToJS("hat2") . ToJson(base64_encode(file_get_contents($root . '/storage/customs/hat/hard.png'))) ?>;
  <?= VariableToJS("hat3") . ToJson(base64_encode(file_get_contents($root . '/storage/customs/hat/chef.png'))) ?>;

  <?= VariableToJS("head1") . ToJson(base64_encode(file_get_contents($root . '/storage/customs/head/dog.png'))) ?>;
  <?= VariableToJS("head2") . ToJson(base64_encode(file_get_contents($root . '/storage/customs/head/panda.png'))) ?>;
  <?= VariableToJS("head3") . ToJson(base64_encode(file_get_contents($root . '/storage/customs/head/cat.png'))) ?>;

  <?= VariableToJS("beard1") . ToJson(base64_encode(file_get_contents($root . '/storage/customs/beard/barbe_noel.png'))) ?>;
  <?= VariableToJS("beard2") . ToJson(base64_encode(file_get_contents($root . '/storage/customs/beard/barbe_rue.png'))) ?>;
  <?= VariableToJS("beard3") . ToJson(base64_encode(file_get_contents($root . '/storage/customs/beard/moustache.png'))) ?>;

  



  const hatContent = `      
      <div class=" h-64 flex items-center justify-center gap-6 border-t border-b border-gray-300 border-dotted py-12 px-6 w-full max-w-3xl"> 
        <button class="text-gray-600 hover:text-black text-xl">&lt;</button>
          <div class="relative h-full flex flex-col justify-center items-center">
            <div class=" absolute h-20 w-20" style="top:-8px;">
              <img src="data:image/png;base64,${hat1}" alt="" />
            </div>
            <div class="w-20 h-20 bg-gray-300 rounded-full flex">
            </div> 
      </div>
        <button class="text-gray-600 hover:text-black text-xl">&gt;</button>
      </div>
  `;

  const headContent = `
      <div class=" h-64 flex items-center justify-center gap-6 border-t border-b border-gray-300 border-dotted py-12 px-6 w-full max-w-3xl"> 
        <button class="text-gray-600 hover:text-black text-xl">&lt;</button>
          <div class="relative h-full flex flex-col justify-center items-center">
            <div style="position: absolute; min-width: 110px; min-height: 110px;">
              <img src="data:image/png;base64,${head2}" alt="" />
            </div>
            <div class="w-20 h-20 bg-gray-300 rounded-full flex">
            </div> 
      </div>
        <button class="text-gray-600 hover:text-black text-xl">&gt;</button>
      </div>
  `;

  // const beardContent = `
  //     <div class=" h-64 flex items-center justify-center gap-6 border-t border-b border-gray-300 border-dotted py-12 px-6 w-full max-w-3xl"> 
  //       <button class="text-gray-600 hover:text-black text-xl">&lt;</button>
  //         <div class="relative h-full flex flex-col justify-center items-center">
  //           <div class=" absolute" style="top: 82px;">
  //             <img src="data:image/png;base64,${beard1}" alt=""/>
  //           </div>
  //           <div class="w-20 h-20 bg-gray-300 rounded-full flex">
  //           </div> 
  //     </div>
  //       <button class="text-gray-600 hover:text-black text-xl">&gt;</button>
  //     </div>
  // `;



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
    displayArea.innerHTML = beardContent;
  });
});

</script> -->
<script src="/resources/js/custom.js">
</script>
</body>
</html>
