-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema estoque
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema estoque
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `estoque` DEFAULT CHARACTER SET utf8 ;
USE `estoque` ;

-- -----------------------------------------------------
-- Table `estoque`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estoque`.`usuario` (
  `idusuario` BIGINT NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(50) NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(256) NOT NULL,
  `acesso` INT NOT NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `estoque`.`fornecedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estoque`.`fornecedor` (
  `idfornecedor` BIGINT NOT NULL AUTO_INCREMENT,
  `cnpj` VARCHAR(50) NOT NULL,
  `nome` VARCHAR(150) NOT NULL,
  `cidade` VARCHAR(100) NULL,
  `logradouro` VARCHAR(200) NULL,
  `bairro` VARCHAR(50) NULL,
  `estado` VARCHAR(20) NULL,
  `numero` VARCHAR(10) NULL,
  `cep` VARCHAR(100) NULL,
  `telefone` VARCHAR(11) NULL,
  `email` VARCHAR(150) NULL,
  `usuario_idusuario` BIGINT NOT NULL,
  PRIMARY KEY (`idfornecedor`),
  INDEX `fk_fornecedor_usuario1_idx` (`usuario_idusuario` ASC) ,
  CONSTRAINT `fk_fornecedor_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `estoque`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `estoque`.`item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estoque`.`item` (
  `iditem` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(500) NOT NULL,
  `unidade` VARCHAR(100) NOT NULL,
  `quantidade` VARCHAR(20) NOT NULL,
  `usuario_idusuario` BIGINT NOT NULL,
  PRIMARY KEY (`iditem`),
  INDEX `fk_item_usuario_idx` (`usuario_idusuario` ASC) ,
  CONSTRAINT `fk_item_usuario`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `estoque`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
