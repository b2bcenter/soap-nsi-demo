<?php

spl_autoload_register(function ($className) {
    $fileName = str_replace('\\', DIRECTORY_SEPARATOR , $className);
    include(__DIR__ . '/classes/' . $fileName . '.php');
});

const ACTION_CATEGORY_CREATE = 0;
const ACTION_CATEGORY_UPDATE = 1;
const ACTION_POSITION_CREATE = 2;
const ACTION_POSITION_UPDATE = 3;

const RUN_ACTION = ACTION_CATEGORY_CREATE;
//const RUN_ACTION = ACTION_CATEGORY_UPDATE;
//const RUN_ACTION = ACTION_POSITION_CREATE;
//const RUN_ACTION = ACTION_POSITION_UPDATE;

switch (RUN_ACTION) {
    case ACTION_CATEGORY_CREATE:
        (new \CategoryCreate\Client)->run();
        break;
    case ACTION_CATEGORY_UPDATE:
        (new \CategoryUpdate\Client)->run();
        break;
}