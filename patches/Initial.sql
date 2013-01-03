DROP SCHEMA IF EXISTS `thymely` ;
CREATE SCHEMA IF NOT EXISTS `thymely` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `thymely` ;

-- -----------------------------------------------------
-- Table `thymely`.`thymely_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thymely`.`thymely_users` ;

CREATE  TABLE IF NOT EXISTS `thymely`.`thymely_users` (
  `user_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(128) NOT NULL ,
  `password` VARCHAR(128) NOT NULL ,
  `salt` VARCHAR(32) NOT NULL ,
  `failed_logins` INT NOT NULL DEFAULT 0 ,
  `firstname` VARCHAR(32) NOT NULL ,
  `lastname` VARCHAR(32) NOT NULL ,
  `date_created` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `date_modified` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `date_deleted` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `status` ENUM('active', 'inactive') NOT NULL DEFAULT 'inactive' ,
  PRIMARY KEY (`user_id`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thymely`.`thymely_groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thymely`.`thymely_groups` ;

CREATE  TABLE IF NOT EXISTS `thymely`.`thymely_groups` (
  `group_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `date_created` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `date_modified` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `date_deleted` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  PRIMARY KEY (`group_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thymely`.`thymely_roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thymely`.`thymely_roles` ;

CREATE  TABLE IF NOT EXISTS `thymely`.`thymely_roles` (
  `role_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(32) NOT NULL ,
  PRIMARY KEY (`role_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thymely`.`thymely_users_to_groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thymely`.`thymely_users_to_groups` ;

CREATE  TABLE IF NOT EXISTS `thymely`.`thymely_users_to_groups` (
  `info_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `group_id` BIGINT UNSIGNED NOT NULL ,
  `role_id` BIGINT UNSIGNED NOT NULL ,
  PRIMARY KEY (`info_id`) ,
  INDEX `fk_users_to_group_users` (`user_id` ASC) ,
  INDEX `fk_users_to_group_groups` (`group_id` ASC) ,
  INDEX `fk_users_to_group_roles` (`role_id` ASC) ,
  CONSTRAINT `fk_users_to_group_users`
    FOREIGN KEY (`user_id` )
    REFERENCES `thymely`.`thymely_users` (`user_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_to_group_groups`
    FOREIGN KEY (`group_id` )
    REFERENCES `thymely`.`thymely_groups` (`group_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_to_group_roles`
    FOREIGN KEY (`role_id` )
    REFERENCES `thymely`.`thymely_roles` (`role_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thymely`.`thymely_users_to_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thymely`.`thymely_users_to_users` ;

CREATE  TABLE IF NOT EXISTS `thymely`.`thymely_users_to_users` (
  `info_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `from_user` BIGINT UNSIGNED NOT NULL ,
  `to_user` BIGINT UNSIGNED NOT NULL ,
  `status` ENUM('requested','accepted','rejected') NOT NULL ,
  PRIMARY KEY (`info_id`) ,
  INDEX `fk_users_to_users_from_user` (`from_user` ASC) ,
  INDEX `fk_users_to_users_to_user` (`to_user` ASC) ,
  CONSTRAINT `fk_users_to_users_from_user`
    FOREIGN KEY (`from_user` )
    REFERENCES `thymely`.`thymely_users` (`user_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_to_users_to_user`
    FOREIGN KEY (`to_user` )
    REFERENCES `thymely`.`thymely_users` (`user_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thymely`.`thymely_tasks`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thymely`.`thymely_tasks` ;

CREATE  TABLE IF NOT EXISTS `thymely`.`thymely_tasks` (
  `task_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `owner_id` BIGINT UNSIGNED NOT NULL ,
  `name` VARCHAR(32) NOT NULL ,
  `description` VARCHAR(256) NOT NULL ,
  `date_created` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `date_modified` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `date_deleted` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  PRIMARY KEY (`task_id`) ,
  INDEX `fk_tasks_owner_id` (`owner_id` ASC) ,
  CONSTRAINT `fk_tasks_owner_id`
    FOREIGN KEY (`owner_id` )
    REFERENCES `thymely`.`thymely_users` (`user_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thymely`.`thymely_times`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thymely`.`thymely_times` ;

CREATE  TABLE IF NOT EXISTS `thymely`.`thymely_times` (
  `time_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `task_id` BIGINT UNSIGNED NOT NULL ,
  `date_started` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `time` BIGINT NOT NULL ,
  `date_created` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `date_modified` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `date_deleted` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  PRIMARY KEY (`time_id`) ,
  INDEX `fk_user_id` (`user_id` ASC) ,
  INDEX `fk_task_id` (`task_id` ASC) ,
  CONSTRAINT `fk_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `thymely`.`thymely_users` (`user_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_task_id`
    FOREIGN KEY (`task_id` )
    REFERENCES `thymely`.`thymely_tasks` (`task_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thymely`.`thymely_group_permissions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thymely`.`thymely_group_permissions` ;

CREATE  TABLE IF NOT EXISTS `thymely`.`thymely_group_permissions` (
  `permission_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(32) NOT NULL DEFAULT '' ,
  PRIMARY KEY (`permission_id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thymely`.`thymely_groups_to_tasks`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thymely`.`thymely_groups_to_tasks` ;

CREATE  TABLE IF NOT EXISTS `thymely`.`thymely_groups_to_tasks` (
  `info_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `group_id` BIGINT UNSIGNED NOT NULL ,
  `task_id` BIGINT UNSIGNED NOT NULL ,
  `permission_id` BIGINT UNSIGNED NOT NULL ,
  PRIMARY KEY (`info_id`) ,
  INDEX `fk_groups_to_tasks_group_id` (`group_id` ASC) ,
  INDEX `fk_groups_to_tasks_permission_id` (`permission_id` ASC) ,
  INDEX `fk_groups_to_tasks_task_id` (`task_id` ASC) ,
  CONSTRAINT `fk_groups_to_tasks_group_id`
    FOREIGN KEY (`group_id` )
    REFERENCES `thymely`.`thymely_groups` (`group_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_groups_to_tasks_permission_id`
    FOREIGN KEY (`permission_id` )
    REFERENCES `thymely`.`thymely_group_permissions` (`permission_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_groups_to_tasks_task_id`
    FOREIGN KEY (`task_id` )
    REFERENCES `thymely`.`thymely_tasks` (`task_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thymely`.`thymely_users_to_tasks`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thymely`.`thymely_users_to_tasks` ;

CREATE  TABLE IF NOT EXISTS `thymely`.`thymely_users_to_tasks` (
  `info_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` BIGINT UNSIGNED NOT NULL ,
  `task_id` BIGINT UNSIGNED NOT NULL ,
  `role_id` BIGINT UNSIGNED NOT NULL ,
  PRIMARY KEY (`info_id`) ,
  INDEX `fk_users_to_tasks_user_id` (`user_id` ASC) ,
  INDEX `fk_users_to_tasks_task_id` (`task_id` ASC) ,
  INDEX `fk_users_to_tasks_role_id` (`role_id` ASC) ,
  CONSTRAINT `fk_users_to_tasks_user_id`
    FOREIGN KEY (`user_id` )
    REFERENCES `thymely`.`thymely_users` (`user_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_to_tasks_task_id`
    FOREIGN KEY (`task_id` )
    REFERENCES `thymely`.`thymely_tasks` (`task_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_users_to_tasks_role_id`
    FOREIGN KEY (`role_id` )
    REFERENCES `thymely`.`thymely_roles` (`role_id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `thymely`.`thymely_admins`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `thymely`.`thymely_admins` ;

CREATE  TABLE IF NOT EXISTS `thymely`.`thymely_admins` (
  `admin_id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(128) NOT NULL ,
  `password` VARCHAR(128) NOT NULL ,
  `salt` VARCHAR(32) NOT NULL ,
  `failed_logins` INT NOT NULL DEFAULT 0 ,
  `firstname` VARCHAR(32) NOT NULL ,
  `lastname` VARCHAR(32) NOT NULL ,
  `date_created` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `date_modified` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `date_deleted` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `status` ENUM('active', 'inactive') NOT NULL DEFAULT 'inactive' ,
  PRIMARY KEY (`admin_id`) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


DROP SCHEMA IF EXISTS `thymely_errors` ;
CREATE SCHEMA IF NOT EXISTS `thymely_errors` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `thymely_errors` ;


-- -----------------------------------------------------
-- Table `thymely_errors`.`errors`
-- -----------------------------------------------------

DROP TABLE IF EXISTS `thymely_errors`.`errors` ;
CREATE  TABLE IF NOT EXISTS `thymely_errors`.`errors` (
  `error_id` BIGINT NOT NULL AUTO_INCREMENT ,
  `date` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' ,
  `message` VARCHAR(512) NOT NULL DEFAULT '' ,
  `filename` VARCHAR(128) NOT NULL DEFAULT '' ,
  `line` INT NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`error_id`) )
ENGINE = InnoDB;


CREATE USER `dummyuser`@`localhost` IDENTIFIED BY 'dummypassword';
GRANT ALL ON thymely.* TO `dummyuser`@`localhost`;
GRANT ALL ON thymely_errors.* TO `dummyuser`@`localhost`;