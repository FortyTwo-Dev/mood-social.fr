const captchaGenerate = document.getElementById("captcha-generate");
const captchaValidate = document.getElementById("captcha-validate");
const captchaSpin = document.getElementById("captcha-spin");
const captchaDialog = document.getElementById("captcha-dialog");

captchaGenerate.addEventListener("click", () => {
    captchaGenerate.classList.add("hidden");
    captchaSpin.classList.remove("hidden");
    loadCaptcha();
    captchaDialog.showModal();
    
});

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

async function loadCaptcha() {
    const res = await fetch('/api/captcha/generate/');
    const data = await res.json();
    console.log(data);
    
    $anwsers = data.options.map(opt =>
        `<li>
        <input class="hidden peer" type="radio" id="${opt}" name="answer" onclick="submitCaptcha('${opt}')">
        <label for="${opt}" class="relative py-2 px-4 flex items-center justify-center cursor-pointer peer-checked:ring-2 dark:peer-checked:ring-ms-white peer-checked:ring-ms-black bg-ms-grey font-medium text-white rounded-md">
        <span class="capitalize">${opt}</span>
        </label>
        </li>`
    ).join('');
    document.getElementById("answers-list").innerHTML = $anwsers
    document.getElementById("captcha-svg").innerHTML = data.svg;
    document.getElementById("captcha-question").innerHTML = data.question;
}

async function submitCaptcha(answer) {
    const res = await fetch('/api/captcha/validate/', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ answer })
    });
    const result = await res.json();
    if (result.success) {
        captchaValidate.checked = true;
        captchaDialog.close();
        await sleep(1500);
        captchaValidate.classList.remove('hidden')
        captchaSpin.classList.add('hidden')
    } else {
        alert('Mauvaise réponse, réessaie.');
        loadCaptcha();
    }
}