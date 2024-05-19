-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.24-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para dbacademia
CREATE DATABASE IF NOT EXISTS `dbacademia` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `dbacademia`;

-- Copiando estrutura para tabela dbacademia.tbaluno
CREATE TABLE IF NOT EXISTS `tbaluno` (
  `idaluno` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idusu` int(11) unsigned DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `sexo` char(1) NOT NULL,
  `data_nasc` date NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero_casa` int(5) NOT NULL,
  PRIMARY KEY (`idaluno`),
  KEY `fk_usu` (`idusu`),
  CONSTRAINT `fk_usu` FOREIGN KEY (`idusu`) REFERENCES `tbusu` (`idusu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela dbacademia.tbaluno: ~5 rows (aproximadamente)
INSERT INTO `tbaluno` (`idaluno`, `idusu`, `nome`, `sexo`, `data_nasc`, `cpf`, `bairro`, `rua`, `numero_casa`) VALUES
	(1, 2, 'Ana Lívia Oliveira Rodrigues', 'F', '2005-12-23', '123.456.789-10', 'Alto da Expectativa', 'Doutor José de Azevedo', 0),
	(2, 3, 'Antonio Aryslan de Castro Fonteles', 'M', '2005-08-29', '123.456.789-10', 'Alto da Expectativa', 'Avenida José Figueiredo de Paulo Pessoa', 0),
	(3, 4, 'José Isac Araújo Monção', 'M', '2006-05-13', '123.456.789-10', 'Terrenos Novos', 'Rua Dr. Thomás Aragão', 0),
	(4, 5, 'Matheus Ravier Lima de Sousa', 'M', '2006-07-04', '123.456.789-10', 'Campos dos Velhos', 'Sete de Setembro', 0),
	(5, 6, 'William do Nascimento Ferreira Gomes', 'M', '2005-08-12', '123.456.789-10', 'Padre Palhano', 'Rua José da Mata', 47);

-- Copiando estrutura para tabela dbacademia.tbavaliacao
CREATE TABLE IF NOT EXISTS `tbavaliacao` (
  `idava` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idaluno` int(11) unsigned DEFAULT NULL,
  `ideducador` int(11) unsigned DEFAULT NULL,
  `idgrupo` int(11) unsigned DEFAULT NULL,
  `datava` date NOT NULL,
  `horaava` time NOT NULL,
  `med_braco` int(3) NOT NULL,
  `med_antebraco` int(3) NOT NULL,
  `med_coxa` int(3) NOT NULL,
  `med_panturrilha` int(3) NOT NULL,
  `objetivo` varchar(30) NOT NULL,
  PRIMARY KEY (`idava`),
  KEY `fk_aluno` (`idaluno`),
  KEY `fk_educador` (`ideducador`),
  KEY `fk_grupo` (`idgrupo`),
  CONSTRAINT `fk_aluno` FOREIGN KEY (`idaluno`) REFERENCES `tbaluno` (`idaluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_educador` FOREIGN KEY (`ideducador`) REFERENCES `tbeducador` (`ideducador`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_grupo` FOREIGN KEY (`idgrupo`) REFERENCES `tbgrupo` (`idgrupo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela dbacademia.tbavaliacao: ~3 rows (aproximadamente)
INSERT INTO `tbavaliacao` (`idava`, `idaluno`, `ideducador`, `idgrupo`, `datava`, `horaava`, `med_braco`, `med_antebraco`, `med_coxa`, `med_panturrilha`, `objetivo`) VALUES
	(1, 3, 3, 4, '2023-04-19', '10:14:20', 30, 28, 40, 27, 'HIPERTROFIA'),
	(2, 3, 1, 3, '2023-05-03', '10:00:00', 35, 30, 45, 28, 'EMAGRECER'),
	(4, 3, 2, 1, '2023-06-25', '15:29:49', 30, 30, 30, 30, 'Ficar Forte');

-- Copiando estrutura para tabela dbacademia.tbeducador
CREATE TABLE IF NOT EXISTS `tbeducador` (
  `ideducador` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idusu` int(11) unsigned DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `sexo` char(1) NOT NULL,
  `data_nasc` date NOT NULL,
  `cpf` varchar(14) NOT NULL,
  PRIMARY KEY (`ideducador`),
  KEY `fk_usu2` (`idusu`),
  CONSTRAINT `fk_usu2` FOREIGN KEY (`idusu`) REFERENCES `tbusu` (`idusu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela dbacademia.tbeducador: ~3 rows (aproximadamente)
INSERT INTO `tbeducador` (`ideducador`, `idusu`, `nome`, `sexo`, `data_nasc`, `cpf`) VALUES
	(1, 7, 'Everton Lima Ferraz', 'M', '2006-04-18', '123.456.789-10'),
	(2, 8, 'Francisco Alisson Azevedo de Lima', 'M', '2005-11-17', '123.456.789-10'),
	(3, 9, 'Jhonatas Jorge Mendonça', 'M', '2006-01-30', '123.456.789-10');

-- Copiando estrutura para tabela dbacademia.tbexercicio
CREATE TABLE IF NOT EXISTS `tbexercicio` (
  `idexercicio` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idgrupo` int(11) unsigned DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`idexercicio`),
  KEY `fk_grupo2` (`idgrupo`),
  CONSTRAINT `fk_grupo2` FOREIGN KEY (`idgrupo`) REFERENCES `tbgrupo` (`idgrupo`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela dbacademia.tbexercicio: ~45 rows (aproximadamente)
INSERT INTO `tbexercicio` (`idexercicio`, `idgrupo`, `nome`) VALUES
	(1, 1, 'Rosca Martelo com Halteres'),
	(2, 1, 'Rosca Polia Baixa Deitado'),
	(3, 1, 'Rosca Direta com Barra'),
	(4, 1, 'Rosca no Cross'),
	(5, 1, 'Barra Fixa Pegada Supinada'),
	(6, 2, 'Supino Reto com Pegada Fechada'),
	(7, 2, 'Extensão de Tríceps Deitado'),
	(8, 2, 'Tríceps Francês'),
	(9, 2, 'Extensão de Tríceps no cabo sob a Cabeça com a Corda'),
	(10, 2, 'Tríceps na Polia Alta com Corda'),
	(11, 3, 'Supino Inclinado com Halteres'),
	(12, 3, 'Supino Reto com Barra'),
	(13, 3, 'Afundo nas Barras Paralelas'),
	(14, 3, 'Crossover com Pegada Alta'),
	(15, 3, 'Flexões'),
	(16, 4, 'Elevação Lateral de Ombro'),
	(17, 4, 'Elevação Frontal de Ombro'),
	(18, 4, 'Arnold Press'),
	(19, 4, 'Remada Alta no Cross'),
	(20, 4, 'Crucifixo Inverso'),
	(21, 5, 'Remada Curvada com Barra'),
	(22, 5, 'Barra Fixa com Pegada Pronada e Supinada'),
	(23, 5, 'Levantamento Terra'),
	(24, 5, 'Remada Unilateral no Banco'),
	(25, 5, 'Encolhimento de Ombros na Barra'),
	(26, 6, 'Afundo Búlgaro'),
	(27, 6, 'Leg Press'),
	(28, 6, 'Cadeira Extensora'),
	(29, 6, 'Agachamento com Barra'),
	(30, 6, 'Hack'),
	(31, 7, 'Stiff'),
	(32, 7, 'Levantamento Terra'),
	(33, 7, 'Cadeira Flexora'),
	(34, 7, 'Mesa Flexora'),
	(35, 7, 'Afundo com Halteres'),
	(36, 8, 'Agachamento Sumô'),
	(37, 8, 'Elevação Pélvica na Máquina'),
	(38, 8, 'Coice'),
	(39, 8, 'Cadeira Adutora'),
	(40, 8, 'Cadeira Abdutora'),
	(41, 9, 'Elevação de Panturrilha em Pé'),
	(42, 9, 'Elevação de Panturrilha em Pé no Smith'),
	(43, 9, 'Elevação de Panturrilha no Leg Press'),
	(44, 9, 'Elevação de panturrilha com carga em uma perna'),
	(45, 9, 'Elevação de Panturrilha Sentado');

-- Copiando estrutura para tabela dbacademia.tbficha
CREATE TABLE IF NOT EXISTS `tbficha` (
  `idficha` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idava` int(11) unsigned DEFAULT NULL,
  `datficha` date NOT NULL,
  PRIMARY KEY (`idficha`),
  KEY `fk_ava` (`idava`),
  CONSTRAINT `fk_ava` FOREIGN KEY (`idava`) REFERENCES `tbavaliacao` (`idava`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela dbacademia.tbficha: ~3 rows (aproximadamente)
INSERT INTO `tbficha` (`idficha`, `idava`, `datficha`) VALUES
	(1, 1, '2023-05-01'),
	(2, 2, '2023-05-31'),
	(4, 4, '2023-06-26');

-- Copiando estrutura para tabela dbacademia.tbgrupo
CREATE TABLE IF NOT EXISTS `tbgrupo` (
  `idgrupo` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  PRIMARY KEY (`idgrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela dbacademia.tbgrupo: ~9 rows (aproximadamente)
INSERT INTO `tbgrupo` (`idgrupo`, `descricao`) VALUES
	(1, 'Bíceps'),
	(2, 'Tríceps'),
	(3, 'Peito'),
	(4, 'Ombro'),
	(5, 'Costas'),
	(6, 'Quadríceps'),
	(7, 'Posterior de Coxa'),
	(8, 'Glúteos'),
	(9, 'Panturrilha');

-- Copiando estrutura para tabela dbacademia.tbitem_ficha
CREATE TABLE IF NOT EXISTS `tbitem_ficha` (
  `iditem_ficha` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idficha` int(11) unsigned DEFAULT NULL,
  `idexercicio` int(11) unsigned DEFAULT NULL,
  `serie` int(2) unsigned NOT NULL,
  `repeticoes` int(2) unsigned NOT NULL,
  `tipo_treino` char(1) NOT NULL,
  PRIMARY KEY (`iditem_ficha`),
  KEY `fk_ficha` (`idficha`),
  KEY `fk_exercicio` (`idexercicio`),
  CONSTRAINT `fk_exercicio` FOREIGN KEY (`idexercicio`) REFERENCES `tbexercicio` (`idexercicio`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ficha` FOREIGN KEY (`idficha`) REFERENCES `tbficha` (`idficha`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela dbacademia.tbitem_ficha: ~17 rows (aproximadamente)
INSERT INTO `tbitem_ficha` (`iditem_ficha`, `idficha`, `idexercicio`, `serie`, `repeticoes`, `tipo_treino`) VALUES
	(1, 1, 1, 10, 12, 'A'),
	(2, 1, 2, 10, 12, 'A'),
	(3, 1, 3, 10, 10, 'A'),
	(4, 1, 7, 10, 8, 'A'),
	(5, 1, 8, 8, 12, 'A'),
	(6, 2, 1, 8, 10, 'A'),
	(7, 2, 2, 8, 10, 'A'),
	(8, 2, 3, 8, 10, 'A'),
	(9, 2, 4, 8, 10, 'A'),
	(10, 2, 5, 8, 10, 'A'),
	(23, 4, 13, 10, 10, 'C'),
	(24, 4, 18, 10, 10, 'C'),
	(25, 4, 3, 9, 12, 'A'),
	(26, 4, 11, 10, 9, 'A'),
	(27, 4, 8, 10, 9, 'A'),
	(28, 4, 5, 10, 10, 'C'),
	(29, 4, 2, 10, 10, 'A');

-- Copiando estrutura para tabela dbacademia.tbusu
CREATE TABLE IF NOT EXISTS `tbusu` (
  `idusu` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `cargo` varchar(15) NOT NULL,
  PRIMARY KEY (`idusu`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela dbacademia.tbusu: ~9 rows (aproximadamente)
INSERT INTO `tbusu` (`idusu`, `email`, `senha`, `cargo`) VALUES
	(1, 'admin@admin.com', 'admin', 'G'),
	(2, 'analivia@gmail.com', 'livia', 'A'),
	(3, 'aryslan@gmail.com', 'aryslan', 'A'),
	(4, 'joseisac@gmail.com', 'joseisac', 'A'),
	(5, 'matheusravier@gmail.com', 'matheusravier', 'A'),
	(6, 'william@gmail.com', 'william', 'A'),
	(7, 'everton@gmail.com', 'everton', 'E'),
	(8, 'alisson@gmail.com', 'alissom', 'E'),
	(9, 'jhonatas@gmail.com', 'jhonatas', 'E');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;