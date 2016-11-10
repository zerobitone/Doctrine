<form action="index.php?action=<?php echo $action; ?>" method="post">

    <input
        name="id" type="hidden"
        value="<?php echo $article->getId(); ?>"
    />

    <label for="title">Title*</label>
    <input
        name="title" id="title" type="text" maxlength="80"
        value="<?php echo $article->getTitle(); ?>"
    />

     <label for="tags">Tagging*</label>
     <select name="tag_ids[]" id="tags" multiple="multiple">
         <?php foreach ($tags as $tag): ?>
             <option value="<?php echo $tag->getId(); ?>"
                 <?php if ($article->hasTag($tag)): ?>
                    selected="selected"
                 <?php endif; ?>
             >
                 <?php echo $tag; ?>
             </option>
         <?php endforeach; ?>
     </select>

    <label for="teaser">Teaser*</label>
    <input
        name="teaser" id="teaser" type="text" maxlength="255"
        value="<?php echo $article->getTeaser(); ?>"
    />

    <label for="news">News*</label>

    <textarea
        name="news" id="news"><?php echo $article->getNews(); ?></textarea>

    <label for="publish_at">PublishAt</label>
    <input
        name="publish_at" id="publish_at" type="text"
        value="<?php echo $article->getPublishAt()->format('Y-m-d H:i:s');
        ?>"
    />

    <input type="submit" class="button" value="Abschicken"/>

</form>