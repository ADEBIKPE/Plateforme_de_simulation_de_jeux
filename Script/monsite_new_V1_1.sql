-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 18 nov. 2023 à 03:36
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `monsite`
--

-- --------------------------------------------------------

--
-- Structure de la table `historique_parties`
--

CREATE TABLE `historique_parties` (
  `idHistorique` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idPartie` int(11) DEFAULT NULL,
  `date_joue` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `historique_parties`
--

INSERT INTO `historique_parties` (`idHistorique`, `idUser`, `idPartie`, `date_joue`) VALUES
(1, 9, 7, '2023-11-18 02:34:02');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `id` int(11) NOT NULL,
  `idPartie` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `inscription_partie`
--

CREATE TABLE `inscription_partie` (
  `idInscription_Partie` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idPartie` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `inscription_partie`
--

INSERT INTO `inscription_partie` (`idInscription_Partie`, `idUser`, `idPartie`) VALUES
(1, 9, 5),
(3, 9, 6),
(4, 9, 7);

-- --------------------------------------------------------

--
-- Structure de la table `jeu`
--

CREATE TABLE `jeu` (
  `idJeu` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `regle` varchar(2550) NOT NULL,
  `categorie` varchar(1500) NOT NULL,
  `image` varchar(2550) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jeu`
--

INSERT INTO `jeu` (`idJeu`, `nom`, `description`, `regle`, `categorie`, `image`) VALUES
(1, 'Terraforming Mars', 'Terraforming Mars est un jeu de soci&eacute;t&eacute; expert accessible d&egrave;s l&rsquo;&acirc;ge de 12 ans pour des parties de 90 minutes environ avec de 1 &agrave; 5 joueurs. Il est &eacute;dit&eacute; par Intrafin, a &eacute;t&eacute; cr&eacute;&eacute; par Jacob Fryxelius et est illustr&eacute; par Isaac Fryxelius. Terraforming Mars est un jeu de soci&eacute;t&eacute; comp&eacute;titif qui utilise comme m&eacute;caniques de jeu principales le placement de tuiles, la gestion de main et la draft. Pour gagner, vous devrez &ecirc;tre le joueur qui parviendra &agrave; d&eacute;velopper au mieux sa corporation sur la plan&egrave;te Mars. Jeu incroyable, aux multiples possibilit&eacute;s de strat&eacute;gie. Un jeu qui comblera de nombreux ludistes exp&eacute;riment&eacute;s et qui a &eacute;t&eacute; approuv&eacute; par tous les joueurs habitu&eacute;s qui ont pu y jouer. Vous allez adorer !', 'règles/TerraMars_rg.pdf', 'Plateau ', 'images/Terraforming Mars.jpg'),
(2, 'The Loop', 'The Loop est un jeu de soci&eacute;t&eacute; de strat&eacute;gie accessible d&egrave;s l&rsquo;&acirc;ge de 12 ans pour des parties de 60 minutes environ avec de 1 &agrave; 4 joueurs. Il est &eacute;dit&eacute; par Catch Up Games. The Loop est un jeu de soci&eacute;t&eacute; coop&eacute;ratif qui utilise comme m&eacute;caniques de jeu principales la programmation et la gestion de main. Pour gagner, vous devrez r&eacute;ussir &agrave; combattre tous ensemble le Dr Foo en accomplissant diff&eacute;rentes missions avant qu&rsquo;il ne parvienne &agrave; ouvrir des vortex temporels qui d&eacute;truiront le monde. The Loop est clairement notre coup de c&oelig;ur parmi les jeux de soci&eacute;t&eacute; coop&eacute;ratif sortis en 2020. Si la premi&egrave;re partie demande de dig&eacute;rer un certain nombre de r&egrave;gles, une fois compris il offre une m&eacute;canique hyper fluide et originale, comme on n&rsquo;en a jamais vu dans d&rsquo;autres jeux. Coup de c&oelig;ur assur&eacute; !', 'règles/The Loop.pdf', 'Plateau', 'images/THE LOOP.jpg'),
(3, 'Monopoly', 'Le Monopoly est un jeu de soci&eacute;t&eacute; embl&eacute;matique qui met les joueurs dans la peau d&#039;investisseurs immobiliers. Le plateau de jeu est divis&eacute; en cases repr&eacute;sentant des propri&eacute;t&eacute;s, des rues, des services publics et d&#039;autres &eacute;l&eacute;ments. Chaque joueur choisit un pion et se d&eacute;place autour du plateau en lan&ccedil;ant les d&eacute;s, acqu&eacute;rant des propri&eacute;t&eacute;s, et cherchant &agrave; construire un empire immobilier rentable.  L&#039;objectif du jeu est de ruiner les adversaires en les for&ccedil;ant &agrave; payer des loyers lorsqu&#039;ils atterrissent sur vos propri&eacute;t&eacute;s. Les joueurs peuvent &eacute;galement construire des maisons et des h&ocirc;tels pour augmenter le montant des loyers per&ccedil;us. Les transactions immobili&egrave;res, les n&eacute;gociations et les choix strat&eacute;giques sont au c&oelig;ur du Monopoly.  Des cartes &quot;Chance&quot; et &quot;Caisse de communaut&eacute;&quot; ajoutent des &eacute;l&eacute;ments de hasard au jeu, et des &eacute;v&eacute;nements tels que les taxes, les amendes et les hypoth&egrave;ques peuvent influencer le cours du jeu. Le Monopoly se termine lorsqu&#039;un joueur met tous les autres en faillite, devenant ainsi le magnat immobilier ultime.  Le jeu combine des &eacute;l&eacute;ments de chance, de strat&eacute;gie et de gestion financi&egrave;re, offrant une exp&eacute;rience divertissante et comp&eacute;titive pour deux &agrave; huit joueurs.', 'règles/règles_monopoly.pdf', 'Plateau', 'images/monopoly.jpg'),
(4, 'Mr Jack London', 'Mr. Jack London est un jeu de soci&eacute;t&eacute; de strat&eacute;gie, accessible d&egrave;s l&rsquo;&acirc;ge de 9 ans, jouable en duel uniquement pour des parties de 30 minutes environ. Il est &eacute;dit&eacute; par Hurrican, a &eacute;t&eacute; cr&eacute;&eacute; par Bruno Cathala et Ludovic Maublanc et illustr&eacute; par Pierre Lechevalier. Mr. Jack London est un jeu comp&eacute;titif qui utilise comme m&eacute;canique de jeu principale la d&eacute;duction. Pour gagner, vous devrez r&eacute;ussir &agrave; vous &eacute;chapper si vous &ecirc;tes Mr Jack et &agrave; arr&ecirc;ter l&rsquo;adversaire si vous &ecirc;tes l&rsquo;enqu&ecirc;teur. On ne pr&eacute;sente plus Mr Jack qui est aujourd&rsquo;hui consid&eacute;r&eacute; comme un classique du jeu moderne. Un jeu de duel une nouvelle fois parfaitement pens&eacute; par Bruno Cathala (bien accompagn&eacute; dans sa r&eacute;alisation par Ludovic Maublanc), qui va vous offrir des heures de jeu &agrave; deux !', 'règles/Mr_Jack_rg.pdf', 'Plateau', 'images/Mr.Jack.jpg'),
(5, 'Uno', 'Le Uno est un jeu de cartes divertissant con&ccedil;u pour deux &agrave; dix joueurs. L&#039;objectif principal est simple : &ecirc;tre le premier &agrave; se d&eacute;barrasser de toutes ses cartes. Chaque carte poss&egrave;de un num&eacute;ro et une couleur, et les joueurs posent des cartes correspondant au num&eacute;ro ou &agrave; la couleur de la carte du dessus de la pile.  Outre les cartes num&eacute;rot&eacute;es, des cartes sp&eacute;ciales introduisent des actions sp&eacute;cifiques, comme &quot;Inversion&quot; pour changer la direction du jeu, &quot;+2&quot; pour forcer le joueur suivant &agrave; piocher deux cartes, et d&#039;autres encore.  Lorsqu&#039;un joueur n&#039;a plus qu&#039;une carte, il doit crier &quot;Uno&quot;. Si un joueur oublie de le faire et est pris, il doit piocher deux cartes.  Le Uno est appr&eacute;ci&eacute; pour sa simplicit&eacute; et sa convivialit&eacute;, ce qui en fait un choix populaire pour les r&eacute;unions familiales ou les soir&eacute;es entre amis. Il combine strat&eacute;gie, chance et anticipation, cr&eacute;ant une atmosph&egrave;re ludique et comp&eacute;titive.', 'règles/Règle du Uno.pdf', 'Plateau', 'images/uno.jpg'),
(6, 'Heat', 'Heat est un jeu de soci&eacute;t&eacute; de strat&eacute;gie accessible d&egrave;s l&#039;&acirc;ge de 10 ans pour des parties de 60 minutes environ de 1 &agrave; 6 joueurs. Il est &eacute;dit&eacute; par Days of Wonder, a &eacute;t&eacute; cr&eacute;&eacute; par Asger Harding Granerud et Daniel Skjold Pedersen, et est illustr&eacute; par Vincent Dutrait. Heat est un jeu de soci&eacute;t&eacute; qui utilise comme m&eacute;canique de jeu principale la gestion de main. Pour gagner, vous devrez arriver 1er sur la ligne d&#039;arriv&eacute;e. Ceci sera loin d&#039;&ecirc;tre une t&acirc;che facile ! Personnalisez votre voiture pour atteindre le podium. Heat est un jeu de course plut&ocirc;t bien fait dans son genre ! Il r&eacute;cup&egrave;re ce style de jeu en lui mettant un coup de pinceau de 2022. Malgr&eacute; son style r&eacute;tro, vous ne regarderez pas dans le r&eacute;tro !', 'règles/heat-rg.pdf', 'Plateau', 'images/Heat.jpg'),
(7, 'Clank', 'Clank ! est un jeu de soci&eacute;t&eacute; expert accessible d&egrave;s l&rsquo;&acirc;ge de 12 ans pour des parties de 45 minutes environ et jouable de 2 &agrave; 4 joueurs. Il est &eacute;dit&eacute; par Renegade Game Studio, a &eacute;t&eacute; cr&eacute;&eacute; par Paul Dennen et est illustr&eacute; par Ratislav Le, Derreck Herring, Raul Ramis et Rayph Beisner. Il a &eacute;t&eacute; nomin&eacute; au Spiel des Jahres. Clank est un jeu de soci&eacute;t&eacute; comp&eacute;titif avec pour m&eacute;canique de jeu principale le deckbuilding. Pour gagner, vous devrez r&eacute;ussir &agrave; optimiser au mieux votre jeu pour votre d&eacute;placer sur le plateau et voler les tr&eacute;sors du dragon avant de vous &eacute;chapper, le tout sans vous faire attraper par celui-ci. Clank est un jeu de deckbuilding particuli&egrave;rement intelligent qui ajoute une partie d&rsquo;exploration tr&egrave;s int&eacute;ressante. Toutes vos parties seront toujours sous haute tension, car le moindre bruit pourra faire tomber toute votre strat&eacute;gie. Un jeu &agrave; poss&eacute;der absolument si vous aimez le deckbuilding.', 'règles/clank_rg.pdf', 'Plateau', 'images/Clank.jpg'),
(9, 'Scythe', 'Scythe est un jeu de soci&eacute;t&eacute; expert accessible d&egrave;s l&rsquo;&acirc;ge de 14 ans pour des parties de 120 minutes environ et jouable de 1 &agrave; 5 joueurs. Il est &eacute;dit&eacute; par Matagot, a &eacute;t&eacute; cr&eacute;&eacute; par Jamey Steigmaier et illustr&eacute; par Jakub Rozalski. Scythe est un jeu de soci&eacute;t&eacute; comp&eacute;titif qui utilise pour m&eacute;caniques principales de jeu le contr&ocirc;le de territoire et la gestion de main. Pour gagner, vous allez devoir conduire votre pays &agrave; la victoire via la conqu&ecirc;te de territoires, le recrutement de nouveaux villageois et de troupes, la r&eacute;colte de ressources et la construction de machines pilot&eacute;es monstrueuses. Si vous cherchez un jeu de contr&ocirc;le de territoire de qualit&eacute;, Scythe est certainement le meilleur jeu sur lequel vous pourrez mettre la main. Offrant un mat&eacute;riel d&rsquo;une qualit&eacute; incroyable, il est surtout depuis sa sortie en 2016 l&rsquo;un des meilleurs jeu expert de d&eacute;veloppement et de contr&ocirc;le de territoire. Coup de c&oelig;ur assur&eacute; si vous aimez ce genre de jeux.', 'règles/Scythe_rg.pdf', 'Plateau', 'images/Scythe.jpg'),
(10, 'Azul', 'Azul est un jeu de soci&eacute;t&eacute; accessible d&egrave;s l&rsquo;&acirc;ge de 8 ans pour des parties de 30 minutes et jouable de 2 &agrave; 4 joueurs. Il est &eacute;dit&eacute; par Next Move, a &eacute;t&eacute; cr&eacute;&eacute; par Michael Kiesling et est illustr&eacute; par Chris Quilliams et Philippe Gu&eacute;rin. Il a remport&eacute; l&rsquo;As d&rsquo;or et le Spiel des Jahres 2018. Azul est un jeu de soci&eacute;t&eacute; comp&eacute;titif qui utilise pour m&eacute;caniques de jeu principales le placement de tuile, la draft et la combinaison. Pour gagner, vous devrez optimiser au mieux le placement de vos tuiles afin de compl&eacute;ter une ligne de 5 tuiles cons&eacute;cutives tout en accumulant le plus de points de victoire. Qui aurait cru qu&rsquo;un jeu qui vous invite &agrave; vous prendre pour des ma&ccedil;ons portugais puisse &ecirc;tre aussi bon ? C&rsquo;est pourtant le pari qu&rsquo;a pris Azul et bien lui en a pris ! Le jeu est magnifique, parfaitement accessible mais pourtant avec une profondeur strat&eacute;gique hors du commun. Si vous aimez les &eacute;checs, vous allez adorer Azul. Un vrai coup de c&oelig;ur !', 'règles/Azul.pdf', 'Plateau', 'images/Azul.jpg'),
(11, 'Poker', 'Le poker, jeu de cartes embl&eacute;matique, m&ecirc;le habilet&eacute; et chance. Les joueurs parient sur la force de leurs mains, influen&ccedil;ant le cours du jeu. Des variantes telles que le Texas Hold&#039;em sont populaires, tandis que les tournois mondiaux c&eacute;l&egrave;brent l&#039;habilet&eacute; strat&eacute;gique. Le poker allie comp&eacute;tition et divertissement dans un monde de bluff et de tactique.', 'règles/poker.pdf', 'Jeu de cartes', 'images/Poker1.jpg'),
(12, 'Code Names', 'CodeNames est un jeu de soci&eacute;t&eacute; captivant qui m&ecirc;le strat&eacute;gie et d&eacute;duction. Dans une course palpitante, deux &eacute;quipes rivalisent pour identifier leurs agents secrets parmi des mots. Les capitaines donnent des indices habiles, tandis que les co&eacute;quipiers doivent &eacute;viter les pi&egrave;ges. Une exp&eacute;rience ludique et stimulante ax&eacute;e sur la communication.', 'règles/Code Names - Règles.pdf', 'Jeu de soci&eacute;t&eacute; de d&eacute;duction', 'images/CodeNames.jpg'),
(13, 'Echecs', 'Les &eacute;checs, jeu ancestral et strat&eacute;gique, opposent deux adversaires dans une bataille intellectuelle sur un plateau de 64 cases. Chaque joueur dirige une arm&eacute;e de pi&egrave;ces aux mouvements uniques, cherchant &agrave; &eacute;chec et mat l&#039;adversaire. Un d&eacute;fi de r&eacute;flexion, de tactique et d&#039;anticipation, &eacute;levant le jeu &agrave; une forme d&#039;art comp&eacute;titif.', 'règles/regles_du_jeu_echecs_v4.pdf', 'Jeu de strat&eacute;gies', 'images/Echecs.jpg'),
(14, 'Monopoly', 'Le Monopoly est un jeu de soci&eacute;t&eacute; classique o&ugrave; les joueurs ach&egrave;tent, vendent et n&eacute;gocient des propri&eacute;t&eacute;s pour construire leur empire immobilier. L&#039;objectif est d&#039;amasser des richesses tout en ruinant les adversaires. Dot&eacute; de cartes Chance, de strat&eacute;gies financi&egrave;res et de n&eacute;gociations, le Monopoly offre une exp&eacute;rience comp&eacute;titive et divertissante.', 'règles/monopoly-regle.pdf', 'Jeu de soci&eacute;t&eacute;', 'images/monopoly.jpg'),
(15, 'Mancala', 'Mancala est un ancien jeu de strat&eacute;gie qui remonte &agrave; plusieurs si&egrave;cles. Il implique la distribution de graines ou de pierres &agrave; travers des cavit&eacute;s sur un plateau. Les joueurs d&eacute;placent les graines en suivant des r&egrave;gles sp&eacute;cifiques, visant &agrave; capturer les graines de l&#039;adversaire. Mancala offre une exp&eacute;rience tactique et culturelle.', 'règles/regleMancala.pdf', 'Jeu de soci&eacute;t&eacute;', 'images/mancala.jpg'),
(16, 'Cluedo', 'Cluedo est un jeu de soci&eacute;t&eacute; classique de d&eacute;duction criminelle. Les joueurs incarnent des d&eacute;tectives essayant de r&eacute;soudre un meurtre en identifiant le coupable, l&#039;arme et le lieu du crime. En utilisant des indices, les joueurs &eacute;liminent progressivement les suspects pour d&eacute;couvrir le myst&egrave;re. Cluedo offre une exp&eacute;rience captivante de r&eacute;solution d&#039;&eacute;nigmes.', 'règles/7a-cluedo-le-jeu-des-grands-detectives-regle.pdf', 'Jeu de soci&eacute;t&eacute;', 'images/Cluedo.jpg'),
(17, 'Pacman', 'Pacman, cr&eacute;&eacute; en 1980, est un jeu vid&eacute;o embl&eacute;matique. Les joueurs contr&ocirc;lent Pac-Man, une boule jaune, cherchant &agrave; manger des pac-gommes tout en &eacute;vitant les fant&ocirc;mes. Le but est de nettoyer le labyrinthe tout en &eacute;vitant les ennemis. Le design simple et l&#039;aspect addictif ont fait de Pacman un classique du jeu d&#039;arcade.', 'règles/reglePacman.pdf', 'Jeu d&#039;arcades', 'images/Pacman.jpg'),
(18, 'Scotland Yard', 'Scotland Yard est un jeu de soci&eacute;t&eacute; de d&eacute;duction et de strat&eacute;gie. Il met en sc&egrave;ne une chasse &agrave; l&#039;homme &agrave; travers Londres, o&ugrave; les joueurs incarnent des d&eacute;tectives traquant le myst&eacute;rieux Mr. X. Les d&eacute;placements se font en utilisant divers modes de transport. Le jeu combine intrigue, collaboration et comp&eacute;tition.', 'règles/scotlandyard.pdf', 'Jeu de d&eacute;duction', 'images/ScotlandYard.jpg'),
(19, 'Rummikub', 'Rummikub est un jeu de soci&eacute;t&eacute; qui m&eacute;lange tactique et chance. Les joueurs tentent de se d&eacute;barrasser de leurs tuiles en formant des combinaisons de chiffres ou de couleurs. C&#039;est un m&eacute;lange de strat&eacute;gie et de calcul, n&eacute;cessitant une planification habile pour gagner. Rummikub offre une exp&eacute;rience divertissante et stimulante pour les amateurs de jeux de soci&eacute;t&eacute;.', 'règles/Rummikub.pdf', 'Jeu de soci&eacute;t&eacute;', 'images/Rummikub.jpg'),
(20, 'Shogi', 'Le Shogi est un jeu d&#039;&eacute;checs japonais passionnant. Il se joue sur un plateau de 9x9 avec des pi&egrave;ces uniques, chaque pi&egrave;ce ayant ses propres mouvements sp&eacute;cifiques. L&#039;objectif est de capturer le roi adverse. Le Shogi n&eacute;cessite une strat&eacute;gie profonde et une anticipation astucieuse pour r&eacute;ussir &agrave; &eacute;chec et mat son adversaire.', 'règles/reglesShogi.pdf', 'Jeu de strat&eacute;gies', 'images/Shogi.jpg'),
(21, 'Scrabble', 'Le Scrabble est un jeu de mots classique o&ugrave; les joueurs utilisent des tuiles de lettres pour former des mots sur un plateau. Chaque lettre a une valeur num&eacute;rique, et le but est de maximiser les points en cr&eacute;ant des mots sur des cases bonus. Le Scrabble allie vocabulaire et tactique pour un d&eacute;fi stimulant.', 'règles/RegleScrabble.classique.pdf', 'Jeu de mots', 'images/Scrabble.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `jeu_membre`
--

CREATE TABLE `jeu_membre` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idJeu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jeu_membre`
--

INSERT INTO `jeu_membre` (`id`, `idUser`, `idJeu`) VALUES
(4, 9, 1),
(5, 9, 2),
(6, 9, 13),
(7, 9, 6),
(10, 9, 11);

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

CREATE TABLE `partie` (
  `idPartie` int(11) NOT NULL,
  `date_partie` date NOT NULL,
  `heure` time NOT NULL,
  `duree` varchar(255) NOT NULL,
  `nb_max_necessaire` varchar(255) NOT NULL,
  `idJeu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `partie`
--

INSERT INTO `partie` (`idPartie`, `date_partie`, `heure`, `duree`, `nb_max_necessaire`, `idJeu`) VALUES
(5, '2023-11-21', '15:50:00', '20', '10', 13),
(6, '2023-11-28', '11:25:00', '25', '10', 15),
(7, '2023-11-29', '12:23:00', '15', '12', 20);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(2) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `passwd` varchar(150) NOT NULL,
  `role` int(2) NOT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `nom_de_avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `prenom`, `email`, `passwd`, `role`, `date_de_naissance`, `nom_de_avatar`) VALUES
(1, 'KOTIN', 'Chancel', 'chancelkotin24@gmail.com', '$2y$12$MYoBpyNy.9Y7RZB8G0oUXu1Tf9xFd22d5MYDct30BR84WNCMsuiMi', 2, '2003-04-24', 'Chancel KOTIN'),
(2, 'KOTIN', 'Chancel', 'chancelmerveil24@gmail.com', '$2y$12$zM7TOT4uDi2gbJ4K4tAte.OWD97h2n30jeB2SlU0XhaijMK34ksI6', 2, '2001-04-23', 'Chancel KOTIN'),
(3, 'jhg', 'ygtfd', 'chancel@gmail.com', '$2y$10$PjTlrQxvsGLBMCxDWQ8SueqCjWaNf2xkO346/Kpi1x.X/Kc9FfXQO', 1, '2023-11-15', 'kjhgfd'),
(4, 'A', 'b', 'a.b@gmail.com', '$2y$12$ag7GpF80X6yJYA0Cp0Ci9uA/glaBevn16mYWX1mcdbJvHbPXdDeOG', 1, '2023-11-03', 'Ab'),
(7, 'x', 'y', 'x.y@gmail.com', '$2y$12$aeHK.ABIJ8N4v9qJ0The9e.qIr1zEoYueyHKORNWaldkoh6bt4Ar6', 1, '2023-11-02', 'Xyz'),
(8, 'LIL', 'Halil23', 'halilthiam@gmail.com', '$2y$12$8iTVoMdIrGSQxe6KUgcMyOoBi8C2ZXSTmHLXf4zHsaPa9d9UKkziS', 2, '2023-11-21', 'GOAT'),
(9, 'LIL_23', 'Halil_06', 'halilthiam23@gmail.com', '$2y$10$22dd7bHyewciB.tgzedFWOUFJ77elRx6kdLIxcMdAfALrO3MFO3OW', 2, '2023-11-15', 'GOAT_H'),
(10, 'LIL_06', 'Halil_23', 'halilthiam@yahoo.com', '$2y$10$5REYM23fxL3L2BD0epD81OO/HCQcgwf5BLzB00LhZZkFHaoe0S5gG', 1, '2023-11-22', 'BOSS');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `historique_parties`
--
ALTER TABLE `historique_parties`
  ADD PRIMARY KEY (`idHistorique`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idPartie` (`idPartie`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPartie` (`idPartie`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `inscription_partie`
--
ALTER TABLE `inscription_partie`
  ADD PRIMARY KEY (`idInscription_Partie`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idPartie` (`idPartie`);

--
-- Index pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD PRIMARY KEY (`idJeu`);

--
-- Index pour la table `jeu_membre`
--
ALTER TABLE `jeu_membre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jeu_membre_idJeu` (`idJeu`),
  ADD KEY `fk_jeu_membre_idUser` (`idUser`);

--
-- Index pour la table `partie`
--
ALTER TABLE `partie`
  ADD PRIMARY KEY (`idPartie`),
  ADD KEY `partie_ibfk_1` (`idJeu`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `historique_parties`
--
ALTER TABLE `historique_parties`
  MODIFY `idHistorique` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `inscription_partie`
--
ALTER TABLE `inscription_partie`
  MODIFY `idInscription_Partie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `jeu`
--
ALTER TABLE `jeu`
  MODIFY `idJeu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `jeu_membre`
--
ALTER TABLE `jeu_membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `partie`
--
ALTER TABLE `partie`
  MODIFY `idPartie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `historique_parties`
--
ALTER TABLE `historique_parties`
  ADD CONSTRAINT `historique_parties_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `historique_parties_ibfk_2` FOREIGN KEY (`idPartie`) REFERENCES `partie` (`idPartie`);

--
-- Contraintes pour la table `inscription_partie`
--
ALTER TABLE `inscription_partie`
  ADD CONSTRAINT `inscription_partie_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `inscription_partie_ibfk_2` FOREIGN KEY (`idPartie`) REFERENCES `partie` (`idPartie`);

--
-- Contraintes pour la table `jeu_membre`
--
ALTER TABLE `jeu_membre`
  ADD CONSTRAINT `fk_jeu_membre_idJeu` FOREIGN KEY (`idJeu`) REFERENCES `jeu` (`idJeu`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_jeu_membre_idUser` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE;

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `fk_partie_jeu` FOREIGN KEY (`idJeu`) REFERENCES `jeu` (`idJeu`) ON DELETE CASCADE,
  ADD CONSTRAINT `partie_ibfk_1` FOREIGN KEY (`idJeu`) REFERENCES `jeu` (`idJeu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
