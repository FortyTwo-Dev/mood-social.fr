<?php

if (!isset($root)) {
    $root = $_SERVER['DOCUMENT_ROOT'];
}

$page_title = "Messages de " . (isset($data['user']) ? htmlspecialchars($data['user']->username) : 'Utilisateur inconnu');
include($root . '/resources/layout/dashboard/head.php');
include_once($root . '/private/Actions/Routing/Route.php');
?>

<body class="w-screen h-screen overflow-hidden bg-ms-white">
    <?php include($root . '/resources/layout/dashboard/header.php'); ?>
    <main class="w-full h-full grid grid-cols-12">
        <?php include($root . '/resources/layout/dashboard/sidebar.php'); ?>
        
        <section class="col-span-10 mb-16 overflow-auto">
            
        <div class="p-4 border-b mx-2">
            <h1 class="text-2xl font-medium">Messages de <?= htmlspecialchars($data['user']->username ?? 'Utilisateur inconnu') ?></h1>
            <input
                type="text"
                id="search-post"
                placeholder="Rechercher un post..."
                class="mt-4 w-full p-2 border rounded-md"
                    />
                    <div class="flex gap-4 mt-2">
                        <label><input type="checkbox" id="filter-feed" checked> Messages du feed</label>
                        <label><input type="checkbox" id="filter-exchange" checked> Messages privé</label>
                    </div>
                </div>
                <ul class="p-4 flex flex-col gap-4" id="feed-posts-list">
            <?php foreach($data['feed_messages'] as $message): ?>
            <li class="border rounded-md p-4" data-type="feed">
                <p class="text-lg post-content"><?= htmlspecialchars($message->content) ?></p>
                <?php if (!empty($message->path)): ?>
                <img src="data:image/png;base64,<?=base64_encode(file_get_contents($root . '/storage/feed/' . $message->path))?>">
                <?php endif; ?>
                <span class="text-xs text-gray-500 block mt-2"><?= htmlspecialchars($message->created_at) ?></span>
                <form action="/public/dashboard/users/deletefeedmessage/index.php" method="POST" style="display:inline" onsubmit="return confirm('Supprimer ce message ?');">
                    <input type="hidden" name="message_id" value="<?= $message->id ?>">
                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm transition">Supprimer</button>       
                </form>
            </li>
    <?php endforeach; ?>

    <?php foreach($data['exchange_messages'] as $message): ?>
    <li class="border rounded-md p-4" data-type="exchange">
        <p class="text-lg post-content"><?= htmlspecialchars($message->content) ?></p>
        <?php if (!empty($message->path)): ?>
        <img src="data:image/png;base64,<?=base64_encode(file_get_contents($root . '/storage/exchange/' . $message->path))?>">
        <?php endif; ?>
        <span class="text-xs text-gray-500 block mt-2"><?= htmlspecialchars($message->created_at) ?></span>
    </li>
    <?php endforeach; ?>

    <?php if (empty($data['feed_messages']) && empty($data['exchange_messages'])): ?>
        <li>Aucun messages.</li>
    <?php endif; ?>
</ul>
        <script>
        const searchInput = document.getElementById('search-post');
        const filterFeed = document.getElementById('filter-feed');
        const filterExchange = document.getElementById('filter-exchange');
        const posts = document.querySelectorAll('#feed-posts-list li');

        function filterPosts() {
            const value = searchInput.value.toLowerCase();
            posts.forEach(post => {
                const content = post.querySelector('.post-content')?.textContent.toLowerCase() || '';
                const type = post.getAttribute('data-type');
                const showFeed = filterFeed.checked && type === 'feed';
                const showExchange = filterExchange.checked && type === 'exchange';
                const matchesType = showFeed || showExchange;
                const matchesSearch = content.includes(value);
                post.style.display = (matchesType && matchesSearch) ? '' : 'none';
            });
        }

        searchInput.addEventListener('input', filterPosts);
        filterFeed.addEventListener('change', filterPosts);
        filterExchange.addEventListener('change', filterPosts);
        </script>
        </body>
        </html>