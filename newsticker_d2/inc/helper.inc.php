<?php

function e($dirty, $encoding = 'UTF-8')
{
    echo htmlspecialchars(
        strip_tags($dirty),
        ENT_QUOTES | ENT_HTML5,
        $encoding
    );
}

function purify($dirty)
{
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
    echo $purifier->purify($dirty);
}
