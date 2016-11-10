<?php
require_once 'inc/bootstrap.inc.php';

$article = $em
    ->getRepository('Entities\Article')
    ->find(1);
$user = $article->getUser();

?>
    Klasse: <?php echo get_class($user); ?>
    <br/>
    Elternklasse: <?php echo get_parent_class($user); ?>
    <br/>

<?php if ($user instanceof Entities\User): ?>
    $user ist eine Instanz der Elternklasse Entities\User.
<?php endif; ?>