SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `admin` VALUES("1", "facundo@estudiorochayasoc.com.ar", "faAr2010"); 
INSERT INTO `admin` VALUES("2", "info@nococino.com.ar", "inNo2019"); 


DROP TABLE IF EXISTS ` banners`;
CREATE TABLE `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `vistas` int(11) NOT NULL DEFAULT '0',
  `link` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO ` banners` VALUES("1", "44d66fb5a7", "Banner Filtro", "606995508b", "0", ""); 
INSERT INTO ` banners` VALUES("2", "26fe719b6d", "Banner Filtro 2", "606995508b", "0", "https://www.facebook.com/Nococinoarg/?modal=admin_todo_tour"); 
INSERT INTO ` banners` VALUES("3", "18eccfcb52", "Banner Superior HOCICO", "20ad86b87d", "0", ""); 
INSERT INTO ` banners` VALUES("4", "6553ee4ae3", "Banner Intercalado", "019524284f", "0", ""); 
INSERT INTO ` banners` VALUES("8", "e8086e1da1", "Rosa", "606995508b", "0", "https://www.facebook.com/Nococinoarg/?modal=admin_todo_tour"); 
INSERT INTO ` banners` VALUES("9", "baad73a64f", "Mobile Superior", "95748567c8", "0", "https://www.instagram.com/fede_vega_dj/?hl=es-la"); 
INSERT INTO ` banners` VALUES("10", "070cc6bd14", "Mobile Inferior", "8bee3770f7", "0", ""); 
INSERT INTO ` banners` VALUES("12", "300aec4f17", "Banner Superior Rocha", "20ad86b87d", "0", "https://www.estudiorochayasoc.com"); 
INSERT INTO ` banners` VALUES("13", "df719c6d92", "Banner Mobile Superior Rocha", "95748567c8", "0", "https://www.estudiorochayasoc.com"); 
INSERT INTO ` banners` VALUES("14", "27aaa9bbce", "DJ VEGA", "20ad86b87d", "0", "https://www.instagram.com/fede_vega_dj/?hl=es-la"); 
INSERT INTO ` banners` VALUES("15", "5295cd9d1c", "HOCICO", "95748567c8", "0", ""); 


DROP TABLE IF EXISTS ` categorias`;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

INSERT INTO ` categorias` VALUES("1", "16f083f315", "Arepas", "productos"); 
INSERT INTO ` categorias` VALUES("2", "0b9f70b702", "Bebidas", "productos"); 
INSERT INTO ` categorias` VALUES("3", "051c1c00bb", "Cafetería", "productos"); 
INSERT INTO ` categorias` VALUES("4", "0030f7df9e", "Calzones", "productos"); 
INSERT INTO ` categorias` VALUES("5", "fa9cbee313", "Carnes", "productos"); 
INSERT INTO ` categorias` VALUES("6", "4db5f67084", "Celíacos", "productos"); 
INSERT INTO ` categorias` VALUES("7", "d490e47c0a", "Comida Árabe", "productos"); 
INSERT INTO ` categorias` VALUES("8", "b3703a1530", "Comida Armenia", "productos"); 
INSERT INTO ` categorias` VALUES("9", "290cc04efe", "Comida China", "productos"); 
INSERT INTO ` categorias` VALUES("10", "d1d04ac1c1", "Comida Hindú", "productos"); 
INSERT INTO ` categorias` VALUES("11", "927ad2bb29", "Comida Internacional", "productos"); 
INSERT INTO ` categorias` VALUES("12", "518825e139", "Comida Japonesa", "productos"); 
INSERT INTO ` categorias` VALUES("13", "e62b920438", "Comida Mexicana", "productos"); 
INSERT INTO ` categorias` VALUES("14", "71010271b7", "Comida Peruana", "productos"); 
INSERT INTO ` categorias` VALUES("15", "d38e6348de", "Comida Vegana", "productos"); 
INSERT INTO ` categorias` VALUES("16", "2dbc9f9ab8", "Comida Vegetariana", "productos"); 
INSERT INTO ` categorias` VALUES("17", "a98424e666", "Crepes", "productos"); 
INSERT INTO ` categorias` VALUES("18", "bda3198f50", "Cupcakes", "productos"); 
INSERT INTO ` categorias` VALUES("19", "bb6640eb5e", "Desayunos", "productos"); 
INSERT INTO ` categorias` VALUES("20", "3c91e7e0de", "Empanadas", "productos"); 
INSERT INTO ` categorias` VALUES("21", "68bc122cdf", "Ensaladas", "productos"); 
INSERT INTO ` categorias` VALUES("22", "675b367186", "Hamburguesas", "productos"); 
INSERT INTO ` categorias` VALUES("23", "c1fa96ca22", "Helados", "productos"); 
INSERT INTO ` categorias` VALUES("24", "2873324b9f", "Licuados y Jugos", "productos"); 
INSERT INTO ` categorias` VALUES("25", "a2f7798de9", "Lomitos", "productos"); 
INSERT INTO ` categorias` VALUES("26", "a01bac5791", "Menú del día", "productos"); 
INSERT INTO ` categorias` VALUES("27", "3236e2110a", "Milanesas", "productos"); 
INSERT INTO ` categorias` VALUES("28", "0d1403a634", "Minimercado", "productos"); 
INSERT INTO ` categorias` VALUES("29", "c6adcf545d", "Papas fritas", "productos"); 
INSERT INTO ` categorias` VALUES("30", "92317cca6c", "Parrilla", "productos"); 
INSERT INTO ` categorias` VALUES("31", "f128632467", "Pastas", "productos"); 
INSERT INTO ` categorias` VALUES("32", "03cbf8fdf1", "Pescados y Mariscos", "productos"); 
INSERT INTO ` categorias` VALUES("33", "d024d2d198", "Picadas", "productos"); 
INSERT INTO ` categorias` VALUES("34", "0ad44118cc", "Pizzas", "productos"); 
INSERT INTO ` categorias` VALUES("36", "72ad996977", "Pollo", "productos"); 
INSERT INTO ` categorias` VALUES("37", "86e0b9ead1", "Postres", "productos"); 
INSERT INTO ` categorias` VALUES("38", "975e74e3a2", "Sándwiches", "productos"); 
INSERT INTO ` categorias` VALUES("39", "d28b6a0f1c", "Sopas", "productos"); 
INSERT INTO ` categorias` VALUES("40", "1c3cb78ffb", "Sushi", "productos"); 
INSERT INTO ` categorias` VALUES("41", "f641171ec2", "Tartas", "productos"); 
INSERT INTO ` categorias` VALUES("42", "919315cf41", "Tortillas", "productos"); 
INSERT INTO ` categorias` VALUES("43", "990fc235f0", "Viandas y Congelados", "productos"); 
INSERT INTO ` categorias` VALUES("44", "c49451c3d9", "Wafles", "productos"); 
INSERT INTO ` categorias` VALUES("45", "d302f74639", "Woks", "productos"); 
INSERT INTO ` categorias` VALUES("46", "5776611516", "Tacos", "productos"); 
INSERT INTO ` categorias` VALUES("48", "8906cc8caa", "Asado", "productos"); 
INSERT INTO ` categorias` VALUES("49", "09b6ff1844", "Tortas", "productos"); 
INSERT INTO ` categorias` VALUES("50", "b01c9f1004", "Cerveza Artesanal ", "productos"); 
INSERT INTO ` categorias` VALUES("51", "def22f99ef", "Vinoteca", "productos"); 
INSERT INTO ` categorias` VALUES("52", "0398899c25", "Tragos", "productos"); 
INSERT INTO ` categorias` VALUES("53", "80374445a6", "Fiambres", "productos"); 
INSERT INTO ` categorias` VALUES("54", "606995508b", "Filtro", "banners"); 
INSERT INTO ` categorias` VALUES("55", "20ad86b87d", "Superior", "banners"); 
INSERT INTO ` categorias` VALUES("56", "019524284f", "Intercalado", "banners"); 
INSERT INTO ` categorias` VALUES("57", "95748567c8", "Mobile Superior", "banners"); 
INSERT INTO ` categorias` VALUES("58", "8bee3770f7", "Mobile Inferior", "banners"); 
INSERT INTO ` categorias` VALUES("59", "1745d655f3", "PIADINAS", "productos"); 
INSERT INTO ` categorias` VALUES("60", "e8beaa6c29", "CockTails & Drinks", "productos"); 
INSERT INTO ` categorias` VALUES("61", "2d2520b8c8", "Aperitivos", "productos"); 


DROP TABLE IF EXISTS ` contenidos`;
CREATE TABLE `contenidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` longtext,
  `cod` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO ` contenidos` VALUES("6", "<p>&iexcl;Muchas gracias!<br />
\n<strong>NO COCINO</strong>&nbsp;</p>
\n
\n<p>info@nococino.com.ar</p>
\n", "PIE CORREOS"); 
INSERT INTO ` contenidos` VALUES("7", "", "alerta sesion"); 
INSERT INTO ` contenidos` VALUES("9", "<p>&iquest;Viste que hay veces que no tenemos ganas de cocinar? Que nos antojamos de un plato rico, m&aacute;s elaborado? Otras veces nos antojamos de estar tirados en el sill&oacute;n de casa, de nuestro departamento esperando que eso que queremos comer aparezca como por arte de magia en nuestra mesa.</p>
\n
\n<p><br />
\n&iexcl;<strong>NO COCINO</strong> hace esa magia! Queremos que tengas al instante toda la gu&iacute;a gastron&oacute;mica de tu ciudad, con sus platos, variedades y men&uacute;es para que en desde tu celu elijas qu&eacute; comer, hagas el pedido y solo te quedes esper&aacute;ndolo sin moverte de casa.</p>
\n
\n<p><br />
\n&iquest;Cre&iacute;as que en tu ciudad eso no pasaba? AHORA S&Iacute;.&nbsp;<br />
\n<strong>NO COCINO</strong>, de tu celu a la mesa.</p>
\n", "NOSOTROS"); 


DROP TABLE IF EXISTS ` envios`;
CREATE TABLE `envios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` text CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci,
  `titulo` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` float DEFAULT '0',
  `cod_empresa` text COLLATE utf8mb4_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

