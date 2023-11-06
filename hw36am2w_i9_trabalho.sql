-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 05-Nov-2023 às 03:06
-- Versão do servidor: 5.6.41-cll-lve
-- versão do PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hw36am2w_i9_trabalho`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat`
--

CREATE TABLE `chat` (
  `id_msg` int(11) NOT NULL,
  `id_user_enviou` int(11) NOT NULL,
  `id_user_recebeu` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `localizacoes`
--

CREATE TABLE `localizacoes` (
  `id_localizacao` int(11) NOT NULL,
  `pais` text NOT NULL,
  `distrito` text NOT NULL,
  `cidade` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `localizacoes`
--

INSERT INTO `localizacoes` (`id_localizacao`, `pais`, `distrito`, `cidade`) VALUES
(77, 'PT', '', 'Portimão'),
(78, 'PT', '', 'Portimão'),
(79, 'PT', '', 'Portimão'),
(80, 'PT', '', 'Portimão'),
(81, 'PT', '', 'tt'),
(82, 'PT', '', 'Portimão'),
(83, 'PT', '', 'Portimão'),
(84, 'PT', '', 'Portimão'),
(85, 'PT', '', 'asdad'),
(86, 'PT', '', 'asd'),
(87, 'PT', '', 'Portimão'),
(88, 'PT', '', 'Teste'),
(89, 'PT', '', 'Teste'),
(90, 'PT', '', 'Portimão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `id_mensagem` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id_mensagem`, `user_from`, `user_to`, `mensagem`, `data`) VALUES
(54, 63, 66, 'Olá Joaquim Kulatra, como vai isso?', '2019-03-12 01:06:20'),
(55, 66, 63, 'Vai bem', '2019-03-12 01:06:59'),
(56, 64, 63, 'Espetáculo, é mais bonito ao vivo', '2019-03-12 01:33:33'),
(57, 64, 64, 'Teste\n', '2019-03-12 12:52:22'),
(58, 64, 64, 'Testar de novo\n', '2019-03-12 16:45:12'),
(59, 64, 64, 'teste', '2019-03-12 17:06:37'),
(60, 64, 64, 'Mais um teste', '2019-03-12 17:51:22'),
(61, 64, 64, 'gklnhmdfghl\n', '2019-03-12 17:52:31'),
(62, 63, 63, 'g', '2019-03-13 00:39:57'),
(63, 64, 64, 'Teste', '2019-03-13 01:51:26'),
(64, 67, 64, 'Olá', '2019-03-13 12:12:08'),
(65, 64, 67, 'Olá, tudo bem?', '2019-03-13 12:13:55'),
(66, 63, 64, ';)', '2019-03-13 17:24:21'),
(67, 63, 63, 'd', '2019-03-13 22:16:00'),
(68, 67, 66, 'k', '2019-03-24 17:30:40'),
(69, 66, 63, '.', '2019-03-25 01:04:58'),
(70, 66, 63, 'olá gabriel', '2019-03-26 02:13:57'),
(71, 63, 66, 'sds', '2019-04-10 16:29:30'),
(72, 63, 63, 'skr', '2019-05-06 15:49:34'),
(73, 64, 69, 'Está a funcionar? XD', '2019-06-15 16:03:46'),
(74, 63, 63, 'a\n', '2020-05-04 23:30:15'),
(75, 63, 63, 's', '2020-05-04 23:31:20'),
(76, 63, 63, 'a', '2020-05-08 00:31:05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `id_notificacao` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `id_user_enviou` int(11) NOT NULL,
  `id_user_recebeu` int(11) NOT NULL,
  `texto` text NOT NULL,
  `data` datetime NOT NULL,
  `vista_notificacoes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `notificacoes`
--

INSERT INTO `notificacoes` (`id_notificacao`, `tipo`, `id_user_enviou`, `id_user_recebeu`, `texto`, `data`, `vista_notificacoes`) VALUES
(13, 'mensagem', 63, 66, '', '2019-03-12 01:06:20', 0),
(14, 'mensagem', 66, 63, '', '2019-03-12 01:06:59', 0),
(15, 'mensagem', 64, 63, '', '2019-03-12 01:33:33', 0),
(16, 'mensagem', 64, 64, '', '2019-03-12 12:52:22', 0),
(17, 'mensagem', 64, 64, '', '2019-03-12 16:45:12', 0),
(18, 'mensagem', 64, 64, '', '2019-03-12 17:06:37', 0),
(19, 'mensagem', 64, 64, '', '2019-03-12 17:51:22', 0),
(20, 'mensagem', 64, 64, '', '2019-03-12 17:52:31', 0),
(21, 'mensagem', 63, 63, '', '2019-03-13 00:39:57', 0),
(22, 'mensagem', 64, 64, '', '2019-03-13 01:51:26', 0),
(23, 'mensagem', 67, 64, '', '2019-03-13 12:12:08', 0),
(24, 'mensagem', 64, 67, '', '2019-03-13 12:13:55', 0),
(25, 'mensagem', 63, 64, '', '2019-03-13 17:24:21', 0),
(26, 'mensagem', 63, 63, '', '2019-03-13 22:16:00', 0),
(27, 'mensagem', 67, 66, '', '2019-03-24 17:30:40', 0),
(28, 'mensagem', 66, 63, '', '2019-03-25 01:04:58', 0),
(29, 'mensagem', 66, 63, '', '2019-03-26 02:13:57', 0),
(30, 'mensagem', 63, 66, '', '2019-04-10 16:29:30', 0),
(31, 'mensagem', 63, 63, '', '2019-05-06 15:49:34', 0),
(32, 'mensagem', 64, 69, '', '2019-06-15 16:03:46', 1),
(33, 'mensagem', 63, 63, '', '2020-05-04 23:30:15', 0),
(34, 'mensagem', 63, 63, '', '2020-05-04 23:31:20', 0),
(35, 'mensagem', 63, 63, '', '2020-05-08 00:31:05', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orcamentos`
--

CREATE TABLE `orcamentos` (
  `id_orcamento` int(11) NOT NULL,
  `orcamento_min` double NOT NULL,
  `orcamento_max` double NOT NULL,
  `orcamento_final` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `orcamentos`
--

INSERT INTO `orcamentos` (`id_orcamento`, `orcamento_min`, `orcamento_max`, `orcamento_final`) VALUES
(77, 0, 0, 1350),
(78, 0, 0, 100),
(79, 0, 0, 25),
(80, 0, 0, 780),
(81, 0, 0, 123),
(82, 0, 0, 123),
(83, 0, 0, 123),
(84, 0, 0, 4500),
(85, 0, 0, 300),
(86, 0, 0, 123),
(87, 0, 0, 1233),
(88, 0, 0, 1500),
(89, 0, 0, 1500),
(90, 0, 0, 1500);

-- --------------------------------------------------------

--
-- Estrutura da tabela `portfolio`
--

CREATE TABLE `portfolio` (
  `id_trabalho` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nome_trabalho` varchar(100) NOT NULL,
  `descricao_trabalho` varchar(600) NOT NULL,
  `imagem` varchar(8000) NOT NULL DEFAULT 'imagens/portfolio/default.png',
  `capa` varchar(350) NOT NULL DEFAULT 'imagens/portfolio/default.png	',
  `tamanho_imagem` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `portfolio`
--

INSERT INTO `portfolio` (`id_trabalho`, `id_user`, `nome_trabalho`, `descricao_trabalho`, `imagem`, `capa`, `tamanho_imagem`) VALUES
(71, 64, 'Identidade Visual - J Braz C', 'Proposta visual para J. Braz C., feita em colaboração de Paulo Júnior Design.', 'imagens/portfolio/71/main/apresentação.jpg', 'imagens/portfolio/71/capas/capa.jpg', 0),
(72, 64, 'Design Gráfico - João Pedro Mendes', 'Cartaz e flyer desenvolvido para a apresentação de conclusão de curso de João Pedro Mendes.', 'imagens/portfolio/72/main/apresentação.jpg', 'imagens/portfolio/72/capas/capa.png', 0),
(77, 64, 'Identidade Visual - Impacto', 'A Impacto é uma empresa de design gráfico fundada em 2020, sobre o comando de Paulo Nasciutti, com a missão de produzir e entregar projetos de qualidade. \nPara a criação desta marca, foi tido em conta a faceta de produção, ponto forte da empresa, então apostamos numa marca forte, sólida e relacionada com a produção. Todas as letras foram desenhadas de forma a dar importância ao “IM” onde se encontra o imagótipo do logo.', 'imagens/portfolio/77/main/apresentação.png', 'imagens/portfolio/77/capas/capa.png', 0),
(78, 64, 'Identidade Visual - BMMTG', 'Na construção da marca quisemos passar a ideia de templo do saber e da diversidade do conhecimento, como tal, usamos de base a estrutura de uma coluna grega, adaptada de forma a ter evidente o &quot;M&quot; de Manuel Teixeira Gomes - nome do presidente, escritor nascido na mesma cidade.', 'imagens/portfolio/78/apresentação.png', 'imagens/portfolio/78/capas/capa.png', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `id_projeto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nome_do_negocio` varchar(30) NOT NULL,
  `descricao` text NOT NULL,
  `id_orcamento` int(11) NOT NULL,
  `id_localizacao` int(11) NOT NULL,
  `website` text NOT NULL,
  `anexo` text NOT NULL,
  `data_acabamento` datetime NOT NULL,
  `aprovado` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `projetos`
--

INSERT INTO `projetos` (`id_projeto`, `id_user`, `nome_do_negocio`, `descricao`, `id_orcamento`, `id_localizacao`, `website`, `anexo`, `data_acabamento`, `aprovado`) VALUES
(77, 63, 'Gabriel Brandao', 'Rede social .....', 77, 77, 'socialsivex.com', 'anexos/utilizadores/63/Projetos 2018.txt', '2019-03-07 00:00:00', 0),
(79, 64, 'Gabriel Vicente', 'gdfg', 79, 79, 'gdf', '', '0000-00-00 00:00:00', 0),
(80, 63, 'SocialSivex', 'yy....yyy', 80, 80, 'google.com', 'anexos/utilizadores/63/Musicas ChillYourMind.txt', '0000-00-00 00:00:00', 0),
(84, 63, 'SocialSivex', 'Description etc.. Social network', 84, 84, 'socialsivex.com', 'anexos/utilizadores/63/7baa252dbdfeed669c152bedd2fa5feb.jpg', '0000-00-00 00:00:00', 0),
(124, 63, 'asd', 'sd<br>Serviço: Fazer um Website<br>Administrador escolhido:Gabriel Brandão', 77, 77, '', '', '2019-04-27 00:00:00', 0),
(125, 63, 'Teste', 'não ligues a isto, é um teste<br>Serviço: Fazer um Website<br>Administrador escolhido:Gabriel Vicente', 77, 77, '', '', '2020-05-22 00:00:00', 0),
(126, 64, 'sdfsdf', 'sdfsdvd<br>Serviço: Fazer um Website<br>Administrador escolhido:Gabriel Brandão', 77, 79, '', '', '2021-10-13 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `statos` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `statos`) VALUES
(0, 'ativo'),
(1, 'desativado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `apelido` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `foto` varchar(300) NOT NULL DEFAULT 'user.png',
  `role_status` int(11) NOT NULL DEFAULT '0',
  `profissao` varchar(100) NOT NULL DEFAULT 'Utilizador',
  `saldo` int(30) NOT NULL,
  `data_nascimento` date NOT NULL,
  `telefone` int(10) NOT NULL,
  `vista` int(11) NOT NULL DEFAULT '0',
  `vista_notificacao` int(11) NOT NULL DEFAULT '0',
  `vista_notificacao2` int(11) NOT NULL DEFAULT '0',
  `vista_email` int(11) NOT NULL DEFAULT '0',
  `vista_anos` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `apelido`, `email`, `password`, `foto`, `role_status`, `profissao`, `saldo`, `data_nascimento`, `telefone`, `vista`, `vista_notificacao`, `vista_notificacao2`, `vista_email`, `vista_anos`) VALUES
(63, 'Gabriel', 'Brandão', 'deostulti2@gmail.com', '$2y$10$ituQXni3YzrKSDQmZXs0lO229VugEHdFMeyLR3MIn7F7wSJA5hgDu', 'imagens/utilizadores/63/perfil2-gabriel.png', 1, 'Programador', 0, '2000-10-02', 968937031, 0, 0, 0, 0, 0),
(64, 'Gabriel', 'Vicente', 'gabrielvicent98@gmail.com', '$2y$10$4Hm0qAZgAxk0AE5UVObDwu0naJHjQM0L2873D4VzxpbUUubveeTQ2', 'imagens/utilizadores/64/1638227123.png', 1, 'Designer Gráfico', 0, '1998-04-01', 933027351, 0, 0, 0, 0, 1),
(66, 'Joaquim ', 'Kulatra', 'testing4thewinmlg@gmail.com', '$2y$10$/yTCfavgyWcJinkmVjNaDevicz11kIOTP8Q.JMhKpedjYuV5ZkokK', 'user.png', 0, 'Utilizador', 0, '2019-03-11', 968937031, 1, 0, 0, 0, 0),
(67, 'Francisco', 'Nunes', 'fgdn11@gmail.com', '$2y$10$aEEnpgLw.S6DKAVBMyAVRetnIGC3R5cplTsSRpHqrOvXWjwDxRixW', 'imagens/utilizadores/67/1555103621.png', 0, 'Utilizador', 0, '1997-09-21', 962480288, 0, 0, 0, 0, 0),
(69, 'João', 'Mendes', 'mendesjoao98@gmail.com', '$2y$10$8kwKi6AqEV3HIRs1dP9hi.yJ7Dv0Dj5/gbZp8anbL3.b/xJcpSoK2', 'user.png', 0, 'Músico', 0, '1998-09-12', 965409855, 1, 0, 0, 1, 0),
(70, 'André', 'Hassani', 'hrstudio.production@gmail.com', '$2y$10$AmcCCokzcf/K0BPOOnwApew.alb/QFk0BRCjrGxGiYNcT2gQ5BoWG', 'user.png', 0, 'Produtor', 0, '1995-04-12', 964198245, 0, 0, 0, 0, 0),
(71, 'Miguel', 'Veterano', 'info@kore.pt', '$2y$10$vTmMtYKS2n72vW1zuhKjRe7slcjpOKE8sZibwt.V0JMqpEeUIbodu', 'user.png', 0, 'Utilizador', 0, '0000-00-00', 925126482, 0, 0, 0, 0, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_msg`),
  ADD UNIQUE KEY `id_user_enviou` (`id_user_enviou`),
  ADD UNIQUE KEY `id_user_recebeu` (`id_user_recebeu`);

--
-- Índices para tabela `localizacoes`
--
ALTER TABLE `localizacoes`
  ADD PRIMARY KEY (`id_localizacao`);

--
-- Índices para tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`id_mensagem`),
  ADD KEY `user_from` (`user_from`),
  ADD KEY `user_to` (`user_to`) USING BTREE;

--
-- Índices para tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id_notificacao`),
  ADD KEY `id_user_enviou_not` (`id_user_enviou`),
  ADD KEY `id_user_recebeu_not` (`id_user_recebeu`);

--
-- Índices para tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  ADD PRIMARY KEY (`id_orcamento`);

--
-- Índices para tabela `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id_trabalho`),
  ADD KEY `id_user` (`id_user`);

--
-- Índices para tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id_projeto`),
  ADD KEY `id_user_projeto` (`id_user`),
  ADD KEY `id_localizacao_projeto` (`id_localizacao`),
  ADD KEY `id_orcamento_projeto` (`id_orcamento`);

--
-- Índices para tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chat`
--
ALTER TABLE `chat`
  MODIFY `id_msg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `localizacoes`
--
ALTER TABLE `localizacoes`
  MODIFY `id_localizacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `id_mensagem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id_notificacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `orcamentos`
--
ALTER TABLE `orcamentos`
  MODIFY `id_orcamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de tabela `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id_trabalho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_user_enviou`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`id_user_recebeu`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD CONSTRAINT `mensagens_ibfk_1` FOREIGN KEY (`user_from`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `mensagens_ibfk_2` FOREIGN KEY (`user_to`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD CONSTRAINT `notificacoes_ibfk_1` FOREIGN KEY (`id_user_enviou`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notificacoes_ibfk_2` FOREIGN KEY (`id_user_recebeu`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `projetos`
--
ALTER TABLE `projetos`
  ADD CONSTRAINT `projetos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `projetos_ibfk_2` FOREIGN KEY (`id_orcamento`) REFERENCES `orcamentos` (`id_orcamento`),
  ADD CONSTRAINT `projetos_ibfk_3` FOREIGN KEY (`id_localizacao`) REFERENCES `localizacoes` (`id_localizacao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
