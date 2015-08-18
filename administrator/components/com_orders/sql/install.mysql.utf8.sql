CREATE TABLE IF NOT EXISTS `#__orders` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`user_id` INT NOT NULL ,
`image_id` INT(11)  NOT NULL ,
`image_name` VARCHAR(255)  NOT NULL ,
`author` INT NOT NULL ,
`price` VARCHAR(20)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

