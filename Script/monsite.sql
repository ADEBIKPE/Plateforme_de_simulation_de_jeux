-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 17 nov. 2023 à 12:49
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
(10, 'Azul', 'Azul est un jeu de soci&eacute;t&eacute; accessible d&egrave;s l&rsquo;&acirc;ge de 8 ans pour des parties de 30 minutes et jouable de 2 &agrave; 4 joueurs. Il est &eacute;dit&eacute; par Next Move, a &eacute;t&eacute; cr&eacute;&eacute; par Michael Kiesling et est illustr&eacute; par Chris Quilliams et Philippe Gu&eacute;rin. Il a remport&eacute; l&rsquo;As d&rsquo;or et le Spiel des Jahres 2018. Azul est un jeu de soci&eacute;t&eacute; comp&eacute;titif qui utilise pour m&eacute;caniques de jeu principales le placement de tuile, la draft et la combinaison. Pour gagner, vous devrez optimiser au mieux le placement de vos tuiles afin de compl&eacute;ter une ligne de 5 tuiles cons&eacute;cutives tout en accumulant le plus de points de victoire. Qui aurait cru qu&rsquo;un jeu qui vous invite &agrave; vous prendre pour des ma&ccedil;ons portugais puisse &ecirc;tre aussi bon ? C&rsquo;est pourtant le pari qu&rsquo;a pris Azul et bien lui en a pris ! Le jeu est magnifique, parfaitement accessible mais pourtant avec une profondeur strat&eacute;gique hors du commun. Si vous aimez les &eacute;checs, vous allez adorer Azul. Un vrai coup de c&oelig;ur !', 'règles/Azul.pdf', 'Plateau', 'images/Azul.jpg');

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
(8, 'LIL', 'Halil23', 'halilthiam@gmail.com', '$2y$12$8iTVoMdIrGSQxe6KUgcMyOoBi8C2ZXSTmHLXf4zHsaPa9d9UKkziS', 2, '2023-11-21', 'GOAT');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `jeu`
--
ALTER TABLE `jeu`
  ADD PRIMARY KEY (`idJeu`);

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
-- AUTO_INCREMENT pour la table `jeu`
--
ALTER TABLE `jeu`
  MODIFY `idJeu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `partie`
--
ALTER TABLE `partie`
  MODIFY `idPartie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `partie`
--
ALTER TABLE `partie`
  ADD CONSTRAINT `partie_ibfk_1` FOREIGN KEY (`idJeu`) REFERENCES `jeu` (`idJeu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
