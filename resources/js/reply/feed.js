var messages = document.querySelectorAll(".message");
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

messages.forEach(function (message) {
  const messageBox = message.querySelector(".message-box");
  const replyAction = message.querySelector(".reply");
  const replyInput = message.querySelector(".reply-input");
  const replyMessageList = message.querySelector(".reply-message-list");
  const animateSpin = message.querySelector('.animate-spin');

  replyAction.addEventListener("click", (e) => {
    messageBox.classList.toggle("rounded-t-md");
    messageBox.classList.toggle("rounded-md");

    replyMessageList.classList.toggle("hidden");

    replyInput.classList.toggle("hidden");

    showReplyMessage(message.dataset.id, replyMessageList, animateSpin);
  });
});


async function getReplyMessage(id) {
  const res = await fetch("/api/message/feed/reply/", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: "message_id=" + encodeURIComponent(id),
  });

  return await res.json();
}

async function showReplyMessage(id, element, loader) {
    var data;
    const now = Date.now();

    if (!JSON.parse(sessionStorage.getItem(id)) || now - JSON.parse(sessionStorage.getItem(id)).update_at > 10 * 60 * 1000) {
        data = await getReplyMessage(id)
        loader.classList.remove('hidden');

        const payload = {
            data: data,
            update_at: now
        }
    
        sessionStorage.setItem(id, JSON.stringify(payload));

        await sleep(700);
        loader.classList.add('hidden');

    } else {
        data = JSON.parse(sessionStorage.getItem(id)).data;
        update_at = JSON.parse(sessionStorage.getItem(id)).update_at;
        await sleep(300);
    }

    if (data.success) {
        if (data.messages.length > 0 ) {
            let replyMessages = data.messages.map( message =>
                `<div class="w-full flex flex-row mt-4 pt-4 border-t border-dotted reply-message">
                    <div class="bg-ms- h-6 w-6 p-8 rounded-full"></div>
                    <div class="max-w-full flex flex-col gap-2 pl-4 overflow-hidden">
                        <h2 class="text-lg font-medium hover:underline"><a href="/profil/show/?username=${message.username}">${message.username}</a></h2>
                        <p class="text-lg/8 break-words">${message.content}</p>
                    </div>
                </div>`
            ).join("");
        
            element.innerHTML = replyMessages;
        } else {
            element.innerHTML = 
            `<div class="w-full flex flex-row items-center justify-center mt-4 pt-4 border-t border-dotted reply-message">
                <div class="max-w-full flex flex-col items-center justify-center gap-2 pl-4 overflow-hidden">
                    <p class="text-lg/8 break-words">Aucun Message</p>
                </div>
            </div>`
        }
    }
}