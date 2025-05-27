async function likeMessage(messageId, svgElement, color, likeNumberText) {
    const res = await fetch('/api/message/like/store/', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'id=' + encodeURIComponent(messageId)
    });

    const data = await res.json();

    if (data.success) {
        svgElement.classList.add('fill-ms-' + color);
        svgElement.setAttribute('data-like', 'true');

        const currentLikeCount = parseInt(likeNumberText.dataset.likenumber) || 0;
        const newLikeCount = currentLikeCount + 1;
        likeNumberText.dataset.likenumber = newLikeCount;
        likeNumberText.innerHTML = newLikeCount;
    } else {
        alert('Erreur lors du like');
    }
}

async function deleteLikeMessage(messageId, svgElement, color, likeNumberText) {
    const res = await fetch('/api/message/like/delete/index.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'id=' + encodeURIComponent(messageId)
    });

    const data = await res.json();

    if (data.success) {
        svgElement.classList.remove('fill-ms-' + color);
        svgElement.setAttribute('data-like', 'false');
        
        const currentLikeCount = parseInt(likeNumberText.dataset.likenumber) || 0;
        const newLikeCount = Math.max(currentLikeCount - 1, 0);
        likeNumberText.dataset.likenumber = newLikeCount;
        likeNumberText.innerHTML = newLikeCount;
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
            const likeNumberText = svg.parentElement.querySelector('.like-number-text');

            if (isLiked) {
                await deleteLikeMessage(messageId, svg, color, likeNumberText);
            } else {
                await likeMessage(messageId, svg, color, likeNumberText);
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initLikeButtons();
});