INSERT INTO ` envios` VALUES("5", "db4946a0dc", "Retiro en sucursal", "0", "b06f4d0577"); 
INSERT INTO ` envios` VALUES("6", "9f5eb2c464", "Envio Zona Centro", "45", "b06f4d0577"); 
INSERT INTO ` envios` VALUES("9", "f6a2a687c8", "Retiro en sucursal", "0", "58c96c6473"); 
INSERT INTO ` envios` VALUES("10", "c31e834455", "Retiro en sucursal", "0", "b3ea24f640"); 
INSERT INTO ` envios` VALUES("11", "b9e28b2781", "Retiro en sucursal", "0", "5f10e902c7"); 


DROP TABLE IF EXISTS ` galerias`;
CREATE TABLE `galerias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(255) DEFAULT NULL,
  `titulo` text,
  `desarrollo` text,
  `categoria` text,
  `keywords` text,
  `description` text,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS `imagenes`;
CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruta` varchar(255) NOT NULL,
  `cod` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=latin1;

INSERT INTO `imagenes` VALUES("1", "assets/archivos/recortadas/a_fc63ab358c.jpeg", "8a8dba7a25"); 
INSERT INTO `imagenes` VALUES("2", "assets/archivos/recortadas/a_e9896a1921.jpg", "8a8dba7a25"); 
INSERT INTO `imagenes` VALUES("3", "assets/archivos/recortadas/a_beb1d8f2a7.jpg", "8a8dba7a25"); 
INSERT INTO `imagenes` VALUES("4", "assets/archivos/recortadas/a_b8a7dabd13.jpg", "8a8dba7a25"); 
INSERT INTO `imagenes` VALUES("5", "assets/archivos/recortadas/a_e8f1204048.jpeg", "8a8dba7a25"); 
INSERT INTO `imagenes` VALUES("6", "assets/archivos/recortadas/a_40fcb51835.JPG", "8a8dba7a25"); 
INSERT INTO `imagenes` VALUES("7", "assets/archivos/recortadas/a_a0fe960cbc.JPG", "8a8dba7a25"); 
INSERT INTO `imagenes` VALUES("8", "assets/archivos/recortadas/a_b1271c9d5a.jpg", "c3cf723418"); 
INSERT INTO `imagenes` VALUES("9", "assets/archivos/recortadas/a_2d185e28a1.png", "c3cf723418"); 
INSERT INTO `imagenes` VALUES("10", "assets/archivos/recortadas/a_256cc077a0.jpg", "adf3f6db2c"); 
INSERT INTO `imagenes` VALUES("11", "assets/archivos/recortadas/a_67aa825f7d.jpg", "d50967c9d5"); 
INSERT INTO `imagenes` VALUES("12", "assets/archivos/recortadas/a_2fe274c390.jpg", "fea133c710"); 
INSERT INTO `imagenes` VALUES("13", "assets/archivos/recortadas/a_ed4cdd839b.jpg", "eb4c03854b"); 
INSERT INTO `imagenes` VALUES("14", "assets/archivos/recortadas/a_993d1f02cb.jpeg", "ce056e642c"); 
INSERT INTO `imagenes` VALUES("28", "assets/archivos/banner/a64de61711.jpg", "44d66fb5a7"); 
INSERT INTO `imagenes` VALUES("33", "assets/archivos/banner/e20f559a2f.jpg", "6553ee4ae3"); 
INSERT INTO `imagenes` VALUES("43", "assets/archivos/recortadas/a_f6ca327a84.jpg", "a58d056a9e"); 
INSERT INTO `imagenes` VALUES("44", "assets/archivos/recortadas/a_86e538f73f.jpg", "a58d056a9e"); 
INSERT INTO `imagenes` VALUES("47", "assets/archivos/recortadas/a_9191824b52.jpg", "785864a89e"); 
INSERT INTO `imagenes` VALUES("48", "assets/archivos/recortadas/a_b2bff7c008.gif", "f9343942bd"); 
INSERT INTO `imagenes` VALUES("49", "assets/archivos/banner/77d06c3e66.jpg", "e8086e1da1"); 
INSERT INTO `imagenes` VALUES("50", "assets/archivos/recortadas/a_2dd5821401.jpg", "4fd6266ba8"); 
INSERT INTO `imagenes` VALUES("51", "assets/archivos/recortadas/a_eb21d781c6.jpg", "e8e01a8671"); 
INSERT INTO `imagenes` VALUES("59", "assets/archivos/4784f1b837.gif", "26fe719b6d"); 
INSERT INTO `imagenes` VALUES("61", "assets/archivos/fc0c47136f.jpg", "070cc6bd14"); 
INSERT INTO `imagenes` VALUES("75", "assets/archivos/recortadas/a_cc1cef08c2.jpg", "b41292e1ae"); 
INSERT INTO `imagenes` VALUES("77", "assets/archivos/recortadas/a_c9588e9bd7.jpg", "7c25f9336c"); 
INSERT INTO `imagenes` VALUES("78", "assets/archivos/recortadas/a_d806cb3713.jpg", "b06f4d0577"); 
INSERT INTO `imagenes` VALUES("80", "assets/archivos/recortadas/a_5986b04afa.jpg", "b06f4d0577"); 
INSERT INTO `imagenes` VALUES("81", "assets/archivos/recortadas/a_3c28e5a3d6.jpg", "04e12e74e0"); 
INSERT INTO `imagenes` VALUES("82", "assets/archivos/recortadas/a_98a80cb775.jpg", "b06f4d0577"); 
INSERT INTO `imagenes` VALUES("83", "assets/archivos/recortadas/a_43ef1363e2.jpg", "b06f4d0577"); 
INSERT INTO `imagenes` VALUES("84", "assets/archivos/recortadas/a_9d97a40adf.jpg", "b06f4d0577"); 
INSERT INTO `imagenes` VALUES("85", "assets/archivos/recortadas/a_b8af12164a.jpg", "b06f4d0577"); 
INSERT INTO `imagenes` VALUES("88", "assets/archivos/recortadas/a_40b0530dc3.JPG", "dd90c9215a"); 
INSERT INTO `imagenes` VALUES("89", "assets/archivos/recortadas/a_2f7e2a4047.JPG", "dd90c9215a"); 
INSERT INTO `imagenes` VALUES("90", "assets/archivos/recortadas/a_8be19d25c2.JPG", "dd90c9215a"); 
INSERT INTO `imagenes` VALUES("91", "assets/archivos/recortadas/a_1695001a85.JPG", "dd90c9215a"); 
INSERT INTO `imagenes` VALUES("92", "assets/archivos/recortadas/a_1cb53bd3eb.JPG", "dd90c9215a"); 
INSERT INTO `imagenes` VALUES("93", "assets/archivos/recortadas/a_0c3308dec9.JPG", "dd90c9215a"); 
INSERT INTO `imagenes` VALUES("94", "assets/archivos/recortadas/a_f2553a15f7.JPG", "dd90c9215a"); 
INSERT INTO `imagenes` VALUES("95", "assets/archivos/recortadas/a_a80c0543cc.JPG", "dd90c9215a"); 
INSERT INTO `imagenes` VALUES("96", "assets/archivos/recortadas/a_3d1003ace1.JPG", "dd90c9215a"); 
INSERT INTO `imagenes` VALUES("97", "assets/archivos/recortadas/a_4584dad608.JPG", "dd90c9215a"); 
INSERT INTO `imagenes` VALUES("98", "assets/archivos/recortadas/a_85c9179540.JPG", "dd90c9215a"); 
INSERT INTO `imagenes` VALUES("99", "assets/archivos/recortadas/a_a062b63635.png", "d50ad9acfb"); 
INSERT INTO `imagenes` VALUES("101", "assets/archivos/recortadas/a_b2da3cd484.png", "d50ad9acfb"); 
INSERT INTO `imagenes` VALUES("102", "assets/archivos/recortadas/a_51d7c96cf9.png", "d50ad9acfb"); 
INSERT INTO `imagenes` VALUES("104", "assets/archivos/recortadas/a_a94b45a0ba.png", "d50ad9acfb"); 
INSERT INTO `imagenes` VALUES("105", "assets/archivos/recortadas/a_67e9edc071.png", "d50ad9acfb"); 
INSERT INTO `imagenes` VALUES("106", "assets/archivos/recortadas/a_45f7758c98.png", "d50ad9acfb"); 
INSERT INTO `imagenes` VALUES("107", "assets/archivos/recortadas/a_6b1111390d.png", "d50ad9acfb"); 
INSERT INTO `imagenes` VALUES("108", "assets/archivos/recortadas/a_aaeb3462e0.png", "d50ad9acfb"); 
INSERT INTO `imagenes` VALUES("110", "assets/archivos/recortadas/a_f22296dcb8.png", "d50ad9acfb"); 
INSERT INTO `imagenes` VALUES("111", "assets/archivos/recortadas/a_80d704d21c.png", "d50ad9acfb"); 
INSERT INTO `imagenes` VALUES("112", "assets/archivos/recortadas/a_c688438a2a.png", "d50ad9acfb"); 
INSERT INTO `imagenes` VALUES("113", "assets/archivos/recortadas/a_05473aaaa0.png", "d50ad9acfb"); 
INSERT INTO `imagenes` VALUES("114", "assets/archivos/recortadas/a_38915bf8b9.jpg", "b06f4d0577"); 
INSERT INTO `imagenes` VALUES("115", "assets/archivos/recortadas/a_5998713a89.jpg", "b06f4d0577"); 
INSERT INTO `imagenes` VALUES("116", "assets/archivos/recortadas/a_773d75a8b8.jpg", "b06f4d0577"); 
INSERT INTO `imagenes` VALUES("117", "assets/archivos/9cfd99c67b.jpg", "300aec4f17"); 
INSERT INTO `imagenes` VALUES("118", "assets/archivos/recortadas/a_7d30acb6ff.jpg", "a58d056a9e"); 
INSERT INTO `imagenes` VALUES("119", "assets/archivos/recortadas/a_4ddeb31b7d.jpg", "a58d056a9e"); 
INSERT INTO `imagenes` VALUES("120", "assets/archivos/recortadas/a_40cf26d11e.jpg", "a58d056a9e"); 
INSERT INTO `imagenes` VALUES("121", "assets/archivos/recortadas/a_561db80676.jpg", "a58d056a9e"); 
INSERT INTO `imagenes` VALUES("122", "assets/archivos/9eedd4274d.jpg", "df719c6d92"); 
INSERT INTO `imagenes` VALUES("123", "assets/archivos/recortadas/a_ec4d6a7fe5.JPG", "c507f0c5fd"); 
INSERT INTO `imagenes` VALUES("124", "assets/archivos/recortadas/a_a3c03494d7.JPG", "dd8b43be43"); 
INSERT INTO `imagenes` VALUES("125", "assets/archivos/recortadas/a_1bd75fbd06.JPG", "4beb0c5ba6"); 
INSERT INTO `imagenes` VALUES("126", "assets/archivos/recortadas/a_62c467d2ec.JPG", "a3968b83ee"); 
INSERT INTO `imagenes` VALUES("128", "assets/archivos/recortadas/a_35117c551a.JPG", "c9bb14dbdd"); 
INSERT INTO `imagenes` VALUES("129", "assets/archivos/recortadas/a_6643bd5b42.JPG", "1e16ab401f"); 
INSERT INTO `imagenes` VALUES("133", "assets/archivos/7be57f484f.jpg", "27aaa9bbce"); 
INSERT INTO `imagenes` VALUES("135", "assets/archivos/recortadas/a_43bbc6ac31.JPG", "6ae37f1b35"); 
INSERT INTO `imagenes` VALUES("136", "assets/archivos/recortadas/a_b6b33cc320.JPG", "fa23b847d7"); 
INSERT INTO `imagenes` VALUES("137", "assets/archivos/recortadas/a_93ff62326e.JPG", "00d410604f"); 
INSERT INTO `imagenes` VALUES("138", "assets/archivos/recortadas/a_0996def9b1.JPG", "00d410604f"); 
INSERT INTO `imagenes` VALUES("139", "assets/archivos/recortadas/a_27378c4646.JPG", "00d410604f"); 
INSERT INTO `imagenes` VALUES("140", "assets/archivos/recortadas/a_e9d66efc76.JPG", "00d410604f"); 
INSERT INTO `imagenes` VALUES("141", "assets/archivos/recortadas/a_7dd79e2722.JPG", "00d410604f"); 
INSERT INTO `imagenes` VALUES("142", "assets/archivos/recortadas/a_c4b49ca05f.JPG", "00d410604f"); 
INSERT INTO `imagenes` VALUES("143", "assets/archivos/recortadas/a_45a5681b86.JPG", "00d410604f"); 
INSERT INTO `imagenes` VALUES("145", "assets/archivos/recortadas/a_08cb86590c.JPG", "00d410604f"); 
INSERT INTO `imagenes` VALUES("146", "assets/archivos/recortadas/a_e808d940bd.JPG", "00d410604f"); 
INSERT INTO `imagenes` VALUES("147", "assets/archivos/recortadas/a_6cef874cac.JPG", "00d410604f"); 
INSERT INTO `imagenes` VALUES("148", "assets/archivos/recortadas/a_28ef7741bf.JPG", "00d410604f"); 
INSERT INTO `imagenes` VALUES("149", "assets/archivos/recortadas/a_71ff0d3ea2.JPG", "00d410604f"); 
INSERT INTO `imagenes` VALUES("150", "assets/archivos/recortadas/a_1c9790e2ff.png", "8b940a15ef"); 
INSERT INTO `imagenes` VALUES("151", "assets/archivos/recortadas/a_afbe144cfc.png", "34fb167ca1"); 
INSERT INTO `imagenes` VALUES("152", "assets/archivos/recortadas/a_a1de1133a4.png", "e07460c26d"); 
INSERT INTO `imagenes` VALUES("153", "assets/archivos/recortadas/a_25195c1040.png", "7a4e8c1ae8"); 
INSERT INTO `imagenes` VALUES("154", "assets/archivos/recortadas/a_0a0551dd28.png", "5687395a9e"); 
INSERT INTO `imagenes` VALUES("155", "assets/archivos/recortadas/a_6c20c9d163.png", "15cb10753f"); 
INSERT INTO `imagenes` VALUES("156", "assets/archivos/recortadas/a_8e1ec54e2f.png", "feb664f3d4"); 
INSERT INTO `imagenes` VALUES("157", "assets/archivos/recortadas/a_14f9981d22.png", "aa0a294474"); 
INSERT INTO `imagenes` VALUES("158", "assets/archivos/recortadas/a_e428b63af4.png", "8708957eed"); 
INSERT INTO `imagenes` VALUES("159", "assets/archivos/recortadas/a_d6e580d958.png", "1b5e3703a2"); 
INSERT INTO `imagenes` VALUES("160", "assets/archivos/recortadas/a_5518fb9cbd.png", "f765892749"); 
INSERT INTO `imagenes` VALUES("161", "assets/archivos/recortadas/a_7db55051ff.png", "bf969d5f28"); 
INSERT INTO `imagenes` VALUES("162", "assets/archivos/recortadas/a_abe133bf9d.png", "e14648cb73"); 
INSERT INTO `imagenes` VALUES("163", "assets/archivos/recortadas/a_0002f29f83.png", "95f3bb91f1"); 
INSERT INTO `imagenes` VALUES("164", "assets/archivos/recortadas/a_13ab3d3cc8.jpg", "007bbc2190"); 
INSERT INTO `imagenes` VALUES("165", "assets/archivos/recortadas/a_0667c1fb82.jpg", "8c3208fecd"); 
INSERT INTO `imagenes` VALUES("166", "assets/archivos/recortadas/a_0cfb58fdbd.png", "cab28566a0"); 
INSERT INTO `imagenes` VALUES("167", "assets/archivos/recortadas/a_113eb367ce.png", "0cd51f0354"); 
INSERT INTO `imagenes` VALUES("169", "assets/archivos/recortadas/a_346b88b06e.png", "185d89bdd3"); 
INSERT INTO `imagenes` VALUES("170", "assets/archivos/recortadas/a_a807848b0d.png", "db2d1011fc"); 
INSERT INTO `imagenes` VALUES("172", "assets/archivos/recortadas/a_49cc68975f.png", "b8d25d59b3"); 
INSERT INTO `imagenes` VALUES("180", "assets/archivos/recortadas/a_80b78683ad.png", "dcf694589c"); 
INSERT INTO `imagenes` VALUES("181", "assets/archivos/recortadas/a_39fd0fae32.JPG", "ffe3a1aca1"); 
INSERT INTO `imagenes` VALUES("182", "assets/archivos/recortadas/a_6a338a954e.JPG", "bb76698fe0"); 
INSERT INTO `imagenes` VALUES("183", "assets/archivos/recortadas/a_041b181c5e.JPG", "4898f95929"); 
INSERT INTO `imagenes` VALUES("184", "assets/archivos/recortadas/a_8d96cbbf6a.JPG", "1d1cb9adc4"); 
INSERT INTO `imagenes` VALUES("185", "assets/archivos/recortadas/a_3158adcb24.JPG", "9448a1fc36"); 
INSERT INTO `imagenes` VALUES("186", "assets/archivos/recortadas/a_688e43c0bb.JPG", "2027ed66f4"); 
INSERT INTO `imagenes` VALUES("187", "assets/archivos/recortadas/a_0910ee015d.JPG", "59db965dba"); 
INSERT INTO `imagenes` VALUES("188", "assets/archivos/recortadas/a_73d05fa1d1.JPG", "52fbbbd1aa"); 
INSERT INTO `imagenes` VALUES("189", "assets/archivos/recortadas/a_b893fdb708.JPG", "30380777be"); 
INSERT INTO `imagenes` VALUES("190", "assets/archivos/a511de2f1a.jpg", "baad73a64f"); 
INSERT INTO `imagenes` VALUES("192", "assets/archivos/recortadas/a_403637d882.JPG", "5f10e902c7"); 
INSERT INTO `imagenes` VALUES("193", "assets/archivos/recortadas/a_cdc1836177.JPG", "5f10e902c7"); 
INSERT INTO `imagenes` VALUES("194", "assets/archivos/recortadas/a_ccbb47c48c.JPG", "5f10e902c7"); 
INSERT INTO `imagenes` VALUES("195", "assets/archivos/recortadas/a_ca48e7ee13.JPG", "5f10e902c7"); 
INSERT INTO `imagenes` VALUES("196", "assets/archivos/recortadas/a_3f9ca88258.JPG", "5f10e902c7"); 
INSERT INTO `imagenes` VALUES("197", "assets/archivos/recortadas/a_55e5f9fda8.JPG", "5f10e902c7"); 
INSERT INTO `imagenes` VALUES("198", "assets/archivos/recortadas/a_68b0d7bf81.JPG", "5f10e902c7"); 
INSERT INTO `imagenes` VALUES("199", "assets/archivos/recortadas/a_d0949db2bb.JPG", "b3ea24f640"); 
INSERT INTO `imagenes` VALUES("200", "assets/archivos/recortadas/a_ed3f859217.JPG", "b3ea24f640"); 
INSERT INTO `imagenes` VALUES("201", "assets/archivos/recortadas/a_ca56ff294c.JPG", "b3ea24f640"); 
INSERT INTO `imagenes` VALUES("202", "assets/archivos/recortadas/a_7274b04384.JPG", "b3ea24f640"); 
INSERT INTO `imagenes` VALUES("203", "assets/archivos/recortadas/a_a1d897e1d8.JPG", "b3ea24f640"); 
INSERT INTO `imagenes` VALUES("204", "assets/archivos/recortadas/a_7d1d15e681.JPG", "b3ea24f640"); 
INSERT INTO `imagenes` VALUES("205", "assets/archivos/recortadas/a_b3245e0c0a.JPG", "b3ea24f640"); 
INSERT INTO `imagenes` VALUES("206", "assets/archivos/f8c86cc795.gif", "5295cd9d1c"); 
INSERT INTO `imagenes` VALUES("207", "assets/archivos/438593ba90.gif", "18eccfcb52"); 
INSERT INTO `imagenes` VALUES("208", "assets/archivos/recortadas/a_38bf2aaed5.png", "1e2fc9b722"); 
INSERT INTO `imagenes` VALUES("209", "assets/archivos/recortadas/a_472a8af236.png", "0041792405"); 
INSERT INTO `imagenes` VALUES("210", "assets/archivos/recortadas/a_b265c641a4.png", "ada8b06bdc"); 
INSERT INTO `imagenes` VALUES("213", "assets/archivos/recortadas/a_42fe9af153.jpg", "3323515975"); 
INSERT INTO `imagenes` VALUES("214", "assets/archivos/recortadas/a_327e21f1b5.jpeg", "58c96c6473"); 
INSERT INTO `imagenes` VALUES("215", "assets/archivos/recortadas/a_57ef52725e.jpeg", "58c96c6473"); 
INSERT INTO `imagenes` VALUES("216", "assets/archivos/recortadas/a_bca64ab84c.jpeg", "58c96c6473"); 
INSERT INTO `imagenes` VALUES("218", "assets/archivos/recortadas/a_ed973b86cd.jpeg", "58c96c6473"); 
INSERT INTO `imagenes` VALUES("219", "assets/archivos/recortadas/a_b3964742c4.jpeg", "58c96c6473"); 
INSERT INTO `imagenes` VALUES("220", "assets/archivos/recortadas/a_96f7e29727.jpeg", "58c96c6473"); 
INSERT INTO `imagenes` VALUES("221", "assets/archivos/recortadas/a_ae3c1d44cb.jpeg", "58c96c6473"); 
INSERT INTO `imagenes` VALUES("222", "assets/archivos/recortadas/a_4206af0147.jpeg", "58c96c6473"); 
INSERT INTO `imagenes` VALUES("223", "assets/archivos/recortadas/a_bcc8fb6e54.jpeg", "58c96c6473"); 
INSERT INTO `imagenes` VALUES("224", "assets/archivos/recortadas/a_f5b5ee0ad1.jpeg", "58c96c6473"); 
INSERT INTO `imagenes` VALUES("225", "assets/archivos/recortadas/a_b4743bfe4b.jpeg", "58c96c6473"); 
INSERT INTO `imagenes` VALUES("226", "assets/archivos/recortadas/a_2610719005.JPG", "58c96c6473"); 
INSERT INTO `imagenes` VALUES("228", "assets/archivos/recortadas/a_af765ab0a7.JPG", "21468b520c"); 
INSERT INTO `imagenes` VALUES("229", "assets/archivos/recortadas/a_8a64d34316.JPG", "738692998e"); 
INSERT INTO `imagenes` VALUES("233", "assets/archivos/recortadas/a_0c77b0dd33.JPG", "a1bad5845c"); 
INSERT INTO `imagenes` VALUES("234", "assets/archivos/recortadas/a_67c63f1eb9.JPG", "5a6af0b860"); 
INSERT INTO `imagenes` VALUES("235", "assets/archivos/recortadas/a_35dc19e18a.jpeg", "5339ee187b"); 
INSERT INTO `imagenes` VALUES("236", "assets/archivos/recortadas/a_1e7f3e17f2.JPG", "f404f8fcc3"); 
INSERT INTO `imagenes` VALUES("237", "assets/archivos/recortadas/a_b7bb6b3b09.JPG", "86a2854bfa"); 


