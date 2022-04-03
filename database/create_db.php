<?php

require_once __DIR__ . '/connection.php';

try {
    $q = "CREATE TABLE `providing_types` (
	`id` TINYINT UNSIGNED AUTO_INCREMENT,
    `type` VARCHAR(64) NOT NULL,
    
    CONSTRAINT PRIMARY KEY(`id`)
);

INSERT INTO `providing_types` (`type`) VALUES ('services'), ('products');

CREATE TABLE `companies` (
	`id` INT UNSIGNED AUTO_INCREMENT,
    `providing_type_id` TINYINT UNSIGNED NOT NULL,
    `company_name` VARCHAR(128) NOT NULL,
    `phone` VARCHAR(32) NOT NULL,

    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    CONSTRAINT PRIMARY KEY(`id`),
    CONSTRAINT FOREIGN KEY(`providing_type_id`) REFERENCES `providing_types`(`id`)
);

CREATE TABLE `locations` (
	`id` INT UNSIGNED AUTO_INCREMENT,
    `company_id` INT UNSIGNED NOT NULL,
    `country` VARCHAR(64) NOT NULL,
    `city` VARCHAR(64) NOT NULL,
    `address` VARCHAR(128) NOT NULL,
    
    CONSTRAINT PRIMARY KEY(`id`),
    CONSTRAINT FOREIGN KEY(`company_id`) REFERENCES `companies`(`id`)
);

CREATE TABLE `social_links` (
	`id` INT UNSIGNED AUTO_INCREMENT,
    `company_id` INT UNSIGNED NOT NULL,
    `facebook` VARCHAR(255) NOT NULL,
    `twitter` VARCHAR(255) NOT NULL,
    `linkedin` VARCHAR(255) NOT NULL,
    `instagram` VARCHAR(255) NOT NULL,
    
    CONSTRAINT PRIMARY KEY(`id`),
    CONSTRAINT FOREIGN KEY(`company_id`) REFERENCES `companies`(`id`)
);

CREATE TABLE `content` (
	`id` INT UNSIGNED AUTO_INCREMENT,
    `company_id` INT UNSIGNED NOT NULL,
    `cover_image` VARCHAR(256) NOT NULL,
    `main_title` VARCHAR(64) NOT NULL,
    `main_subtitle` VARCHAR(64) NOT NULL,
    `main_description` TEXT NOT NULL,
    `contact_description` TEXT NOT NULL,

    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
    `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    CONSTRAINT PRIMARY KEY(`id`),
    CONSTRAINT FOREIGN KEY(`company_id`) REFERENCES `companies`(`id`)
);

CREATE TABLE `cards` (
	`id` INT UNSIGNED AUTO_INCREMENT,
    `content_id` INT UNSIGNED NOT NULL,
    `card_image` VARCHAR(256) NOT NULL,
    `card_title` VARCHAR(64) NOT NULL,
    `card_description` TEXT NOT NULL,
    
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    CONSTRAINT PRIMARY KEY(`id`),
    CONSTRAINT FOREIGN KEY(`content_id`) REFERENCES `content`(`id`)
);";

    $conn->query($q);
    echo "Successful creation";
} catch (PDOException $e) {
    die("Database creation error: " . $e->getMessage());
}
