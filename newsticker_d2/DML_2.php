<meta charset="utf-8"><?php

require_once 'inc/bootstrap.inc.php'; // $em
//require_once 'src/Entities/Tag.php';

use Entities\Tag, Entities\Article, Entities\User;

$em->getConnection()->query('SET foreign_key_checks = 0;');
$em->getConnection()->query('TRUNCATE TABLE tags;');
$em->getConnection()->query('TRUNCATE TABLE users;');
$em->getConnection()->query('TRUNCATE TABLE articles;');
$em->getConnection()->query('TRUNCATE TABLE tagging;');
$em->getConnection()->query('SET foreign_key_checks = 1;');

/* Tags eintragen */
$tag = new Tag(
    array('title' => 'PHP')
);
$em->persist($tag);

$tag = new Tag(
    array('title' => 'HTML')
);
$em->persist($tag);

$em->flush();

/* Tag HTML und PHP holen */
$query = $em
    ->createQueryBuilder()
    ->select('t')
    ->from('Entities\Tag', 't')
    ->where('t.title = :title1 OR t.title = :title2')
    ->setParameters(array('title1' => 'HTML', 'title2' => 'PHP'))
    ->getQuery();
$tags = $query->getResult();

/* Article eintragen */
$article = new Article(
    array(
        'title' => 'Neues von PHP 7',
        'teaser' => 'Type-Hinting für skalare Datentypen ...',
        'news' => 'Ab PHP 7 ...',
        'publish_at' => '2016-11-04'
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
        'email' => 'cord.maehlmann@posteo.de',
        'password' => 'sonstNehmeIchEinAnderes'
    )
);

$user->addArticle($article);
$article->setUser($user);
$em->persist($user);

$em->flush();

?>
Die Datensätze wurden eingetragen.