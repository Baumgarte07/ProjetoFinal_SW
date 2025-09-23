-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema happytoysdb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema happytoysdb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `happytoysdb` DEFAULT CHARACTER SET utf8 ;
USE `happytoysdb` ;

-- -----------------------------------------------------
-- Table `happytoysdb`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `happytoysdb`.`clientes` (
  `idcliente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `cpf` CHAR(11) NULL,
  `nascimento` DATETIME NULL,
  `celular` CHAR(11) NULL,
  `email` VARCHAR(45) NULL,
  `senha` VARCHAR(255) NULL,
  `cep` CHAR(8) NULL,
  `logradouro` VARCHAR(100) NULL,
  `bairro` VARCHAR(45) NULL,
  `cidade` VARCHAR(45) NULL,
  `estado` CHAR(2) NULL,
  `numero` INT NULL,
  `complemento` VARCHAR(45) NULL,
  `apelido` VARCHAR(45) NULL,
  PRIMARY KEY (`idcliente`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
