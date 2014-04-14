SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `buscamedica` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `buscamedica` ;

-- -----------------------------------------------------
-- Table `buscamedica`.`pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `buscamedica`.`pessoa` (
  `idpessoa` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `endereço` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idpessoa`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscamedica`.`cadastro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `buscamedica`.`cadastro` (
  `idcadastro` INT NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(200) NOT NULL,
  `senha` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`idcadastro`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscamedica`.`tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `buscamedica`.`tipo` (
  `idtipo` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idtipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscamedica`.`servico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `buscamedica`.`servico` (
  `idservico` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `especializacao` VARCHAR(45) NULL,
  PRIMARY KEY (`idservico`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `buscamedica`.`especializacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `buscamedica`.`especializacao` (
  `idespecializacao` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idespecializacao`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
