-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 13 mai 2022 à 02:34
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `chabah_resaweb_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `categorie_nom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `categorie_description` varchar(1000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `categorie_nom`, `categorie_description`) VALUES
(1, 'Tour', 'We will take you to within a few hundred kilometers of the Moon’s surface.  You will see the illuminated far side of the Moon, and then witness the amazing sight of the Earth rising above the surface of the Moon. '),
(2, 'Destination', 'The traveler can choose to visit a destination for a certain duration.'),
(3, 'Rocky destination', 'Live a complete experience by visiting one of our terrestrial destinations : when the ship lands on it, you\'ll get both to float around and walk on its rocky surface.'),
(4, 'Gas giant', 'Get to admire the rarest and most beautiful view ever : due to its low density - consisting predominantly of hydrogen and helium -, you won\'t be able to walk on its surface but to float around and feel as light as a feather.');

-- --------------------------------------------------------

--
-- Structure de la table `lien`
--

CREATE TABLE `lien` (
  `ext_voyage` int(11) NOT NULL,
  `ext_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lien`
--

INSERT INTO `lien` (`ext_voyage`, `ext_categorie`) VALUES
(1, 1),
(2, 2),
(2, 3),
(3, 2),
(3, 3),
(4, 3),
(4, 2),
(5, 2),
(5, 4),
(6, 2),
(6, 3),
(7, 2),
(7, 4);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `nom_destination` varchar(45) NOT NULL,
  `client_nom` varchar(45) CHARACTER SET utf8 NOT NULL,
  `client_prenom` varchar(45) CHARACTER SET utf8 NOT NULL,
  `client_tel` varchar(10) CHARACTER SET utf8 NOT NULL,
  `client_mail` varchar(70) CHARACTER SET utf8 NOT NULL,
  `date_depart` date NOT NULL,
  `date_retour` date NOT NULL,
  `lieu_depart` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nb_voyageurs` int(4) NOT NULL,
  `prix_total` decimal(9,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `nom_destination`, `client_nom`, `client_prenom`, `client_tel`, `client_mail`, `date_depart`, `date_retour`, `lieu_depart`, `nb_voyageurs`, `prix_total`) VALUES
(60, 'Mars', 'Chabah', 'Camel', '0695169435', 'amel.chabah@edu.univ-eiffel.fr', '2022-05-20', '2022-10-22', 'Kennedy Space Center, Florida', 2, '36800'),
(61, 'Moon', 'Chabah', 'Amel', '0695169435', 'amel.chabah@edu.univ-eiffel.fr', '2022-05-20', '2022-05-25', 'Spaceport America, New Mexico', 4, '45200'),
(62, 'Jupiter', 'Chabah', 'Camel', '0695169435', 'amel.chabah@edu.univ-eiffel.fr', '2022-05-21', '2022-12-16', 'Spaceport America, New Mexico', 3, '63000'),
(63, 'Saturn', 'Crunchant', 'Elea', '6015641651', 'dfsdgs@mail.com', '2022-07-22', '2023-06-03', 'Spaceport America, New Mexico', 4, '94000'),
(64, 'Saturn', 'Chabah', 'Amel', '0695169435', 'amel.chabah@edu.univ-eiffel.fr', '2022-05-20', '2023-03-25', 'Spaceport America, New Mexico', 2, '47000');

-- --------------------------------------------------------

--
-- Structure de la table `voyage`
--

CREATE TABLE `voyage` (
  `id_voyage` int(11) NOT NULL,
  `nom_destination` varchar(30) NOT NULL,
  `produit_description` varchar(1000) NOT NULL,
  `voyage_prix` decimal(9,0) NOT NULL,
  `distance_terre` decimal(10,0) NOT NULL,
  `duree` decimal(10,0) NOT NULL,
  `img_destination` varchar(255) NOT NULL,
  `img_destination_bg` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `voyage`
--

INSERT INTO `voyage` (`id_voyage`, `nom_destination`, `produit_description`, `voyage_prix`, `distance_terre`, `duree`, `img_destination`, `img_destination_bg`) VALUES
(1, 'Circumlunar mission', 'The last people to walk on the Moon were Gene Cernan and Harrison Schmitt, who left the Moon’s surface on December 14, 1972 and returned to Earth in their Apollo spacecraft. Become one of the first people to leave low-Earth orbit in nearly 50 years.<br><br>We will take you to within a few hundred kilometers of the Moon&#039s surface.  You will see the illuminated far side of the Moon, and then witness the amazing sight of the Earth rising above the surface of the Moon.', '9700', '384400', '3', 'img/moon.jpg', ''),
(2, 'Moon', 'At about one-quarter the diameter of Earth (comparable to the width of Australia), it is the fifth largest satellite in the Solar System, the largest satellite in the Solar System relative to its major planet, and larger than any known dwarf planet.', '11300', '384400', '3', 'img/moon.png', 'img/moonbg.jpg'),
(3, 'Mars', 'Mars is the second-smallest planet in the Solar System. In English, Mars carries the name of the Roman god of war and is often called the \"Red Planet\".', '13400', '225000000', '150', 'img/mars.png', 'img/marsbg.jpg'),
(4, 'Callisto', 'Callisto /kəˈlɪstoʊ/, or Jupiter IV, is the second-largest moon of Jupiter, after Ganymede. It is the third-largest moon in the Solar System after Ganymede and Saturn\'s largest moon Titan.', '18900', '628300000', '200', 'img/callisto.png', 'img/callistobg.jpg'),
(5, 'Jupiter', 'Jupiter is the largest in the Solar System. It is a gas giant with a mass more than two and a half times that of all the other planets in the Solar System combined.', '21000', '843349595', '200', 'img/jupiter.png', 'img/jupiterbg.jpg'),
(6, 'Europa', 'Jupiter II, is the smallest of the four Galilean moons orbiting Jupiter, and the sixth-closest to the planet of all the 80 known moons of Jupiter.', '19500', '628300000', '200', 'img/europa.png', 'img/europabg.jpg'),
(7, 'Saturn', 'Saturn is the sixth planet from the Sun and the second-largest in the Solar System, after Jupiter. It has only one-eighth the average density of Earth; however, with its larger volume, Saturn is over 95 times more massive.', '23500', '1426000000', '300', 'img/saturn.png', 'img/saturnbg.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`);

--
-- Index pour la table `voyage`
--
ALTER TABLE `voyage`
  ADD PRIMARY KEY (`id_voyage`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
