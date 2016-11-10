<?php // var_dump($articles); ?>

<?php foreach ($articles as $article): ?>
    <article>
        <header>
            <h1><?php echo $article->getTitle(); ?></h1>
        </header>

        <div class="teaser">
            <?php echo $article->getTeaser(); ?>
        </div>

        <div class="links">
             [
                <a href="index.php?action=read&amp;id=<?php echo $article->getId(); ?>">
                    Details
                </a>
             ]
             [
                <a href="index.php?action=edit&amp;id=<?php echo $article->getId(); ?>">
                    Edit
                </a>
             ]
             [
                <a href="index.php?action=delete&amp;id=<?php echo $article->getId(); ?>">
                    Delete
                </a>
             ]
             </div>


        <footer>
            Erstellt am
            <time datetime="<?php echo
            $article->getCreatedAt()->format('Y-m-d\TH:i:s'); ?>">
                <?php echo $article->getCreatedAt()->format('d.m.Y H:i'); ?>
            </time>
            von <?php echo $article->getUser(); ?>
            <br />
            Tags:
            <?php echo implode(' ', $article->getTags()->toArray()); ?>
        </footer>
    </article>
    <hr/>
<?php endforeach; ?>
