-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 17-Jun-2022 às 00:54
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `forum`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `assuntos`
--

CREATE TABLE `assuntos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `assuntos`
--

INSERT INTO `assuntos` (`id`, `nome`, `slug`) VALUES
(1, 'Desenvolvimento Web', 'desenvolvimento-web'),
(3, 'Desenvolvimento de Games', 'desenvolvimento-de-games');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mesagem` text NOT NULL,
  `slug_topico` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `mesagem`, `slug_topico`) VALUES
(1, 7, '                        Preciso de ajuda aqui             ', 'desenvolvimento-web/php'),
(2, 7, '            Tenho um problema em php, será que rola um help?      ', 'desenvolvimento-web/php'),
(3, 8, ' A resposta é esta', 'desenvolvimento-web/php'),
(6, 8, ' Tenho uma dúvida neste código', 'desenvolvimento-de-games/python'),
(8, 8, '                         E agora como faz?              ', 'desenvolvimento-web/javascript'),
(9, 7, ' Value obrigado', 'desenvolvimento-web/php'),
(10, 8, ' nada não', 'desenvolvimento-web/php');

-- --------------------------------------------------------

--
-- Estrutura da tabela `topicos`
--

CREATE TABLE `topicos` (
  `id` int(11) NOT NULL,
  `assunto_id` int(11) NOT NULL,
  `topico` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `topicos`
--

INSERT INTO `topicos` (`id`, `assunto_id`, `topico`, `slug`, `user_id`, `dia`) VALUES
(1, 1, 'PHP', 'desenvolvimento-web/php', 7, '15/09/2022'),
(4, 3, 'Python', 'desenvolvimento-de-games/python', 8, '16/06/2022'),
(6, 3, 'Unreal Engine', 'desenvolvimento-de-games/unreal-engine', 0, ''),
(10, 1, 'Javascript', 'desenvolvimento-web/javascript', 8, '15/06/2022');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nick` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `resumo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nick`, `email`, `pass`, `foto`, `resumo`) VALUES
(7, 'Cyx', 'revoltarangel@gmail.com', '123456', 'c234fcae4139962a36380f21555c19662aa58752e623.jpg', '            Me chama no email!\r\n             '),
(8, 'Haku', 'pele@gmail.com', '1234', 'robot62abb39bd9777.png', '                    ');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `assuntos`
--
ALTER TABLE `assuntos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `topicos`
--
ALTER TABLE `topicos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `assuntos`
--
ALTER TABLE `assuntos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `topicos`
--
ALTER TABLE `topicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
