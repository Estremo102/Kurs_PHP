<?php
$tematy = include __DIR__ . '/config/tematy.php';
$active = $_GET['src'] ?? '';
?>
<aside>
    <?php foreach ($tematy as $groupName => $links): ?>
        <h3><?= htmlspecialchars($groupName) ?></h3>
        <ul>
            <?php foreach ($links as $t): ?>
                <li class="<?= $active === $t['src'] ? 'active' : '' ?>">
                    <a href="index.php?title=<?= urlencode($t['title']) ?>&src=<?= urlencode($t['src']) ?>">
                        <?= htmlspecialchars($t['title']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
</aside>
<script>
    (function () {
        const aside = document.querySelector('aside');
        const active = aside.querySelector('li.active');
        if (active) {
            aside.scrollTop = active.offsetTop - aside.clientHeight / 2;
        }
    })();
</script>