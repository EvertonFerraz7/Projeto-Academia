-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/05/2024 às 00:16
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbacademia`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbaluno`
--

CREATE TABLE `tbaluno` (
  `idaluno` int(11) UNSIGNED NOT NULL,
  `idusu` int(11) UNSIGNED DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `sexo` char(1) NOT NULL,
  `data_nasc` date NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `numero_casa` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbaluno`
--

INSERT INTO `tbaluno` (`idaluno`, `idusu`, `nome`, `sexo`, `data_nasc`, `cpf`, `bairro`, `rua`, `numero_casa`) VALUES
(1, 2, 'Ana Lívia Oliveira Rodrigues', 'F', '2005-12-23', '123.456.789-10', 'Alto da Expectativa', 'Doutor José de Azevedo', 0),
(2, 3, 'Antonio Aryslan de Castro Fonteles', 'M', '2005-08-29', '123.456.789-10', 'Alto da Expectativa', 'Avenida José Figueiredo de Paulo Pessoa', 0),
(3, 4, 'José Isac Araújo Monção', 'M', '2006-05-13', '123.456.789-10', 'Terrenos Novos', 'Rua Dr. Thomás Aragão', 0),
(4, 5, 'Matheus Ravier Lima de Sousa', 'M', '2006-07-04', '123.456.789-10', 'Campos dos Velhos', 'Sete de Setembro', 0),
(5, 6, 'William do Nascimento Ferreira Gomes', 'M', '2005-08-12', '123.456.789-10', 'Padre Palhano', 'Rua José da Mata', 47);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbavaliacao`
--

CREATE TABLE `tbavaliacao` (
  `idava` int(11) UNSIGNED NOT NULL,
  `idaluno` int(11) UNSIGNED DEFAULT NULL,
  `ideducador` int(11) UNSIGNED DEFAULT NULL,
  `idgrupo` int(11) UNSIGNED DEFAULT NULL,
  `datava` date NOT NULL,
  `horaava` time NOT NULL,
  `med_braco` int(3) NOT NULL,
  `med_antebraco` int(3) NOT NULL,
  `med_coxa` int(3) NOT NULL,
  `med_panturrilha` int(3) NOT NULL,
  `objetivo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbavaliacao`
--

INSERT INTO `tbavaliacao` (`idava`, `idaluno`, `ideducador`, `idgrupo`, `datava`, `horaava`, `med_braco`, `med_antebraco`, `med_coxa`, `med_panturrilha`, `objetivo`) VALUES
(1, 3, 3, 4, '2023-04-19', '10:14:20', 30, 28, 40, 27, 'HIPERTROFIA'),
(2, 3, 1, 3, '2023-05-03', '10:00:00', 35, 30, 45, 28, 'EMAGRECER'),
(4, 3, 2, 1, '2023-06-25', '15:29:49', 30, 30, 30, 30, 'Ficar Forte');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbeducador`
--

CREATE TABLE `tbeducador` (
  `ideducador` int(11) UNSIGNED NOT NULL,
  `idusu` int(11) UNSIGNED DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `sexo` char(1) NOT NULL,
  `data_nasc` date NOT NULL,
  `cpf` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbeducador`
--

INSERT INTO `tbeducador` (`ideducador`, `idusu`, `nome`, `sexo`, `data_nasc`, `cpf`) VALUES
(1, 7, 'Everton Lima Ferraz', 'M', '2006-04-18', '123.456.789-10'),
(2, 8, 'Francisco Alisson Azevedo de Lima', 'M', '2005-11-17', '123.456.789-10'),
(3, 9, 'Jhonatas Jorge Mendonça', 'M', '2006-01-30', '123.456.789-10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbexercicio`
--

CREATE TABLE `tbexercicio` (
  `idexercicio` int(11) UNSIGNED NOT NULL,
  `idgrupo` int(11) UNSIGNED DEFAULT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbexercicio`
--

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbficha`
--

CREATE TABLE `tbficha` (
  `idficha` int(11) UNSIGNED NOT NULL,
  `idava` int(11) UNSIGNED DEFAULT NULL,
  `datficha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbficha`
--

INSERT INTO `tbficha` (`idficha`, `idava`, `datficha`) VALUES
(1, 1, '2023-05-01'),
(2, 2, '2023-05-31'),
(4, 4, '2023-06-26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbgrupo`
--

CREATE TABLE `tbgrupo` (
  `idgrupo` int(11) UNSIGNED NOT NULL,
  `descricao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbgrupo`
--

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbusu`
--

CREATE TABLE `tbusu` (
  `idusu` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `cargo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tbusu`
--

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

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tbaluno`
--
ALTER TABLE `tbaluno`
  ADD PRIMARY KEY (`idaluno`),
  ADD KEY `fk_usu` (`idusu`);

--
-- Índices de tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  ADD PRIMARY KEY (`idava`),
  ADD KEY `fk_aluno` (`idaluno`),
  ADD KEY `fk_educador` (`ideducador`),
  ADD KEY `fk_grupo` (`idgrupo`);

--
-- Índices de tabela `tbeducador`
--
ALTER TABLE `tbeducador`
  ADD PRIMARY KEY (`ideducador`),
  ADD KEY `fk_usu2` (`idusu`);

--
-- Índices de tabela `tbexercicio`
--
ALTER TABLE `tbexercicio`
  ADD PRIMARY KEY (`idexercicio`),
  ADD KEY `fk_grupo2` (`idgrupo`);

--
-- Índices de tabela `tbficha`
--
ALTER TABLE `tbficha`
  ADD PRIMARY KEY (`idficha`),
  ADD KEY `fk_ava` (`idava`);

--
-- Índices de tabela `tbgrupo`
--
ALTER TABLE `tbgrupo`
  ADD PRIMARY KEY (`idgrupo`);

--
-- Índices de tabela `tbusu`
--
ALTER TABLE `tbusu`
  ADD PRIMARY KEY (`idusu`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbaluno`
--
ALTER TABLE `tbaluno`
  MODIFY `idaluno` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  MODIFY `idava` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbeducador`
--
ALTER TABLE `tbeducador`
  MODIFY `ideducador` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tbexercicio`
--
ALTER TABLE `tbexercicio`
  MODIFY `idexercicio` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `tbficha`
--
ALTER TABLE `tbficha`
  MODIFY `idficha` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tbgrupo`
--
ALTER TABLE `tbgrupo`
  MODIFY `idgrupo` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tbusu`
--
ALTER TABLE `tbusu`
  MODIFY `idusu` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tbaluno`
--
ALTER TABLE `tbaluno`
  ADD CONSTRAINT `fk_usu` FOREIGN KEY (`idusu`) REFERENCES `tbusu` (`idusu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tbavaliacao`
--
ALTER TABLE `tbavaliacao`
  ADD CONSTRAINT `fk_aluno` FOREIGN KEY (`idaluno`) REFERENCES `tbaluno` (`idaluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_educador` FOREIGN KEY (`ideducador`) REFERENCES `tbeducador` (`ideducador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_grupo` FOREIGN KEY (`idgrupo`) REFERENCES `tbgrupo` (`idgrupo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tbeducador`
--
ALTER TABLE `tbeducador`
  ADD CONSTRAINT `fk_usu2` FOREIGN KEY (`idusu`) REFERENCES `tbusu` (`idusu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tbexercicio`
--
ALTER TABLE `tbexercicio`
  ADD CONSTRAINT `fk_grupo2` FOREIGN KEY (`idgrupo`) REFERENCES `tbgrupo` (`idgrupo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `tbficha`
--
ALTER TABLE `tbficha`
  ADD CONSTRAINT `fk_ava` FOREIGN KEY (`idava`) REFERENCES `tbavaliacao` (`idava`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
