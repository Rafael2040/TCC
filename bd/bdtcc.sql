-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Jan-2021 às 00:45
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `criador_treinos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `aluno_id` int(11) NOT NULL,
  `personal_id` int(11) DEFAULT NULL,
  `nome` varchar(70) NOT NULL,
  `endereco` varchar(30) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `data_de_nascimento` date DEFAULT NULL,
  `nivel_de_treinamento` varchar(15) DEFAULT NULL,
  `objetivo` varchar(100) DEFAULT NULL,
  `email` varchar(320) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`aluno_id`, `personal_id`, `nome`, `endereco`, `sexo`, `data_de_nascimento`, `nivel_de_treinamento`, `objetivo`, `email`, `senha`, `observacoes`) VALUES
(19, 34, 'rrr', '2040', 'M', '2020-09-09', 'nenhum', '23423432423423', 'jooj@gmail.com', '$2y$10$.AShQPCkHAXoS9zffc5pOuDSbkd2LrV/U5gi6YJhYKi.m..WOamUS', '4234234242343'),
(20, 35, 'pepa', 'casc', 'M', '2020-09-01', 'basico', 'sdcdscsdc', 'pepe@pepe.com', '$2y$10$/nelNIAv9J80JdyYed.89.OIm3zVWRrHLGEJ0fU9LbsGFacebImBW', 'sdcs'),
(22, 36, 'Oscar Inácio Casmurro', '2040', 'M', '0000-00-00', 'nenhum', 'ficar fortão pra bater na esposa', 'asd@gmail.com', '$2y$10$QSS2sULtgtSfZhH5qdjWguDxXPPUAwy7WcU2kAOKnTcAdU4OReZZG', 'gordo'),
(24, 37, 'qadad', 'asdsad@gmail.com', 'M', '2020-10-07', 'nenhum', 'asdasd', 'asdsad@gmail.com', '$2y$10$5Ry/y.xSiG4BmdNjxptKWekL3CBw79QP6Ygr.KmfxtkZ7b1C7T4dm', 'asdasd'),
(25, 39, 'Universitário', 'Rua Luiz Fornari', 'M', '2020-11-04', 'intermediario', 'asdasd', 'lolo@a.com', '$2y$10$54w0P0gQzH/ziW7LGT6Bo.WMAnEQRon59yChBxdOAa/cQypcrNLAe', 'asdas'),
(26, 32, 'BOlsonaro', '2040', 'M', '2020-11-11', 'avancado', 'asdasd', '45@gmail.com', '$2y$10$ZeGA.zhyeEc/siCFes2E2.dtlMs6Q5/ZGE2mvHgz2EgntE0HE/7C6', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `divisao`
--

CREATE TABLE `divisao` (
  `divisao_id` int(11) NOT NULL,
  `treino_id` int(11) NOT NULL,
  `rotulo` varchar(1) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `divisao`
--

INSERT INTO `divisao` (`divisao_id`, `treino_id`, `rotulo`, `descricao`) VALUES
(1, 6, 'a', 'vou te comer kkk bananao fp'),
(2, 6, '5', 'dsfsdfsdfsdfsdfsd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `divisao_exercicio`
--

CREATE TABLE `divisao_exercicio` (
  `divisao_exercicio_id` int(11) NOT NULL,
  `exercicio_id` int(11) NOT NULL,
  `divisao_id` int(11) NOT NULL,
  `n_series` varchar(30) DEFAULT NULL,
  `n_repeticoes` varchar(30) DEFAULT NULL,
  `carga` varchar(30) DEFAULT NULL,
  `observacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `exercicio`
--

