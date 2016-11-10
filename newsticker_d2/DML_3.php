<meta charset="utf-8"><?php

require_once 'inc/bootstrap.inc.php'; // $em
//require_once 'src/Entities/Tag.php';

use Entities\Tag, Entities\Article, Entities\User;

$tag = new Tag(
    array('title' => 'CSS')
);
$em->persist($tag);

$em->flush();

/* Tag HTML und PHP holen */
$query = $em
    ->createQueryBuilder()
    ->select('t')
    ->from('Entities\Tag', 't')
    ->where('t.title = :title1 OR t.title = :title2')
    ->setParameters(array('title1' => 'HTML', 'title2' => 'CSS'))
    ->getQuery();
$tags = $query->getResult();

/* Article eintragen */
$article = new Article(
    array(
        'title' => 'Neues von PHP 8',
        'teaser' => 'Tolle neue Sachen ...',
        'news' => 'Ab PHP 8 ...',
        'publish_at' => '2016-11-11'
    )
);

foreach ($tags as $tag) {
    $tag->addArticle($article);
    $article->addTag($tag);
}

$em->persist($article);

/* User eintragen */
$user = new User(
    array(
        'email' => 'c.maehlmann@posteo.de',
        'password' => 'sonstNehmeIchEinAnderes'
    )
);

$user->addArticle($article);
$article->setUser($user);
$em->persist($user);

$em->flush();

?>
Die Datensätze wurden eingetragen.