-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Abr-2019 às 21:40
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `concurso`
--
create Database concurso;
-- --------------------------------------------------------

--
-- Estrutura da tabela `concursos`
--

CREATE TABLE `concursos` (
  `id` int(11) NOT NULL,
  `edicao` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `ativo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `concursos`
--

INSERT INTO `concursos` (`id`, `edicao`, `ano`, `ativo`) VALUES
(1, 0, 2015, 0),
(2, 0, 2015, 0),
(4, 0, 2016, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `confirma_votacao`
--

CREATE TABLE `confirma_votacao` (
  `user_id` int(11) NOT NULL,
  `participante_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `confirma_votacao`
--

INSERT INTO `confirma_votacao` (`user_id`, `participante_id`) VALUES
(18, 13),
(18, 14),
(29, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `juizes_texto`
--

CREATE TABLE `juizes_texto` (
  `id` int(1) NOT NULL,
  `j1_nome` varchar(33) NOT NULL,
  `j1_prof` varchar(33) NOT NULL,
  `j2_nome` varchar(33) NOT NULL,
  `j2_prof` varchar(33) NOT NULL,
  `j3_nome` varchar(33) NOT NULL,
  `j3_prof` varchar(33) NOT NULL,
  `j4_nome` varchar(33) NOT NULL,
  `j4_prof` varchar(33) NOT NULL,
  `j1_cam` varchar(50) NOT NULL,
  `j2_cam` varchar(50) NOT NULL,
  `j3_cam` varchar(50) NOT NULL,
  `j4_cam` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `juizes_texto`
--

INSERT INTO `juizes_texto` (`id`, `j1_nome`, `j1_prof`, `j2_nome`, `j2_prof`, `j3_nome`, `j3_prof`, `j4_nome`, `j4_prof`, `j1_cam`, `j2_cam`, `j3_cam`, `j4_cam`) VALUES
(1, 'António Beldroegas', 'Biólogo', 'Anabela Ventura', 'Veterinária', 'Miguel Vicente', 'Veterinário', 'Joana Dias', 'Auxiliar Clínica Veterinária', 'img/team-1.jpg', 'img/team-2.jpg', 'img/team-3.jpg', 'img/team-4.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `participantes`
--

CREATE TABLE `participantes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `ano_nasc` int(11) NOT NULL,
  `numero_chip` int(11) NOT NULL,
  `raca` varchar(50) NOT NULL,
  `classificacao` int(5) NOT NULL DEFAULT '0',
  `vacinas` varchar(3) NOT NULL,
  `sexo` varchar(6) NOT NULL,
  `img` varchar(255) NOT NULL,
  `concurso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `participantes`
--

INSERT INTO `participantes` (`id`, `user_id`, `nome`, `ano_nasc`, `numero_chip`, `raca`, `classificacao`, `vacinas`, `sexo`, `img`, `concurso_id`) VALUES
(13, 18, 'teste', 2014, 1234, 'teste', 30, 'sim', 'male', '5cbc9d38f25d3.jpg', 0),
(14, 17, 'cao_teste', 2018, 123415, 'raca_teste', 60, 'sim', 'male', '5cbc9ed57f5a5.jpg', 4),
(15, 17, 'kn', 2011, 124156, 'kn', 0, 'sim', 'male', '5cbc9f230f7ab.jpg', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `regulamento`
--

CREATE TABLE `regulamento` (
  `reg_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `regulamento`
--

INSERT INTO `regulamento` (`reg_text`) VALUES
('<h2 style=\"color:white\">Regulamento</h2>\r\n              <p style=\"color:white;\">\r\n              Concurso promovido e organizado pelo Clube Português de Canicultura,\r\n                  aberto a exemplares de todas as raças e variedades oficialmente reconhecidas,\r\n                  registadas no <b>Livro de Origens Português</b> (LOP), nos organismos na \r\n                  <b>Federação Cinológica Internacional</b>(FCI) ou no <b>Registo Inicial</b> (RI).</p>\r\n              \r\n              <h3 style=\"color:white\">Inscrição</h3>\r\n                  <p style=\"color:white\">Efetuada on-line, gratuitamente. Os participantes devem comparecer\r\n                   no dia do concurso com o <b>LOP</b> ou o <b>RI</b> dos exemplares inscritos para validar \r\n                   a participação, até as 14 horas do dia do concurso.</p>\r\n                   \r\n              <h3 style=\"color:white\">Classes</h3>\r\n              \r\n              <p style=\"color:white\">Juniores: 6 aos 15 meses</p>\r\n              \r\n                  <ul style=\"list-style-type:square;\">\r\n                      <li style=\"color:white\">1º prémio: Voucher Restaurante para 2 pessoas + Ração de 10 kilos + Cabaz Regional;</li>\r\n                      <li style=\"color:white\">2º prémio: Ração de 5 kilos + Cabaz Regional;</li>\r\n                      <li style=\"color:white\">3º prémio Ração de 3,5 kilos + Cabaz Regional;</li>\r\n                  </ul>\r\n              \r\n              <p style=\"color:white\">Adultos: 16 meses a 8 anos</p>\r\n                  <ul style=\"list-style-type:square;\">\r\n                      <li style=\"color:white\">1º prémio: Voucher Restaurante para 2 pessoas + Ração de 10 kilos + Cabaz Regional;</li>\r\n                      <li style=\"color:white\">2º prémio: Ração de 5 kilos + Cabaz Regional;</li>\r\n                      <li style=\"color:white\">3º prémio Ração de 3,5 kilos + Cabaz Regional;</li>\r\n                  </ul>   \r\n                   \r\n              <p style=\"color:white\">Veteranos: 9 anos ou mais</p>\r\n                  <ul style=\"list-style-type:square;\">\r\n                      <li style=\"color:white\">1º prémio: Voucher Restaurante para 2 pessoas + Ração de 10 kilos + Cabaz Regional;</li>\r\n                      <li style=\"color:white\">2º prémio: Ração de 5 kilos + Cabaz Regional;</li>\r\n                      <li style=\"color:white\">3º prémio Ração de 3,5 kilos + Cabaz Regional;</li>\r\n                  </ul>   \r\n                   \r\n                  <ul style=\"list-style-type:square;\">\r\n                          <li style=\"color:white\">1º prémio: Voucher Restaurante para 2 pessoas + Ração de 10 kilos + Cabaz Regional;</li>\r\n                          <li style=\"color:white\">2º prémio: Ração de 5 kilos + Cabaz Regional;</li>\r\n                          <li style=\"color:white\">3º prémio Ração de 3,5 kilos + Cabaz Regional;</li>\r\n                        </ul>   \r\n                        \r\n              <h3 style=\"color:white\">Normas</h3>         \r\n              \r\n              <p style=\"color:white\">Todos os animais que se apresentem ao concurso devem, <b>obrigatoriamente</b>, \r\n                  estar identificados eletronicamente (microchip), possuir a vacina antirrábica \r\n                  e contra as principais doenças infectocontagiosas da espécie, devidamente \r\n                  comprovadas de acordo com o Artº4, ponto 4, alínea a), b) e c) do decreto \r\n                  de lei nº314/2003, de 17 de Dezembro.<br> Este concurso não dispõe de bancadas para arrumação dos \r\n                  exemplares.<br>É expressamente proibida a venda de animais no recinto do concurso Cãodela. <br>              \r\n              Em todos os casos não mencionados neste regulamento, vigora o estabelecido no \r\n                  Regulamento de Exposições e Concursos de Beleza. (Eventos de Morfologia \r\n                  Canina).</p>\r\n              <br>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(2) NOT NULL,
  `participa` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `level`, `participa`) VALUES
(17, 'Alexandre', 'alexandredssousa98@gmail.com', 'f64ba71a5d1ccd651a3d742b1e9c5c77', 0, 1),
(18, 'juiz', 'juiz@juiz.juiz', '8c9886730270e38337595e827083e2a2', 1, 1),
(27, 'Alexandre', '123@gmail.com', 'fce8f77d2290af5d67d6b1d8ae97ddfb', 0, 0),
(28, 'izimitee', 'cyberplague0@gmail.com', '2358c20a34f7c2c63efec18b1fd9b863', 0, 0),
(29, 'Alexandre', 'juiz2@juiz.juiz', '2358c20a34f7c2c63efec18b1fd9b863', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concursos`
--
ALTER TABLE `concursos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirma_votacao`
--
ALTER TABLE `confirma_votacao`
  ADD PRIMARY KEY (`user_id`,`participante_id`);

--
-- Indexes for table `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users` (`id`,`email`,`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concursos`
--
ALTER TABLE `concursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
