<form action="index.php?controller=tag&action=<?php echo $action; ?>" method="post">

    <input
        name="id" type="hidden"
        value="<?php echo $tag->getId(); ?>"
    />

    <label for="title">Title*</label>
    <input
        name="title" id="title" type="text" maxlength="25"
        value="<?php echo $tag->getTitle(); ?>"
    />

    <input type="submit" class="button" value="Abschicken"/>

</form>

<ul>
    <?php foreach ($tags as $tag): ?>
        <li>
            <a href="index.php?controller=tag&action=edit&id=<?php echo $tag->getID(); ?>">
                <?php echo $tag ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>