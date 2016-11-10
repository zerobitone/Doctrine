<ul>
    <?php foreach ($tags as $tag): ?>
        <li>
            <a href="index.php?controller=tag&action=edit&id=<?php echo $tag->getID(); ?>">
                <?php echo $tag ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
