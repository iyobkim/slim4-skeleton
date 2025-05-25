<?php

// Production environment

return function (array $settings): array {
    $settings['db']['database'] = 'slim_skeleton';

    // change to false in the production environment
    $settings['template_auto_refresh'] = false;

    return $settings;
};
