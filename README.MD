- Create db master :

  > `CREATE DATABASE `php_for_begginers` /*!40100 COLLATE 'utf8mb4_general_ci' */`

- create table of db : 
    - Users : 
        > CREATE TABLE `users` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(255) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`) USING BTREE,
	UNIQUE INDEX `email` (`email`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;
    - Notes : 
        > CREATE TABLE `notes` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`body` TEXT NOT NULL COLLATE 'utf8mb4_general_ci',
	`user_id` INT(10) NOT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `users_note_id_foreign` (`user_id`) USING BTREE,
	CONSTRAINT `users_note_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE NO ACTION ON DELETE CASCADE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;
