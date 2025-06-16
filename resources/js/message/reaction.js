const reactionsPlus = document.querySelectorAll(".reaction-plus");
const useReactionList = document.querySelectorAll(".use-reaction-list");
const reactionDialog = document.getElementById("reaction-dialog");

console.log(useReactionList);

function sleep(ms) {
  return new Promise((resolve) => setTimeout(resolve, ms));
}

reactionsPlus.forEach((reactionPlus) => {
  reactionPlus.addEventListener("click", () => {
    showReactions(
      reactionPlus.dataset.color,
      reactionPlus.dataset.text,
      reactionPlus.dataset.id
    );
    reactionDialog.showModal();
  });
});

useReactionList.forEach((reactionlist) => {

  reactionlist.querySelectorAll(".use-reaction").forEach((reaction) => {
    reaction.addEventListener("click", () => {

      deleteReaction(reaction.dataset.reactionId, reactionlist.dataset.exch);
      reaction.remove();

    })

  })

});

function showReactions(color, text, id) {
  data = JSON.parse(sessionStorage.getItem("reactions"));
  reactions = data.reactions
    .map(
      (reaction) =>
        `<li data-id="${reaction.id}" class="reaction flex items-center justify-center stroke-[1.5px] rounded-md max-w-16 max-h-16 w-fit h-fit p-2 bg-ms-${color} text-ms-${text} cursor-pointer" title="${reaction.name}">${reaction.emoji}</li>`
    )
    .join("");

  document.getElementById("reaction-list").innerHTML = reactions;

  document.querySelectorAll(".reaction").forEach((reactionAction) => {
    reactionAction.addEventListener("click", () => {
      reactionDialog.close();
      submitUseReaction(reactionAction.dataset.id, id);
    });
  });
}

function addReaction(reactionId, exchangeId) {
  const userReactionList = document.querySelector(`[data-exch="${exchangeId}"]`);
  const data = JSON.parse(sessionStorage.getItem("reactions"));

  const reaction = data.reactions.find(
    (reaction) => reaction.id === parseInt(reactionId, 10)
  );

  const alreadyExists = userReactionList.querySelector(
    `[data-reaction-id="${reaction.id}"]`
  );

  if (alreadyExists) {
    alreadyExists.remove();
    return;
  }

  const reactionDiv = document.createElement("div");
  reactionDiv.className =
    "use-reaction flex gap-1 stroke-[1.5px] p-2 dark:bg-ms-black bg-ms-white border border-ms-grey rounded-md";
  reactionDiv.setAttribute("data-reaction-id", reaction.id);
  reactionDiv.innerHTML = reaction.emoji;

  reactionDiv.addEventListener("click", function () {
    this.remove();
  });

  userReactionList.appendChild(reactionDiv);
  userReactionList.classList.remove("hidden");
}

function deleteReaction(reactionId, exchangeId) {
  deleteUseReaction(reactionId, exchangeId);
}

async function submitUseReaction(reactionId, exchangeId) {
  const res = await fetch("/api/message/reaction/store/", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body:
      "reactionId=" +
      encodeURIComponent(reactionId) +
      "&exchangeId=" +
      encodeURIComponent(exchangeId),
  });

  const result = await res.json();

  if (result.success) {
    await sleep(200);

    addReaction(reactionId, exchangeId);
  } else {
    alert("Une erreur c'est produit.");
  }
}

async function deleteUseReaction(reactionId, exchangeId) {
  const res = await fetch("/api/message/reaction/delete/", {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body:
      "reactionId=" +
      encodeURIComponent(reactionId) +
      "&exchangeId=" +
      encodeURIComponent(exchangeId),
  });

  const result = await res.json();

  if (result.success) {
    await sleep(200);

    deleteReaction(reactionId, exchangeId);
  } else {
    alert("Une erreur c'est produit.");
  }
}

async function loadReaction() {
  const res = await fetch("/api/message/reaction/");
  sessionStorage.setItem("reactions", JSON.stringify(await res.json()));
}

loadReaction();
