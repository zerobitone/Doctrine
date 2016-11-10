<?php // var_dump($tag); ?>

<h1><?php echo $tag->getTitle(); ?></h1>

<ol>
<?php foreach ($tag->getArticles() as $article) { ?>
    <li>
        <?php echo $article; ?>
    </li>
<?php } ?>
</ol>

