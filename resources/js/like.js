async function likeMessage(messageId, svgElement, color) {
    const res = await fetch('/api/message/like/store/', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'id=' + encodeURIComponent(messageId)
    });

    const data = await res.json();

    if (data.success) {
        svgElement.classList.add('fill-ms-' + color);
        svgElement.setAttribute('data-like', 'true');
    } else {
        alert('Erreur lors du like');
    }
}

async function deleteLikeMessage(messageId, svgElement, color) {
    const res = await fetch('/api/message/like/delete/index.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'id=' + encodeURIComponent(messageId)
    });

    const data = await res.json();

    if (data.success) {
        svgElement.classList.remove('fill-ms-' + color);
        svgElement.setAttribute('data-like', 'false');
    } else {
        alert('Erreur lors du dislike');
    }
}

function initLikeButtons() {
    document.querySelectorAll('.like-action').forEach(svg => {
        svg.addEventListener('click', async () => {
            const messageId = svg.dataset.id;
            const color = svg.dataset.color;
            const isLiked = svg.getAttribute('data-like') === 'true';

            if (isLiked) {
                await deleteLikeMessage(messageId, svg, color);
            } else {
                await likeMessage(messageId, svg, color);
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initLikeButtons();
});