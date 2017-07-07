SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db1`
--
--
-- Table structure for table `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagem` varchar(64) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `descr` varchar(4096) NOT NULL,
  `local` varchar(64) NOT NULL,
  `regdate` datetime NOT NULL,
  `dataevento` date NOT NULL,
  `horaevento` time NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id`, `imagem`, `nome`, `descr`, `local`, `regdate`, `dataevento`, `horaevento`, `status`) VALUES
(1, 'diogo_nogueira.jpg', 'DIOGO NOGUEIRA', 'Diogo Nogueira apresenta no Tom Brasil seus maiores sucessos e as músicas do DVD “Alma Brasileira”, o quarto de sua carreira, lançado recentemente. No repertório estão, entre outras, “Pé na Areia”, “Deixa eu te amar”, “Malandro É Malandro e Mané É Mané”. A noite na casa começa com show de abertura da Paula Lima, antes da atração principal.', 'Tom Brasil - SÃO PAULO, SP', '2017-07-07 00:00:00', '2017-07-07', '21:00:00', 1),
(2, 'seujorge3.jpg', 'SEU JORGE', 'Seu Jorge, nome artístico de Jorge Mário da Silva é um ator, cantor, compositor e multi-instrumentista brasileiro de MPB, R&B, samba e soul.', 'Clube Jundiaiense - Jundiaí - São Paulo', '2017-07-07 00:00:00', '2017-07-08', '22:00:00', 1),
(3, 'alok.jpeg', 'ALOK', 'Alok se apresenta no terceiro dia da Expô de Araçatuba. Matheus e Kauan também se apresentam.', 'Recinto de Exposições de Araçatuba - Araçatuba - SP', '2017-07-07 00:00:00', '2017-07-09', '22:00:00', 1),
(4, 'dennis.jpg', 'DENNIS DJ', 'Dennison de Lima Goes comanda as picapes da última noite da 27ª edição da Festa do Peão de Sertãozinho (SP). A dupla sertaneja Matheus e Kauan e o cantor Jefferson Moraes também se apresentam na data. Entre as canções que vão entrar no repertório do produtor musical estão “Automaticamente”, “Ela Se Joga” e “Coração Tá Gelado”.', 'Centro de Eventos Zanini - Sertãozinho - São Paulo', '2017-07-07 00:00:00', '2017-07-15', '20:00:00', 1),
(5, 'anitta.png', 'ANITTA', 'A cantora Anitta promete agitar o público presente no Estância.', 'Estância Nativa - Caçapava - São Paulo', '2017-07-07 00:00:00', '2017-07-15', '23:00:00', 1),
(6, 'pericles.jpg', 'PÉRICLES', 'O cantor e compositor Péricles, que se lançou na carreira solo em 2012, apresenta-se no Bar Templo em show que tem alguns dos maiores sucessos de sua trajetória musical – como “Melhor Eu Ir”, “Costumes Iguais” e “Final de Tarde” –, com destaque para as músicas do disco “Deserto da Ilusão”, seu trabalho mais recente, cuja gravação teve participações de nomes como Djavan, Chrigor, Marcos & Belutti, Jorge & Mateus, Marília Mendonça, Wesley Safadão, MC Livinho e Sorriso Maroto.', 'Bar Templo - SÃO PAULO - SP', '2017-07-07 00:00:00', '2017-07-17', '21:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(64) NOT NULL,
  `pw` varchar(64) NOT NULL,
  `salt` varchar(8) NOT NULL,
  `regdate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user`, `pw`, `salt`, `regdate`) VALUES
(1, 'admin', '7404ab6f288f769bbc4ab7e04a6b561f', '849558', '2017-07-07 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
