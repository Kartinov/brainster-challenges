CREATE TABLE `users` (
	`id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(64) NOT NULL UNIQUE,
    `password` VARCHAR(256) NOT NULL
);

INSERT INTO `users` (`username`, `password`) VALUES ('admin', '$2y$10$YlgFKBkq1oa5iEVEa.ol4.mYiUTyAhQlkD5P72BK436BRSrUrOXkO');