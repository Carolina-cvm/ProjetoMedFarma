-- MySQL Script generated by MySQL Workbench
-- Mon May 25 16:59:33 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema medfarma
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema medfarma
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `medfarma` DEFAULT CHARACTER SET utf8 ;
USE `medfarma` ;

-- -----------------------------------------------------
-- Table `medfarma`.`Farmácia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `medfarma`.`Farmácia` (
  `idFarmácia` INT NOT NULL AUTO_INCREMENT,
  `CPNJ` BIGINT(14) NULL DEFAULT NULL,
  `Nome` VARCHAR(45) NULL DEFAULT NULL,
  `Endereco` VARCHAR(45) NULL,
  PRIMARY KEY (`idFarmácia`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `medfarma`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `medfarma`.`Cliente` (
  `idCliente` INT NOT NULL,
  `CPF` BIGINT(11) NULL DEFAULT NULL,
  `Nome` VARCHAR(45) NULL DEFAULT NULL,
  `Farmácia_idFarmácia` INT NOT NULL,
  PRIMARY KEY (`idCliente`),
  INDEX `fk_Cliente_Farmácia_idx` (`Farmácia_idFarmácia` ASC) VISIBLE,
  CONSTRAINT `fk_Cliente_Farmácia`
    FOREIGN KEY (`Farmácia_idFarmácia`)
    REFERENCES `medfarma`.`Farmácia` (`idFarmácia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `medfarma`.`Funcionário`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `medfarma`.`Funcionário` (
  `idFuncionário` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(45) NULL DEFAULT NULL,
  `CPF` BIGINT(11) NULL DEFAULT NULL,
  `Farmácia_idFarmácia` INT NOT NULL,
  PRIMARY KEY (`idFuncionário`),
  INDEX `fk_Funcionário_Farmácia1_idx` (`Farmácia_idFarmácia` ASC) VISIBLE,
  CONSTRAINT `fk_Funcionário_Farmácia1`
    FOREIGN KEY (`Farmácia_idFarmácia`)
    REFERENCES `medfarma`.`Farmácia` (`idFarmácia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `medfarma`.`Produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `medfarma`.`Produto` (
  `idProduto` INT NOT NULL,
  `Funcionário_idFuncionário` INT NOT NULL,
  `Quantidade` INT NULL,
  PRIMARY KEY (`idProduto`),
  INDEX `fk_Produto_Funcionário1_idx` (`Funcionário_idFuncionário` ASC) VISIBLE,
  CONSTRAINT `fk_Produto_Funcionário1`
    FOREIGN KEY (`Funcionário_idFuncionário`)
    REFERENCES `medfarma`.`Funcionário` (`idFuncionário`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `medfarma`.`Medicamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `medfarma`.`Medicamento` (
  `idMedicamento` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(45) NULL DEFAULT NULL,
  `Gramagem` VARCHAR(40) NULL DEFAULT NULL,
  `Valor` DOUBLE NULL DEFAULT NULL,
  `Produto_idProduto` INT NOT NULL,
  `Informaçoes` VARCHAR(500) NULL,
  `Endereco` VARCHAR(45) NULL,
  `Quantidade` INT NULL,
  PRIMARY KEY (`idMedicamento`),
  INDEX `fk_Medicamento_Produto1_idx` (`Produto_idProduto` ASC) VISIBLE,
  CONSTRAINT `fk_Medicamento_Produto1`
    FOREIGN KEY (`Produto_idProduto`)
    REFERENCES `medfarma`.`Produto` (`idProduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `medfarma`.`OfertaMedicamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `medfarma`.`OfertaMedicamento` (
  `idOfertas` INT NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(45) NULL DEFAULT NULL,
  `Informacoes` VARCHAR(500) NULL DEFAULT NULL,
  `Valor` DOUBLE NULL DEFAULT NULL,
  `Endereco` VARCHAR(45) NULL,
  `Produto_idProduto` INT NOT NULL,
  `Gramagem` VARCHAR(45) NULL,
  `Quantidade` INT NULL,
  PRIMARY KEY (`idOfertas`),
  INDEX `fk_OfertaMedicamento_Produto1_idx` (`Produto_idProduto` ASC) VISIBLE,
  CONSTRAINT `fk_OfertaMedicamento_Produto1`
    FOREIGN KEY (`Produto_idProduto`)
    REFERENCES `medfarma`.`Produto` (`idProduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `medfarma`.`Pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `medfarma`.`Pedido` (
  `idpedido` INT NOT NULL AUTO_INCREMENT,
  `valorTotal` DOUBLE NULL,
  `Cliente_idCliente` INT NOT NULL,
  `Farmácia_idFarmácia` INT NOT NULL,
  PRIMARY KEY (`idpedido`),
  INDEX `fk_Pedido_Cliente1_idx` (`Cliente_idCliente` ASC) VISIBLE,
  INDEX `fk_Pedido_Farmácia1_idx` (`Farmácia_idFarmácia` ASC) VISIBLE,
  CONSTRAINT `fk_Pedido_Cliente1`
    FOREIGN KEY (`Cliente_idCliente`)
    REFERENCES `medfarma`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedido_Farmácia1`
    FOREIGN KEY (`Farmácia_idFarmácia`)
    REFERENCES `medfarma`.`Farmácia` (`idFarmácia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `medfarma`.`Pedido_has_Produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `medfarma`.`Pedido_has_Produto` (
  `Pedido_idpedido` INT NOT NULL,
  `Produto_idProduto` INT NOT NULL,
  PRIMARY KEY (`Pedido_idpedido`, `Produto_idProduto`),
  INDEX `fk_Pedido_has_Produto_Produto1_idx` (`Produto_idProduto` ASC) VISIBLE,
  INDEX `fk_Pedido_has_Produto_Pedido1_idx` (`Pedido_idpedido` ASC) VISIBLE,
  CONSTRAINT `fk_Pedido_has_Produto_Pedido1`
    FOREIGN KEY (`Pedido_idpedido`)
    REFERENCES `medfarma`.`Pedido` (`idpedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedido_has_Produto_Produto1`
    FOREIGN KEY (`Produto_idProduto`)
    REFERENCES `medfarma`.`Produto` (`idProduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
