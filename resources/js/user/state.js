let lastActivity = Date.now();
let inactiveState = 1;
let deconnectedState = 0;
let connectedState = 0;
let inactiveInterval = null;

function updateActivity() {
  lastActivity = Date.now();
}

window.addEventListener("mousemove", updateActivity);
window.addEventListener("keydown", updateActivity);
window.addEventListener("mousedown", updateActivity);
window.addEventListener("touchstart", updateActivity);

async function connected() {
  const res = await fetch("/api/user/connected/", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
  });

  const result = await res.json();

  if (result.success) {
    // console.log("connected");
    connectedState = 1;
  } else {
    // console.log("error - connected");
    deconnectedState = 1;
  }
}

async function inactive() {
  const res = await fetch("/api/user/inactive/", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
  });

  const result = await res.json();

  if (result.success) {
    // console.log("inactive");
  } else {
    // console.log("error - inactive");
  }
}

async function deconnected() {
  const res = await fetch("/api/user/deconnected/", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
  });

  const result = await res.json();

  if (result.success) {
    // console.log("deconnected");
    clearInterval(inactiveInterval);
    alert('Tu as été déconnecté pour inactivité prolongée.');
    location.reload();
  } else {
    // console.log("error - deconnected" + deconnectedState);
  }
}

setInterval(() => {
  const now = Date.now();
  const inactivityTime = now - lastActivity;

  if (!deconnectedState) {
    if (inactivityTime < 5000) {
        if (!connectedState) {
            connected();
            inactiveState = 1;
            connectedState = 1;
            clearInterval(inactiveInterval);
        }
    } else {
      if (inactiveState) {
        inactive();
        inactiveState = 0;
        connectedState = 0;

        if (!deconnectedState) {
            inactiveInterval = setInterval(() => {
              deconnected();
              deconnectedState = 1;
            }, 15 * 60 * 1000);
        }
      }
    }
  }
}, 5000);

// vérifier l'état de déconnexion et de connexion.
