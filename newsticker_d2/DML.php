<meta charset="utf-8"><?php

require_once 'inc/bootstrap.inc.php'; // $em
//require_once 'src/Entities/Tag.php';

use Entities\Tag, Entities\Article, Entities\User;

$em->getConnection()->query('SET foreign_key_checks = 0;');
$em->getConnection()->query('TRUNCATE TABLE tags;');
$em->getConnection()->query('TRUNCATE TABLE users;');
$em->getConnection()->query('TRUNCATE TABLE articles;');
$em->getConnection()->query('SET foreign_key_checks = 1;');


/* User eintragen */
$user = new User(
    array(
        'email' => 'cord.maehlmann@posteo.de',
        'password' => 'sonstNehmeIchEinAnderes'
    )
);

/* Article eintragen */
$article = new Article(
    array(
        'title' => 'Neues von PHP 7',
        'teaser' => 'Type-Hinting für skalare Datentypen ...',
        'news' => 'Ab PHP 7 ...',
        'publish_at' => '2016-11-04'
    )
);

$user->addArticle($article);
$article->setUser($user);
$em->persist($user);
$em->persist($article);

/* User eintragen */
$user1 = new User(
    array(
        'email' => 'c.maehlmann@posteo.de',
        'password' => 'sonstNehmeIchEinAnderes'
    )
);

/* Article eintragen */
$article1 = new Article(
    array(
        'title' => 'Neues von PHP 8',
        'teaser' => 'Type-Hinting für skalare Datentypen ...',
        'news' => 'Ab PHP 7 ...',
        // 'publish_at' => '4.11.2016',
        'publish_at' => '2016-11-04'
    )
);

$user1->addArticle($article1); // Gegenseite
$article1->setUser($user1); // Eigentuemerseite
$em->persist($user1);
$em->persist($article1);













/* Tags eintragen */
$tag = new Tag(
    array('title' => 'PHP')
);
$em->persist($tag);

$tag = new Tag(
    array('title' => 'HTML')
);
$em->persist($tag);
$tag = new Tag(
    array('title' => 'CSS')
);
$em->persist($tag);
$tag = new Tag(
    array('title' => 'JavaScript')
);
$em->persist($tag);
$tag = new Tag(
    array('title' => 'MySQL')
);
$em->persist($tag);

$em->flush();

echo 'Die Datensätze wurden eingetragen.';

