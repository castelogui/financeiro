-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 26-Jun-2023 às 04:09
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `financeiro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoriaconta`
--

DROP TABLE IF EXISTS `categoriaconta`;
CREATE TABLE IF NOT EXISTS `categoriaconta` (
  `idCategoriaConta` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomeCategoriaConta` varchar(255) DEFAULT NULL,
  `iconeCategoriaConta` varchar(255) DEFAULT NULL,
  `statusCategoriaConta` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idCategoriaConta`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `categoriaconta`
--

INSERT INTO `categoriaconta` (`idCategoriaConta`, `nomeCategoriaConta`, `iconeCategoriaConta`, `statusCategoriaConta`) VALUES
(1, 'Carro', 'fas fa-car', 1),
(8, 'Café', 'fas fa-coffee', 1),
(3, 'Clima', 'fas fa-cloud', 1),
(4, 'Sucesso', 'fas fa-star', 0),
(5, 'Foguete', 'fas fa-rocket', 0),
(6, 'Noite', 'fas fa-moon', 1),
(7, 'Casamento', 'fas fa-heart', 1),
(9, 'Jogos', 'fas fa-gamepad', 1),
(10, 'Tecnologia', 'fas fa-laptop', 1),
(11, 'Manutenção', 'fas fa-wrench', 1),
(12, 'Estudos', 'fas fa-book', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoriaregistro`
--

DROP TABLE IF EXISTS `categoriaregistro`;
CREATE TABLE IF NOT EXISTS `categoriaregistro` (
  `idCategoriaRegistro` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `TipoRegistro_idTipoRegistro` int UNSIGNED NOT NULL,
  `descricaoCategoriaRegistro` varchar(255) DEFAULT NULL,
  `iconeCategoriaRegistro` varchar(255) DEFAULT NULL,
  `corCategoriaRegistro` varchar(255) DEFAULT NULL,
  `statusCategoriaRegistro` tinyint(1) DEFAULT NULL,
  `permiteFilhos` tinyint(1) DEFAULT NULL,
  `idCategoriaPai` int NOT NULL,
  PRIMARY KEY (`idCategoriaRegistro`),
  KEY `CategoriaRegistro_FKIndex1` (`TipoRegistro_idTipoRegistro`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `categoriaregistro`
--

INSERT INTO `categoriaregistro` (`idCategoriaRegistro`, `TipoRegistro_idTipoRegistro`, `descricaoCategoriaRegistro`, `iconeCategoriaRegistro`, `corCategoriaRegistro`, `statusCategoriaRegistro`, `permiteFilhos`, `idCategoriaPai`) VALUES
(1, 2, 'Categoria 1 Teste', 'fas fa-laptop', 'success', 0, 1, 0),
(2, 1, 'Salario', 'fas fa-wrench', 'danger', 0, 1, 0),
(3, 2, 'Moto', 'fas fa-car', 'warning', 0, 0, 0),
(4, 1, 'Musica', 'fas fa-music', 'warning', 0, 0, 0),
(5, 1, 'riti', 'fas fa-coffee', '---', 0, 0, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

DROP TABLE IF EXISTS `conta`;
CREATE TABLE IF NOT EXISTS `conta` (
  `idConta` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `CategoriaConta_idCategoriaConta` int UNSIGNED NOT NULL,
  `Usuario_idUsuario` int UNSIGNED NOT NULL,
  `nomeConta` varchar(255) DEFAULT NULL,
  `corConta` varchar(255) DEFAULT NULL,
  `saldoConta` float DEFAULT NULL,
  `statusConta` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idConta`),
  KEY `Conta_FKIndex1` (`Usuario_idUsuario`),
  KEY `Conta_FKIndex2` (`CategoriaConta_idCategoriaConta`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`idConta`, `CategoriaConta_idCategoriaConta`, `Usuario_idUsuario`, `nomeConta`, `corConta`, `saldoConta`, `statusConta`) VALUES
(2, 10, 1, 'Musica', 'success', 200, 1),
(4, 5, 2, 'Conta da Sol e da Lua', 'danger', 1000, 1),
(5, 4, 1, 'conta teste', 'dark', 2, NULL),
(6, 5, 1, 'Salario', 'primary', 2045, NULL),
(7, 5, 2, 'celular', 'success', 600, NULL),
(8, 1, 1, 'casamento', 'danger', 30000, 0),
(9, 7, 1, 'casamento', 'success', 1000000, NULL),
(10, 6, 2, 'nova conta', 'warning', 532, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

DROP TABLE IF EXISTS `registro`;
CREATE TABLE IF NOT EXISTS `registro` (
  `idRegistro` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `Usuario_idUsuario` int UNSIGNED NOT NULL,
  `CategoriaRegistro_idCategoriaRegistro` int UNSIGNED NOT NULL,
  `Conta_idConta` int UNSIGNED NOT NULL,
  `TipoRegistro_idTipoRegistro` int UNSIGNED NOT NULL,
  `valorRegistro` decimal(10,0) DEFAULT NULL,
  `dataRegistro` date DEFAULT NULL,
  `horaRegistro` time DEFAULT NULL,
  `descricaoRegistro` varchar(255) DEFAULT NULL,
  `statusRegistro` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idRegistro`),
  KEY `Registro_FKIndex1` (`TipoRegistro_idTipoRegistro`),
  KEY `Registro_FKIndex2` (`Conta_idConta`),
  KEY `Registro_FKIndex3` (`CategoriaRegistro_idCategoriaRegistro`),
  KEY `Registro_FKIndex4` (`Usuario_idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `registro`
--

INSERT INTO `registro` (`idRegistro`, `Usuario_idUsuario`, `CategoriaRegistro_idCategoriaRegistro`, `Conta_idConta`, `TipoRegistro_idTipoRegistro`, `valorRegistro`, `dataRegistro`, `horaRegistro`, `descricaoRegistro`, `statusRegistro`) VALUES
(1, 1, 1, 6, 1, '900', '2023-06-22', '02:44:59', 'Registro de teste', 1),
(2, 1, 3, 2, 2, '-45', '2023-06-22', '16:29:59', 'Picolé', 1),
(3, 1, 2, 2, 2, '-15', '2023-06-23', '17:10:22', 'Gasolina', 2),
(4, 3, 1, 6, 1, '20', '2023-07-22', '22:57:00', 'primeira transação teste', 2),
(7, 1, 4, 5, 1, '600', '2023-07-01', '12:00:00', 'alugeu', 2),
(8, 2, 2, 4, 2, '7', '2023-04-02', '10:23:00', 'teste', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tiporegistro`
--

DROP TABLE IF EXISTS `tiporegistro`;
CREATE TABLE IF NOT EXISTS `tiporegistro` (
  `idTipoRegistro` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `descricaoTipoRegistro` varchar(255) DEFAULT NULL,
  `statusTipoRegistro` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idTipoRegistro`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `tiporegistro`
--

INSERT INTO `tiporegistro` (`idTipoRegistro`, `descricaoTipoRegistro`, `statusTipoRegistro`) VALUES
(1, 'Receita', 1),
(2, 'Despesa', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomeUsuario` varchar(255) DEFAULT NULL,
  `sobrenomeUsuario` varchar(255) DEFAULT NULL,
  `dtNascUsuario` date DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `emailUsuario` varchar(255) DEFAULT NULL,
  `senhaUsuario` varchar(255) DEFAULT NULL,
  `statusUsuario` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idUsuario`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `sobrenomeUsuario`, `dtNascUsuario`, `username`, `emailUsuario`, `senhaUsuario`, `statusUsuario`) VALUES
(1, 'root', 'admin', '2000-01-01', 'root', 'root@root.com', 'root', 1),
(2, 'Guilherme ', 'Castelo', '1999-09-19', 'castelogui', 'guilhermecastelo.mail@gmail.com', '12345', 0),
(3, 'Ritielen', 'Tobias', '2001-06-14', 'ritielentobias', 'ritielentobias7@gmail.com', '123', 1),
(4, 'Samuel', 'Matos Silva', '1973-04-06', 'samuca', 'samuelmatossilva1969@gmail.com', '12345', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
