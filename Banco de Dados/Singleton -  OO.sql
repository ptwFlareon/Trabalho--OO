-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema singleton
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema singleton
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `singleton` DEFAULT CHARACTER SET latin1 ;
USE `singleton` ;

-- -----------------------------------------------------
-- Table `singleton`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `singleton`.`categoria` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `status` CHAR(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `singleton`.`empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `singleton`.`empresa` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `situacao` VARCHAR(25) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `singleton`.`pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `singleton`.`pessoa` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `singleton`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `singleton`.`produto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `valor` DECIMAL(5,2) NULL DEFAULT NULL,
  `status` CHAR(1) NULL DEFAULT NULL,
  `idcategoria` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `singleton`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `singleton`.`usuario` (
  `id` INT(11) NOT NULL,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `login` VARCHAR(45) NULL DEFAULT NULL,
  `senha` VARCHAR(32) NULL DEFAULT NULL,
  `status` CHAR(1) NULL DEFAULT NULL,
  `thumbnail_path` VARCHAR(100) NULL DEFAULT NULL,
  `idempresa` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;

USE `singleton` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
