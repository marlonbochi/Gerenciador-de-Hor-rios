SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `geren_horarios` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `geren_horarios` ;

-- -----------------------------------------------------
-- Table `geren_horarios`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `geren_horarios`.`funcionario` (
  `id_funcionario` INT NOT NULL AUTO_INCREMENT,
  `nome_funcionario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_funcionario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `geren_horarios`.`local_trabalho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `geren_horarios`.`local_trabalho` (
  `id_local_trabalho` INT NOT NULL AUTO_INCREMENT,
  `descricao_local_trabalho` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_local_trabalho`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `geren_horarios`.`atividade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `geren_horarios`.`atividade` (
  `id_atividade` INT NOT NULL AUTO_INCREMENT,
  `descricao_atividade` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_atividade`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `geren_horarios`.`agenda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `geren_horarios`.`agenda` (
  `id_agenda` INT NOT NULL AUTO_INCREMENT,
  `id_funcionario` INT NOT NULL,
  `id_atividade` INT NOT NULL,
  `id_local_trabalho` INT NOT NULL,
  `periodo_inicial_agenda` DATETIME NOT NULL,
  `periodo_final_agenda` DATETIME NOT NULL,
  PRIMARY KEY (`id_agenda`),
  INDEX `id_funcionario_idx` (`id_funcionario` ASC),
  INDEX `id_local_trabalho_idx` (`id_local_trabalho` ASC),
  INDEX `id_atividade_idx` (`id_atividade` ASC),
  CONSTRAINT `id_funcionario`
    FOREIGN KEY (`id_funcionario`)
    REFERENCES `geren_horarios`.`funcionario` (`id_funcionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_local_trabalho`
    FOREIGN KEY (`id_local_trabalho`)
    REFERENCES `geren_horarios`.`local_trabalho` (`id_local_trabalho`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_atividade`
    FOREIGN KEY (`id_atividade`)
    REFERENCES `geren_horarios`.`atividade` (`id_atividade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
