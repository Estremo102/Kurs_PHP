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
                    <progress class="topic-progress" data-src="<?= htmlspecialchars($t['src']) ?>" value="0" max="6"></progress>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
</aside>
<script>
    function animateProgress(progress, target, duration = 800) {
        if ((progress._target ?? progress.value) === target) return;
        progress._target = target;
        cancelAnimationFrame(progress._animId);
        const start = progress.value;
        const startTime = performance.now();
        function step(now) {
            const t = Math.min((now - startTime) / duration, 1);
            const eased = 1 - Math.pow(1 - t, 3);
            progress.value = start + (target - start) * eased;
            if (t < 1) progress._animId = requestAnimationFrame(step);
        }
        progress._animId = requestAnimationFrame(step);
    }

    function updateSidebarProgress(animate = true) {
        document.querySelectorAll('aside progress.topic-progress').forEach(progress => {
            let done = 0;
            for (let i = 1; i <= progress.max; i++) {
                if (localStorage.getItem(`${progress.dataset.src}_zadanie${i}`) === 'true') {
                    done++;
                }
            }
            progress.closest('li').classList.toggle('done', done === Number(progress.max));
            if (animate) {
                animateProgress(progress, done);
            } else {
                progress.value = done;
            }
        });
    }
    updateSidebarProgress(false);

    (function () {
        const aside = document.querySelector('aside');
        const active = aside.querySelector('li.active');
        if (active) {
            aside.scrollTop = active.offsetTop - aside.clientHeight / 2;
        }
    })();
</script>