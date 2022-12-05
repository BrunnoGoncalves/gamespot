-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Dez-2022 às 16:22
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gamespot`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `adm`
--

CREATE TABLE `adm` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Brunno Gonçalves ', 'brunnofilho2004@gmail.com', '$2y$10$uYqgihqrFh4OknLQ9X47AenjqaiTZcKosby0enbe06XnIkeDUhF8q');

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`id`, `name`) VALUES
(6, 'RPG'),
(7, 'aventura'),
(8, 'ação'),
(9, 'Novel'),
(10, 'Simulador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo`
--

CREATE TABLE `jogo` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `Descrição` text NOT NULL,
  `Produtor` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `Genero` varchar(255) NOT NULL,
  `id-genero` int(11) NOT NULL,
  `id-prod` int(11) NOT NULL,
  `Arquivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `jogo`
--

INSERT INTO `jogo` (`id`, `title`, `Descrição`, `Produtor`, `cover`, `Genero`, `id-genero`, `id-prod`, `Arquivo`) VALUES
(1, 'Danganronpa 2: Goodbye Despair', 'Você e seus colegas de classe estavam prontos para se divertirem na Jabberwock Island quando Monokuma retorna com o seu jogo sanguinário! Agora é matar ou morrer e a sua única esperança é resolver os mistérios da ilha.', '\r\nSpike Chunsoft Co., Ltd.', 'Danganronpa.jpg', 'Misterio,terro,investigação', 0, 0, 'Super Danganronpa 2 (English v0.5a).iso'),
(4, 'Pokemon:Emerald', 'Enfrenta as poderosas equipas Magma e Aqua nesta mais recente aventura Pokémon! Em Pokémon Emerald, protege a região de Hoenn das misteriosas forças de solo e água Groudon e Kyogre, que ameaçam assumir o seu controlo. Felizmente, o poder de Rayquaza – o céu – pode ajudar-te. Até os treinadores de Pokémon mais experientes terão de dar tudo o que têm, uma vez que Pokémon Emerald contém algumas das mais duras batalhas em que alguma vez participarão. Procura os sete novos concorrentes Frontier Brain para localizares todos os símbolos na Battle Frontier. Áreas totalmente novas de Hoenn serão reveladas nesta emocionante extensão de Pokémon Ruby e Pokémon Sapphire', 'Game Freak', 'emerald.jpg', 'RPG', 0, 0, 'Pokemon - Emerald Version (USA, Europe).gba'),
(11, 'Fire emblem', 'Fire Emblem é um jogo de estratégia com elementos de RPG, onde o jogador deve remanejar personagens (que formam o seu exército) ao longo de mapas, a fim de explorá-los para conseguir novos itens, descobrir novos personagens e destruir inimigos.', 'Intelligent Systems', '637f91d1b676a8.42796770.jpg', 'RPG', 0, 0, '637f91d1b6b597.72898941.gba');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prod`
--

CREATE TABLE `prod` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `prod`
--

INSERT INTO `prod` (`id`, `name`) VALUES
(8, 'Game freak'),
(12, 'Sony'),
(13, 'Sega'),
(18, 'Atlus'),
(19, 'Intelligent Systems'),
(20, 'Bungie'),
(21, 'Ubisoft');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `jogo`
--
ALTER TABLE `jogo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `prod`
--
ALTER TABLE `prod`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `adm`
--
ALTER TABLE `adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `jogo`
--
ALTER TABLE `jogo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `prod`
--
ALTER TABLE `prod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
