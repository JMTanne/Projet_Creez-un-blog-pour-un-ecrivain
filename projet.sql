-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 18 jan. 2019 à 10:22
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

USE db769942789;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `alerts`
--

DROP TABLE IF EXISTS `alerts`;
CREATE TABLE IF NOT EXISTS `alerts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alert_commentId` int(11) NOT NULL,
  `alert_postId` int(11) NOT NULL,
  `alert_commentAuthor` varchar(255) NOT NULL,
  `alert_commentContent` text NOT NULL,
  `alert_commentDate` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alerts`
--

INSERT INTO `alerts` (`id`, `alert_commentId`, `alert_postId`, `alert_commentAuthor`, `alert_commentContent`, `alert_commentDate`, `creation_date`) VALUES
(10, 57, 3, 'Mickey', 'Salut Gabi !', '21/12/2018 à 14h06min37s', '2019-01-14 19:40:32');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `comment_author`, `comment_content`, `creation_date`) VALUES
(2, 1, 'Santon', 'Hello, voici un autre pour le chapitre 1', '2018-12-10 11:06:21'),
(3, 1, 'Test', 'Coucou', '2018-12-14 13:17:48'),
(4, 1, 'Sandrine', 'C\'est beau', '2018-12-14 16:40:06'),
(5, 3, 'Howi', 'Ce chapitre est vraiment extra !', '2018-12-16 17:52:42'),
(7, 2, 'TheKnight', 'Mouais, bof ce chapitre', '2018-12-16 18:10:17'),
(8, 2, 'Gabi', 'Oui c\'est vrai', '2018-12-16 19:22:12'),
(9, 2, 'Mickey', 'Hello', '2018-12-16 19:27:04'),
(10, 3, 'Gabi', 'Coucou', '2018-12-16 19:28:44'),
(51, 1, 'Krakoukass', 'Salut les marsouins', '2018-12-19 11:23:26'),
(57, 3, 'Mickey', 'Salut Gabi !', '2018-12-21 14:06:37');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `chapter_id`, `post_title`, `post_content`, `creation_date`) VALUES
(1, 1, 'Chapitre 1 - RÉSULTAT ET PROLOGUE', '<p style=\"text-align: justify;\">Un personnage fort &eacute;trange, nomm&eacute; Charles Dexter Ward, a disparu r&eacute;cemment d&rsquo;une maison de sant&eacute;, pr&egrave;s de Providence, Rhode Island. Il avait &eacute;t&eacute; intern&eacute; &agrave; contrec&oelig;ur par un p&egrave;re accabl&eacute; de chagrin, qui avait vu son aberration passer de la simple excentricit&eacute; &agrave; une noire folie pr&eacute;sentant &agrave; la fois la possibilit&eacute; de tendances meurtri&egrave;res et une curieuse modification du contenu de son esprit. Les m&eacute;decins s&rsquo;avouent compl&egrave;tement d&eacute;concert&eacute;s par son cas, car il pr&eacute;sentait des bizarreries physiques autant que psychologiques. En premier lieu, le malade paraissait beaucoup plus vieux qu&rsquo;il ne l&rsquo;&eacute;tait. &Agrave; vrai dire, les troubles mentaux vieillissent tr&egrave;s vite ceux qui en sont victimes, mais le visage de ce jeune homme de vingt-six ans avait pris une expression subtile que seuls poss&egrave;dent les gens tr&egrave;s &acirc;g&eacute;s. En second lieu, ses fonctions organiques montraient un curieux d&eacute;sordre. Il n&rsquo;y avait aucune sym&eacute;trie entre sa respiration et les battements de son c&oelig;ur ; sa voix &eacute;tait devenue un murmure &agrave; peine perceptible ; il lui fallait un temps incroyablement long pour dig&eacute;rer ; ses r&eacute;actions nervales aux stimulants habituels n&rsquo;avaient aucun rapport avec toutes celles, pathologiques ou normales, que la m&eacute;decine pouvait conna&icirc;tre. La peau &eacute;tait s&egrave;che et froide ; sa structure cellulaire semblait exag&eacute;r&eacute;ment grossi&egrave;re et l&acirc;che. Une grosse tache de naissance, en forme d&rsquo;olive, avait disparu de sa hanche gauche, tandis qu&rsquo;apparaissait sur sa poitrine un signe noir tr&egrave;s &eacute;trange qui n&rsquo;existait pas auparavant. Tous les m&eacute;decins s&rsquo;accordent &agrave; dire que le m&eacute;tabolisme du sujet avait &eacute;t&eacute; retard&eacute; d&rsquo;une fa&ccedil;on extraordinaire.</p>\r\n<p style=\"text-align: justify;\">Sur le plan psychologique &eacute;galement, Charles Ward &eacute;tait unique. Sa folie n&rsquo;avait rien de commun avec aucune esp&egrave;ce de d&eacute;mence consign&eacute;e dans les trait&eacute;s les plus r&eacute;cents et les plus complets ; elle semblait &ecirc;tre une force mentale qui aurait fait de lui un g&eacute;nie ou un chef si elle n&rsquo;e&ucirc;t &eacute;t&eacute; bizarrement d&eacute;form&eacute;e. Le Dr Willett, m&eacute;decin de la famille Ward, affirme que les facult&eacute;s mentales du malade, si on les mesurait par ses r&eacute;actions &agrave; tous les sujets autres que celui de sa d&eacute;mence, s&rsquo;&eacute;taient bel et bien accrues depuis le d&eacute;but de sa maladie. Le jeune Ward avait toujours &eacute;t&eacute; un savant et un arch&eacute;ologue ; mais m&ecirc;me ses travaux les plus brillants ne r&eacute;v&eacute;laient pas la prodigieuse intelligence qu&rsquo;il manifesta au cours de son examen par les ali&eacute;nistes. En fait, son esprit semblait si lucide et si puissant qu&rsquo;on eut beaucoup de peine &agrave; obtenir l&rsquo;autorisation l&eacute;gale de l&rsquo;interner ; il fallut, pour emporter la d&eacute;cision, les t&eacute;moignages de plusieurs personnes et la constatation de lacunes anormales dans les connaissances du patient, en dehors de son intelligence proprement dite. Jusqu&rsquo;au moment de sa disparition, il se montra lecteur omnivore et aussi brillant causeur que le lui permettait sa faible voix. Des observateurs exp&eacute;riment&eacute;s, ne pouvant pr&eacute;voir sa fuite, pr&eacute;dirent qu&rsquo;il ne manquerait pas d&rsquo;&ecirc;tre bient&ocirc;t rendu &agrave; la libert&eacute;.</p>\r\n<p style=\"text-align: justify;\">Seul le Dr Willett, qui avait mis au monde Charles Ward et n&rsquo;avait pas cess&eacute; depuis lors de surveiller son &eacute;volution physique et mentale, semblait redouter cette perspective. Il avait fait une terrible d&eacute;couverte qu&rsquo;il n&rsquo;osait r&eacute;v&eacute;ler &agrave; ses confr&egrave;res. En v&eacute;rit&eacute;, le r&ocirc;le qu&rsquo;il a jou&eacute; dans cette affaire ne laisse pas d&rsquo;&ecirc;tre assez obscur. Il a &eacute;t&eacute; le dernier &agrave; parler au malade, trois heures avant sa fuite et plusieurs t&eacute;moins se rappellent le m&eacute;lange d&rsquo;horreur et de soulagement qu&rsquo;exprimait son visage &agrave; l&rsquo;issue de cet entretien. L&rsquo;&eacute;vasion elle-m&ecirc;me reste un des myst&egrave;res inexpliqu&eacute;s de la maison de sant&eacute; du Dr Waite : une fen&ecirc;tre ouverte &agrave; soixante pieds du sol n&rsquo;offre pas une solution. Willett n&rsquo;a aucun &eacute;claircissement &agrave; donner, bien qu&rsquo;il semble, chose &eacute;trange, avoir l&rsquo;esprit beaucoup plus libre depuis la disparition de Ward. En v&eacute;rit&eacute;, on a l&rsquo;impression qu&rsquo;il aimerait en dire davantage s&rsquo;il &eacute;tait s&ucirc;r qu&rsquo;un grand nombre de gens attacheraient foi &agrave; ses paroles. Il avait trouv&eacute; le malade dans sa chambre, mais, peu de temps apr&egrave;s son d&eacute;part, les infirmiers avaient frapp&eacute; en vain &agrave; la porte.</p>', '2018-12-06 10:57:07'),
(2, 2, 'Chapitre 2 - ANTÉCÉDENT ET ABOMINATION', '<p style=\"text-align: justify;\">Joseph Curwen, s&rsquo;il faut en croire les l&eacute;gendes, les rumeurs et les papiers d&eacute;couverts par Ward, &eacute;tait un homme &eacute;nigmatique qui inspirait une horreur obscure. Il avait fui Salem pour se r&eacute;fugier &agrave; Providence (ce havre de tous les &ecirc;tres libres, originaux et dissidents) au d&eacute;but de la grande pers&eacute;cution des sorci&egrave;res : il craignait d&rsquo;&ecirc;tre accus&eacute; de pratiquer la magie, en raison de son existence solitaire et de ses exp&eacute;riences chimiques ou alchimiques. Devenu libre citoyen de Providence, il acheta un terrain &agrave; b&acirc;tir au bas d&rsquo;Olney Street. Sa maison fut construite sur Stampers Hill, &agrave; l&rsquo;ouest de Town Street, &agrave; l&rsquo;endroit qui devint par la suite Olney Court ; en 1761, il rempla&ccedil;a ce logis par un autre, beaucoup plus grand, encore debout &agrave; l&rsquo;heure actuelle.&nbsp;</p>\r\n<p style=\"text-align: justify;\">Ce qui parut d&rsquo;abord le plus bizarre, c&rsquo;est que Joseph Curwen ne sembla pas vieillir le moins du monde &agrave; partir du jour de son arriv&eacute;e. Il se fit armateur, acheta des appontements pr&egrave;s de la baie de Mile-End, et aida &agrave; reconstruire le GrandPont en 1713 ; mais il garda toujours le m&ecirc;me aspect d&rsquo;un homme de trente &agrave; trente-cinq ans. &Agrave; mesure que les ann&eacute;es passaient, cette qualit&eacute; singuli&egrave;re attira l&rsquo;attention g&eacute;n&eacute;rale. Curwen se contenta d&rsquo;expliquer qu&rsquo;il &eacute;tait issu d&rsquo;une lign&eacute;e d&rsquo;anc&ecirc;tres particuli&egrave;rement robustes, et que la simplicit&eacute; de son existence lui permettait d&rsquo;&eacute;conomiser ses forces. Les habitants de Providence, ne comprenant pas tr&egrave;s bien comment on pouvait concilier la notion de simplicit&eacute; avec les inexplicables all&eacute;es et venues du marchand et les lumi&egrave;res qui brillaient &agrave; ses fen&ecirc;tres &agrave; toute heure de la nuit, cherch&egrave;rent d&rsquo;autres causes &agrave; son &eacute;trange jeunesse et &agrave; sa long&eacute;vit&eacute;. La plupart d&rsquo;entre eux estim&egrave;rent que cet &eacute;tat singulier provenait de ses perp&eacute;tuelles manipulations de produits chimiques. On parlait beaucoup des curieuses substances qu&rsquo;il faisait venir de Londres et des Indes sur ses bateaux, o&ugrave; qu&rsquo;il allait chercher &agrave; Newport, Boston et New York. Lorsque le vieux Dr Jabez Bowen arriva de Rehoboth et ouvrit sa boutique d&rsquo;apothicaire, de l&rsquo;autre c&ocirc;t&eacute; du GrandPont, &agrave; l&rsquo;enseigne de la Licorne et du Mortier, Curwen lui acheta sans arr&ecirc;t drogues, acides et m&eacute;taux. S&rsquo;imaginant qu&rsquo;il poss&eacute;dait une merveilleuse science m&eacute;dicale, plusieurs malades all&egrave;rent lui demander secours ; il les encouragea dans leur croyance, sans se compromettre le moins du monde, en leur donnant des potions de couleur bizarre, mais on observa que ses rem&egrave;des, administr&eacute;s aux autres, restaient presque toujours sans effet. Finalement, lorsque, apr&egrave;s cinquante ans de s&eacute;jour, Curwen ne sembla pas avoir vieilli de plus de cinq ans, les gens commenc&egrave;rent &agrave; murmurer et &agrave; satisfaire le d&eacute;sir d&rsquo;isolement qu&rsquo;il avait toujours manifest&eacute;.</p>\r\n<p style=\"text-align: justify;\">Diverses lettres et journaux intimes de cette &eacute;poque r&eacute;v&egrave;lent plusieurs autres raisons pour lesquelles on en vint &agrave; craindre et &agrave; &eacute;viter Joseph Curwen comme la peste. Ainsi, il avait une passion bien connue pour les cimeti&egrave;res o&ugrave; on le voyait errer &agrave; toute heure, encore que personne ne l&rsquo;e&ucirc;t jamais vu se livrer &agrave; un acte sacril&egrave;ge. Sur la route de Pawtuxet, il poss&eacute;dait une ferme o&ugrave; il passait l&rsquo;&eacute;t&eacute; et &agrave; laquelle il se rendait fr&eacute;quemment &agrave; cheval, de jour ou de nuit. Deux domestiques prenaient soin de ce domaine. C&rsquo;&eacute;tait un couple d&rsquo;Indiens Narragansett : le mari avait un visage coutur&eacute; d&rsquo;&eacute;tranges cicatrices ; la femme, d&rsquo;aspect r&eacute;pugnant, devait avoir du sang noir dans les veines. L&rsquo;appentis attenant &agrave; la ferme abritait le laboratoire de Curwen. Les porteurs qui livraient des flacons, des sacs ou des caisses par la petite porte de derri&egrave;re, parlaient entre eux de creusets, alambics et fourneaux qu&rsquo;ils avaient vus dans la pi&egrave;ce aux murs garnis de rayonnages, et disaient &agrave; voix basse que le taciturne alchimiste ne tarderait pas &agrave; trouver la pierre philosophale. Les voisins les plus proches, les Fenner, qui habitaient &agrave; un quart de mille de distance, d&eacute;claraient qu&rsquo;ils entendaient, pendant la nuit, des cris et des hurlements prolong&eacute;s provenant de la ferme de Curwen. En outre, ils s&rsquo;&eacute;tonnaient du grand nombre d&rsquo;animaux qui paissaient dans les pr&eacute;s : en effet, il n&rsquo;y avait pas besoin de tant de b&ecirc;tes pour fournir de la viande, du lait et de la laine &agrave; un vieillard solitaire et &agrave; ses deux serviteurs. Chose non moins bizarre, le cheptel n&rsquo;&eacute;tait jamais le m&ecirc;me, car, chaque semaine, on achetait de nouveaux troupeaux aux fermiers de Kingstown. Enfin, un grand b&acirc;timent de pierre, dont les fen&ecirc;tres &eacute;taient r&eacute;duites &agrave; d&rsquo;&eacute;troites fentes, avait une tr&egrave;s mauvaise r&eacute;putation. Les fl&acirc;neurs de la place du Grand-Pont avaient beaucoup &agrave; dire sur la maison d&rsquo;Olney Court : non pas la belle demeure b&acirc;tie en 1761, lorsque Curwen devait avoir cent ans, mais l&rsquo;humble logis primitif, &agrave; la mansarde sans fen&ecirc;tres, aux murs couverts de bardeaux, dont il fit br&ucirc;ler la charpente apr&egrave;s sa d&eacute;molition. En v&eacute;rit&eacute;, elle offrait beaucoup moins de myst&egrave;re que la ferme, mais on y voyait briller des lumi&egrave;res au c&oelig;ur de la nuit ; il n&rsquo;y avait, comme serviteurs, que deux &eacute;trangers au visage basan&eacute; ; la gouvernante &eacute;tait une vieille Fran&ccedil;aise d&rsquo;un &acirc;ge incroyable ; on livrait &agrave; l&rsquo;office des quantit&eacute;s de nourritures extraordinaires ; enfin, on entendait des voix &eacute;tranges tenir des conversations secr&egrave;tes &agrave; des heures indues. Dans les cercles plus &eacute;lev&eacute;s de la soci&eacute;t&eacute; de Providence, le comportement de Curwen faisait aussi l&rsquo;objet de nombreuses discussions ; car, &agrave; mesure que le nouveau venu avait p&eacute;n&eacute;tr&eacute; dans les milieux eccl&eacute;siastiques et commerciaux de la ville, il avait li&eacute; connaissance avec des personnalit&eacute;s distingu&eacute;es. On savait qu&rsquo;il appartenait &agrave; une tr&egrave;s bonne famille, les Curwen, ou Carwen, de Salem, &eacute;tant bien connus dans la NouvelleAngleterre. On apprit qu&rsquo;il avait beaucoup voyag&eacute; dans sa jeunesse, qu&rsquo;il avait s&eacute;journ&eacute; en Angleterre et s&rsquo;&eacute;tait rendu en Orient &agrave; deux reprises. Quand il daignait parler, il employait le langage d&rsquo;un Anglais cultiv&eacute;. Mais, pour une raison quelconque, il n&rsquo;aimait pas la compagnie. Bien qu&rsquo;il n&rsquo;e&ucirc;t jamais repouss&eacute; un visiteur, il faisait toujours preuve d&rsquo;une telle r&eacute;serve que peu de gens trouvaient quelque chose &agrave; lui dire.</p>', '2018-12-06 15:31:22'),
(3, 3, 'Chapitre 3 - RECHERCHE ET ÉVOCATION', '<p style=\"text-align: justify;\">Charles Ward, nous l&rsquo;avons d&eacute;j&agrave; vu, apprit pour la premi&egrave;re fois en 1918 qu&rsquo;il descendait de Joseph Curwen. Il ne faut pas s&rsquo;&eacute;tonner qu&rsquo;il ait manifest&eacute; aussit&ocirc;t un tr&egrave;s vif int&eacute;r&ecirc;t pour cette myst&eacute;rieuse affaire, puisque le sang du sorcier coulait dans ses veines. Aucun g&eacute;n&eacute;alogiste digne de ce nom n&rsquo;aurait pu faire autrement que se mettre &agrave; rechercher aussit&ocirc;t les moindres renseignements ayant trait au sinistre marchand. Au d&eacute;but, il n&rsquo;essaya pas de dissimuler la nature de son enqu&ecirc;te. Il en parlait librement avec sa famille (bien que sa m&egrave;re ne f&ucirc;t gu&egrave;re satisfaite d&rsquo;avoir un anc&ecirc;tre comme Joseph Curwen) et avec les directeurs des mus&eacute;es et des biblioth&egrave;ques o&ugrave; il poursuivait ses recherches. Il usa de la m&ecirc;me franchise aupr&egrave;s des familles qui poss&eacute;daient certains documents, et partagea leur scepticisme amus&eacute; &agrave; l&rsquo;&eacute;gard des auteurs des lettres et des journaux intimes qu&rsquo;il consulta. Il reconnut maintes fois qu&rsquo;il aurait donn&eacute; cher pour savoir ce qui s&rsquo;&eacute;tait pass&eacute;, cent cinquante ans auparavant, &agrave; la ferme de la route de Pawtuxet (dont il avait essay&eacute; vainement de trouver l&rsquo;emplacement), et ce que Joseph Curwen avait &eacute;t&eacute; en r&eacute;alit&eacute;. Quand il eut d&eacute;couvert la lettre de Jedediah Orne dans les archives Smith, il d&eacute;cida de se rendre &agrave; Salem, et il r&eacute;alisa ce projet aux vacances de P&acirc;ques de l&rsquo;ann&eacute;e 1919. On le re&ccedil;ut fort aimablement &agrave; l&rsquo;Essex Institute o&ugrave; il put glaner plusieurs renseignements sur son anc&ecirc;tre. Joseph Curwen &eacute;tait n&eacute; &agrave; Salem-Village (aujourd&rsquo;hui Danvers), &agrave; sept milles de la vieille cit&eacute; puritaine o&ugrave; s&rsquo;amoncellent les pignons pointus et les toits en croupe, le 18 f&eacute;vrier 1662. &Agrave; l&rsquo;&acirc;ge de quinze ans, il avait fui la maison paternelle pour prendre la mer. Neuf ans plus tard, il &eacute;tait revenu s&rsquo;installer dans la ville de Salem, o&ugrave; l&rsquo;on observa qu&rsquo;il avait les mani&egrave;res, les v&ecirc;tements et le langage d&rsquo;un Anglais. &Agrave; partir de cette &eacute;poque, il consacra presque tout son temps aux curieux livres rapport&eacute;s par lui d&rsquo;Europe, et aux &eacute;tranges produits chimiques qui lui venaient d&rsquo;Angleterre, de France et de Hollande. Plusieurs exp&eacute;ditions qu&rsquo;il fit &agrave; l&rsquo;int&eacute;rieur du pays suscit&egrave;rent beaucoup de curiosit&eacute;, car elles co&iuml;ncidaient, murmurait-on, avec l&rsquo;apparition de feux myst&eacute;rieux sur les collines, au c&oelig;ur de la nuit. Ses seuls amis intimes &eacute;taient Edward Hutchinson, de Salem-Village, et Simon Orne, de Salem. Hutchinson poss&eacute;dait une maison presque &agrave; l&rsquo;or&eacute;e des bois, et sa demeure d&eacute;plaisait beaucoup &agrave; plusieurs personnes en raison des bruits nocturnes qu&rsquo;on y entendait. On disait qu&rsquo;il recevait des visiteurs &eacute;tranges et les lumi&egrave;res qu&rsquo;on voyait &agrave; ses fen&ecirc;tres n&rsquo;avaient pas toujours la m&ecirc;me couleur. En outre, il manifestait des connaissances surprenantes au sujet de personnes mortes depuis longtemps et d&rsquo;&eacute;v&eacute;nements tr&egrave;s lointains. Il disparut au d&eacute;but de la pers&eacute;cution des sorci&egrave;res : &agrave; ce m&ecirc;me moment, Joseph alla s&rsquo;installer &agrave; Providence. Simon Orne v&eacute;cut &agrave; Salem jusqu&rsquo;en 1720, ann&eacute;e o&ugrave; les gens commenc&egrave;rent &agrave; s&rsquo;&eacute;tonner de ne jamais le voir vieillir. Lui aussi disparut ; mais, trente ans plus tard, un homme qui &eacute;tait sa vivante image et pr&eacute;tendait &ecirc;tre son fils, vint revendiquer la possession de ses biens. Satisfaction lui fut accord&eacute;e sur la foi de certains papiers manifestement r&eacute;dig&eacute;s et sign&eacute;s par Simon Orne. Jedediah Orne continua &agrave; vivre &agrave; Salem jusqu&rsquo;en 1771, date &agrave; laquelle le r&eacute;v&eacute;rend Thomas Barnard et quelques autres, apr&egrave;s avoir re&ccedil;u des lettres de citoyens de Providence, le firent dispara&icirc;tre &agrave; jamais.</p>\r\n<p style=\"text-align: justify;\">Ward trouva plusieurs documents concernant ces curieuses affaires &agrave; l&rsquo;Essex Institute, au palais de justice et au greffe de l&rsquo;&eacute;tat civil. &Agrave; c&ocirc;t&eacute; de titres de propri&eacute;t&eacute; et d&rsquo;actes de vente, il y avait des fragments de nature beaucoup plus troublante. Quatre ou cinq allusions particuli&egrave;rement nettes figuraient sur les comptes rendus du proc&egrave;s des sorci&egrave;res. Ainsi, le 10 juillet 1692, Hepzibah Lawson jura devant le tribunal pr&eacute;sid&eacute; par le juge Hatborne que &laquo; quarante Sorci&egrave;res et l&rsquo;Homme Noir avaient coutume de se r&eacute;unir dans les Bois derri&egrave;re la maison de Mr Hutchinson &raquo; ; le 8 ao&ucirc;t de la m&ecirc;me ann&eacute;e, Amity How d&eacute;clara au juge Gedney que &laquo; Mr G.B., cette Nuit-l&agrave;, posa la Marque du Diable sur Bridget S., Jonathan A., Simon O., Deliverance W., Joseph C., Susan P., Mehitable C. et Deborah B. &raquo;</p>\r\n<p style=\"text-align: justify;\">Il y avait encore un catalogue de la sinistre biblioth&egrave;que de Hutchinson, et un manuscrit de lui inachev&eacute;, r&eacute;dig&eacute; dans un langage chiffr&eacute; que personne n&rsquo;avait pu lire. Ward en fit faire une copie photographique, et se mit en devoir de la d&eacute;chiffrer, d&rsquo;abord de fa&ccedil;on intermittente, puis avec fi&egrave;vre. D&rsquo;apr&egrave;s son attitude, on peut conclure qu&rsquo;il en trouva la cl&eacute; en octobre ou en novembre, mais il ne dit jamais s&rsquo;il avait r&eacute;ussi ou non.</p>\r\n<p style=\"text-align: justify;\">Les documents concernant Orne offrirent un grand int&eacute;r&ecirc;t d&egrave;s le d&eacute;but. En peu de temps, Ward fut &agrave; m&ecirc;me de prouver, d&rsquo;apr&egrave;s l&rsquo;identit&eacute; des &eacute;critures, une chose qu&rsquo;il consid&eacute;rait comme &eacute;tablie d&rsquo;apr&egrave;s le texte de la lettre adress&eacute;e &agrave; Curwen : &agrave; savoir que Simon Orne et son pr&eacute;tendu fils n&rsquo;&eacute;taient qu&rsquo;une seule et m&ecirc;me personne. Comme Orne l&rsquo;avait dit &agrave; son correspondant, il &eacute;tait dangereux de vivre trop longtemps &agrave; Salem ; c&rsquo;est pourquoi il s&rsquo;en &eacute;tait all&eacute; s&eacute;journer pendant trente ans &agrave; l&rsquo;&eacute;tranger, pour revenir ensuite revendiquer ses terres en qualit&eacute; de repr&eacute;sentant d&rsquo;une nouvelle g&eacute;n&eacute;ration. Il avait apparemment pris soin de d&eacute;truire la majeure partie de sa correspondance, mais les citoyens de Salem qui le firent dispara&icirc;tre en 1771 d&eacute;couvrirent et conserv&egrave;rent certains papiers surprenants : formules et diagrammes cryptiques trac&eacute;s de sa main, ainsi qu&rsquo;une lettre myst&eacute;rieuse dont l&rsquo;auteur, &eacute;tant donn&eacute; son &eacute;criture, ne pouvait &ecirc;tre que Joseph Curwen.</p>\r\n<p style=\"text-align: justify;\">Bien que cette &eacute;p&icirc;tre ne f&ucirc;t pas dat&eacute;e, Charles Ward, en se basant sur certains d&eacute;tails, la situa vers 1750. Nous en donnons ci-dessous le texte int&eacute;gral. Elle est adress&eacute;e &agrave; Simon Orne, mais quelqu&rsquo;un a barr&eacute; ce pr&eacute;nom.</p>\r\n<p style=\"text-align: right;\"><em>Providence, le 1er mai. </em></p>\r\n<p style=\"text-align: justify;\"><em>\"Fr&egrave;re,</em><br /><em>Mon Vieil et Respectable ami, tous mes Respects et V&oelig;ux les plus fervents &agrave; Celui que nous servons pour votre Puissance &Eacute;ternelle. Je viens de d&eacute;couvrir ce que vous devriez savoir au sujet de la Derni&egrave;re Extr&eacute;mit&eacute; et de ce qu&rsquo;il convient de faire &agrave; son propos. Je ne suis point dispos&eacute; &agrave; vous imiter et &agrave; Partir &agrave; cause de mon &acirc;ge, car Providence ne s&rsquo;acharne point comme Salem &agrave; pourchasser les &Ecirc;tres hors du commun et &agrave; les traduire devant les Tribunaux. J&rsquo;ai de gros int&eacute;r&ecirc;ts sur Terre et sur Mer, et je ne saurais agir comme vous le f&icirc;tes ; outre cela, ma ferme de Pawtuxet a sous le sol Ce que vous savez, qui n&rsquo;attendrait pas mon Retour sous une autre forme. <br />Mais, ainsi que je vous l&rsquo;ai dit, je suis pr&ecirc;t &agrave; subir des revers de fortune, et j&rsquo;ai longtemps &eacute;tudi&eacute; la fa&ccedil;on de Revenir apr&egrave;s le Supr&ecirc;me coup du Sort. La nuit derni&egrave;re j&rsquo;ai d&eacute;couvert les Mots qui &eacute;voquent YOGGE SOTHOTHE et j&rsquo;ai vu pour la premi&egrave;re fois ce visage dont parle Ibn Schacabac dans le ... Il m&rsquo;a dit que la Cl&eacute; se trouve dans le troisi&egrave;me psaume du Liber Damnatus. Le soleil &eacute;tant dans la cinqui&egrave;me Maison, et Saturne en Trine, tracez le Pentagramme de Feu, et r&eacute;citez par trois fois le neuvi&egrave;me Verset. R&eacute;p&eacute;tez ce Verset le Jour de la Sainte-Croix et la Veille de la Toussaint, et la Chose sera engendr&eacute;e dans les Sph&egrave;res Ext&eacute;rieures. <br />Et de la Semence d&rsquo;Autrefois na&icirc;tra Celui qui regardera en Arri&egrave;re sans savoir ce qu&rsquo;il cherche.\"</em></p>', '2018-12-10 11:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(10) NOT NULL,
  `user_role` varchar(10) NOT NULL,
  `user_creationDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_password`, `user_role`, `user_creationDate`) VALUES
(1, 'admin', 'admin', 'admin', '2019-01-09 09:40:08'),
(2, 'modo', 'modo', 'moderator', '2019-01-09 09:40:47'),
(3, 'user', 'user', 'regUser', '2019-01-11 14:17:31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
