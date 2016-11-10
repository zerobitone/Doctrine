<article>
    <header>
        <h1><?php echo $article->getTitle(); ?></h1>
    </header>

    <div class="text">
        <?php echo nl2br($article->getNews()); ?>
    </div>

    <div class="links">
        [ <a
            href="index.php?action=edit&amp;id=<?php echo $article->getId();
            ?>"
        >Edit</a> ]
        [ <a
            href="index.php?action=delete&amp;id=<?php echo
            $article->getId(); ?>"
        >Delete</a> ]
    </div>

    <footer>
        Erstellt am
        <time datetime="<?php echo
        $article->getCreatedAt()->format('Y-m-d\TH:i:s'); ?>">
            <?php echo $article->getCreatedAt()->format('d.m.Y H:i'); ?>
        </time>
        von <?php echo $article->getUser(); ?>
        <br/>
        Tags:
        <?php foreach ($article->getTags() as $tag): ?>
            <a
                href="index.php?controller=tag&amp;action=read&amp;id=<?php
                echo $tag->getId(); ?>"
            ><?php echo $tag; ?></a>
        <?php endforeach; ?>
    </footer>