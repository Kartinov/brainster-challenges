<?php

session_start();

require_once __DIR__ . '/../autoload.php';

onlyPostAllowed();

$inputKeys = [
    'company_name',
    'cover_image',
    'main_title',
    'main_subtitle',
    'main_description',
    'phone',
    'country',
    'city',
    'address',
    'providing_type_id',
    'cards',
    'contact_description',
    'linkedin',
    'facebook',
    'twitter',
    'instagram'
];

$cardKeys = [
    'card_image',
    'card_title',
    'card_description'
];

$exists = true;

foreach ($inputKeys as $checkInput) {
    if (!array_key_exists($checkInput, $_POST)) {
        $exists = false;
        break;
    }
}

if ($exists && is_array($_POST['cards'])) {

    foreach ($_POST['cards'] as $card) {

        foreach ($cardKeys as $cardKey) {

            if (!array_key_exists($cardKey, $card)) {
                $exists = false;
                break 2;
            }
        }
    }
}

/**
 * $exists will return false if somebody has changed the name attribute
 */
if (!$exists) {
    putErrorMessage(0, 'An error occured');
    $_SESSION['old'] = $_POST;
    redirectTo(route('createWebsite'));
}

/**
 * check for empty fields
 */
$isEmpty = false;

foreach ($_POST as $key => $field) {
    if (!is_array($key)) {
        $isEmpty = empty($field);
    } else {
        foreach ($field as $arrayField) {
            $isEmpty = empty($arrayField);
        }
    }

    if ($isEmpty) {
        putErrorMessage(0, 'All fields are required');
        $_SESSION['old'] = $_POST;
        redirectTo(route('createWebsite'));
    }
}

require_once __DIR__ . '/../database/connection.php';

try {
    // Store data in companies TABLE
    $q = "INSERT INTO `companies` (`providing_type_id`, `company_name`, `phone`)
        VALUES (:providing_type_id, :company_name, :phone)";

    $stmt = $conn->prepare($q);

    $data = [
        'providing_type_id' => $_POST['providing_type_id'],
        'company_name'      => $_POST['company_name'],
        'phone'             => $_POST['phone']
    ];

    $stmt->execute($data);

    // Get latest company ID
    $q = "SELECT `id` FROM `companies` ORDER BY `id` DESC LIMIT 1";
    $stmt = $conn->query($q);
    $companyId = $stmt->fetch()['id'];

    // Store data in locations TABLE
    $q = "INSERT INTO `locations` (`company_id`, `country`, `city`, `address`)
        VALUES (:company_id, :country, :city, :address)";

    $stmt = $conn->prepare($q);

    $data = [
        'company_id' => $companyId,
        'country'    => $_POST['country'],
        'city'       => $_POST['city'],
        'address'    => $_POST['address']
    ];

    $stmt->execute($data);

    // Store data in social-links TABLE
    $q = "INSERT INTO `social_links` (`company_id`, `facebook`, `twitter`, `linkedin`, `instagram`)
        VALUES (:company_id, :facebook, :twitter, :linkedin, :instagram)";

    $stmt = $conn->prepare($q);

    $data = [
        'company_id' => $companyId,
        'facebook'   => $_POST['facebook'],
        'twitter'    => $_POST['twitter'],
        'linkedin'   => $_POST['linkedin'],
        'instagram'  => $_POST['instagram']
    ];

    $stmt->execute($data);

    // Store data in content TABLE
    $q = "INSERT INTO `content` (`company_id`, `cover_image`, `main_title`, `main_subtitle`, `main_description`, `contact_description`)
        VALUES (:company_id, :cover_image, :main_title, :main_subtitle, :main_description, :contact_description)";

    $stmt = $conn->prepare($q);

    $data = [
        'company_id'          => $companyId,
        'cover_image'         => $_POST['cover_image'],
        'main_title'          => $_POST['main_title'],
        'main_subtitle'       => $_POST['main_subtitle'],
        'main_description'    => $_POST['main_description'],
        'contact_description' => $_POST['contact_description']
    ];

    $stmt->execute($data);

    $q = "SELECT `id` FROM `content` WHERE `company_id` = $companyId LIMIT 1";
    $stmt = $conn->query($q);
    $contentId = $stmt->fetch()['id'];

    // Store data in cards TABLE

    foreach ($_POST['cards'] as $card) {
        $q = "INSERT INTO `cards` (`content_id`, `card_image`, `card_title`, `card_description`)
        VALUES (:content_id, :card_image, :card_title, :card_description)";

        $stmt = $conn->prepare($q);

        $data = [
            'content_id'       => $contentId,
            'card_image'       => $card['card_image'],
            'card_title'       => $card['card_title'],
            'card_description' => $card['card_description']
        ];

        $stmt->execute($data);
    }

    redirectTo(route('company', $companyId));
} catch (Exception $e) {
    redirectTo(route('404'));
}
