-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 23-Abr-2023 às 01:28
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_redacao`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `email` varchar(45) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `nome_completo` varchar(70) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `administrador`
--

INSERT INTO `administrador` (`email`, `senha`, `nome_completo`) VALUES
('prof@adm.com', 'tamires', 'Tamires');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico_monitor`
--

DROP TABLE IF EXISTS `historico_monitor`;
CREATE TABLE IF NOT EXISTS `historico_monitor` (
  `id_historico` int(11) NOT NULL AUTO_INCREMENT,
  `nome_monitor` varchar(80) CHARACTER SET utf8 NOT NULL,
  `historico` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_historico`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `historico_monitor`
--

INSERT INTO `historico_monitor` (`id_historico`, `nome_monitor`, `historico`) VALUES
(24, 'felipe', 'info');

-- --------------------------------------------------------

--
-- Estrutura da tabela `monitor`
--

DROP TABLE IF EXISTS `monitor`;
CREATE TABLE IF NOT EXISTS `monitor` (
  `email` varchar(45) NOT NULL,
  `senha_monitor` varchar(20) NOT NULL,
  `nome_completo` varchar(70) CHARACTER SET utf8 NOT NULL,
  `bio` varchar(250) CHARACTER SET utf8 NOT NULL,
  `email_administrador` varchar(45) NOT NULL,
  PRIMARY KEY (`email`),
  KEY `email_administrador` (`email_administrador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `monitor`
--

INSERT INTO `monitor` (`email`, `senha_monitor`, `nome_completo`, `bio`, `email_administrador`) VALUES
('ney@g', '1234', 'neymar', 'grande atleta', 'prof@adm.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `redacoes`
--

DROP TABLE IF EXISTS `redacoes`;
CREATE TABLE IF NOT EXISTS `redacoes` (
  `id_redacao` int(11) NOT NULL AUTO_INCREMENT,
  `tema` longtext CHARACTER SET utf8,
  `autor` longtext CHARACTER SET utf8,
  `nota` int(11) DEFAULT NULL,
  `redacao` longtext CHARACTER SET utf8,
  `comentarios` longtext CHARACTER SET utf8,
  PRIMARY KEY (`id_redacao`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `redacoes`
--

INSERT INTO `redacoes` (`id_redacao`, `tema`, `autor`, `nota`, `redacao`, `comentarios`) VALUES
(10, 'DemocratizaÃ§Ã£o do acesso ao cinema no Brasil', 'Gabriel Melo Caldas Nogueira', 440, 'No filme estadunidense â€œCoringaâ€, o personagem principal, Arthur Fleck, sofre de um transtorno mental que o faz ter episÃ³dios de riso exagerado e descontrolado em pÃºblico, motivo pelo qual Ã© frequentemente atacado nas ruas. Em consonÃ¢ncia com a realidade de Arthur, estÃ¡ a de muitos cidadÃ£os, jÃ¡ que o estigma associado Ã s doenÃ§as mentais na sociedade brasileira ainda configura um desafio a ser sanado. Isso ocorre, seja pela negligÃªncia governamental nesse Ã¢mbito, seja pela discriminaÃ§Ã£o desta classe por parcela da populaÃ§Ã£o verde-amarela. Dessa maneira, Ã© imperioso que essa chaga social seja resolvida, a fim de que o longa norte-americano nÃ£o mais reflita o contexto atual da naÃ§Ã£o.\r\n\r\nNessa perspectiva, acerca da lÃ³gica referente aos transtornos da mente, Ã© vÃ¡lido retomar o aspecto supracitado quanto Ã  omissÃ£o estatal neste caso. Segundo a OMS (OrganizaÃ§Ã£o Mundial da SaÃºde), o Brasil Ã© o paÃ­s que apresenta o maior nÃºmero de casos de depressÃ£o da AmÃ©rica Latina e, mesmo diante desse cenÃ¡rio alarmante, os tratamentos Ã s doenÃ§as mentais, quando oferecidos, nÃ£o sÃ£o, na maioria das vezes, eficazes. Isso acontece pela falta de investimento pÃºblico em centros especializados no cuidado para com essas condiÃ§Ãµes. Consequentemente, muitos portadores, sobretudo aqueles de menor renda, nÃ£o sÃ£o devidamente tratados, contribuindo para sua progressiva marginalizaÃ§Ã£o perante o corpo social. Este quadro de inoperÃ¢ncia das esferas de poder exemplifica a teoria das InstituiÃ§Ãµes Zumbis, do sociÃ³logo Zygmunt Bauman, que as descreve como presentes na sociedade, mas que nÃ£o cumprem seu papel com eficÃ¡cia. Desse modo, Ã© imprescindÃ­vel que, para a refutaÃ§Ã£o da teoria do estudioso polonÃªs, essa problemÃ¡tica seja revertida.\r\n\r\n\r\nParalelamente ao descaso das esferas governamentais nessa questÃ£o, Ã© fundamental o debate acerca da aversÃ£o de parte dos civis ao grupo em pauta, uma vez que ambos sÃ£o impasses para sua completa socializaÃ§Ã£o. Esse preconceito se dÃ¡ pelos errÃ´neos ideais de felicidade disseminados na sociedade como metas universais. Entretanto, essas concepÃ§Ãµes segregam os indivÃ­duos entre os â€œfortesâ€ e os â€œfracosâ€, em que tais fracos, geralmente, integram a classe em discussÃ£o, dado que nÃ£o atingem essas metas estabelecidas, como a estabilidade emocional. Por conseguinte, aqueles que nÃ£o alcanÃ§am os objetivos sÃ£o estigmatizados e excluÃ­dos do tecido social. Tal conjuntura segregacionista - os que possuem algum tipo de transtorno, nesse caso - na teia social. Dessa maneira, essa problemÃ¡tica urge ser solucionada para que o princÃ­pio da alemÃ£ seja validado no paÃ­s tupiniquim.\r\n\r\nPortanto, sÃ£o essenciais medidas operantes para a reversÃ£o do estigma associado Ã s doenÃ§as mentais na sociedade brasileira. Para isso, compete ao MinistÃ©rio da SaÃºde investir na melhora da qualidade dos tratamentos a essas doenÃ§as nos centros pÃºblicos especializados de cuidados, destinando mais medicamentos e contratando, por concursos, mais profissionais da Ã¡rea, como psiquiatras e enfermeiros. Isso deve ser feito por meio de recursos autorizados pelo Tribunal de Contas da UniÃ£o - Ã³rgÃ£o que opera feitos pÃºblicos - com o fito de potencializar o atendimento a esses pacientes e oferecÃª-los um tratamento eficaz. Ademais, palestras devem ser realizadas em espaÃ§os pÃºblicos sobre os malefÃ­cios das falsas concepÃ§Ãµes de prazer e da importÃ¢ncia do acolhimento dos vulnerÃ¡veis. Assim, os ideais inalcanÃ§Ã¡veis nÃ£o mais serÃ£o instrumentos segregadores e, finalmente, a cotaÃ§Ã£o de Fleck nÃ£o mais representarÃ¡ a dos brasileiros.', 'No filme estadunidense â€œCoringaâ€, o personagem principal, Arthur Fleck, sofre de um transtorno mental que o faz ter episÃ³dios de riso exagerado e descontrolado em pÃºblico, motivo pelo qual Ã© frequentemente atacado nas ruas. Em consonÃ¢ncia com a realidade de Arthur, estÃ¡ a de muitos cidadÃ£os, jÃ¡ que o estigma associado Ã s doenÃ§as mentais na sociedade brasileihhgvbgvbv');

-- --------------------------------------------------------

--
-- Estrutura da tabela `repertorio`
--

DROP TABLE IF EXISTS `repertorio`;
CREATE TABLE IF NOT EXISTS `repertorio` (
  `id_repertorio` int(11) NOT NULL AUTO_INCREMENT,
  `data_citacao` int(11) NOT NULL,
  `nome_autor` varchar(45) CHARACTER SET utf8 NOT NULL,
  `citacao` varchar(70) CHARACTER SET utf8 NOT NULL,
  `id_tipo_repertorio` int(11) NOT NULL,
  `id_tematica` int(11) NOT NULL,
  `email_monitor` varchar(45) NOT NULL,
  PRIMARY KEY (`id_repertorio`),
  KEY `id_tematica` (`id_tematica`),
  KEY `id_tipo_repertorio` (`id_tipo_repertorio`),
  KEY `email_monitor` (`email_monitor`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `repertorio`
--

INSERT INTO `repertorio` (`id_repertorio`, `data_citacao`, `nome_autor`, `citacao`, `id_tipo_repertorio`, `id_tematica`, `email_monitor`) VALUES
(13, 1682212259, 'rene', '\"penso,logo existo\"', 7, 5, 'ney@g'),
(14, 1682212298, 'augusto comte', '\"ordem e progresso\"', 7, 6, 'ney@g');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tematica`
--

DROP TABLE IF EXISTS `tematica`;
CREATE TABLE IF NOT EXISTS `tematica` (
  `id_tematica` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_tematica`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tematica`
--

INSERT INTO `tematica` (`id_tematica`, `nome`) VALUES
(5, 'meio ambiente'),
(6, 'educaÃ§Ã£o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_repertorio`
--

DROP TABLE IF EXISTS `tipo_repertorio`;
CREATE TABLE IF NOT EXISTS `tipo_repertorio` (
  `id_tipo_repertorio` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_repertorio`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_repertorio`
--

INSERT INTO `tipo_repertorio` (`id_tipo_repertorio`, `nome`) VALUES
(7, 'filme');

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) CHARACTER SET utf8 NOT NULL,
  `link` varchar(80) NOT NULL,
  `descricao` varchar(90) CHARACTER SET utf8 NOT NULL,
  `data_public` int(11) NOT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `videos`
--

INSERT INTO `videos` (`id_video`, `nome`, `link`, `descricao`, `data_public`) VALUES
(7, 'introduÃ§Ã£o', 'uw1Tk-BdkXg', 'como montar a introduÃ§Ã£o da sua redaÃ§Ã£o', 1682212506);

-- --------------------------------------------------------

--
-- Estrutura da tabela `visitante`
--

DROP TABLE IF EXISTS `visitante`;
CREATE TABLE IF NOT EXISTS `visitante` (
  `email` varchar(45) NOT NULL,
  `senha` int(20) NOT NULL,
  `nome` varchar(70) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `visitante`
--

INSERT INTO `visitante` (`email`, `senha`, `nome`) VALUES
('diego9@gmail', 9, 'diego'),
('felipe@visitante.com', 0, 'Felipe');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `monitor`
--
ALTER TABLE `monitor`
  ADD CONSTRAINT `monitor_ibfk_1` FOREIGN KEY (`email_administrador`) REFERENCES `administrador` (`email`);

--
-- Limitadores para a tabela `repertorio`
--
ALTER TABLE `repertorio`
  ADD CONSTRAINT `repertorio_ibfk_1` FOREIGN KEY (`id_tematica`) REFERENCES `tematica` (`id_tematica`),
  ADD CONSTRAINT `repertorio_ibfk_2` FOREIGN KEY (`id_tipo_repertorio`) REFERENCES `tipo_repertorio` (`id_tipo_repertorio`),
  ADD CONSTRAINT `repertorio_ibfk_3` FOREIGN KEY (`email_monitor`) REFERENCES `monitor` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
