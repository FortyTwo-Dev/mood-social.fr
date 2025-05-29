const buttonAddFriend = document.getElementById('button-add-friend');
const friendDialog = document.getElementById("friend-dialog");
const friendInput = document.getElementById('friend');
const resultsList = friendDialog.querySelector('ul');

buttonAddFriend.addEventListener('click', () => {
    friendDialog.showModal();
    friendInput.focus();
});


// Détection de la saisie
friendInput.addEventListener('input', async () => {
    const query = friendInput.value.trim();

    if (query.length < 2) {
        resultsList.innerHTML = '';
        return;
    }

    const res = await fetch(`/api/friend/search/?q=${encodeURIComponent(query)}`);
    const data = await res.json();

    resultsList.innerHTML = '';

    if (!data.users) {
        const empty = document.createElement('li');
        empty.textContent = 'Aucun utilisateur trouvé';
        empty.className = 'text-center text-sm text-gray-500';
        resultsList.appendChild(empty);
        return;
    }

    data.users.forEach(user => {

        const li = document.createElement('li');
        li.className = `flex rounded-md hover:underline w-full p-2 items-center justify-between gap-4 border`;
        
        const p = document.createElement('p');
        p.textContent = user.username;

        const svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
        svg.setAttribute('class', 'stroke-[1.5px] add-friend-action cursor-pointer');
        svg.setAttribute('xmlns', 'http://www.w3.org/2000/svg');
        svg.setAttribute('width', '24');
        svg.setAttribute('height', '24');
        svg.setAttribute('viewBox', '0 0 24 24');
        svg.setAttribute('fill', 'none');
        svg.setAttribute('stroke', 'currentColor');
        svg.setAttribute('stroke-linecap', 'round');
        svg.setAttribute('stroke-linejoin', 'round');
        svg.innerHTML = `
            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
            <circle cx="9" cy="7" r="4"/>
            <line x1="19" x2="19" y1="8" y2="14"/>
            <line x1="22" x2="16" y1="11" y2="11"/>
        `;
        svg.dataset.userId = user.id;

        svg.addEventListener('click', async () => {
            await addFriend(user.id);
            svg.innerHTML = '<path d="m16 11 2 2 4-4"/><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/>';
            svg.setAttribute('class', 'stroke-green-500 stroke-2');
        });

        li.appendChild(p);
        li.appendChild(svg);
        resultsList.appendChild(li);
    });
});

async function addFriend(friendId) {
    const res = await fetch('/api/friend/store/', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ friend: friendId })
    });

    const data = await res.json();

    if (!data.success) {
        alert('Erreur lors de l’ajout de l’ami.');
    }
}