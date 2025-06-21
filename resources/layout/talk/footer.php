<?php if ($_SERVER['REQUEST_URI'] == '/talk/feed/'): ?>
    <script src="/resources/js/post.js"></script>
    <script src="/resources/js/reply/feed.js"></script>
<?php endif ?>
<script src="/resources/js/like.js"></script>
<script src="/resources/js/theme.js"></script>
<?php if (str_starts_with($_SERVER['REQUEST_URI'], '/talk/exchange/show/')): ?>
    <script src="/resources/js/message/reaction.js"></script>
<?php endif ?>
<script src="/resources/js/draw.js"></script>