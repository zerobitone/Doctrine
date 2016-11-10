


<?php
echo 'test';
session_start();

var_dump($_SESSION);

require_once 'src/Entities/Tag.php';

use Entities\Tag;

$x = new Tag(['title' => 'HTML']);
var_dump($x);
echo $x;