-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 12 mai 2024 à 17:34
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `parafam`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mp` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `nom`, `email`, `mp`) VALUES
(1, 'admin', 'admin@parafam.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `createur` int NOT NULL,
  `date_crea` date NOT NULL,
  `date_modif` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `description`, `createur`, `date_crea`, `date_modif`) VALUES
(1, 'corps', 'description cat corps', 0, '0000-00-00', '0000-00-00'),
(2, 'visage', 'description cat visage', 0, '0000-00-00', '0000-00-00'),
(3, 'cheveux', 'description cat cheveux', 0, '0000-00-00', '0000-00-00'),
(4, 'hygiene', 'description cat hygiene', 0, '0000-00-00', '0000-00-00'),
(5, 'solaire', 'description cat solaire', 0, '0000-00-00', '0000-00-00'),
(6, 'maquillage', 'description cat maquillage', 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int NOT NULL AUTO_INCREMENT,
  `produit` varchar(200) NOT NULL,
  `quantite` text NOT NULL,
  `panier` int NOT NULL,
  `total` float NOT NULL,
  `date_crea` date NOT NULL,
  `date_modif` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id`, `produit`, `quantite`, `panier`, `total`, `date_crea`, `date_modif`) VALUES
(39, '27', '2', 29, 140000, '2024-05-10', '2024-05-10'),
(38, '1', '2', 28, 110000, '2024-05-09', '2024-05-09'),
(37, '27', '1', 27, 70000, '2024-05-07', '2024-05-07');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int NOT NULL AUTO_INCREMENT,
  `visiteur` int NOT NULL,
  `total` float NOT NULL,
  `etat` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '''en cours''',
  `date_crea` date NOT NULL,
  `date_modif` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `visiteur`, `total`, `etat`, `date_crea`, `date_modif`) VALUES
(29, 9, 140000, '\'en cours\'', '2024-05-10', '0000-00-00'),
(28, 9, 110000, '\'en cours\'', '2024-05-09', '0000-00-00'),
(27, 8, 125000, '\'en cours\'', '2024-05-07', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `prix` float NOT NULL,
  `categorie` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `createur` int NOT NULL,
  `date_crea` date NOT NULL,
  `date_modif` date NOT NULL,
  `enPromo` tinyint(1) NOT NULL,
  `prixPromo` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `categorie`, `image`, `createur`, `date_crea`, `date_modif`, `enPromo`, `prixPromo`) VALUES
