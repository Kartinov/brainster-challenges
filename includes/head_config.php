<?php

$checkUrl = $_SERVER['REQUEST_SCHEME'] . '://' .
    $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];

switch ($checkUrl) {
    case route('form'):
        $CURRENT_PAGE = "Form";
        $PAGE_TITLE = "Create website";
        break;
    default:
        $CURRENT_PAGE = "Index";
        $PAGE_TITLE = "Website Builder";
}