DROP TABLE IF EXISTS ` novedades`;
CREATE TABLE `novedades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(255) DEFAULT NULL,
  `titulo` text,
  `desarrollo` text,
  `categoria` text,
  `keywords` text,
  `description` text,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS ` pagos`;
;



DROP TABLE IF EXISTS ` pedidos`;
CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(255) NOT NULL,
  `producto` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `precio` float NOT NULL DEFAULT '0',
  `precioAdicional` float DEFAULT '0',
  `estado` int(11) DEFAULT '0',
  `tipo` int(11) DEFAULT '0',
  `usuario` varchar(255) NOT NULL,
  `empresa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `detalle` text,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=latin1;

INSERT INTO ` pedidos` VALUES("3", "d276b84b21", "Combo Doble|||a:2:{i:0;s:18:\"0,Aquarius Manzana\";i:1;N;}", "1", "250", "0", "1", "1", "4ec159f765", "8a8dba7a25", "Paga con: 500", "2019-01-31 17:44:40"); 
INSERT INTO ` pedidos` VALUES("4", "d276b84b21", "Delivery", "1", "45", "0", "1", "1", "4ec159f765", "8a8dba7a25", "Envio-Seleccion", "2019-01-31 17:44:40"); 
INSERT INTO ` pedidos` VALUES("5", "5c09633bc6", "Retiro en sucursal", "1", "0", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-01 10:14:02"); 
INSERT INTO ` pedidos` VALUES("6", "5c09633bc6", "Café Grande|||a:2:{i:0;s:10:\"0,Criollos\";i:1;a:1:{i:0;s:25:\"15,x2 Sobres de mermelada\";}}", "2", "180", "15", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 500", "2019-02-01 10:14:02"); 
INSERT INTO ` pedidos` VALUES("23", "e42b646c0e", "Café express|||a:2:{i:0;s:13:\"0,Media lunas\";i:1;a:2:{i:0;s:26:\"25,x1 Vaso de jugo mediano\";i:1;s:25:\"15,x2 Sobres de mermelada\";}}", "1", "120", "40", "1", "1", "eb9b447df5", "8a8dba7a25", "Paga con: 500", "2019-02-01 10:23:33"); 
INSERT INTO ` pedidos` VALUES("24", "e42b646c0e", "Retiro en sucursal", "1", "0", "0", "1", "1", "eb9b447df5", "8a8dba7a25", "Envio-Seleccion", "2019-02-01 10:23:33"); 
INSERT INTO ` pedidos` VALUES("25", "12851f6972", "Café Grande|||a:2:{i:0;s:0:\"\";i:1;N;}", "1", "180", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 200", "2019-02-01 12:16:45"); 
INSERT INTO ` pedidos` VALUES("26", "12851f6972", "Retiro en sucursal", "1", "0", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-01 12:16:45"); 
INSERT INTO ` pedidos` VALUES("27", "8917a9870a", "Combo Doble|||a:2:{i:0;s:0:\"\";i:1;N;}", "1", "250", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 300", "2019-02-01 12:19:00"); 
INSERT INTO ` pedidos` VALUES("28", "8917a9870a", "Retiro en sucursal", "1", "0", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-01 12:19:00"); 
INSERT INTO ` pedidos` VALUES("29", "0d4d0d8916", "Combo Coma|||a:2:{i:0;s:0:\"\";i:1;N;}", "1", "150", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 200", "2019-02-01 12:19:44"); 
INSERT INTO ` pedidos` VALUES("30", "0d4d0d8916", "Retiro en sucursal", "1", "0", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-01 12:19:44"); 
INSERT INTO ` pedidos` VALUES("31", "57fc6acae1", "Combo Coma|||a:2:{i:0;s:0:\"\";i:1;N;}", "1", "150", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 200", "2019-02-01 12:26:28"); 
INSERT INTO ` pedidos` VALUES("32", "57fc6acae1", "Retiro en sucursal", "1", "0", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-01 12:26:28"); 
INSERT INTO ` pedidos` VALUES("33", "25cd634d54", "Combo Doble|||a:2:{i:0;s:0:\"\";i:1;N;}", "1", "250", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 300", "2019-02-01 12:27:32"); 
INSERT INTO ` pedidos` VALUES("34", "25cd634d54", "Retiro en sucursal", "1", "0", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-01 12:27:32"); 
INSERT INTO ` pedidos` VALUES("35", "38a54f5481", "Combo Doble|||a:2:{i:0;s:0:\"\";i:1;N;}", "1", "250", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 300", "2019-02-01 12:28:47"); 
INSERT INTO ` pedidos` VALUES("36", "38a54f5481", "Retiro en sucursal", "1", "0", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-01 12:28:47"); 
INSERT INTO ` pedidos` VALUES("37", "5558b3b591", "Combo Doble|||a:2:{i:0;s:18:\"0,Aquarius Manzana\";i:1;N;}", "1", "250", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 300", "2019-02-01 12:29:10"); 
INSERT INTO ` pedidos` VALUES("38", "5558b3b591", "Retiro en sucursal", "1", "0", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-01 12:29:10"); 
INSERT INTO ` pedidos` VALUES("39", "1d4f7d978b", "Combo Doble|||a:2:{i:0;s:0:\"\";i:1;N;}", "1", "250", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 500", "2019-02-01 12:30:47"); 
INSERT INTO ` pedidos` VALUES("40", "1d4f7d978b", "Retiro en sucursal", "1", "0", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-01 12:30:47"); 
INSERT INTO ` pedidos` VALUES("41", "f3795b76b2", "Combo Coma|||a:2:{i:0;s:0:\"\";i:1;N;}", "1", "150", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 200", "2019-02-01 12:48:20"); 
INSERT INTO ` pedidos` VALUES("42", "f3795b76b2", "Retiro en sucursal", "1", "0", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-01 12:48:20"); 
INSERT INTO ` pedidos` VALUES("43", "24f8e6d2ba", "Combo Doble|||a:2:{i:0;s:0:\"\";i:1;N;}", "1", "250", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 300", "2019-02-01 13:12:25"); 
INSERT INTO ` pedidos` VALUES("44", "24f8e6d2ba", "Retiro en sucursal", "1", "0", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-01 13:12:25"); 
INSERT INTO ` pedidos` VALUES("45", "e45a35727d", "Combo Doble|||a:2:{i:0;s:15:\"0,Aquarios Pera\";i:1;N;}", "1", "250", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 2222", "2019-02-01 13:17:34"); 
INSERT INTO ` pedidos` VALUES("46", "e45a35727d", "Retiro en sucursal", "1", "0", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-01 13:17:34"); 
INSERT INTO ` pedidos` VALUES("47", "935be0efa5", "Retiro en sucursal", "1", "0", "0", "1", "1", "99613c6e7a", "", "Envio-Seleccion", "2019-02-01 14:09:44"); 
INSERT INTO ` pedidos` VALUES("48", "935be0efa5", "Combo Doble|||a:2:{i:0;s:11:\"0,Coca-Cola\";i:1;N;}", "1", "250", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 250", "2019-02-01 14:09:44"); 
INSERT INTO ` pedidos` VALUES("49", "7e792cd1ee", "Combo Doble|||a:2:{i:0;s:0:\"\";i:1;N;}", "1", "250", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 20", "2019-02-01 14:12:38"); 
INSERT INTO ` pedidos` VALUES("50", "7e792cd1ee", "Retiro en sucursal", "1", "0", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-01 14:12:38"); 
INSERT INTO ` pedidos` VALUES("51", "2bb83eb74b", "Combo Coma|||a:2:{i:0;s:11:\"0,Coca-Cola\";i:1;N;}", "1", "150", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 200", "2019-02-01 14:14:27"); 
INSERT INTO ` pedidos` VALUES("52", "75096903cd", "Combo Doble|||a:2:{i:0;s:18:\"0,Aquarius Manzana\";i:1;N;}", "1", "250", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 5000", "2019-02-01 14:16:07"); 
INSERT INTO ` pedidos` VALUES("53", "af37303f0f", "Combo Doble|||a:2:{i:0;s:0:\"\";i:1;N;}", "1", "250", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 2222", "2019-02-01 14:18:17"); 
INSERT INTO ` pedidos` VALUES("54", "525f6965fb", "Combo Doble|||a:2:{i:0;s:15:\"0,Aquarios Pera\";i:1;N;}", "1", "250", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 800", "2019-02-01 14:19:53"); 
INSERT INTO ` pedidos` VALUES("55", "12eb2f4cc5", "Café Grande|||a:2:{i:0;s:0:\"\";i:1;a:2:{i:0;s:26:\"25,x1 Vaso de jugo mediano\";i:1;s:25:\"15,x2 Sobres de mermelada\";}}", "1", "180", "40", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 500", "2019-02-01 14:21:06"); 
INSERT INTO ` pedidos` VALUES("66", "0e3a400e6a", "Combo Doble|||a:2:{i:0;s:15:\"0,Aquarios Pera\";i:1;N;}", "1", "250", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 222", "2019-02-01 14:51:32"); 
INSERT INTO ` pedidos` VALUES("67", "0e3a400e6a", "Retiro en sucursal", "1", "0", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-01 14:51:32"); 
INSERT INTO ` pedidos` VALUES("68", "877d5463d6", "Combo Coma|||a:2:{i:0;s:18:\"0,Aquarius Naranja\";i:1;N;}", "1", "150", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 222", "2019-02-01 14:53:00"); 
INSERT INTO ` pedidos` VALUES("69", "8528308197", "Combo Doble|||a:2:{i:0;s:18:\"0,Aquarius Manzana\";i:1;N;}", "1", "250", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 222", "2019-02-01 14:54:08"); 
INSERT INTO ` pedidos` VALUES("70", "8528308197", "Retiro en sucursal", "1", "0", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-01 14:54:08"); 
INSERT INTO ` pedidos` VALUES("71", "ebf6306512", "Combo Doble|||a:2:{i:0;s:0:\"\";i:1;N;}", "1", "250", "0", "2", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 222", "2019-02-01 14:57:27"); 
INSERT INTO ` pedidos` VALUES("72", "ebf6306512", "Retiro en sucursal", "1", "0", "0", "2", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-01 14:57:27"); 
INSERT INTO ` pedidos` VALUES("73", "e908b1199c", "Retiro en sucursal", "1", "0", "0", "1", "1", "99613c6e7a", "", "Envio-Seleccion", "2019-02-01 16:55:26"); 
INSERT INTO ` pedidos` VALUES("74", "e908b1199c", "Café Grande|||a:2:{i:0;s:0:\"\";i:1;a:2:{i:0;s:26:\"25,x1 Vaso de jugo mediano\";i:1;s:25:\"15,x2 Sobres de mermelada\";}}", "1", "180", "40", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 250", "2019-02-01 16:55:26"); 
INSERT INTO ` pedidos` VALUES("75", "1bbc012ef9", "Combo Coma|||a:2:{i:0;s:18:\"0,Aquarius Naranja\";i:1;N;}", "1", "150", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 500", "2019-02-01 16:59:01"); 
INSERT INTO ` pedidos` VALUES("76", "1bbc012ef9", "Retiro en sucursal", "1", "0", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-01 16:59:01"); 
INSERT INTO ` pedidos` VALUES("77", "0011cbf262", "Café Grande|||a:2:{i:0;s:0:\"\";i:1;a:2:{i:0;s:26:\"25,x1 Vaso de jugo mediano\";i:1;s:25:\"15,x2 Sobres de mermelada\";}}", "2", "180", "40", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 653", "2019-02-01 17:04:59"); 
INSERT INTO ` pedidos` VALUES("78", "0011cbf262", "Retiro en sucursal", "1", "0", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-01 17:04:59"); 
INSERT INTO ` pedidos` VALUES("79", "0011cbf262", "Combo Coma|||a:2:{i:0;s:0:\"\";i:1;N;}", "1", "150", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 653", "2019-02-01 17:04:59"); 
INSERT INTO ` pedidos` VALUES("80", "58733c94d7", "Café Grande|||a:2:{i:0;s:0:\"\";i:1;a:1:{i:0;s:25:\"15,x2 Sobres de mermelada\";}}", "1", "180", "15", "1", "1", "01c9b619ea", "8a8dba7a25", "Paga con: 200", "2019-02-04 09:09:31"); 
INSERT INTO ` pedidos` VALUES("81", "58733c94d7", "Retiro en sucursal", "1", "0", "0", "1", "1", "01c9b619ea", "8a8dba7a25", "Envio-Seleccion", "2019-02-04 09:09:31"); 
INSERT INTO ` pedidos` VALUES("82", "e8e2e2593e", "Café express|||a:2:{i:0;s:0:\"\";i:1;a:2:{i:0;s:26:\"25,x1 Vaso de jugo mediano\";i:1;s:25:\"15,x2 Sobres de mermelada\";}}", "1", "120", "40", "1", "1", "01c9b619ea", "8a8dba7a25", "Paga con: 600", "2019-02-04 09:18:42"); 
INSERT INTO ` pedidos` VALUES("83", "e8e2e2593e", "Café Grande|||a:2:{i:0;s:0:\"\";i:1;a:1:{i:0;s:25:\"15,x2 Sobres de mermelada\";}}", "2", "180", "15", "1", "1", "01c9b619ea", "8a8dba7a25", "Paga con: 600", "2019-02-04 09:18:42"); 
INSERT INTO ` pedidos` VALUES("84", "e8e2e2593e", "Retiro en sucursal", "1", "0", "0", "1", "1", "01c9b619ea", "8a8dba7a25", "Envio-Seleccion", "2019-02-04 09:18:42"); 
INSERT INTO ` pedidos` VALUES("85", "79f51e983c", "Café Grande|||a:2:{i:0;s:0:\"\";i:1;a:2:{i:0;s:26:\"25,x1 Vaso de jugo mediano\";i:1;s:25:\"15,x2 Sobres de mermelada\";}}", "2", "180", "40", "1", "1", "84c7531de1", "8a8dba7a25", "Paga con: 500", "2019-02-04 09:20:25"); 
INSERT INTO ` pedidos` VALUES("86", "79f51e983c", "Retiro en sucursal", "1", "0", "0", "1", "1", "84c7531de1", "8a8dba7a25", "Envio-Seleccion", "2019-02-04 09:20:25"); 
INSERT INTO ` pedidos` VALUES("87", "3033536b17", "Retiro en sucursal", "1", "0", "0", "1", "1", "d8074b25f0", "", "Envio-Seleccion", "2019-02-04 09:25:44"); 
INSERT INTO ` pedidos` VALUES("88", "3033536b17", "Combo Coma|||a:2:{i:0;s:18:\"0,Aquarius Naranja\";i:1;N;}", "1", "150", "0", "1", "1", "d8074b25f0", "8a8dba7a25", "Paga con: 200", "2019-02-04 09:25:44"); 
INSERT INTO ` pedidos` VALUES("89", "233a24d312", "qweqw", "1", "123", "0", "1", "1", "99613c6e7a", "", "Envio-Seleccion", "2019-02-04 09:47:04"); 
INSERT INTO ` pedidos` VALUES("90", "233a24d312", "Combo Coma|||a:2:{i:0;s:18:\"0,Aquarius Naranja\";i:1;N;}", "1", "150", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 300", "2019-02-04 09:47:04"); 
INSERT INTO ` pedidos` VALUES("97", "b9d8d87eec", "Combo Doble|||a:2:{i:0;s:18:\"0,Aquarius Manzana\";i:1;N;}", "1", "250", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 400", "2019-02-04 09:59:55"); 
INSERT INTO ` pedidos` VALUES("98", "b9d8d87eec", "qweqw", "1", "123", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-04 09:59:55"); 
INSERT INTO ` pedidos` VALUES("99", "913d916fd1", "Combo Doble|||a:2:{i:0;s:11:\"0,Coca-Cola\";i:1;N;}", "1", "250", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 300", "2019-02-04 10:00:32"); 
INSERT INTO ` pedidos` VALUES("100", "913d916fd1", "qweqw", "1", "123", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-04 10:00:32"); 
INSERT INTO ` pedidos` VALUES("101", "f1cd98db56", "Combo Coma|||a:2:{i:0;s:18:\"0,Aquarius Naranja\";i:1;N;}", "1", "150", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 500", "2019-02-04 19:26:06"); 
INSERT INTO ` pedidos` VALUES("102", "f1cd98db56", "qweqw", "1", "123", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-04 19:26:06"); 
INSERT INTO ` pedidos` VALUES("103", "33bf5103c2", "Combo Coma|||a:2:{i:0;s:0:\"\";i:1;N;}", "1", "150", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 300", "2019-02-04 19:40:47"); 
INSERT INTO ` pedidos` VALUES("104", "33bf5103c2", "qweqw", "1", "123", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-04 19:40:47"); 
INSERT INTO ` pedidos` VALUES("105", "26eb43cd0e", "Combo Doble|||a:2:{i:0;s:15:\"0,Aquarios Pera\";i:1;N;}", "1", "250", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 600", "2019-02-04 19:41:41"); 
INSERT INTO ` pedidos` VALUES("106", "26eb43cd0e", "Café Grande|||a:2:{i:0;s:0:\"\";i:1;a:1:{i:0;s:25:\"15,x2 Sobres de mermelada\";}}", "1", "180", "15", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 600", "2019-02-04 19:41:41"); 
INSERT INTO ` pedidos` VALUES("107", "26eb43cd0e", "qweqw", "1", "123", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-04 19:41:41"); 
INSERT INTO ` pedidos` VALUES("108", "bfffbdc5ea", "Combo Coma|||a:2:{i:0;s:18:\"0,Aquarius Naranja\";i:1;N;}", "1", "150", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 500", "2019-02-04 19:44:00"); 
INSERT INTO ` pedidos` VALUES("109", "bfffbdc5ea", "qweqw", "1", "123", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-04 19:44:00"); 
INSERT INTO ` pedidos` VALUES("110", "a764192e2d", "Combo Coma|||a:2:{i:0;s:15:\"0,Aquarios Pera\";i:1;N;}", "1", "150", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 500", "2019-02-04 19:54:04"); 
INSERT INTO ` pedidos` VALUES("111", "a764192e2d", "Café express|||a:2:{i:0;s:0:\"\";i:1;a:1:{i:0;s:25:\"15,x2 Sobres de mermelada\";}}", "1", "120", "15", "1", "1", "99613c6e7a", "8a8dba7a25", "Paga con: 500", "2019-02-04 19:54:04"); 
INSERT INTO ` pedidos` VALUES("112", "a764192e2d", "qweqw", "1", "123", "0", "1", "1", "99613c6e7a", "8a8dba7a25", "Envio-Seleccion", "2019-02-04 19:54:04"); 
INSERT INTO ` pedidos` VALUES("113", "9961484660", "costillar de cerdo|||a:2:{i:0;s:11:\"0,coca cola\";i:1;a:1:{i:0;s:19:\"50,ensalada mediana\";}}", "3", "200", "50", "1", "1", "1617350592", "b06f4d0577", "Paga con: 800", "2019-02-27 01:01:15"); 
INSERT INTO ` pedidos` VALUES("114", "9961484660", "Envio Zona Centro", "1", "45", "0", "1", "1", "1617350592", "b06f4d0577", "Envio-Seleccion", "2019-02-27 01:01:15"); 
INSERT INTO ` pedidos` VALUES("115", "cd4124fb6a", "costillar de cerdo|||a:2:{i:0;s:0:\"\";i:1;N;}", "1", "200", "0", "1", "1", "1617350592", "b06f4d0577", "Paga con: 500", "2019-02-27 01:03:05"); 
INSERT INTO ` pedidos` VALUES("116", "cd4124fb6a", "", "0", "0", "0", "1", "1", "1617350592", "b06f4d0577", "Paga con: 500", "2019-02-27 01:03:05"); 
INSERT INTO ` pedidos` VALUES("117", "cd4124fb6a", "Envio Zona Centro", "1", "45", "0", "1", "1", "1617350592", "b06f4d0577", "Envio-Seleccion", "2019-02-27 01:03:05"); 
INSERT INTO ` pedidos` VALUES("118", "90afb2224d", "costillar de cerdo|||a:2:{i:0;s:0:\"\";i:1;a:1:{i:0;s:19:\"50,ensalada mediana\";}}", "1", "200", "50", "1", "1", "1617350592", "b06f4d0577", "Paga con: 500", "2019-02-27 01:05:27"); 
INSERT INTO ` pedidos` VALUES("119", "90afb2224d", "", "0", "0", "0", "1", "1", "1617350592", "b06f4d0577", "Paga con: 500", "2019-02-27 01:05:27"); 
INSERT INTO ` pedidos` VALUES("120", "90afb2224d", "Retiro en sucursal", "1", "0", "0", "1", "1", "1617350592", "b06f4d0577", "Envio-Seleccion", "2019-02-27 01:05:27"); 
INSERT INTO ` pedidos` VALUES("121", "0db213806d", "costillar de cerdo|||a:2:{i:0;s:0:\"\";i:1;a:1:{i:0;s:15:\"40,papas fritas\";}}", "1", "200", "40", "1", "1", "1617350592", "b06f4d0577", "Paga con: 300", "2019-02-27 02:22:04"); 
INSERT INTO ` pedidos` VALUES("122", "0db213806d", "Retiro en sucursal", "1", "0", "0", "1", "1", "1617350592", "b06f4d0577", "Envio-Seleccion", "2019-02-27 02:22:04"); 


DROP TABLE IF EXISTS ` portfolio`;
CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(255) DEFAULT NULL,
  `titulo` text,
  `desarrollo` text,
  `categoria` text,
  `keywords` text,
  `description` text,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS ` productos`;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(255) DEFAULT NULL,
  `cod_empresa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `titulo` text,
  `precio` float DEFAULT NULL,
  `precioDescuento` float NOT NULL,
  `stock` int(11) DEFAULT '0',
  `desarrollo` text,
  `variantes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `adicionales` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci,
  `categoria` text,
  `subcategoria` text,
  `seccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `keywords` text,
  `description` text,
  `fecha` date DEFAULT NULL,
  `meli` varchar(255) DEFAULT NULL,
  `url` text,
  `cod_producto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

INSERT INTO ` productos` VALUES("1", "c3cf723418", "8a8dba7a25", "Tabla de fíambres 4 personas", "400", "0", "100", "Jamón, queso, Salame, Jamón Crudo, Aceitunas, Maní", "", "a:2:{i:0;s:15:\"30,Papas Fritas\";i:1;s:9:\"20,Salsas\";}", "80374445a6", "", "ca55ea8cf1", "", "", "2019-01-31", "", "", ""); 
INSERT INTO ` productos` VALUES("2", "adf3f6db2c", "8a8dba7a25", "Super tabla de fíambres 10 personas", "900", "0", "100", "3 tipos de jamón, 2 tipos de queso, huevos rellenos, salchichón, aceitunas", "", "a:2:{i:0;s:15:\"40,Papas fritas\";i:1;s:9:\"50,Salsas\";}", "80374445a6", "", "ca55ea8cf1", "", "", "2019-01-31", "", "", ""); 
INSERT INTO ` productos` VALUES("3", "d50967c9d5", "8a8dba7a25", "Café express", "120", "0", "100", "1 café chico, 1 vaso de soda chico, 2 media lunas", "a:2:{i:0;s:13:\"0,Media lunas\";i:1;s:10:\"0,Criollos\";}", "a:2:{i:0;s:26:\"25,x1 Vaso de jugo mediano\";i:1;s:25:\"15,x2 Sobres de mermelada\";}", "051c1c00bb", "", "3c6f78a062", "", "", "2019-01-31", "", "", ""); 
INSERT INTO ` productos` VALUES("4", "fea133c710", "8a8dba7a25", "Café Grande", "0", "0", "100", "1 café grande, 1 vaso de soda mediano, 3 media lunas", "a:2:{i:0;s:13:\"0,Media Lunas\";i:1;s:10:\"0,Criollos\";}", "a:2:{i:0;s:26:\"25,x1 Vaso de jugo mediano\";i:1;s:25:\"15,x2 Sobres de mermelada\";}", "051c1c00bb", "", "3c6f78a062", "", "", "2019-01-31", "", "", ""); 
INSERT INTO ` productos` VALUES("5", "eb4c03854b", "8a8dba7a25", "Combo Coma", "150", "0", "100", "1 Sándwich de jamón, queso chedar y lechuga + 1 gaseosa a elección 500 ml.", "a:6:{i:0;s:8:\"0,Sprite\";i:1;s:11:\"0,Coca-Cola\";i:2;s:7:\"0,Fanta\";i:3;s:18:\"0,Aquarius Manzana\";i:4;s:15:\"0,Aquarios Pera\";i:5;s:18:\"0,Aquarius Naranja\";}", "", "975e74e3a2", "", "c8fff3a880", "", "", "2019-01-31", "", "", ""); 
INSERT INTO ` productos` VALUES("6", "ce056e642c", "8a8dba7a25", "Combo Doble", "250", "0", "100", "2 Sándwich\'s de jamón, queso chedar, pollo, tomate y lechuga + 2 gaseosa a elección 500 ml.", "a:6:{i:0;s:8:\"0,Sprite\";i:1;s:11:\"0,Coca-Cola\";i:2;s:7:\"0,Fanta\";i:3;s:18:\"0,Aquarius Naranja\";i:4;s:18:\"0,Aquarius Manzana\";i:5;s:15:\"0,Aquarios Pera\";}", "", "975e74e3a2", "", "c8fff3a880", "", "", "2019-01-31", "", "", ""); 
INSERT INTO ` productos` VALUES("7", "785864a89e", "a58d056a9e", "PIZZA NAPOLITANA", "190", "0", "3", "salsa de tomate, queso, tomate natural ", "", "", "0ad44118cc", "", "08934f61d1", "", "", "2019-02-12", "", "", ""); 
INSERT INTO ` productos` VALUES("8", "f9343942bd", "a58d056a9e", "CARNE AL HORNO", "200", "0", "0", " colita de cuadril,  cebolla,  zanahorias, al vino blanco Sal y pimienta", "a:2:{i:0;s:16:\"1,PAPAS AL HORNO\";i:1;s:20:\"2 ,VERDURAS AL HORNO\";}", "", "fa9cbee313", "", "38c09be80b", "", "", "2019-02-12", "", "", ""); 
INSERT INTO ` productos` VALUES("9", "4fd6266ba8", "a58d056a9e", "PIZZA CON ANANA ", "190", "0", "0", "salsa de tomate, queso, jamón, ananá ", "", "", "0ad44118cc", "", "08934f61d1", "", "", "2019-02-12", "", "", ""); 
INSERT INTO ` productos` VALUES("10", "e8e01a8671", "a58d056a9e", "PIZZA CON RUCULA Y JAMÓN  CRUDO", "220", "0", "0", "salsa de tomate, queso, jamón crudo y rucula ", "", "", "0ad44118cc", "", "08934f61d1", "", "", "2019-02-12", "", "", ""); 
INSERT INTO ` productos` VALUES("11", "7c25f9336c", "a58d056a9e", "PIZZA CON PALMITOS", "220", "0", "0", "salsa de tomate, queso, palmitos y salsa golf", "", "", "0ad44118cc", "", "08934f61d1", "", "", "2019-02-12", "", "", ""); 
INSERT INTO ` productos` VALUES("14", "04e12e74e0", "b06f4d0577", "costillar de cerdo", "200", "0", "44", "costillar a la parrilla + 1 gaseosa a eleccion", "a:1:{i:0;s:14:\"4,Mucho limón\";}", "a:2:{i:0;s:19:\"50,ensalada mediana\";i:1;s:15:\"40,papas fritas\";}", "8906cc8caa", "", "0d53dd6504", "", "", "2019-02-26", "", "", ""); 
INSERT INTO ` productos` VALUES("15", "c507f0c5fd", "dd90c9215a", "FIAMBRES CASEROS", "0", "0", "0", "Mayonesa de AVE, Chorizo seco,  Chorizo hervido,  Panceta,  Bondiola, Arrollado de pollo, Verduras en escabeche,  Lengua a la vinagreta Pionono agridulce", "", "", "80374445a6", "", "0e1bd0a535", "", "", "2019-02-27", "", "", ""); 
INSERT INTO ` productos` VALUES("16", "dd8b43be43", "dd90c9215a", "RAVIOLES", "0", "0", "0", "Ravioles de verdura y carne ", "", "", "f128632467", "", "87c52738f4", "", "", "2019-02-27", "", "", ""); 
INSERT INTO ` productos` VALUES("17", "4beb0c5ba6", "dd90c9215a", "SORRENTINOS", "0", "0", "0", " Sorrentinos de mozzarella y jamón ", "", "", "f128632467", "", "dc095bf28b", "", "", "2019-02-27", "", "", ""); 
INSERT INTO ` productos` VALUES("18", "a3968b83ee", "dd90c9215a", "ÑOQUIS", "0", "0", "0", "", "", "", "f128632467", "", "178185e602", "", "", "2019-02-27", "", "", ""); 
INSERT INTO ` productos` VALUES("20", "c9bb14dbdd", "dd90c9215a", "TALLARINES", "0", "0", "0", "Tallarines ", "", "", "f128632467", "", "0dd8325a2b", "", "", "2019-02-27", "", "", ""); 
INSERT INTO ` productos` VALUES("21", "1e16ab401f", "dd90c9215a", "PARRILLADA", "0", "0", "0", "Parrillada: Costilla de vaca Costilla de cerdo Bondiola Vacío  Pollo", "", "", "8906cc8caa", "", "9117433599", "", "", "2019-02-27", "", "", ""); 
INSERT INTO ` productos` VALUES("22", "6ae37f1b35", "00d410604f", "FIAMBRES SURTIDOS POR  KILO   (PARA LLEVAR) ", "360", "0", "0", "Arrollado de carne/ pollo - Bondiola - Jamón crudo - Jamón cocido - Panceta - Vinagreta de Lengua / Mondongo / Nervios - Escabeche de verduras - Pionono - Mayonesa de aves/ mixta -  Queso Fontina / Tybo - Salames a la grasa / Vitel tonne .", "", "", "80374445a6", "", "386d2df2ce", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("23", "fa23b847d7", "00d410604f", "PARRILADA POR KILO  (PARA LLEVAR)", "460", "0", "0", "", "", "", "8906cc8caa", "", "23a39eb77e", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("24", "8b940a15ef", "d50ad9acfb", "MILANESA DE LA CASA ", "0", "0", "0", "salsa de tomate, queso, tomate natural y huevo frito.", "", "", "3236e2110a", "", "4d072f2488", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("25", "34fb167ca1", "d50ad9acfb", "MILANESA TRES QUESOS", "0", "0", "0", "Cebollado, muzzarella, sardo, queso azul, nueces.", "", "", "3236e2110a", "", "4d072f2488", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("26", "e07460c26d", "d50ad9acfb", "MILANESA NAPOLITANA ESPECIAL ", "0", "0", "0", "Salsa de tomate, muzzarella, jamón, rodajas de tomate, morrón, aceitunas.", "", "", "3236e2110a", "", "1046a7a83c", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("27", "7a4e8c1ae8", "d50ad9acfb", "MILANESA CAPRESE ", "0", "0", "0", "Muzzarella, tomate fresco, albahaca y pesto. ", "", "", "3236e2110a", "", "4d072f2488", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("28", "5687395a9e", "d50ad9acfb", "MILANESA AMERICANA", "0", "0", "0", "salsa de tomate, muzzarella, cebollado, panceta y huevo frito ", "", "", "3236e2110a", "", "4d072f2488", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("29", "15cb10753f", "d50ad9acfb", "MILANESA CHEDAR", "0", "0", "0", "Cebollado, panceta, queso chedar.", "", "", "3236e2110a", "", "4d072f2488", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("30", "feb664f3d4", "d50ad9acfb", "MILANESA PICANTE", "0", "0", "0", "salsa de tomate, muzzarella, salsa picante.", "", "", "3236e2110a", "", "4d072f2488", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("31", "aa0a294474", "d50ad9acfb", "MILANESA A LA NAPOLITANA", "0", "0", "0", "salsa de tomate, muzzarella, tomate natural ", "", "", "3236e2110a", "", "4d072f2488", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("32", "8708957eed", "d50ad9acfb", "MILANESA SUPER NOGAL", "0", "0", "0", "salsa de tomate, muzzarella, bondiola y verdeo", "", "", "3236e2110a", "", "4d072f2488", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("33", "1b5e3703a2", "d50ad9acfb", "VACÍO A LA PIZZA ", "0", "0", "0", "", "", "", "fa9cbee313", "", "a867502ad9", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("34", "f765892749", "d50ad9acfb", "VACÍO AL ROQUEFORT ", "0", "0", "0", "", "", "", "fa9cbee313", "", "46b8bd41f4", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("35", "bf969d5f28", "d50ad9acfb", "VACÍO AL VERDEO", "0", "0", "0", "", "", "", "fa9cbee313", "", "46b8bd41f4", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("36", "e14648cb73", "d50ad9acfb", "POLLO AL CHAMPIÑON ", "0", "0", "0", "", "", "", "72ad996977", "", "3ca7aa240b", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("37", "95f3bb91f1", "d50ad9acfb", "POLLO AL VERDEO", "0", "0", "0", "", "", "", "72ad996977", "", "3ca7aa240b", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("38", "007bbc2190", "d50ad9acfb", "POLLO DESHUESADO A LA PIZZA", "0", "0", "0", "", "", "", "72ad996977", "", "3ca7aa240b", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("39", "8c3208fecd", "d50ad9acfb", "ARROLLADO DE POLLO", "0", "0", "0", "", "", "", "72ad996977", "", "3ca7aa240b", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("40", "cab28566a0", "d50ad9acfb", "POLLO RELLENO", "0", "0", "0", "", "", "", "72ad996977", "", "3ca7aa240b", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("41", "0cd51f0354", "d50ad9acfb", "POLLO A LAS BRASAS", "0", "0", "0", "", "", "", "72ad996977", "", "3ca7aa240b", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("43", "185d89bdd3", "d50ad9acfb", "PULPETIN", "0", "0", "0", "", "", "", "72ad996977", "", "3ca7aa240b", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("44", "db2d1011fc", "d50ad9acfb", "MILANESA FUGAZZETA", "0", "0", "0", "salsa de tomate, muzzarella, cebollado", "", "", "3236e2110a", "", "4d072f2488", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("46", "b8d25d59b3", "d50ad9acfb", "CERDO AL CHAMPIÑON ", "0", "0", "0", "", "", "", "fa9cbee313", "", "4939d8024c", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("54", "dcf694589c", "d50ad9acfb", "EMPANADAS  VARIAS", "0", "0", "0", "VARIANTES:   atún choclo ; verduras acelga ; pollo ; roquefort;  jamón y  queso. Árabes, saladas; dulces.", "", "", "3c91e7e0de", "", "c9980f98f2", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("55", "ffe3a1aca1", "b3ea24f640", "EMPANADAS ARABES  ", "180", "0", "1000", "", "", "", "3c91e7e0de", "", "ea68770233", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("56", "bb76698fe0", "b3ea24f640", "EMPANADAS DE JAMÓN Y QUESO ", "180", "0", "0", "", "", "", "3c91e7e0de", "", "ea68770233", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("57", "4898f95929", "b3ea24f640", "EMPANADAS DE POLLO", "180", "0", "0", "", "", "", "3c91e7e0de", "", "ea68770233", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("58", "1d1cb9adc4", "b3ea24f640", "EMPANADAS CRIOLLAS DULCE", "180", "0", "0", "", "", "", "3c91e7e0de", "", "511d4547eb", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("59", "9448a1fc36", "b3ea24f640", "EMPANADAS CAPRESE", "180", "0", "0", "", "", "", "3c91e7e0de", "", "ea68770233", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("60", "2027ed66f4", "b3ea24f640", "EMPANADAS DE CEBOLLA Y QUESO", "180", "0", "1000", "", "", "", "3c91e7e0de", "", "ea68770233", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("61", "59db965dba", "b3ea24f640", "EMPANADAS DE CARNE CORTADA A CUCHILLO", "180", "0", "1000", "", "", "", "3c91e7e0de", "", "ea68770233", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("62", "52fbbbd1aa", "b3ea24f640", "EMPANADAS CRIOLLAS SALADAS SUAVES", "180", "0", "1000", "", "", "", "3c91e7e0de", "", "ea68770233", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("63", "30380777be", "b3ea24f640", "EMPANADAS CRIOLLAS SALADAS SUAVES", "180", "0", "1000", "Precio por 12 empanadas", "", "", "3c91e7e0de", "", "ea68770233", "", "", "2019-02-28", "", "", ""); 
INSERT INTO ` productos` VALUES("64", "1e2fc9b722", "d50ad9acfb", "PIZZAS CASERAS ESPECIALES", "0", "0", "0", "VARIANTES: CHEDAR - PANCETA - ROQUEFORD - TRES QUESOS - CALABRESA - BONDIOLA - NAPOLITANA - FUGAZZETA - CHOCLO - ATÚN - PRIMAVERA CON JAMÓN - CHAMPIGNON ", "", "", "0ad44118cc", "", "9daa882565", "", "", "2019-03-04", "", "", ""); 
INSERT INTO ` productos` VALUES("65", "0041792405", "d50ad9acfb", "TARTAS VARIAS ", "0", "0", "0", "VARIANTES: atún, choclo, pollo, Jamón y queso, acelga, verduras.", "", "", "f641171ec2", "", "a391e0fa7b", "", "", "2019-03-04", "", "", ""); 
INSERT INTO ` productos` VALUES("66", "ada8b06bdc", "d50ad9acfb", "LOMOS DE CARNE O DE POLLO", "0", "0", "0", "", "", "", "a2f7798de9", "", "5b3a559d01", "", "", "2019-03-04", "", "", ""); 
INSERT INTO ` productos` VALUES("67", "3323515975", "d50ad9acfb", "PASTAS VARIAS ", "0", "0", "0", "VARIANTES: Canelone, Ñoquis. Tallarines. Ravioles.  Salsa bolognesa crema y queso", "", "", "f128632467", "", "c7bd246ad7", "", "", "2019-03-04", "", "", ""); 
INSERT INTO ` productos` VALUES("69", "a1bad5845c", "58c96c6473", "Piadinas Varias", "0", "0", "0", "VARIANTES: VEGETARIANA (tomate, lechuga, queso y huevo duro), LIVORNO (queso c/colorada, aceitunas, rucula y tomate), COTTO (Jamón cocido y queso), COPPA (bondiola y muzzarella), MILANO (salame de milan, queso, lechuga, tomate), EMILIANA (bondiola, rúcula, tómate), 4 SALUMI (bondiola, salame de milán, Jamón cocido, mortadela), LOMBARDA (salame de milan, queso, tomate y rucula), TANO (salame, queso c/colorada, aceitunas), PIADIZZA (salsa de tomate, queso, aceitunas 2 Ingredientes a elección).", "", "", "1745d655f3", "", "dae7fefa46", "", "", "2019-03-07", "", "", ""); 
INSERT INTO ` productos` VALUES("70", "21468b520c", "58c96c6473", "PIZZA CON RUCULA Y JAMÓN  CRUDO", "0", "0", "0", "", "", "", "0ad44118cc", "", "3a19d47a45", "", "", "2019-03-07", "", "", ""); 
INSERT INTO ` productos` VALUES("71", "738692998e", "58c96c6473", "PIZZA MILAN   ", "0", "0", "0", "", "", "", "0ad44118cc", "", "3a19d47a45", "", "", "2019-03-07", "", "", ""); 
INSERT INTO ` productos` VALUES("72", "86a2854bfa", "58c96c6473", "CAFETERIA", "0", "0", "0", "", "", "", "051c1c00bb", "", "7201c3d139", "", "", "2019-03-07", "", "", ""); 
INSERT INTO ` productos` VALUES("73", "5339ee187b", "58c96c6473", "CERVEZAS ARTESANALES ", "0", "0", "0", "Rubia Estilo Palé Ale - Negra  Estilo Stout - Roja  Estilo Irísh Red Ale", "", "", "b01c9f1004", "", "2037554feb", "", "", "2019-03-07", "", "", ""); 
INSERT INTO ` productos` VALUES("74", "f404f8fcc3", "58c96c6473", "Aperitivos Varios", "0", "0", "0", "Americano, Negroni, Negroski, Negroni Sbagliato ", "", "", "2d2520b8c8", "", "29931d88b1", "", "", "2019-03-07", "", "", ""); 
INSERT INTO ` productos` VALUES("75", "5a6af0b860", "58c96c6473", "PICADAS MEDIANA", "0", "0", "0", "chorizo seco, queso, mortadela, jamón crudo, grisines y  pladina (vacia), aceitunas verdes.", "", "", "d024d2d198", "", "a503b693e0", "", "", "2019-03-07", "", "", ""); 


DROP TABLE IF EXISTS ` servicios`;
CREATE TABLE `servicios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(255) DEFAULT NULL,
  `titulo` text,
  `desarrollo` text,
  `categoria` text,
  `keywords` text,
  `description` text,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS ` sliders`;
CREATE TABLE `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(255) DEFAULT NULL,
  `titulo` text,
  `subtitulo` text,
  `categoria` varchar(255) NOT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS ` subcategorias`;
CREATE TABLE `subcategorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



DROP TABLE IF EXISTS ` usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod` varchar(255) DEFAULT NULL,
  `nombre` text,
  `apellido` text,
  `doc` text,
  `email` text,
  `password` text,
  `postal` text,
  `direccion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `barrio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci,
  `localidad` text,
  `provincia` text,
  `pais` text,
  `telefono` text,
  `celular` text,
  `invitado` int(11) NOT NULL DEFAULT '0',
  `plan` int(11) DEFAULT '3',
  `vendedor` int(11) NOT NULL DEFAULT '0',
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

INSERT INTO ` usuarios` VALUES("1", "99613c6e7a", "Lautaro", "González", "", "web@estudiorochayasoc.com.ar", "7abe28f562278ca5f66fd79e879ff72198e1aecdc025897474ebeea0916e5fb4", "", "lopez y planes 2060", "Catedral", "SAN FRANCISCO", "Córdoba", "", "3564556677", "", "0", "3", "0", "2019-03-08"); 
INSERT INTO ` usuarios` VALUES("9", "acedd9442b", "Rosa", "Matallán", "", "rosagmatallan@gmail.com", "f1f29b55d9b66bf24edb92c644f5a47db35233b88c9dc92c90bf39ef5c617d3e", "2400", "9 de Julio 1816", "", "SAN FRANCISCO", "Córdoba", "", "03564202175", "", "0", "2", "1", "2019-02-11"); 
INSERT INTO ` usuarios` VALUES("10", "b3e2ff9d86", "JUAN", "ROCHA", "", "juanestudiorocha@gmail.com", "juAr2010", "", "", "", "", "", "", "", "", "0", "3", "0", "2019-02-12"); 
INSERT INTO ` usuarios` VALUES("17", "1e9dbdfadb", "Carlos", "Battan", "", "battancarlos@gmail.com", "243efb5deec5b71cc1091f8e1ccc2babcb71ec68c48d05b6c1b88239f5fa83d3", "", "", "", "", "", "", "03564 15654298", "", "0", "2", "1", "2019-02-22"); 
INSERT INTO ` usuarios` VALUES("19", "00a88bf126", "Yanina", "Perez", "", "perezyaninabelen@gmail.com", "a1adbfd3d7eb4e9e1bc4e92f1d3b1a2dcd7750df467fe9c5243b4c5606b93dae", "2400", "Salta 2417", "", "SAN FRANCISCO", "Córdoba", "", "03564 420363 --- 03564 587747", "", "0", "2", "1", "2019-02-25"); 
INSERT INTO ` usuarios` VALUES("20", "dd7b58b2f1", "Lautaro", "Gonzalez", "", "lautarogonzalez@gmail.com", "8e3e63eacece69a71cba0a091140fbf6ba18e32dcc57aa0aebfd99e94b4b88c4", "", "", "", "", "", "", "356466565", "", "0", "3", "1", "2019-02-26"); 
INSERT INTO ` usuarios` VALUES("22", "7155033387", "Silvia", "Castagno", "", "silviacastagno76@gmail.com", "1a5440c0eca1b786e73bc28c258dbe7445ade8ccc8e753621afce77cef0419eb", "2400", "Paraguay esquina Avellaneda", "", "SAN FRANCISCO", "Córdoba", "", "03564 663146", "", "0", "2", "1", "2019-02-26"); 
INSERT INTO ` usuarios` VALUES("27", "48e6299293", "DANTE", "PASSAMONTI", "", "dantepassamonti@hotmail.com", "df95939892f1827ca2858bdcb0ad41cc636660142aa0cabae6d692ff81cb4b1c", "", "", "", "", "", "", "03564 425456", "", "0", "2", "1", "2019-02-28"); 
INSERT INTO ` usuarios` VALUES("28", "ba2fce3622", "IGNACIO", "ORELLANO", "", "nanoorellano@hotmail.com", "3b58478f68621a8ae62a8c64f2de53dbd09efe0a8fd9fd3c43eec4bbade6e6e8", "", "", "", "", "", "", "", "", "0", "2", "1", "2019-03-03"); 
INSERT INTO ` usuarios` VALUES("29", "3a9b44deac", "Carlos", "Devallis", "", "carlosgdevallis@live.com", "243efb5deec5b71cc1091f8e1ccc2babcb71ec68c48d05b6c1b88239f5fa83d3", "", "", "", "", "", "", "", "", "0", "2", "1", "2019-03-03"); 
INSERT INTO ` usuarios` VALUES("30", "dc1bb1630a", "FACUNDO", "ROCHA", "", "dc1bb1630a@emailTemporal.foodie", "23cf2bb15128a84b1e3e5c561893c78b221585745db18be5878df5a6a12625e6", "", "MORENO 377", "San Francisco", "catedral", "Córdoba", "", "+543564570789", "", "1", "0", "0", "2019-03-08"); 
INSERT INTO ` usuarios` VALUES("31", "2db8a7e2c6", "FACUNDO", "ROCHA", "", "2db8a7e2c6@emailTemporal.foodie", "dda383c03079c145902fe479c2a16ca4b15898ebc5d46459c8e9e3baee8fe60d", "", " moreno", "San Francisco", "velez sarsfield", "Córdoba", "", "+543564570789", "", "1", "0", "0", "2019-03-08"); 
INSERT INTO ` usuarios` VALUES("32", "692301143e", "FACUNDO", "ROCHA", "", "692301143e@emailTemporal.foodie", "672abccc040806b65dab426305002a1d36494add0559c868e73609970e11b642", "", "MORENO 377", "San Francisco", "21132131232", "Córdoba", "", "+543564570789", "", "1", "0", "0", "2019-03-08"); 
INSERT INTO ` usuarios` VALUES("33", "d15b14243f", "asdsadas", "dasdasda", "", "d15b14243f@emailTemporal.foodie", "10c2b99ca41fd0b8242074a93ccdcc9e6fb2b5f12e6a5b3c7116d24521f5edcd", "", "dasdas", "San Francisco", "ssadas", "Córdoba", "", "13123123", "", "1", "0", "0", "2019-03-08"); 


DROP TABLE IF EXISTS ` videos`;
CREATE TABLE `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text,
  `link` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

SET FOREIGN_KEY_CHECP�   