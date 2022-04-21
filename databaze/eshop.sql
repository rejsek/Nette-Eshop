-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 21. dub 2022, 17:12
-- Verze serveru: 10.4.24-MariaDB
-- Verze PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `netteeshop`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `objednavka`
--

CREATE TABLE `objednavka` (
  `id_objednavka` int(11) NOT NULL,
  `pocet_ks` int(11) NOT NULL,
  `datum` date NOT NULL,
  `adresa` varchar(60) NOT NULL,
  `id_uz` int(11) NOT NULL,
  `id_stav` int(11) NOT NULL,
  `id_pr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabulky `produkt`
--

CREATE TABLE `produkt` (
  `id_pr` int(11) NOT NULL,
  `nazev_pr` varchar(45) NOT NULL,
  `obrazek` varchar(255) NOT NULL,
  `popis` varchar(255) NOT NULL,
  `cena` int(11) NOT NULL,
  `pocet_ks` int(11) NOT NULL,
  `id_kat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `produkt`
--

INSERT INTO `produkt` (`id_pr`, `nazev_pr`, `obrazek`, `popis`, `cena`, `pocet_ks`, `id_kat`) VALUES
(1, 'Skate TOOL', 'https://www.skateshop.gr/image/cache/catalog/demo/product/SS21/IND-TLS-0008_1-1000x1000.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Integer lacinia. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi scelerisque luctus velit. Aliquam ornare wisi eu metus. Morbi imperdiet, mauris ac aucto', 200, 10, 1),
(2, 'Ložiska', 'https://www.snowpanic.cz/data/tmp/0/8/7278_0.jpg?1636718760_1\r\n', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Pellentesque sapien. Aliquam erat volutpat. Nullam sit amet magna in magna gravida vehicula. Aliquam id dolor. Mauris metus. Vestibulum fermentum tortor id mi. Nulla non lectus sed nisl molestie ma', 250, 10, 2),
(3, 'Kolečka BONES', 'https://www.ambassadors.eu/image/cache/catalog/S1%20kola%202020/WSCABS0055403W4-1200x1200.dd95c7d883d32f109cf43dda3e81b28a.jpg', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Vestibulum fermentum tortor id mi. Pellentesque sapien. Pellentesque pretium lectus id turpis. Nunc dapibus tortor vel mi dapibus sollicitudin. ', 700, 9, 3),
(4, 'Trucky INDEPENDENT', 'https://www.longboardshop.cz/wp-content/uploads/2015/07/in1592.jpg', 'Fusce tellus. Nulla pulvinar eleifend sem. Integer vulputate sem a nibh rutrum consequat. Curabitur vitae diam non enim vestibulum interdum. Nullam feugiat, turpis at pulvinar vulputate, erat libero tristique tellus, nec bibendum odio risus sit amet ante.', 1200, 2, 6),
(5, 'Deska JART Renaissance', 'https://www.snowpanic.cz/data/tmp/0/9/6709_0.jpg?1607781965_1', 'Integer pellentesque quam vel velit. Etiam dui sem, fermentum vitae, sagittis id, malesuada in, quam. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Duis viverra diam non justo. Nulla accumsa', 1500, 3, 5),
(6, 'Deska IRON MAIDEN', 'https://images.blue-tomato.com/is/image/bluetomato/304598787_front.jpg-64IlrvISaTDT73dcuPqeAmPnTTo/Zero+X+Iron+Maiden+The+Number+of+the+Beast+8+Skateboardova+deska.jpg?$m2$', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Aliquam erat volutpat. Sed ac dolor sit amet purus malesuada congue. Fusce tellus odio, dapibus id fermentum quis, suscipit id erat. Integer pel', 1600, 7, 5),
(7, 'Deska SK8MAFIA', 'https://www.totalboardshop.cz/images/products/52569.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Maecenas libero. Donec quis nibh at felis congue commodo. Duis pulvinar. Maecenas libe', 1100, 7, 5),
(8, 'Griptape ELEMENT', 'https://cdn3.volusion.com/pgnrb.yxsdo/v/vspfiles/photos/655-004-0242-2.jpg', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Aliquam erat volutpat. Sed ac dolor sit amet purus malesuada congue. Fusce tellus odio, dapibus id fermentum quis, suscipit id erat. Integer pel', 300, 10, 4),
(9, 'Griptape JESSUP', 'https://litgrip.com/wp-content/uploads/2017/07/grip-tape-sheet.jpg', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Nulla est. Praesent in mauris eu tortor porttitor accumsan. Integer vulputate sem a nibh rutrum consequat. Fusce nibh. Nunc dapibus tortor vel mi dapibu', 150, 10, 4),
(10, 'Trucky INDEPENDENT STAGE 11 FORGED HOLLOW', 'https://im9.cz/iR/importprodukt-orig/708/708b2daa1621fe206ea4529a3c05ed53--mmf400x400.jpg', 'Integer in sapien. Etiam commodo dui eget wisi. Praesent dapibus. Duis condimentum augue id magna semper rutrum. Aliquam erat volutpat. Integer imperdiet lectus quis justo. Aliquam erat volutpat. Vestibulum fermentum tortor id mi. Nullam lectus justo, vul', 1500, 2, 6),
(11, 'Enjoi Whitey Panda Complete', 'https://img.skatewarehouse.com/watermark/rs.php?path=EIWP7CMP-1.jpg&nw=500', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam erat volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer imperdiet lectus quis justo. In enim a arcu imperdiet malesuada. Sed convallis m', 2000, 5, 8),
(12, 'Cliché Banco FP Complete red', 'https://eshop.shotboardshop.com/showjpg.php?id=96875&type=PREVIEW&tbl=products', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam erat volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer imperdiet lectus quis justo. In enim a arcu imperdiet malesuada. Sed convallis m', 1500, 8, 8),
(13, 'Cliché Banco FP Complete black/yellow', 'https://eshop.shotboardshop.com/showjpg.php?id=96874&type=PREVIEW&tbl=products', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam erat volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer imperdiet lectus quis justo. In enim a arcu imperdiet malesuada. Sed convallis m', 1600, 2, 8),
(14, 'Almost Ivy League Fp Complete multi 2021', 'https://eshop.shotboardshop.com/showjpg.php?id=93099&type=PREVIEW&tbl=products', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam erat volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer imperdiet lectus quis justo. In enim a arcu imperdiet malesuada. Sed convallis m', 1800, 2, 8),
(15, 'Cliché Block FP Complete rasta 2022', 'https://eshop.shotboardshop.com/showjpg.php?id=96876&type=PREVIEW&tbl=products', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam erat volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer imperdiet lectus quis justo. In enim a arcu imperdiet malesuada. Sed convallis m', 2100, 8, 8),
(16, 'Element complete', 'https://images.boardriders.com/global/element-products/all/default/hi-res/colgmsec_element,p_ast_frt1.jpg', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam erat volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer imperdiet lectus quis justo. In enim a arcu imperdiet malesuada. Sed convallis m', 1600, 2, 8),
(17, 'DC Shoes NET M SHOE', 'https://www.meatfly.cz/data/tmp/0/2/73322_0.jpg?1622962001_1', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam erat volutpat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer imperdiet lectus quis justo. In enim a arcu imperdiet malesuada. Sed convallis m', 1700, 5, 7),
(18, ' ETNIES Marana 20/21 - Black grey blue', 'https://www.real-deal.cz/images/product/14844_panske-skate-boty-etnies-marana-20-21_40767.jpg', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Lorem ipsum dolor sit amet, consectetuer adipiscing ', 2000, 5, 7),
(19, 'Boty Vans SK8-Hi navy', 'https://www.eobuv.cz/media/catalog/product/cache/image/650x650/0/0/0000197850167_2__1.jpg', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Lorem ipsum dolor sit amet, consectetuer adipiscing ', 1800, 2, 7),
(20, 'DC Shoes CENTRAL', 'https://www.boardmania.cz/imgs/products/DC_Shoes/1207261_Boty_DC_Central_grey_white_main.jpg', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Lorem ipsum dolor sit amet, consectetuer adipiscing ', 1900, 2, 7),
(21, 'JART Renaissance III', 'https://jartskateboards.com/wp-content/uploads/2021/03/jart-renaissance-iii-8-25-deck.jpg\r\n', 'Vivamus porttitor turpis ac leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab ', 2000, 8, 5);

-- --------------------------------------------------------

--
-- Struktura tabulky `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nazev_role` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabulky `uzivatel`
--

CREATE TABLE `uzivatel` (
  `id_uz` int(11) NOT NULL,
  `jmeno` varchar(45) NOT NULL,
  `prijmeni` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `heslo` varchar(90) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `uzivatel`
--

INSERT INTO `uzivatel` (`id_uz`, `jmeno`, `prijmeni`, `email`, `heslo`, `id_role`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '$2y$10$GVNlun9C1bP10dE7KCScSuiaaWjZaGOpTXerUCvS0gZ0SRdaPA68y', 0);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `objednavka`
--
ALTER TABLE `objednavka`
  ADD PRIMARY KEY (`id_objednavka`);

--
-- Indexy pro tabulku `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`id_pr`) USING BTREE;

--
-- Indexy pro tabulku `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexy pro tabulku `uzivatel`
--
ALTER TABLE `uzivatel`
  ADD PRIMARY KEY (`id_uz`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `objednavka`
--
ALTER TABLE `objednavka`
  MODIFY `id_objednavka` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `produkt`
--
ALTER TABLE `produkt`
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pro tabulku `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pro tabulku `uzivatel`
--
ALTER TABLE `uzivatel`
  MODIFY `id_uz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
