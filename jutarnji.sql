-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 01:40 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jutarnji`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Ivan', 'Horvat', 'ivanhorvat', '$2y$10$RgB1bdS5gN6zO6MtxWwldORh.9qR3C8GtFo8avQAMuIh68yLGYehO', 1),
(2, 'Luka', 'Kovačević', 'lukakovacevic', '$2y$10$NbpBmtrwJuZZKFdb8ZOLNOAuJMeXhXeocqfhaQ9QtBwmVMU.AZgSm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sazetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `tekst` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(1, '12.06.2024.', 'Drugo izdanje Organic Sunseta', 'Brazilski DJ Ancestrall otvorit će Organic Sunse\r\n', 'Istra privlači posjetitelje svojim prirodnim ljepotama, gastronomskim delicijama i gostoljubivošću, a ove sezone mogla bi postati hit destinacija za ljubitelje glazbe na drevnim lokacijama.\r\n\r\nTerra Divina Events tim je koji već drugu godinu za redom organizira evente na raznim znamenitim lokacijama diljem rodne im Istre. Ono po čemu su posebni jest filozofija kojom vode publiku na putovanje kroz glazbu, kulturu i povijest ove hrvatske regije, oživljavajući utihnule trgove, kaštele i druge povijesne lokacije. Glavna ideja jest stvoriti ambijent gdje se umjetnost slobodno izražava.\r\n\r\nLjetnu sezonu otvaraju u subotu, 15. lipnja, drugim izdanjem Organic Sunset-a na prekrasnom kaštelu Petrapilosa, smještenom u idiličnoj kotlini među brežuljcima sjeverne Istre, nedaleko od Buzeta. Nakon prošlogodišnje bajkovite večeri mnogi s nestrpljenjem iščekuju drugo izdanje Organic Sunset-a.', 'kultura1.jpg', 'kultura', 0),
(14, '12.06.2024.', 'Što to čeka Hrvatsku na Euru?', 'Zasad je jedino jasno da 2. mjesto u skupini B donosi dvoboj s drugoplasiranim iz skupine A\r\n', 'Španjolska 15. lipnja, Albanija 19. lipnja i za kraju Italija 24. lipnja. Tako izgleda raspored Hrvatske u skupini B Europskog prvenstva u Njemačkoj. Za 13 dana saznat ćemo kako su Vatreni odradili posao, jesu li prošli u osminu finala ili se oprostili već u prvoj fazi natjecanja.\r\n\r\nOstvare li Dalićevi momci uspjeh i uđu među 16 najboljih, trenutačno je čak 16 mogućih suparnika s kojima mogu u borbu za mjesto u četvrtfinalu. Kao prvi igrali bi 30. lipnja u Kölnu, kao drugi dan ranije u Berlinu, a kao treći početkom srpnja. Postoje dvije mogućnosti, da igraju protiv osvajača skupine F 1. srpnja u Frankfurtu ili protiv najboljeg iz skupine E 2. srpnja u Münchenu.\r\n\r\nZasad je jedino jasno da 2. mjesto u skupini B donosi dvoboj s drugoplasiranim iz skupine A u kojoj su Njemačka, Škotska, Mađarska i Švicarska. Računamo li da će tu skupinu osvojiti domaćin Njemačka, takav rasplet u osmini finala uopće ne bi bio loš. U četvrtfinalu bi potom, barem prema papirnatom pogledu na favorite, Vatrene mogla dočekati Engleska.', 'sport1.jpg', 'sport', 0),
(22, '13.06.2024.', 'Sandra osvojila zlato.', 'Uzela je i Zlatnu krunu, koju osvajaju oni čiji rezultat vrijedi najviše\r\n', 'Sandra Elkasević nije u Rimu osvojila samo sedmi uzastopni naslov europske prvakinje, već i Zlatnu krunu, nagradu po prvi put u povijesti oformljenu za ovo EP, uz koju ide i pripadajući ček od 50.000 eura. Atletičari su bili podijeljeni u pet skupina (sprint i prepone, srednje i duge pruge, bacanja, skokovi, te višeboj i štafete), a Zlatnu krunu osvojili su oni čiji rezultat vrijedi najviše po bodovnim tablicama Svjetske atletike u svakoj od navedenih skupina.', 'sport2.jpg', 'sport', 0),
(23, '13.06.2024.', 'Ispunjeno tenisko proročanstvo', 'Tomislav Poljak predvidio je uspon dvojice mladića na vrh', 'Tenis se jutros probudio u novoj eri. Jannik Sinner (22), osvajač Australian Opena, i Carlos Alcaraz (21), novookrunjeni kralj Pariza, postali su broj jedan i broj dva ATP ljestvice, a Novak Đoković izgubio je žezlo i pitanje je hoće li ga ikad više držati u rukama. Smjena na vrhu nakon Roland Garrosa odiše jakom simbolikom, a hrvatske teniske fanove podsjeća na fascinantan detalj iz ne tako davne prošlosti.\r\n\r\nNema tome ni dvije godine kako su Sinner i Alcaraz na stadionu Gorana Ivaniševića u Umagu igrali svoj prvi (i zasad jedini) finale. Osjećali smo te večeri 31. srpnja 2022. da će meč dvojice mladih lavova ući u povijest turnira, čak smo tada i napisali da ih za otprilike tri godine vidimo na broju jedan i broju dva, ali budućnost je stigla brže od svih očekivanja.\r\n\r\nNije se tome vjerojatno nadao ni Tomislav Poljak (36), direktor umaškog turnira - inače i naš bivši kolega iz Jutarnjeg lista - koji veliku smjenu generacija promatra iz dvije perspektive. Osim što je najzaslužniji čovjek za to što su Carlos Alcaraz i Jannik Sinner uopće igrali u Hrvatskoj, Poljak je i dio Sinnerovog menadžerskog tima. Talijana, naime, zastupa agencija StarWing Sports u kojoj je Poljak dopredsjednik i agent za igrače, a vodi je Lawrence Frankopan, njegov prethodnik na poziciji direktora Umaga.', 'sport3.jpg', 'sport', 0),
(24, '13.06.2024.', 'Messi otkrio plan', 'Dosad je za Inter skupio 29 nastupa, postigavši 25 pogodaka i upisavši 16 asistencija', '\r\nU srpnju prošle godine Lionel Messi stavio je potpis na ugovor s Inter Miamijem. Argentinski čarobnjak tada je dogovorio dvogodišnju suradnju s američkim klubom, koja mu istječe sa zadnjim danom 2025. godine. Nakon završetka klupske sezone, 36-godišnji nogometaš ovih se dana priprema za Copa Américu, koja će se održati u SAD-u, gdje će Gaučosi braniti naslov.\r\n\r\nNo, prema pisanju španjolskih medija, Messi planira nastupiti i na Svjetskom prvenstvu za dvije godine. Mundijal će se, također, igrati na američkom tlu, uz Meksiko i Kanadu, a želi li biti fit za svjetsku smotru, osvajač osam Zlatnih lopti morat će potpisati novi ugovor s nekim klubom.\r\n\r\nVEZANE VIJESTI\r\nLionel Messi\r\nRAZJASNIO STVARI\r\nVelike vijesti s Floride, Messi napokon otkrio gdje završava karijeru: ?Ovo će biti moj posljednji klub?\r\nISKRENI ARGENTINAC\r\nMessi dobio škakljivo pitanje, a potom je uslijedio odgovor koji bi mogao opasno naljutiti navijače Barcelone\r\nNo, kako sada stvari stoje, taj klub i dalje bi se trebao zvati Inter Miami. Bivši igrač Barcelone i PSG-a volio bi se umiroviti na Floridi, isticao je to u više navrata, s obzirom na to da sada može više uživati u nekim stvarima i izvan travnjaka.\r\n\r\nDosad je za Inter skupio 29 nastupa, postigavši 25 pogodaka i upisavši 16 asistencija, uz jedan osvojeni trofej.', 'sport4.jpg', 'sport', 0),
(25, '13.06.2024.', 'Eiffelov tor. sa 100k lampica', 'Dvije su dizalice korištene da podignu čeličnu konstrukciju', 'Pariški Eiffelov toranj krajem prošlog tjedna okitio se olimpijskim krugovima, za nekoliko tjedana u glavnom gradu Francuske počinju Ljetne olimpijske igre.\r\n\r\nKrugove obješene s južne strane tornja noću sad osvjetljava više od 100.000 LED dioda, a Eiffelov toranj je sad još i više postao atrakcija koju svi žele fotografirati.\r\n\r\nDvije su dizalice korištene da podignu trideset tona tešku čeličnu konstrukciju i montiraju je između prvog i drugog kata Eiffelovog tornja.\r\n\r\nOrganizatori Olimpijskih igara u Parizu predstavili su prikaz pet olimpijskih krugova na Eiffelovom tornju, samo pedeset dana prije početka ovogodišnjih ljetnih igara.\r\n\r\nZaslon s prstenom, izrađen od recikliranog francuskog čelika, postavljen je na južnoj strani znamenitosti gdje gleda na rijeku Seinu. Svaki prsten ima devet metara u promjeru.\r\n\r\nOlimpijski krugovi će biti osvijetljeni svake večeri do kraja Paraolimpijskih igara koje počinju krajem kolovoza.\r\n\r\nU međuvremenu, olimpijske i paraolimpijske medalje u Parizu također se ugrađuju u komade željeza uzetih s Eiffelovog tornja.\r\n\r\nTisuće sportaša prodefilirati će Parizom na brodovima na Seini tijekom ceremonije otvaranja 26. srpnja. Olimpijska natjecanja održat će se u samom srcu grada, u rijeci Seini i unutar povijesnih zgrada kao što je Grand Palais.\r\n\r\nPariz također koristi svoju postojeću sportsku infrastrukturu, uključujući teniski stadion Roland Garros i Stade de France, nacionalni nogometni stadion.\r\n\r\nEiffelov toranj bilježi ogroman broj posjetitelja uoči igara.', 'kultura2.jpg', 'kultura', 0),
(26, '13.06.2024.', 'Jurić odustao od Hajduka', 'Njegovo odustajanje je teški, u ovom trenutku najteži udarac vodstvu Hajduka', '\r\nIvan Jurić, nesuđeni Hajdukov trener, odlučio je odustati od navodno već postignutog dogovora da prihvati klupu splitskog kluba, pa je tako na negativan način zaključeno nastojanje sportskog direktora \"bijelih\" Nikole Kalinića da - prema njegovom uvjerenju - na Poljud privede pravog stručnjaka, koji bi, prema svim najavama, imao snage i znanja srediti neuredne odnose u svlačionici i dotjerati Hajdukovu momčad na njegov način, a to je da djeluje u najmanju ruku kao istinska momčad.\r\n\r\nOstat će misterij kako i zašto je Jurić najprije dao privolu za angažman, pa je vodstvo kluba, u prvom licu Ivan Bilić, navodno sve stavke ugovora prihvatio, ali je onda postalo nejasno zbog čega je Nadzorni odbor, s predsjednikom Aljošom Pavelinom, oklijevao s odobrenjem Jurićeva angažmana.', 'sport5.jpg', 'sport', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
