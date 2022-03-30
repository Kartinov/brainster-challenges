<?php

$checkUrl = $_SERVER['REQUEST_SCHEME'] . '://' .
    $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];

switch ($checkUrl) {
    case route('createWebsite'):
        $CURRENT_PAGE = "Create Website";
        $PAGE_TITLE   = "Create Website";
        break;
    default:
        $CURRENT_PAGE = "Home";
        $PAGE_TITLE   = "Website Builder";
}