(1, 'Nuxe Prodigieux Lait Corps Sublimateur Parfume 200ML', 'Nuxe Prodigieux Lait Corps Parfume vous offre une texture ultra légère et satinée qui pénètre parfaitement et le purfum exceptionnellement sublime de lHuile Progigieuse précieuse.\r\n\r\nLait prodigieux nuxe permet de laisser la peau souple et douce et nourrit votre épiderme. Il permet aussi d\'illuminer votre peau et la rend plus belle et plus lisse. Ce soin est idéal pour toutes les peaux ', 55000, 'corps', 'https://belybox.com/wp-content/uploads/2022/07/NUXE-PRODIGIEUX-LAIT-CORPS-SUBLIMATEUR-PARFUME-200ML.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(2, 'NUXE BODY Lait Fluide Corps - 200 ml', 'Ce lait corps à la texture ultra-fluide, aux pétales de fleurs d’amandier et d’oranger, pénètre immédiatement sans effet gras. La peau est hydratée 24H, elle retrouve confort et souplesse.\r\nElle est douce et satinée comme de la soie.\r\nContient au moins 92% d’ingrédients d’origine naturelle, (dont Fleurs d’Amandier et d’Oranger, sucres de Blé et de Bois…).\r\nSans paraben.', 49500, 'corps', 'https://www.paraplus.tn/assets/upload/products/1a33e8548acea130ff66008ccafd4ea8.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(3, 'CICA Crème Mains Riche, Rêve de Miel 50 ml', 'Chouchoutez vos mains desséchées et abîmées grâce à cette CICA Crème, au Miel de Lavande de Provence et Centella Asiatica. Sa formule riche nourrit, apaise et répare tout en renforcant la barrière cutanée. Sa texture fondante, non grasse et non collante, glisse sur la peau pour un \"effet pansement\".', 41550, 'corps', 'https://www.paranet.tn/5987-large_default/nuxe-cica-creme-mains-riche-reve-de-miel-50-ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(4, 'NUXE Rêve de miel Gel lavant surgras visage et corps 750ml', 'Découvrez le Gel Lavant Surgras visage et corps Rêve de Miel en édition limitée grand format ultra généreux.  Ce gel lavant visage et corps surgras, au Miel et Tournesol, onctueux et délicieusement miellé, prend soin quotidiennement des peaux sèches et sensibles. Il nettoie le visage et le corps sans dessécher. \r\n', 92700, 'corps', 'https://1001para.tn/17797/nuxe-reve-de-miel-gel-lavant-surgras-visage-et-corps-750ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(5, 'SVR Topialyse Crème Nourrissante Apaisante 48H 400 ml', 'SVR Topialyse Crème 400ml est le soin des peaux sèches et sensibles de toute la famille. Une formule apaisante et nourrissante pour dire bye-bye aux sensations de tiraillement pour un confort immédiat et durable.\r\nHydratation intense dans une crème velours : Sa texture est ultra-fondante non grasse et non collante permet un habillage immédiat.', 59800, 'corps', 'https://cdn.store-factory.com/www.parapromos.com/content/product_11430452s.jpg?v=1637139690', 0, '0000-00-00', '0000-00-00', 0, 0),
(6, 'SVR CICAVIT+ GEL MOUSSANT 200ML', 'SVR CICAVIT+ Gel Moussant Apaisant nettoie les zones cutanées irritées des zones fragilisées.  tout en respectant l\'équilibre du film hydrolipidique de la peau en respectant ses défenses naturelles, et en limitant les agressions extérieures qui peuvent l\'endommager. \r\n\r\nSans parfum, le Gel moussant Cicavit+ est aussi sans savon et sans tensioactifs sulfates, il est formulé avec des tensioactifs ultra-doux et enrichi en agents hydratants dermo-protecteurs. Ils forment une mousse onctueuse qui élimine les impuretés tout en réduisant irritations et dessèchement.\r\n\r\n', 32590, 'corps', 'https://pharma-shop.tn/14309-large_default/svr-cicavit-gel-moussant-200ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(7, 'Avène cicalfate main creme reparatrice isolante 100ml', 'Ce soin réconfortant enveloppe et soulage les mains très sèches, gercées et fendillées (les peaux fissurées), sans coller.', 33890, 'corps', 'https://inty.ma/4890-home_default/avene-cicalfate-main-creme-reparatrice-isolante-100ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(8, 'Avène Cold Cream Pain Surgras', 'Ce pain surgras nettoie et nourrit tout en douceur, grâce au Cold Cream qui procure à la peau une sensation immédiate de confort et de souplesse. Un soin lavant doux, qui respecte la barrière cutanée et protège les peaux sensibles sèches et très sèches du visage et du corps, avec un parfum léger et une mousse onctueuse.', 25000, 'corps', 'https://www.apyapara.com/5531-large_default/avene-cold-cream-pain-surgras-100g.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(9, 'SVR Xerial 10 Lait Corps', 'SVR Xérial 10 Lait Corps 400 ml est un soin corporel anti-squames et anti-grattage qui lisse, apaise et hydrate 48 heures. Il est spécialement destiné aux peaux sèches, irrégulières, rugueuses.', 57000, 'corps', 'https://ucanbe.tn/storage/media/3662361002412d836Y.webp', 0, '0000-00-00', '0000-00-00', 0, 0),
(10, 'Eucerin Urea Repair plis emollient 10% 250ML', 'Pour l\'hydratation, la protection anti-irritation et l\'apaisement des peaux très sèches, rugueuses et qui tiraillent, EUCERIN UreaRepair PLUS Émollient 10% d\'Urée hydratant riche, mais pénétrant, appliqué matin et soir nourrit en profondeur les peaux desséchées pour les apaiser et soulager également les tiraillements.', 42500, 'corps', 'https://www.paranet.tn/2761-large_default/eucerin-urearepair-plus-emollient-10-d-uree-250-ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(11, 'Eucerin Aquaphor Baume Spray Corps 250ml', '', 56000, 'corps', 'https://www.maparatunisie.tn/wp-content/uploads/2023/04/eucerin-aquaphor-baume-spray-corps-250ml-maparatunisie.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(12, 'Eucerin Intensive Repair Body Lotion', '', 43000, 'corps', 'https://haytamparfumerie.com/cdn/shop/files/61fzHc4p_FL._SL1500.jpg?v=1695498159', 0, '0000-00-00', '0000-00-00', 0, 0),
(13, 'NATURE MOI DEO BILLE FLEUR DE LOTUS 50 ML', '', 17500, 'hygiene', 'https://mypharma.tn/7622-medium_default/nature-moi-deo-bille-fleur-de-lotus-50-ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(14, 'NATURE MOI DEO BILLE YLANG YLANG 50 ML', '', 17500, 'hygiene', 'https://mypharma.tn/7612-medium_default/nature-moi-deo-bille-ylang-ylang-50-ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(15, 'NATURE MOI Huile de Douche Relaxante 200ml', '', 19600, 'hygiene', 'https://www.cavernesante.com/3293-large_default/nature-moi-huile-de-douche-relaxante-200ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(16, 'ROGE CAVAILLES DÉO ABSORB+ EFFICACITÉ 48H Spray 150ML', '', 27000, 'hygiene', 'https://www.coquette.tn/6418-large_default/deodorants-et-anti-transpirants-roge-cavailles-roge-cavailles-deo-absorb-efficacite-48h-spray-150ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(17, 'Rogé Cavaillès Mycolea+ Crème Intime Apaisante 50 ml', '', 29350, 'hygiene', 'https://cdn.primini.tn/250_3596490004767-roge-cavailles-mycolea-creme-intime-apaisante-50-ml-1.webp', 0, '0000-00-00', '0000-00-00', 0, 0),
(18, 'Roge Cavailles Soin intime et corps Petites Filles 250ml', '', 31400, 'hygiene', 'https://www.paranet.tn/5600-large_default/-roge-cavailles-soin-intime-et-corps-petites-filles-250ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(19, 'MIRADENT Bain de Bouche Mirafluor, 100ml', '', 18490, 'hygiene', 'https://pharma-shop.tn/1864-large_default/miradent-bain-de-bouche-mirafluor-100ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(20, 'MIRADENT DENTIFIRCE MIRASENSITIVE HAP+, 50ML', '', 16000, 'hygiene', 'https://pharma-shop.tn/1868-large_default/miradent-dentifirce-mirasensitive-hap-50ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(21, 'URIAGE BEBE 1ERE EAU NETTOYANTE VISAGE CORPS ET SIEGE 500ML', '', 22000, 'hygiene', 'https://pharma-shop.tn/15234-large_default/uriage-bebe-1ere-eau-nettoyante-visage-corps-et-siege-500ml-.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(22, 'URIAGE DEODORANT PUISSANCE 3 50ML', '', 32500, 'hygiene', 'https://pharma-shop.tn/7544-large_default/uriage-deodorant-puissance-3-50-ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(23, 'NATURE MOI GEL DOUCHE GOURMAND 400 ML', '', 28900, 'hygiene', 'https://mypharma.tn/5439-large_default/nature-moi-gel-douche-gourmand-400-ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(24, 'MIRADENT Tong-clin Gel Pour Gratte Langue 50gr', '', 19000, 'hygiene', 'https://www.maparatunisie.tn/wp-content/uploads/2021/03/unnamed-5.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(27, 'ERIC FAVRE Pure Collagen+ Pure Programme 10 Jours', '', 70000, 'cheveux', 'https://www.paranet.tn/5559-large_default/eric-favre-programme-10-jours-pure-collagen-.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(28, 'Gummy Bear Hair Skin Nails Vitamins 60 Gummies', '', 45000, 'cheveux', 'https://ucanbe.tn/storage/media/202312/86wqiBAdQNweXIArBTrZkamUW1lX4LTG1zyhwhgl.png', 0, '0000-00-00', '0000-00-00', 0, 0),
(29, 'BIOXSINE Shampooing Anti Chute Forte Tous Types de Cheveux 300ml', '', 46890, 'cheveux', 'https://ucanbe.tn/storage/media/oI9fjAzm04wHd7Sm0kcyVzEuMpW5SAEy9HVdAo3A.webp', 0, '0000-00-00', '0000-00-00', 0, 0),
(30, 'PHYTEAL Ultraliss Serum Traitant à La Kératine 40ml', '', 51500, 'cheveux', 'https://www.med.tn/uploads/para/2066.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(35, 'eucerin Dermo Pure K10', '', 55000, 'visage', 'https://pharma-shop.tn/15030-large_default/eucerin-dermopure-serum-triple-action-40ml.jpg', 0, '0000-00-00', '0000-00-00', 1, 42000),
(36, 'eucerin Soin Contour des Yeux SPF 15', '', 86000, 'visage', 'https://ucanbe.tn/storage/media/40059004673799feV2.webp', 0, '0000-00-00', '0000-00-00', 1, 73000),
(37, 'eucerin booster d\'hydratation', '', 89000, 'visage', 'https://pharma-shop.tn/10934-large_default/eucerin-hyaluron-filler-serum-booster-d-hydratation-30ml.jpg', 0, '0000-00-00', '0000-00-00', 1, 72000),
(38, 'eucerin Oil Control SPF50+', '', 66000, 'solaire', 'https://www.paranet.tn/5634-large_default/eucerin-gel-creme-spf-50-oil-control-50-ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 52000),
(50, 'RoseBaie Trio Figue de Barbarie Shampoing Masque et Sérum', '', 15000, 'cheveux', 'https://www.maparatunisie.tn/wp-content/uploads/2022/11/KIT-ROSEBAIE-FIGUE-DE-BARBARIE-X-KERATINE.png', 0, '0000-00-00', '0000-00-00', 0, 0),
(51, 'ALANIA Bain D’huile Pour Cheveux 150ml', '', 29990, 'cheveux', 'https://beautystore.tn/15404-large_default/huile-apaisante-hydratante-jardin-secret-150ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(52, 'RoseBaie Shampoing à La Kératine et à L’huile De Ricin 500ml', '', 44900, 'cheveux', 'https://beautystore.tn/19682-medium_default/shampoing-k%C3%A9ratine-et-huile-de-ricin-500ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(53, 'CAMELIA Vitamine E Pure 10ml', '', 14800, 'cheveux', 'https://1001para.tn/9646-thickbox_default/camelia-vitamine-e-pure-10ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(54, 'PHYTEAL Ultraliss Shampooing Lissant à la Kératine 250ml', '', 34000, 'cheveux', 'https://paraclic.tn/7025-home_default/phyteal-ultraliss-shampoing-lissant-a-la-keratine-250ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(56, 'SVR Blur SPF50+ 50ml', '', 70000, 'solaire', 'https://tn.svr.com/cdn/shop/files/Sun-secure_blur_2000x2000_2022_3_a97cee70-2f2e-4090-9e09-77e1c2862a21_x3000.jpg?v=1685696196', 0, '0000-00-00', '0000-00-00', 0, 0),
(57, 'Daylong Extreme Lotion Solaire SPF50+ 100ml', '', 81000, 'solaire', 'https://mypharma.tn/6357-large_default/daylong-extreme-lotion-solaire-spf50-100ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(58, 'ISDIN Ecran Solaire Active Unify Fusion Fluide Teinte SPF50+ 50ml', '', 70000, 'solaire', 'https://pharma-shop.tn/22590-large_default/isdin-photoprotection-ecran-solaire-active-unify-fusion-fluide-teintee-spf50-50ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(59, 'ISDIN Lotion Spray Solaire SPF 50+ 250ml', '', 64800, 'solaire', 'https://www.paranet.tn/5829-large_default/isdin-lotion-spray-solaire-spf-50-250-ml.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(60, 'Topface Sensitive Stylo Lipstick Pinky Charm 006', '', 16000, 'maquillage', 'https://www.maparatunisie.tn/wp-content/uploads/2022/11/Topface-Sensitive-Stylo-Lipstick-PT157-006.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(61, 'TOPFACE Super Silky Eyeliner', '', 11500, 'maquillage', 'https://www.maparatunisie.tn/wp-content/uploads/2023/06/TOPFACE-SUPER-SILKY-EYELINER-1.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(62, 'Topface Gloss à Lèvres Volume Super Nova 001', '', 22800, 'maquillage', 'https://www.maparatunisie.tn/wp-content/uploads/2022/12/Topface-Gloss-a-Levres-Volume-Super-Nova-001.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(63, 'Eye Care Vernis Soin Traitant Durcisseur 805 8ml', '', 34000, 'maquillage', 'https://www.maparatunisie.tn/wp-content/uploads/2021/02/vernis-soin-traitant-durcisseur.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(64, 'Eye Care Crayon Liner Contour des Yeux', '', 25990, 'maquillage', 'https://www.pharma-gdd.com/media/cache/resolve/product_show/eye-care-liner-crayon-yeux-aigue-marine-709-face.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(65, 'Eye Care Rouge À Lèvres Haute Tolérance', '', 34500, 'maquillage', 'https://www.maparatunisie.tn/wp-content/uploads/2021/02/rouge-a-levres.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(66, 'Eye Care Mascara Allongeant 6g', '', 54000, 'maquillage', 'https://pharma-shop.tn/5850-large_default/eye-care-mascara-allongeant-6g.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(67, 'FILORGA Flash Nude Fluid 1.5 Medium SPF30 30ml', '', 97000, 'maquillage', 'https://i0.wp.com/lyspharma.tn/wp-content/uploads/2021/09/FILORGA-FLASH-NUDE-FLUID-1.5-MEDIUM-SPF30-30ml.jpg?ssl=1', 0, '0000-00-00', '0000-00-00', 0, 0),
(68, 'FILORGA Flash Nude Powder Pro Perfection Poudre Invisible', '', 106000, 'maquillage', 'https://www.coquette.tn/3051/fond-de-teint-filorga-filorga-flash-nude-powder-pro-perfection-poudre-invisible.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(69, 'FILORGA Coffret Flash-nude Fluid Teint Pro Perfection SPF30 (1.5 Medium) 30ml + Montre FILORGA offert', '', 109000, 'maquillage', 'https://www.maparatunisie.tn/wp-content/uploads/2021/05/FILORGA-COFFRET-FLASH-NUDE-FLUID-TEINT-PRO-PERFECTION-SPF30-1.5-MEDIUM-30ml-MONTRE-FILORGA-OFFERT-e1632136147181.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(70, 'Flormar Deluxe Cashmere SLS 38 Like Cookie', '', 20000, 'maquillage', 'https://www.maparatunisie.tn/wp-content/uploads/2023/06/flormar-deluxe-cashmere-sls-24-red-boston.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(71, 'Flormar Loose Powder LPW-003 Medium Sand', '', 27300, 'maquillage', 'https://www.foleyschemist.ie/wp-content/uploads/2015/12/04-Beige-Sand-e1449143208374-300x400.jpg', 0, '0000-00-00', '0000-00-00', 0, 0),
(72, 'Flormar HD Weightless Matte Lipstick LSK-03 Pure Rose', '', 24990, 'maquillage', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS1aFzahok_jD3wIQ6VXt5qXmdUFib1X_6_ozolDy8hng&s', 0, '0000-00-00', '0000-00-00', 0, 0),
(80, 'eucerin Oil Control SPF50+', '', 66000, 'visage', 'https://www.paraexpert.tn/wp-content/uploads/2023/12/eucerin-oil-control-gel-creme-spf50-50-ml.jpg', 0, '0000-00-00', '0000-00-00', 1, 57000),
(81, 'eucerin Dermo Pure:Gommage Scrub', '', 47000, 'visage', 'https://pharma-shop.tn/6456-large_default/eucerin-dermopure-gommage-peaux-a-imperfections-100ml.jpg', 0, '0000-00-00', '0000-00-00', 1, 34000);

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

DROP TABLE IF EXISTS `stock`;
CREATE TABLE IF NOT EXISTS `stock` (
  `id` int NOT NULL AUTO_INCREMENT,
  `produit` int NOT NULL,
  `quantite` int NOT NULL,
  `createur` int NOT NULL,
  `date_crea` date NOT NULL,
  `date_modif` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`id`, `produit`, `quantite`, `createur`, `date_crea`, `date_modif`) VALUES
(1, 1, 19, 1, '0000-00-00', '0000-00-00'),
(2, 2, 34, 1, '0000-00-00', '0000-00-00'),
(6, 4, 9, 0, '0000-00-00', '0000-00-00'),
(5, 3, 10, 0, '0000-00-00', '0000-00-00'),
(7, 5, 12, 0, '0000-00-00', '0000-00-00'),
(8, 6, 15, 0, '0000-00-00', '0000-00-00'),
(9, 7, 17, 0, '0000-00-00', '0000-00-00'),
(10, 8, 10, 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Structure de la table `visiteur`
--

DROP TABLE IF EXISTS `visiteur`;
CREATE TABLE IF NOT EXISTS `visiteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `mp` varchar(200) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `etat` int NOT NULL,
  `date_crea` date NOT NULL,
  `date_modif` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `visiteur`
--

INSERT INTO `visiteur` (`id`, `nom`, `email`, `prenom`, `mp`, `telephone`, `etat`, `date_crea`, `date_modif`) VALUES
(9, 'imen', 'ichabchoub@gmail.com', 'chabchoub', 'efb2e01ed433b79c785ef384a9bfc7e4', '28631785', 1, '0000-00-00', '0000-00-00'),
(11, 'anis', 'anis@gmail.com', 'jedidi', '38a1ffb5ccad9612d3d28d99488ca94b', '57231456', 0, '0000-00-00', '0000-00-00'),
(8, 'ahmed', 'ahmed@gmail.com', 'ben ali', 'a591024321c5e2bdbd23ed35f0574dde', '74258134', 1, '0000-00-00', '0000-00-00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
