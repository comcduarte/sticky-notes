-- -----------------------------------------------------
-- Table `stickynotes`.`stickynotes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sticky-notes`.`sticky-notes` ;
CREATE TABLE IF NOT EXISTS `sticky-notes`.`sticky-notes` (
`id` INT NOT NULL AUTO_INCREMENT ,
`note` VARCHAR(255) NULL ,
`created` TIMESTAMP NOT NULL ,
PRIMARY KEY (`id`) ,
UNIQUE INDEX `id_UNIQUE` (`id` ASC) )
ENGINE = MyISAM;
-- -----------------------------------------------------
-- Data for table `stickynotes`.`stickynotes`
-- -----------------------------------------------------
START TRANSACTION;
USE `sticky-notes`;
INSERT INTO `sticky-notes`.`sticky-notes` (`id`, `note`, `created`) VALUES (NULL, 'This is a sticky note you can type and edit.', NULL);
INSERT INTO `sticky-notes`.`sticky-notes` (`id`, `note`, `created`) VALUES (NULL, 'Let\'s see if it will work with my iPhone', NULL);
COMMIT;