-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 19/10/2011 às 01h09min
-- Versão do Servidor: 5.5.16
-- Versão do PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `sis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `topico`
--

CREATE TABLE IF NOT EXISTS `topico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Extraindo dados da tabela `topico`
--

INSERT INTO `topico` (`id`, `nome`) VALUES
(1, 'TÍTULO I – Das Disposições Preliminares '),
(2, 'TÍTULO II – Da Instituição '),
(3, 'CAPÍTULO I – DA NATUREZA, OBJETIVOS E FINALIDADES '),
(4, 'CAPÍTULO II – DO PATRIMÔNIO '),
(5, 'Seção I – Dos Recursos Materiais '),
(6, 'Seção II – Dos Recursos Financeiros '),
(7, 'TÍTULO III – Da Organização Administrativa '),
(8, 'CAPÍTULO I – DA ESTRUTURA '),
(9, 'CAPÍTULO II – DOS ÓRGÃOS COLEGIADOS  '),
(10, 'Seção I – Do Conselho Superior '),
(11, 'Seção II – Do Colégio de Dirigentes  '),
(12, 'Seção III – Do Conselho de Ensino, Pesquisa, Extensão  '),
(13, 'Seção IV – Das Comissões Permanentes  '),
(14, 'Subseção I – Da Comissão de Ética '),
(15, 'Subseção II – Da Comissão Própria de Avaliação '),
(16, 'Subseção III – Da Comissão Própria de Pessoal Docente '),
(17, 'Subseção IV – Da Comissão Interna de Supervisão dos Técnico-Administrativos em Educação  '),
(18, 'CAPÍTULO III – DA REITORIA  '),
(19, 'Seção I – Do Reitor  '),
(20, 'Seção II – Do Gabinete do Reitor '),
(21, 'Seção III – Dos Órgãos de Assessoramento '),
(22, 'Seção IV – Das Pró-Reitorias '),
(23, 'Subseção I – Da Pró-Reitoria da Administração '),
(24, 'Subseção II – Da Pró-Reitoria de Desenvolvimento Institucional '),
(25, 'Subseção III – Da Pró-Reitoria de Ensino '),
(26, 'Subseção IV – Da Pró-Reitoria de Extensão '),
(27, 'Subseção V – Da Pró-Reitoria de Pesquisa e Inovação '),
(28, 'Seção V – Das Diretorias Sistêmicas  '),
(29, 'Subseção I – Da Diretoria de Gestão de Pessoas '),
(30, 'Subseção II – Da Diretoria de Gestão da Tecnologia da Informação '),
(31, 'CAPÍTULO IV – DOS CAMPI '),
(32, 'Seção I – Da Estrutura  '),
(33, 'Seção II – Do Diretor Geral  '),
(34, 'Seção III – Do Conselho de Administração do Campus '),
(35, 'CAPÍTULO V – DOS ATOS ADIMINISTRATIVOS '),
(36, 'Seção I – Dos Atos Normativos '),
(37, 'Seção II – Dos Atos Ordinários  '),
(38, 'Seção III – Dos Atos Enunciativos  '),
(39, 'TÍTULO IV – Do Regime Acadêmico '),
(40, 'CAPÍTULO I – DO ENSINO '),
(41, 'Seção I – Da Natureza dos Cursos  '),
(42, 'Subseção I – Da Educação Profissional Técnica de Nível Médio '),
(43, 'Subseção II – Da Formação Inicial e Continuada  '),
(44, 'Subseção III – Da Graduação '),
(45, 'Subseção IV – Da Pós-Graduação '),
(46, 'Seção II – Dos Currículos  '),
(47, 'Seção III – Do Regime Escolar  '),
(48, 'Seção IV – Da Admissão aos Cursos '),
(49, 'Seção V – Da Matrícula  '),
(50, 'Subseção I – Do Trancamento e Cancelamento '),
(51, 'Subseção II – Da Reintegração ao Curso  '),
(52, 'Seção VI – Da Avaliação da Aprendizagem '),
(53, 'Seção VII – Do Aproveitamento de Estudos e de Experiências Anteriores  '),
(54, 'Seção VIII – Do Exercício Domiciliar '),
(55, 'Seção IX – Da Transferência  '),
(56, 'Seção X – Do Estágio e Monitoria '),
(57, 'Seção XI – Das Atividades de Ensino nos Períodos de Recesso Escolar '),
(58, 'CAPÍTULO II – DA EXTENSÃO '),
(59, 'CAPÍTULO III – DA PESQUISA  '),
(60, 'CAPÍTULO IV – DOS DIPLOMAS E CERTIFICADOS '),
(61, 'CAPÍTULO V – DOS TÍTULOS HONORÍFICOS '),
(62, 'TÍTULO V – Da Comunidade Acadêmica '),
(63, 'CAPÍTULO I – DOS DISCENTES  '),
(64, 'CAPÍTULO II – DOS TÉCNICOS-ADMINISTRATIVOS EM EDUCAÇÃO  '),
(65, 'CAPÍTULO III – DOS DOCENTES  '),
(66, 'CAPÍTULO IV – DA COMUNIDADE EXTERNA  '),
(67, 'TÍTULO VI – Do Regime Disciplinar  '),
(68, 'CAPÍTULO I – DOS SERVIDORES  '),
(69, 'CAPÍTULO II – DOS DISCENTES '),
(70, 'TÍTULO VII – DAS DISPOSIÇÕES TRANSITÓRIAS E FINAIS  ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
