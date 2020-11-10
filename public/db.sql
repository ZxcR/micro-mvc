CREATE TABLE `tasks` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`user` VARCHAR(50) NOT NULL COLLATE 'utf8_general_ci',
	`email` VARCHAR(128) NOT NULL COLLATE 'utf8_general_ci',
	`title` VARCHAR(255) NOT NULL COLLATE 'utf8_general_ci',
	`content` MEDIUMTEXT NOT NULL COLLATE 'utf8_general_ci',
	`status` ENUM('open','closed') NOT NULL DEFAULT 'open' COLLATE 'utf8_general_ci',
	`created_at` TIMESTAMP NOT NULL,
	`updated_at` TIMESTAMP NOT NULL,
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_unicode_ci'
ENGINE=InnoDB
;
