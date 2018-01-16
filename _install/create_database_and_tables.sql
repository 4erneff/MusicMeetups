CREATE DATABASE IF NOT EXISTS `musicmeetups`;

CREATE TABLE `musicmeetups`.`event` (
	`id` INT(8) NOT NULL AUTO_INCREMENT,
	`hostid` INT(6) NOT NULL,
	`performerid` INT(6),
	`date` VARCHAR(16) NOT NULL,
	`remainingplaces` INT(3),
	`minpayment` REAL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `musicmeetups`.`host` (
	`id` INT(6) NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(50) NOT NULL UNIQUE,
	`name` TEXT COLLATE utf8_unicode_ci NOT NULL,
	`number` VARCHAR(10) NOT NULL,
	`location` TEXT COLLATE utf8_unicode_ci NOT NULL,
	`maxguests` INT(3) NOT NULL,
	`description` TEXT COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `musicmeetups`.`performer`(
	`id` INT(6) NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(50) NOT NULL UNIQUE,
	`name` TEXT COLLATE utf8_unicode_ci NOT NULL,
	`number` VARCHAR(10) NOT NULL,
	`description` TEXT COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `musicmeetups`.`attender` (
	`id` INT(6) NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(50) NOT NULL UNIQUE,
	`name` TEXT COLLATE utf8_unicode_ci NOT NULL,
	`countoffriends` INT(2) NOT NULL DEFAULT '0',
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `musicmeetups`.`eventattender` (
	`eventid` INT(8) NOT NULL,
	`attenderid` INT(6) NOT NULL,
	`countoffriends` INT(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB;

CREATE TABLE `musicmeetups`.`user` (
	`id` INT(6) NOT NULL AUTO_INCREMENT,
	`email` VARCHAR(50) NOT NULL UNIQUE,
	`name` TEXT COLLATE utf8_unicode_ci NOT NULL,
	`password` TEXT COLLATE utf8_unicode_ci NOT NULL,
	`number` VARCHAR(10) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB;

ALTER TABLE `musicmeetups`.`event`
  ADD CONSTRAINT `host_id_event_relation` FOREIGN KEY (`hostid`) REFERENCES `host` (`id`);

ALTER TABLE `musicmeetups`.`event`
  ADD CONSTRAINT `performer_id_event_relation` FOREIGN KEY (`performerid`) REFERENCES `performer` (`id`);
COMMIT;

CREATE TRIGGER `updateavailableplaces`
AFTER INSERT
ON `eventattender`
FOR EACH ROW
  UPDATE `event`
     SET `remainingplaces` = `remainingplaces` - 1 - NEW.`countoffriends`
   WHERE `id` = NEW.`eventid`;



