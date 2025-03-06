-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/03/2025 às 14:03
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
-- Banco de dados: `game`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `moedas` int(11) DEFAULT 0,
  `qr_code_link` varchar(255) NOT NULL,
  `xp_atual` int(11) DEFAULT 0,
  `xp_total` int(11) DEFAULT 100,
  `nivel` int(11) DEFAULT 1,
  `avatar` varchar(255) DEFAULT 'asset/img/avatar/Robo Estudante.gif',
  `fundo` varchar(50) DEFAULT 'especial'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `moedas`, `qr_code_link`, `xp_atual`, `xp_total`, `nivel`, `avatar`, `fundo`) VALUES
(86, 'José Ícaro', 50, '', 0, 200, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(87, 'Amy Hadassa', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(88, 'João Guilherme', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(89, 'Ana Cecilia', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(90, 'Miqueias', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(91, 'Helena Mota', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(92, 'João Gabriel', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(93, 'Anne Isabel', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(94, 'Kemily Ithiely', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(95, 'José Evandro', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(96, 'Joao Victor', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(97, 'Ayra Eloa', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(98, 'Fernanda Andrade', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(99, 'Caio Victor', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(100, 'Thayza Rayza', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(101, 'Calebe Soares', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(102, 'Joao Miguel', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(103, 'Antonio Miguel', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(104, 'Luiz Miguel', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(105, 'Alana Iasmin', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(106, 'Arthur Miguel', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(107, 'Ramon Italo', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(108, 'Ana Sofia', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(109, 'Joane', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(110, 'Angelo Isaac', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(111, 'Valentina', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(112, 'Sofia Melo', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(113, 'Lara Lohana', 5, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(114, 'Ilana', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(115, 'Anderson José', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(116, 'Maria Clara Silva', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(117, 'Ewerton', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(118, 'Lucas Gabriel', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(119, 'Vitor William', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(120, 'Ana Leticia', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(121, 'João Vitor', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(122, 'Moaby dos Santos', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial'),
(123, 'Kathleen', 0, '', 0, 100, 1, 'asset/img/avatar/Robo Estudante.gif', 'especial');

--
-- Acionadores `alunos`
--
DELIMITER $$
CREATE TRIGGER `atualizar_nivel` BEFORE UPDATE ON `alunos` FOR EACH ROW SET NEW.nivel = GREATEST(FLOOR(NEW.xp_total / 1000), 1)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos_turmas`
--

CREATE TABLE `alunos_turmas` (
  `aluno_id` int(11) NOT NULL,
  `turma_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `alunos_turmas`
--

INSERT INTO `alunos_turmas` (`aluno_id`, `turma_id`) VALUES
(86, 20),
(87, 20),
(88, 20),
(89, 21),
(90, 21),
(91, 21),
(92, 21),
(93, 21),
(94, 33),
(95, 33),
(96, 33),
(97, 33),
(98, 33),
(99, 24),
(100, 24),
(101, 24),
(102, 24),
(103, 24),
(104, 25),
(105, 25),
(106, 25),
(107, 25),
(108, 25),
(109, 25),
(110, 26),
(111, 26),
(112, 27),
(113, 27),
(114, 27),
(115, 27),
(116, 27),
(117, 27),
(118, 28),
(119, 28),
(120, 28),
(121, 28),
(122, 28),
(123, 28);

-- --------------------------------------------------------

--
-- Estrutura para tabela `estatisticas_alunos`
--

CREATE TABLE `estatisticas_alunos` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `total_moedas_ganhas` int(11) DEFAULT 0,
  `total_moedas_perdidas` int(11) DEFAULT 0,
  `total_transacoes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `missoes`
--

CREATE TABLE `missoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `xp` int(11) NOT NULL,
  `moedas` int(11) NOT NULL,
  `status` enum('ativa','inativa') DEFAULT 'ativa',
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `link` varchar(255) NOT NULL,
  `criador_id` int(11) DEFAULT NULL,
  `turma_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `missoes`
--

INSERT INTO `missoes` (`id`, `nome`, `descricao`, `xp`, `moedas`, `status`, `data_criacao`, `link`, `criador_id`, `turma_id`) VALUES
(1, 'Avalie o colégio no Google', 'Deixe uma avaliação no perfil do colégio no Google e envie uma captura de tela.', 100, 50, 'ativa', '2024-12-06 23:46:22', 'https://www.google.com/maps/place//data=!4m3!3m2!1s0x7737a0f9bb4c19f:0x4f9cf3f9180437d9!12e1?source=g.page.m.ia._&laa=nmx-review-solicitation-ia2', NULL, NULL),
(2, 'Poste uma foto no Instagram e marque o colégio', 'Tire uma foto no colégio ou durante um evento, poste no Instagram e marque o perfil oficial do colégio.', 150, 75, 'ativa', '2024-12-06 23:46:22', '', NULL, NULL),
(3, 'Participe de um evento escolar', 'Compareça a um evento promovido pelo colégio e registre sua presença com a organização.', 200, 100, 'ativa', '2024-12-06 23:46:22', '', NULL, NULL),
(4, 'Indique um amigo para visitar o colégio', 'Indique um amigo para conhecer o colégio. A indicação precisa ser registrada na secretaria.', 300, 150, 'ativa', '2024-12-06 23:46:22', '', NULL, NULL),
(5, 'Escreva uma mensagem de agradecimento para os professores', 'Escreva uma mensagem de agradecimento para seus professores e entregue-a no formato de carta ou email.', 50, 20, 'ativa', '2024-12-06 23:46:22', '', NULL, NULL),
(6, 'Compartilhe um post do colégio nas redes sociais', 'Reposte um post oficial do colégio no seu Instagram ou Facebook e envie uma captura de tela.', 75, 30, 'ativa', '2024-12-06 23:46:22', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `moeda` decimal(10,2) NOT NULL,
  `descricao` text DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `professores`
--

CREATE TABLE `professores` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo_usuario` enum('professor','secretaria') DEFAULT 'professor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `professores`
--

INSERT INTO `professores` (`id`, `nome`, `email`, `senha`, `tipo_usuario`) VALUES
(3, 'Professor Teste', 'professor@teste.com', '$2y$10$pW5x78KE27K0LF2DK0/56ubIvl8nO6FQQx8txYy4BgrRBMQ/8eNny', 'professor'),
(6, 'Secretário Teste', 'secretario@teste.com', '$2y$10$eImiTXuWVxfM37uY4JANjOtrd6JcL3slxH9NpiFFDbhfgRlmCRK6i', 'secretaria'),
(9, 'Teste', 'secretario@teste.mail', '$2y$10$SFwzgNw2pxtRmUNL2F.boeuKs9LtD/XMp7j0kD407MLNltG0U94LC', 'secretaria'),
(29, 'Pró Miriam', 'pro_miriam@mail.com', '$2y$10$E2/Q/1j3rE4igU2aQtxVGO/nJ2skwD2hDGPkURWePkyggPi.Gdduq', 'professor'),
(30, 'Pró Zeneide', 'pro_zeneide@mail.com', '$2y$10$RCb.isut50HxoZS8m.L15.Q.G2FwVP7VUpjzx9dxcTxY2ps8kcKJS', 'professor'),
(31, 'Hebberton Monteiro', 'hebberton_monteiro@mail.com', '$2y$10$i9uO2K4mtJvLeZTKUwFlwudGZUUqpkLT/MLauE8FoUyt1bJqpZHl6', 'professor'),
(32, 'Ana Paula', 'ana_paula@mail.com', '$2y$10$ZFvRMHwhjlBOleI./CygUODIcT6O92xWkUUua3N1vtqiltU5Nme/i', 'professor'),
(33, 'Iasmin Bezerra', 'iasmin_bezerra@mail.com', '$2y$10$kh5FdyR3ZNgazECVSaUjPeRfQ6hFQXGUqbCw/yOVqEZb5szehG8pK', 'professor'),
(34, 'Akio', 'akio@mail.com', '$2y$10$2l7iIWaoZD2emQIGe5Fccuq6S5Zfz/5TGXJR526Ap0TJ7A3cmY5me', 'professor'),
(35, 'Ienne Andrade', 'ienne_andrade@mail.com', '$2y$10$sVowInZuxM.vODcLGhw9Tu9ElNJ7AYmmVIwP.F8cc4eJFjcXVDtuG', 'professor'),
(36, 'Maria Geovana', 'maria_geovana@mail.com', '$2y$10$QlME5gAn/h97BaGuCbv3ZOK/q/z73JNfaXyelrT0zkHc7miAWyWpi', 'professor'),
(37, 'Jose Igor', 'jose_igor@mail.com', '$2y$10$kZibLkP.sjcX7dBpfVIfKuQKEO9rsqWU1lgLY1HVuCoaAs2ADekxK', 'professor'),
(38, 'Edvania Dias', 'edivania@mail.com', '$2y$10$LL0/x1ZwATTZC4dU3OyvxOe1sYrAnXjZ9yIG2PHpYlbl0HEy.6Gpi', 'secretaria');

-- --------------------------------------------------------

--
-- Estrutura para tabela `solicitacoes_missoes`
--

CREATE TABLE `solicitacoes_missoes` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `missao_id` int(11) NOT NULL,
  `status` enum('pendente','aprovado','rejeitado') DEFAULT 'pendente',
  `data_solicitacao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `solicitacoes_missoes`
--

INSERT INTO `solicitacoes_missoes` (`id`, `aluno_id`, `missao_id`, `status`, `data_solicitacao`) VALUES
(32, 86, 1, 'aprovado', '2025-02-17 22:05:20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `trocas`
--

CREATE TABLE `trocas` (
  `id` int(11) NOT NULL,
  `aluno_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `data_troca` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('pendente','aprovado','rejeitado') DEFAULT 'pendente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `ano_letivo` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `turmas`
--

INSERT INTO `turmas` (`id`, `nome`, `descricao`, `ano_letivo`) VALUES
(20, '1° ano', NULL, NULL),
(21, '2° ano', NULL, NULL),
(24, '5° ano', NULL, NULL),
(25, '6° ano', NULL, NULL),
(26, '7° ano', NULL, NULL),
(27, '8° ano', NULL, NULL),
(28, '9° ano', NULL, NULL),
(32, '3° ano', '', '2025'),
(33, '4° ano', '', '2025');

-- --------------------------------------------------------

--
-- Estrutura para tabela `turmas_professores`
--

CREATE TABLE `turmas_professores` (
  `turma_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `turmas_professores`
--

INSERT INTO `turmas_professores` (`turma_id`, `professor_id`) VALUES
(20, 29),
(21, 29),
(24, 31),
(24, 32),
(24, 33),
(24, 34),
(24, 35),
(24, 36),
(24, 37),
(25, 31),
(25, 32),
(25, 33),
(25, 34),
(25, 35),
(25, 36),
(25, 37),
(26, 31),
(26, 32),
(26, 33),
(26, 34),
(26, 35),
(26, 36),
(26, 37),
(27, 31),
(27, 32),
(27, 33),
(27, 34),
(27, 35),
(27, 36),
(27, 37),
(28, 31),
(28, 32),
(28, 33),
(28, 34),
(28, 35),
(28, 36),
(28, 37),
(33, 30);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `alunos_turmas`
--
ALTER TABLE `alunos_turmas`
  ADD PRIMARY KEY (`aluno_id`,`turma_id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Índices de tabela `estatisticas_alunos`
--
ALTER TABLE `estatisticas_alunos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aluno_id` (`aluno_id`);

--
-- Índices de tabela `missoes`
--
ALTER TABLE `missoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `criador_id` (`criador_id`),
  ADD KEY `turma_id` (`turma_id`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `solicitacoes_missoes`
--
ALTER TABLE `solicitacoes_missoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aluno_id` (`aluno_id`),
  ADD KEY `missao_id` (`missao_id`);

--
-- Índices de tabela `trocas`
--
ALTER TABLE `trocas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aluno_id` (`aluno_id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices de tabela `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Índices de tabela `turmas_professores`
--
ALTER TABLE `turmas_professores`
  ADD PRIMARY KEY (`turma_id`,`professor_id`),
  ADD KEY `professor_id` (`professor_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de tabela `estatisticas_alunos`
--
ALTER TABLE `estatisticas_alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `missoes`
--
ALTER TABLE `missoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `solicitacoes_missoes`
--
ALTER TABLE `solicitacoes_missoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `trocas`
--
ALTER TABLE `trocas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `alunos_turmas`
--
ALTER TABLE `alunos_turmas`
  ADD CONSTRAINT `alunos_turmas_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`),
  ADD CONSTRAINT `alunos_turmas_ibfk_2` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`);

--
-- Restrições para tabelas `estatisticas_alunos`
--
ALTER TABLE `estatisticas_alunos`
  ADD CONSTRAINT `estatisticas_alunos_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`);

--
-- Restrições para tabelas `missoes`
--
ALTER TABLE `missoes`
  ADD CONSTRAINT `missoes_ibfk_1` FOREIGN KEY (`criador_id`) REFERENCES `professores` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `missoes_ibfk_2` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `missoes_ibfk_3` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `solicitacoes_missoes`
--
ALTER TABLE `solicitacoes_missoes`
  ADD CONSTRAINT `solicitacoes_missoes_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `solicitacoes_missoes_ibfk_2` FOREIGN KEY (`missao_id`) REFERENCES `missoes` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `trocas`
--
ALTER TABLE `trocas`
  ADD CONSTRAINT `trocas_ibfk_1` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`),
  ADD CONSTRAINT `trocas_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Restrições para tabelas `turmas_professores`
--
ALTER TABLE `turmas_professores`
  ADD CONSTRAINT `turmas_professores_ibfk_1` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`),
  ADD CONSTRAINT `turmas_professores_ibfk_2` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
