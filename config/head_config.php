<?php

$checkUrl = $_SERVER['REQUEST_SCHEME'] . '://' .
    $_SERVER['HTTP_HOST'] . $_SERVER['SCRIPT_NAME'];

switch ($checkUrl) {
    case route('createWebsite'):
        $CURRENT_PAGE = "Create Website";
        $PAGE_TITLE   = "Create Website";
        break;
    case rtrim(route('company'), '?id='):
        $CURRENT_PAGE = "Company";
        $PAGE_TITLE   = $companyContent['company_name'];
        break;
    default:
        $CURRENT_PAGE = "Home";
        $PAGE_TITLE   = "Website Builder";
}