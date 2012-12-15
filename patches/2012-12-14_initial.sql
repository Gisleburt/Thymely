SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `thymely` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `thymely` ;

-- -----------------------------------------------------
-- Table `thymely`.`thymely_users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `thymely`.`thymely_users` (
  `user_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(128) NOT NULL ,
  `password` VARCHAR(128) NOT NULL ,
  `firstname` VARCHAR(32) NOT NULL ,
  `lastname` VARCHAR(32) NOT NULL ,
  `date_created` TIMESTAMP NOT NULL DEFAULT current_timestamp ,
  `date_modified` TIMESTAMP NOT NULL DEFAULT 0 ,
  `date_deleted` TIMESTAMP NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`user_id`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thymely`.`thymely_groups`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `thymely`.`thymely_groups` (
  `group_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `date_created` TIMESTAMP NOT NULL ,
  `date_modified` TIMESTAMP NOT NULL ,
  `date_deleted` TIMESTAMP NOT NULL ,
  PRIMARY KEY (`group_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thymely`.`thymely_roles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `thymely`.`thymely_roles` (
  `role_id` BIGINT UNSIGNED NOT NULL ,
  `name` VARCHAR(32) NOT NULL ,
  PRIMARY KEY (`role_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thymely`.`thymely_users_to_groups`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `thymely`.`thymely_users_to_groups` (
  `info_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `group_id` BIGINT UNSIGNED NOT NULL ,
  `role_id` BIGINT UNSIGNED NOT NULL ,
  PRIMARY KEY (`info_id`) ,
  INDEX `fk_users` (`user_id` ASC) ,
  INDEX `fk_groups` (`group_id` ASC) ,
  INDEX `fk_roles` (`role_id` ASC) ,
  CONSTRAINT `fk_users`
    FOREIGN KEY (`user_id` )
    REFERENCES `thymely`.`thymely_users` (`user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_groups`
    FOREIGN KEY (`group_id` )
    REFERENCES `thymely`.`thymely_groups` (`group_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_roles`
    FOREIGN KEY (`role_id` )
    REFERENCES `thymely`.`thymely_roles` (`role_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thymely`.`thymely_users_to_users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `thymely`.`thymely_users_to_users` (
  `info_id` BIGINT UNSIGNED NOT NULL ,
  `from_user` BIGINT UNSIGNED NOT NULL ,
  `to_user` BIGINT UNSIGNED NOT NULL ,
  `status` ENUM('requested','accepted','rejected') NOT NULL ,
  PRIMARY KEY (`info_id`) ,
  INDEX `fk_from_user` (`from_user` ASC) ,
  INDEX `fk_to_user` (`to_user` ASC) ,
  CONSTRAINT `fk_from_user`
    FOREIGN KEY (`from_user` )
    REFERENCES `thymely`.`thymely_users` (`user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_to_user`
    FOREIGN KEY (`to_user` )
    REFERENCES `thymely`.`thymely_users` (`user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thymely`.`thymely_times`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `thymely`.`thymely_times` (
  `time_id` BIGINT UNSIGNED NOT NULL ,
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `group_id` BIGINT UNSIGNED NOT NULL ,
  `group_permissions` ENUM('none', 'read', 'read+write') NOT NULL ,
  `date_started` TIMESTAMP NOT NULL DEFAULT 0 ,
  `time` TIME NOT NULL DEFAULT 0 ,
  `date_created` TIMESTAMP NOT NULL DEFAULT current_timestamp ,
  `date_modified` TIMESTAMP NOT NULL DEFAULT 0 ,
  `date_deleted` TIMESTAMP NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`time_id`) ,
  INDEX `fk_user_id` (`user_id` ASC) ,
  INDEX `fk_group_id` (`group_id` ASC) ,
  CONSTRAINT `fk_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `thymely`.`thymely_users` (`user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_group_id`
    FOREIGN KEY (`group_id` )
    REFERENCES `thymely`.`thymely_groups` (`group_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


CREATE USER `thymely` IDENTIFIED BY 'longbutnotrandom';


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
