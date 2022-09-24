-- --------------------------------------------------------

--
-- Content of table `categories`
--

 INSERT INTO categories (`id`, `code`, `description`, `actif`) SELECT ID_CAT, CODE_CAT, LIB_CAT, ACTIF_OUI_NON FROM c1_prestations_DB_older.categories;

-- --------------------------------------------------------

--
-- Content of table `thematics`
--

INSERT INTO thematics (`id`, `description`, `actif`, `icon`) SELECT ID_THE, LIB_THE, ACTIF_OUI_NON, ICON  FROM c1_prestations_DB_older.thematiques;

-- --------------------------------------------------------

--
-- Content of table `structures`
--

INSERT INTO structures (`id`, `code`, `description`, `actif`, `category_id`) SELECT ID_STRUC, CODE_STRUC, LIB_STRUC, ACTIF_OUI_NON, ID_CAT FROM c1_prestations_DB_older.structures ORDER BY ID_STRUC;

-- --------------------------------------------------------

--
-- Content of table `users`
--

INSERT INTO users (`id`, `name`,`firstname`, `phone`, `email`, `password`,  `actif`, `role`, `structure_id`) SELECT `COMPTE_ID`, `COMPTE_NOM`, `COMPTE_PRENOM`, `COMPTE_TELEPHONE`, `COMPTE_MAIL`, `COMPTE_MDP`, `COMPTE_ACTIF`, COMPTE_TYPE, ID_STRUC FROM c1_prestations_DB_older.utilisateurs;

-- --------------------------------------------------------

--
-- Content of table `services`
--


create table structures_copy  (`id` int(11) NOT NULL);

INSERT INTO structures_copy (`id`) SELECT `ID_STRUC` from c1_prestations_DB_older.structures;

INSERT INTO services (`id`, `description`, `structure_id`, `thematic_id`, `fileToProvide`, `cost`, `timeLimit`, `text`, `observation`, `actif`, user_id) SELECT ID_PRES, `LIB_PRES`, `ID_STRUC`, `ID_THE`, `PIECEAFOURNI`, `COUT`, `DELAI`, `TEXTE`, `OBSERVATION`, ACTIF_OUI_NON, 1 FROM c1_prestations_DB_older.prestations INNER JOIN structures_copy ON structures_copy.id=ID_STRUC;



-- --------------------------------------------------------

--
-- Update of column `actif`
--

update categories set actif=true;
update structures set actif=true;
update users set actif=true;
update thematics set actif=true;
update services set actif=true;

-- --------------------------------------------------------

--
-- Update of column user_id of table service
--



update thematics set icon="fa fa-book" where id=1;

update thematics set icon="fa fa-suitcase" where id=2;

update thematics set icon="fa fa-university" where id=3;

update thematics set icon="fa fa-plus" where id=4;

update thematics set icon="fa fa-gift" where id=5;

update thematics set icon="fa fa-child" where id=6;

update thematics set icon="fa fa-flask" where id=7;