CREATE TABLE `exercicio` (
  `exercicio_id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `nome_exercicio` varchar(100) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `tipo_de_estimulo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `exercicio`
--

INSERT INTO `exercicio` (`exercicio_id`, `personal_id`, `nome_exercicio`, `descricao`, `tipo_de_estimulo`) VALUES
(1, 38, 'dabunda', 'sentado', 'costas'),
(2, 38, 'cu de buseta', '312312', 'hehehe'),
(3, 32, 'lalala', 'lalaal', 'costas'),
(4, 32, 'lalala', 'sDSA', 'ASDSA'),
(5, 32, '', '', ''),
(6, 32, 'lalala', 'sDSA', 'ASDSA'),
(7, 32, 'buceta', 'pinto', 'cu cu cu');

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal`
--

CREATE TABLE `personal` (
  `personal_id` int(11) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `data_de_nascimento` date DEFAULT NULL,
  `email` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `personal`
--

INSERT INTO `personal` (`personal_id`, `nome`, `senha`, `data_de_nascimento`, `email`) VALUES
(24, 'asd', '25d55ad283aa400af464c76d713c07ad', '2020-07-21', 'asd@a.com'),
(25, 'rafa', '811c62b0b474774019a73c1c6960ffe9', '2020-07-14', 'rafaelzfornari@gmail.com'),
(26, 'raf', '25d55ad283aa400af464c76d713c07ad', '2020-07-07', 'rafaelzfornari@g.com'),
(27, 'asdf', '25d55ad283aa400af464c76d713c07ad', '2020-07-27', 'asdf@a.com'),
(28, 'abc', '22d7fe8c185003c98f97e5d6ced420c7', '2020-07-22', 'abc@a.com'),
(29, 'aaa', '25d55ad283aa400af464c76d713c07ad', '2020-07-20', 'aaa@a.com'),
(30, 'bbb', '25d55ad283aa400af464c76d713c07ad', '2020-07-01', 'bbb@b.com'),
(31, 'lala', '22d7fe8c185003c98f97e5d6ced420c7', '2020-07-02', 'lala@a.com'),
(32, 'lala', '25d55ad283aa400af464c76d713c07ad', '2020-07-20', 'lala@lala.com'),
(33, 'lolo', '25d55ad283aa400af464c76d713c07ad', '2020-07-06', 'lolo@a.com'),
(34, 'lkk', '25d55ad283aa400af464c76d713c07ad', '2020-09-15', 'lk@lk'),
(35, 'pepa', '25d55ad283aa400af464c76d713c07ad', '2020-09-02', 'pepa@pepa'),
(36, 'lulu', '25d55ad283aa400af464c76d713c07ad', '2020-09-06', 'lulu@lulu.com'),
(37, 'cleito', '25d55ad283aa400af464c76d713c07ad', '2020-10-14', 'cleito@a.com'),
(38, 'asdas', '25d55ad283aa400af464c76d713c07ad', '2020-11-05', 'jojo@gmail.com'),
(39, 'Universitário', '25d55ad283aa400af464c76d713c07ad', '2020-11-10', 'lp@gmail.com'),
(40, 'Rafael Zibetti Fornari', '827ccb0eea8a706c4c34a16891f84e7b', '2020-12-08', 'lalalal@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `treino`
--

CREATE TABLE `treino` (
  `treino_id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `observacoes` text DEFAULT NULL,
  `objetivo` varchar(50) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `treino`
--

INSERT INTO `treino` (`treino_id`, `aluno_id`, `observacoes`, `objetivo`, `data`) VALUES
(2, 26, 'uiui ', 'Coxa', '0000-00-00'),
(3, 26, 'uiui ', 'Coxa', '0000-00-00'),
(4, 26, 'ui ui ui bananao é viadam', 'CAGAR EM PÈ', '2020-12-15'),
(5, 26, 'ui ui ui bananao é viadam', 'CAGAR EM PÈ', '2020-12-15'),
(6, 26, 'ui ui ui bananao é viadam', 'CAGAR EM PÈ', '2020-12-15');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`aluno_id`),
  ADD KEY `aluno_ibfk_1` (`personal_id`);

--
-- Índices para tabela `divisao`
--
ALTER TABLE `divisao`
  ADD PRIMARY KEY (`divisao_id`),
  ADD KEY `treino_id` (`treino_id`);

--
-- Índices para tabela `divisao_exercicio`
--
ALTER TABLE `divisao_exercicio`
  ADD PRIMARY KEY (`divisao_exercicio_id`),
  ADD KEY `exercicio_id` (`exercicio_id`),
  ADD KEY `divisao_id` (`divisao_id`);

--
-- Índices para tabela `exercicio`
--
ALTER TABLE `exercicio`
  ADD PRIMARY KEY (`exercicio_id`),
  ADD KEY `personal_id` (`personal_id`);

--
-- Índices para tabela `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`personal_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices para tabela `treino`
--
ALTER TABLE `treino`
  ADD PRIMARY KEY (`treino_id`),
  ADD KEY `aluno_fk` (`aluno_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `aluno_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `divisao`
--
ALTER TABLE `divisao`
  MODIFY `divisao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `divisao_exercicio`
--
ALTER TABLE `divisao_exercicio`
  MODIFY `divisao_exercicio_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `exercicio`
--
ALTER TABLE `exercicio`
  MODIFY `exercicio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `personal`
--
ALTER TABLE `personal`
  MODIFY `personal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `treino`
--
ALTER TABLE `treino`
  MODIFY `treino_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `aluno_ibfk_1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`personal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `divisao`
--
ALTER TABLE `divisao`
  ADD CONSTRAINT `divisao_ibfk_1` FOREIGN KEY (`treino_id`) REFERENCES `treino` (`treino_id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `divisao_exercicio`
--
ALTER TABLE `divisao_exercicio`
  ADD CONSTRAINT `divisao_exercicio_ibfk_1` FOREIGN KEY (`exercicio_id`) REFERENCES `exercicio` (`exercicio_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `divisao_exercicio_ibfk_2` FOREIGN KEY (`divisao_id`) REFERENCES `divisao` (`divisao_id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `exercicio`
--
ALTER TABLE `exercicio`
  ADD CONSTRAINT `exercicio_ibfk_1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`personal_id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `treino`
--
ALTER TABLE `treino`
  ADD CONSTRAINT `aluno_fk` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`aluno_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
