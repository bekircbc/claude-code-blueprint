<?php

use App\Kernel;

require_dirname(__DIR__).'/vendor/autoload.runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};