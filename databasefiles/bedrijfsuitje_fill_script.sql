-- MySQL Script generated by MySQL Workbench
-- Wed Nov 25 10:37:59 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bedrijfsuitje
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bedrijfsuitje
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bedrijfsuitje` DEFAULT CHARACTER SET utf8 ;
USE `bedrijfsuitje` ;

-- -----------------------------------------------------
-- Table `bedrijfsuitje`.`activiteit`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bedrijfsuitje`.`activiteit` (
  `idactiviteit` INT NOT NULL auto_increment,
  `naam` NVARCHAR(80) NOT NULL,
  `omschrijving` NVARCHAR(1200) NOT NULL,
  `locatie` NVARCHAR(100) NOT NULL,
  `begintijd` TIME NOT NULL,
  `eindtijd` TIME NOT NULL,
  `deadline` DATE NOT NULL,
  `aantal` INT NOT NULL,
  PRIMARY KEY (`idactiviteit`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bedrijfsuitje`.`personeel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bedrijfsuitje`.`personeel` (
  `idpersoneel` INT NOT NULL,
  `voorletters` NVARCHAR(25) NOT NULL,
  `tussenvoegsel` NVARCHAR(45) NULL,
  `achternaam` NVARCHAR(45) NOT NULL,
  `email` NVARCHAR(450) NOT NULL,
  `voucher` NVARCHAR(4) NOT NULL,
  PRIMARY KEY (`idpersoneel`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bedrijfsuitje`.`inschrijving`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bedrijfsuitje`.`inschrijving` (
  `activiteitid` INT NOT NULL,
  `personeelid` INT NOT NULL,
  PRIMARY KEY (`activiteitid`, `personeelid`),
  CONSTRAINT `activiteit_inschrijving`
    FOREIGN KEY (`activiteitid`)
    REFERENCES `bedrijfsuitje`.`activiteit` (`idactiviteit`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `personeel_inschrijving`
    FOREIGN KEY (`personeelid`)
    REFERENCES `bedrijfsuitje`.`personeel` (`idpersoneel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bedrijfsuitje`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bedrijfsuitje`.`users` (
  `idusers` INT NOT NULL,
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idusers`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `bedrijfsuitje`.`activiteit`
-- -----------------------------------------------------
START TRANSACTION;
USE `bedrijfsuitje`;
INSERT INTO `bedrijfsuitje`.`activiteit` (`naam`, `omschrijving`, `locatie`, `begintijd`, `eindtijd`, `deadline`, `aantal`) 
VALUES 
('DJ Workshop (ochtend)', 'Maak uw eigen muziek en de voetjes gaan van de vloer tijdens uw uitje met deze fantastische DJ workshop. Leer gebruik te maken van een DJ mixer, monitor en koptelefoon. Daarnaast staan het werken met pitch control en cue points en het live mixen centraal! Onder begeleiding van een ervaren DJ gaan jullie in deze workshop werken aan jullie muzikale vaardigheden. Te beginnen met een stukje theorie over de basistechnieken en dan natuurlijk snel zelf aan de slag. ', 'Nijmegen', '10:00', '12:00', '2021-06-21', 15),
('DJ Workshop (middag)', 'Maak uw eigen muziek en de voetjes gaan van de vloer tijdens uw uitje met deze fantastische DJ workshop. Leer gebruik te maken van een DJ mixer, monitor en koptelefoon. Daarnaast staan het werken met pitch control en cue points en het live mixen centraal! Onder begeleiding van een ervaren DJ gaan jullie in deze workshop werken aan jullie muzikale vaardigheden. Te beginnen met een stukje theorie over de basistechnieken en dan natuurlijk snel zelf aan de slag. ', 'Nijmegen', '13:00', '15:00', '2021-06-21', 15),
('Graffiti Workshop (ochtend)', 'Verken de wereld van street-art met deze fantastische Graffiti-workshop. Deze workshop is ideaal om te gebruiken als ontspanning, teambuilding en zelfs voor trainingsdoeleinden. Jullie kunnen een eigen thema voorstellen waarmee de deelnemers aan de slag kunnen gaan. Denk aan een nieuw logo voor het bedrijf of het levensverhaal van de vrijgezel.  ', 'Arnhem', '9:00', '11:00', '2021-06-20', 10),
('Graffiti Workshop (middag)', 'Verken de wereld van street-art met deze fantastische Graffiti-workshop. Deze workshop is ideaal om te gebruiken als ontspanning, teambuilding en zelfs voor trainingsdoeleinden. Jullie kunnen een eigen thema voorstellen waarmee de deelnemers aan de slag kunnen gaan. Denk aan een nieuw logo voor het bedrijf of het levensverhaal van de vrijgezel. ', 'Arnhem', '13:00', '15:00', '2021-06-20', 10),
('Kitebuggyen (ochtend)', 'Met grote snelheid over het strand racen, voortgetrokken door speciale kitebuggyvliegers die het voor iedereen mogelijk maken om te kitebuggyen. De activiteit begint bij ons altijd met een kite workshop waarin u de kite leert besturen, leert stoppen en de juiste krachten leert krijgen. Als u de kite onder de knie heeft bent u klaar om in de buggy te stappen en kan het echte kitebuggyen beginnen.', 'Zandvoort', '9:00', '12:00', '2021-06-01', 12),
('Kitebuggyen (middag)', 'Met grote snelheid over het strand racen, voortgetrokken door speciale kitebuggyvliegers die het voor iedereen mogelijk maken om te kitebuggyen. De activiteit begint bij ons altijd met een kite workshop waarin u de kite leert besturen, leert stoppen en de juiste krachten leert krijgen. Als u de kite onder de knie heeft bent u klaar om in de buggy te stappen en kan het echte kitebuggyen beginnen.', 'Zandvoort', '13:00', '16:00', '2021-06-01', 12),
('Zandsculpturen maken (ochtend)', 'Een Zandsculpturen workshop, je hebt het vast wel eens gezien, kunstwerken gemaakt in het zand waarvan je denkt, hoe doen ze dat?! Met deze workshop gaan jullie dat leren, echt waar. Onder leiding van onze docent maken jullie eerst een mal op een speciale manier. Hierna leer je hoe je sculpturen kunt maken met onze materialen. Als team samen te werk gaan aan één groot kunstwerk is echt een uitdaging. ', 'Zandvoort', '10:30', '12:30', '2021-06-12', 10),
('Zandsculpturen maken (middag)', 'Een Zandsculpturen workshop, je hebt het vast wel eens gezien, kunstwerken gemaakt in het zand waarvan je denkt, hoe doen ze dat?! Met deze workshop gaan jullie dat leren, echt waar. Onder leiding van onze docent maken jullie eerst een mal op een speciale manier. Hierna leer je hoe je sculpturen kunt maken met onze materialen. Als team samen te werk gaan aan één groot kunstwerk is echt een uitdaging. ', 'Zandvoort', '13:40', '15:40', '2021-06-12', 10),
('Cityhunt', 'Met deze spannende interactieve City Hunt nemen jullie het in teams tegen elkaar op. Ieder team heeft een smartphone of tablet waarmee het spel wordt gespeeld in het stadscentrum. Op de smartphone of tablet staan punten aangegeven en bij deze punten zie je hoeveel punten je kan verdienen met die opdracht. Elk team plant zijn eigen route door het centrum en kan punten verdienen door het oplossen van raadsels en puzzels en door middel van het maken van ludieke foto’s (afhankelijk van de opdracht). Het team dat de meeste punten weet te verzamelen en de snelste tijd neer zet zal dit spannende uitje winnen', 'Utrecht', '9:00', '14:00', '2021-06-05', 18);

COMMIT;


-- -----------------------------------------------------
-- Data for table `bedrijfsuitje`.`personeel`
-- -----------------------------------------------------
START TRANSACTION;
USE `bedrijfsuitje`;
INSERT INTO `bedrijfsuitje`.`personeel` (`idpersoneel`, `voorletters`, `tussenvoegsel`, `achternaam`, `email`, `voucher`) 
VALUES 
('1164', 'M.G.M.', '', 'De Weegh', 'm.deweegh@hetanker.nl', 'V871'),
('2816','I.','','Éz','i.oz@hetanker.nl','V616'),
('2026','T.R.A.','','L_wik','t.lowik@hetanker.nl','V338'),
('2596','M.A.M.','','L_wik','m.lowik@hetanker.nl','V692'),
('2592','J.','','Lambers','ja.lambers@hetanker.nl','V556'),
('2830','A.','','Lamberts','a.lamberts@hetanker.nl','V895'),
('2395','H.','','Lamers','h.lamers@hetanker.nl','V908'),
('2217','H.','','Lammers','h.lammers@hetanker.nl','V562'),
('2990','A.','','Lammers','a.lammers@hetanker.nl','V517'),
('2329','J.','','Langbroek','j.langbroek@hetanker.nl','V429'),
('1633','H.','','Langkamp','h.langkamp@hetanker.nl','V737'),
('2364','J.M.M.','','Lansink','j.lansink@hetanker.nl','V881'),
('2273','R.','','Lantink','r.lantink@hetanker.nl','V688'),
('2295','S.','','Leemhuis','s.leemhuis@hetanker.nl','V310'),
('1004','J.A.L.','van der','Leest','s.vanderleest@hetanker.nl','V306'),
('1948','B.','','Leferink','b.leferink@hetanker.nl','V771'),
('1636','M.','','Leijten','m.leijten@hetanker.nl','V577'),
('2708','G.','','Lemans','g.lemans@hetanker.nl','V548'),
('2860','C.','','Lennips','c.lennips@hetanker.nl','V664'),
('1134','R.','','Leppink','r.leppink@hetanker.nl','V324'),
('2377','S.','','Lesterhuis','s.lesterhuis@hetanker.nl','V556'),
('1981','W.','','Letteboer','w.letteboer@hetanker.nl','V199'),
('1870','H.','van der','Liet','h.vanderliet@hetanker.nl','V970'),
('1193','J.','','Ligtenberg','j.ligtenberg@hetanker.nl','V677'),
('2797','J.','','Ligteringen','j.ligteringen@hetanker.nl','V519'),
('1035','M.','','Loeve','m.loeve@hetanker.nl','V146'),
('2333','S.D.G.','','Lohuis','s.lohuis@hetanker.nl','V906'),
('2528','C.','','Lohuis-Mos','c.lohuis@hetanker.nl','V522'),
('2621','A.','','Lok','an.lok@hetanker.nl','V285'),
('1475','A.','','Lok-Bruins','a.lok@hetanker.nl','V350'),
('2669','H.J.H.','','Lubbers','h.lubbers@hetanker.nl','V177'),
('1582','R.','','Lucassen','r.lucassen@hetanker.nl','V975'),
('1992','N.','van der','Luijt','n.vanderluijt@hetanker.nl','V425'),
('2090','J.H.B.','','Luttenberg','r.luttenberg@hetanker.nl','V703'),
('1711','M.','','Maaswinkel','m.maaswinkel@hetanker.nl','V222'),
('2875','T.','','Maaswinkel','t.maaswinkel@hetanker.nl','V295'),
('2821','M.','van de','Maat','m.vandemaat@hetanker.nl','V687'),
('1554','R.','','Mak','r.mak@hetanker.nl','V658'),
('1587','M.','','Maris','m.maris@hetanker.nl','V946'),
('2683','A.','','Maris','a.maris@hetanker.nl','V303'),
('2520','D.','','Markvoort','d.markvoort@hetanker.nl','V851'),
('2330','J.H.','','Marsman','m.marsman@hetanker.nl','V625'),
('2358','M.J.','','Marsman','ma.marsman@hetanker.nl','V631'),
('2500','L.','','Marsman','l.marsman@hetanker.nl','V293'),
('1555','M.W.','','Masselink','m.masselink@hetanker.nl','V439'),
('2298','P.','','Matel','p.matel@hetanker.nl','V634'),
('1530','M.P.M.','van der','Meer','m.vandermeer@hetanker.nl','V246'),
('1648','B.','van der','Meer','b.vandermeer@hetanker.nl','V221'),
('1461','K.J.','','Meijer','k.meijer@hetanker.nl','V331'),
('2374','H.','','Meijer','h.meijer@hetanker.nl','V806'),
('2428','A.','','Meijer','a.meijer@hetanker.nl','V986'),
('2242','M.','','Meijerink','m.meijerink@hetanker.nl','V890'),
('2438','G.J.','','Meijerink','g.meyerink@hetanker.nl','V738'),
('2858','F.','','Mennega','f.mennega@hetanker.nl','V107'),
('1999','F.','','Mensink','f.mensink@hetanker.nl','V547'),
('2800','D.','','Mensink','d.mensink@hetanker.nl','V623'),
('2099','H.J.','','Meppelink','h.meppelink@hetanker.nl','V874'),
('1330','J.T.','','Mulder','j.mulder@hetanker.nl','V153'),
('2098','M.P.','','Mulder','m.mulder@hetanker.nl','V933'),
('1574','K.','','Muller','k.muller@hetanker.nl','V586'),
('2272','K.G.H.','','Muller','ka.muller@hetanker.nl','V959'),
('2123','L.','','Nawijn','l.nawijn@hetanker.nl','V465'),
('2606','A.','','Nazarian','a.nazarian@hetanker.nl','V657'),
('1020','T.','van','Nederpelt','t.vannederpelt@hetanker.nl','V568'),
('2727','M.M.E.','','Nicolet','m.nicolet@hetanker.nl','V403'),
('1881','H.W.','','Nieboer','h.nieboer@hetanker.nl','V388'),
('1695','R.','','Nieuhoff','r.nieuhoff@hetanker.nl','V118'),
('2345','J.','','Nieuwerth','j.nieuwerth@hetanker.nl','V641'),
('1165','J.','','Nieuwhof','j.nieuwhof@hetanker.nl','V757'),
('2328','L.M.','','Nijenhuis','l.nijenhuis@hetanker.nl','V703'),
('2418','G.J.S.','','Nijhof','s.nijhof@hetanker.nl','V968'),
('2668','M.J.','','Nijhoff','m.nijhoff@hetanker.nl','V934'),
('1347','T.','','Nijkamp','t.nijkamp@hetanker.nl','V697'),
('2197','J.B.L.','','Nijzink','t.nijzink@hetanker.nl','V148'),
('2474','I.','','Nutzel','i.nutzel@hetanker.nl','V578'),
('1042','D.','','Ocent','d.ocent@hetanker.nl','V187'),
('2566','J.G.','van','Oers','j.vanoers@hetanker.nl','V945'),
('2176','P.','de','Olde','p.deolde@hetanker.nl','V995'),
('2603','M.','','Olthof','m.olthof@hetanker.nl','V278'),
('2954','E.H.','van','Oosten','e.vanoosten@hetanker.nl','V796'),
('1930','L.G.','','Oosterom','l.oosterom@hetanker.nl','V167'),
('2131','G.','','Ornee','g.ornee@hetanker.nl','V218'),
('1847','G.','','Otten','w.otten@hetanker.nl','V945'),
('1896','B.','','Pluimers','b.pluimers@hetanker.nl','V588'),
('2666','H.','','Pluimers','h.pluimers@hetanker.nl','V506'),
('1187','J.','','Podt','h.podt@hetanker.nl','V691'),
('1469','S.','','Pol','s.pol@hetanker.nl','V524'),
('2136','H.J.','','Polman','h.polman@hetanker.nl','V637'),
('2353','N.','','Poort','n.poort@hetanker.nl','V678'),
('1815','H.H.M.','','Post','ma.post@hetanker.nl','V245'),
('2463','M.','','Post','m.post@hetanker.nl','V285'),
('2794','O.H.P.','','Postmus','o.postmus@hetanker.nl','V523'),
('2297','A.','','Prins','a.prins@hetanker.nl','V433'),
('1868','S.A.','','Prinsen','s.prinsen@hetanker.nl','V683'),
('2977','S.','','R_del','s.rodel@hetanker.nl','V459'),
('2939','P.','','Rikhof','p.rikhof@hetanker.nl','V431'),
('2856','B.','','Rikkerink','b.rikkerink@hetanker.nl','V152'),
('1946','L.J.H.G.','','Rodenstein','l.rodenstein@hetanker.nl','V907'),
('2647','H.','','Rodijk','h.rodijk@hetanker.nl','V654'),
('2519','M.J.','','Rodrigues','m.rodrigues@hetanker.nl','V341'),
('1681','D.','','Roelofs','d.roelofs@hetanker.nl','V529'),
('1720','Y.','','Roelofs','y.roelofs@hetanker.nl','V722'),
('1929','M.','','Rotteveel','m.rotteveel@hetanker.nl','V896'),
('1728','A.','van','Rozen','a.vanrozen@hetanker.nl','V790'),
('1995','S.','','Ruinemans','s.ruinemans@hetanker.nl','V777'),
('1814','P.','de','Ruiter','p.deruiter@hetanker.nl','V396'),
('1756','J.','','Runhaar','j.runhaar@hetanker.nl','V707'),
('1483','J.D.','','Salakory','j.salakory@hetanker.nl','V903'),
('2235','H.','','Schonewille','h.schonewille@hetanker.nl','V612'),
('1767','O.','','Sick','o.sick@hetanker.nl','V771'),
('2541','L.','','Sierink','b.sierink@hetanker.nl','V542'),
('1989','G.','van der','Sleen','g.vandersleen@hetanker.nl','V989'),
('2680','G.','','Snaak','g.snaak@hetanker.nl','V704'),
('1281','A.','','Snellink','a.snellink@hetanker.nl','V286'),
('1547','M.','','Snijders','pluspunt2@hetanker.nl','V311'),
('2413','S.','','Snijders','s.snijders@hetanker.nl','V981'),
('2129','A.','','Snippe','a.snippe@hetanker.nl','V342'),
('2742','G.H.J.','','Snippe','i.snippe@hetanker.nl','V535'),
('2011','M.','van t','Spijker','m.vantspijker@hetanker.nl','V112'),
('1612','R.','','Spin','r.spin@hetanker.nl','V378'),
('1075','H.','','Sportel','h.sportel@hetanker.nl','V899'),
('1650','G.K.','','Staarman','n.staarman@hetanker.nl','V532'),
('1403','R.G.W.','','Steenwelle','r.steenwelle@hetanker.nl','V674'),
('1264','M.J.M.A.','','Steffens','m.steffens@hetanker.nl','V993'),
('1964','B.','','Sterk','foto@hetanker.nl','V154'),
('2092','M.','','Stijntjes','m.stijntjes@hetanker.nl','V572'),
('2443','M.','','Swart','m.swart@hetanker.nl','V671'),
('2261','H.M.','','Tage','m.tage@hetanker.nl','V704'),
('2196','P.','','Talen','p.talen@hetanker.nl','V622'),
('2772','M.','','Tanate','m.tanate@hetanker.nl','V482'),
('1197','L.T.M.','','Telman','l.telman@hetanker.nl','V225'),
('2466','A.','','Telman','a.telman@hetanker.nl','V276'),
('1171','M.J.','','Ter Meer','j.termeer@hetanker.nl','V393'),
('1752','E.','','Vaartjes','e.vaartjes@hetanker.nl','V226'),
('2292','N.J.I.','van der','Valk','n.vandervalk@hetanker.nl','V605'),
('1066','R.','van der','Veen-Brons','r.vanderveen@hetanker.nl','V157'),
('1850','N.','','Velthuis','n.velthuis@hetanker.nl','V259'),
('2782','E.','','Veltman','e.veltman@hetanker.nl','V389'),
('1583','E.H.','','Verhagen','e.verhagen@hetanker.nl','V660'),
('1137','E.','','Vink','e.vink@hetanker.nl','V188'),
('2412','R.','','Vinke','r.vinke@hetanker.nl','V173'),
('2752','T.C.','','Visser','ta.visser@hetanker.nl','V631'),
('2306','B.','','Vonkeman','b.vonkeman@hetanker.nl','V266'),
('2833','C.','','Voort','c.voort@hetanker.nl','V998'),
('1484','J.D.','','Voortman','j.voortman@hetanker.nl','V915'),
('2602','W.','','Voortman','a.voortman@hetanker.nl','V869'),
('1829','J.','','Voorveld','j.voorveld@hetanker.nl','V514'),
('1278','M.','','Vos','m.vos@hetanker.nl','V170'),
('2695','W.','','Vos','w.vos@hetanker.nl','V800'),
('2736','M.A.','','Vos','ma.vos@hetanker.nl','V407'),
('1785','E.','de','Vries','e.devries@hetanker.nl','V253');

COMMIT;

-- -----------------------------------------------------
-- Data for table `bedrijfsuitje`.`inschrijving`
-- -----------------------------------------------------
START TRANSACTION;
USE `bedrijfsuitje`;
INSERT INTO `bedrijfsuitje`.`inschrijving` (`activiteitid`, `personeelid`)
VALUES 
(1, 1164),
(1,1004),
(1,1756),
(2,1020),
(2,1035),
(2,1042),
(2,1066),
(2,1075),
(2,1281),
(2,1134),
(2,1137),
(2,1165),
(2,1171),
(2,1187),
(2,1193),
(2,1197),
(2,1264),
(2,1278),
(3,1330),
(3,1347),
(4,1403),
(5,1461),
(5,1469),
(5,1475),
(5,1483),
(5,1484),
(5,1530),
(5,1547),
(5,1554),
(5,1555),
(5,1574),
(5,1582),
(5,1583),
(6,1587),
(6,1612),
(6,1633),
(6,1636),
(6,1648),
(6,1650),
(6,1681),
(6,1695),
(6,1711),
(6,1720),
(6,1728),
(6,1752);

COMMIT;

START TRANSACTION;
USE `bedrijfsuitje`;
INSERT INTO `bedrijfsuitje`.`users` (`username`, `password`)
VALUES ('Marcy', '$2y$10$YO4ZXBZxEXeWrdsKy7HDB./NGYwNJZnXHxF5BumMFm6NQ7ei6koOu');


