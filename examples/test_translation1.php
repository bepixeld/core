<?php

use atk4\core\Exception;
use atk4\core\Translator\Translator;
use atk4\data\Persistence;

require '../vendor/autoload.php';

try {
    Persistence::connect('error:error');
} catch (\Throwable $e) {
    /* @var $e Exception */
    echo $e->getColorfulText();
}

$trans = Translator::instance();
$trans->setDefaultLocale('ru');

try {
    Persistence::connect('error:error');
} catch (\Throwable $e) {
    /* @var $e Exception */
    echo $e->getColorfulText();
}
