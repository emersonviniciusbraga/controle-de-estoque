-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema controledb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema controledb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `controledb` DEFAULT CHARACTER SET utf8 ;
USE `controledb` ;

-- -----------------------------------------------------
-- Table `controledb`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controledb`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(14) NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(256) NOT NULL,
  `permissao` INT(1) NOT NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledb`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controledb`.`produto` (
  `idproduto` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(200) NOT NULL,
  `unidade` VARCHAR(50) NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  `status` INT(1) NOT NULL,
  PRIMARY KEY (`idproduto`),
  INDEX `fk_produto_usuario_idx` (`usuario_idusuario` ASC) ,
  CONSTRAINT `fk_produto_usuario`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `controledb`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledb`.`fornecedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controledb`.`fornecedor` (
  `idfornecedor` INT NOT NULL AUTO_INCREMENT,
  `cnpj` VARCHAR(18) NOT NULL,
  `nome` VARCHAR(150) NOT NULL,
  `cidade` VARCHAR(100) NULL,
  `logradouro` VARCHAR(200) NULL,
  `bairro` VARCHAR(50) NULL,
  `estado` VARCHAR(50) NULL,
  `numero` VARCHAR(10) NULL,
  `telefone` VARCHAR(16) NULL,
  `status` INT(1) NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idfornecedor`),
  INDEX `fk_fornecedor_usuario1_idx` (`usuario_idusuario` ASC) ,
  CONSTRAINT `fk_fornecedor_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `controledb`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledb`.`item`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `controledb`.`item` (
  `iditem` INT NOT NULL AUTO_INCREMENT,
  `qtd` DECIMAL NOT NULL,
  `qtd_despachado` DECIMAL NOT NULL,
  `data_vencimento` DATE NOT NULL,
  `nf` VARCHAR(50) NOT NULL,
  `time` DATETIME NOT NULL,
  `produto_idproduto` INT NOT NULL,
  `fornecedor_idfornecedor` INT NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`iditem`),
  INDEX `fk_item_produto1_idx` (`produto_idproduto` ASC) ,
  INDEX `fk_item_fornecedor1_idx` (`fornecedor_idfornecedor` ASC) ,
  INDEX `fk_item_usuario1_idx` (`usuario_idusuario` ASC) ,
  CONSTRAINT `fk_item_produto1`
    FOREIGN KEY (`produto_idproduto`)
    REFERENCES `controledb`.`produto` (`idproduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_fornecedor1`
    FOREIGN KEY (`fornecedor_idfornecedor`)
    REFERENCES `controledb`.`fornecedor` (`idfornecedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_item_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `controledb`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
