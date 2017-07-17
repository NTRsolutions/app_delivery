-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: bd_deliverall
-- ------------------------------------------------------
-- Server version	5.7.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (2,'admin','21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atendentes`
--

DROP TABLE IF EXISTS `atendentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atendentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `restaurante_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`restaurante_id`),
  KEY `fk_atendente_restaurante1_idx` (`restaurante_id`),
  CONSTRAINT `fk_atendente_restaurante1` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atendentes`
--

LOCK TABLES `atendentes` WRITE;
/*!40000 ALTER TABLE `atendentes` DISABLE KEYS */;
INSERT INTO `atendentes` VALUES (2,'atendente','atendente@email.com','d4a1d4cf923c881fc54b2f6e13fed99b',3);
/*!40000 ALTER TABLE `atendentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cidades`
--

DROP TABLE IF EXISTS `cidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `estado_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`estado_id`),
  KEY `fk_cidades_estados1_idx` (`estado_id`),
  CONSTRAINT `fk_cidades_estados1` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidades`
--

LOCK TABLES `cidades` WRITE;
/*!40000 ALTER TABLE `cidades` DISABLE KEYS */;
INSERT INTO `cidades` VALUES (1,'Belo Horizonte',1),(2,'Juiz de Fora',1),(3,'João Monlevade',1);
/*!40000 ALTER TABLE `cidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classificacaos`
--

DROP TABLE IF EXISTS `classificacaos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classificacaos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nota` double NOT NULL,
  `comentario` varchar(250) DEFAULT NULL,
  `restaurante_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`restaurante_id`,`cliente_id`),
  KEY `fk_classificacao_restaurante1_idx` (`restaurante_id`),
  KEY `fk_classificacao_cliente1_idx` (`cliente_id`),
  CONSTRAINT `fk_classificacao_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_classificacao_restaurante1` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classificacaos`
--

LOCK TABLES `classificacaos` WRITE;
/*!40000 ALTER TABLE `classificacaos` DISABLE KEYS */;
/*!40000 ALTER TABLE `classificacaos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente_enderecos`
--

DROP TABLE IF EXISTS `cliente_enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente_enderecos` (
  `cliente_id` int(11) NOT NULL,
  `endereco_id` int(11) NOT NULL,
  PRIMARY KEY (`cliente_id`,`endereco_id`),
  KEY `fk_clientes_has_enderecos_enderecos1_idx` (`endereco_id`),
  KEY `fk_clientes_has_enderecos_clientes1_idx` (`cliente_id`),
  CONSTRAINT `fk_clientes_has_enderecos_clientes1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_clientes_has_enderecos_enderecos1` FOREIGN KEY (`endereco_id`) REFERENCES `enderecos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente_enderecos`
--

LOCK TABLES `cliente_enderecos` WRITE;
/*!40000 ALTER TABLE `cliente_enderecos` DISABLE KEYS */;
INSERT INTO `cliente_enderecos` VALUES (1,3),(2,7),(2,8);
/*!40000 ALTER TABLE `cliente_enderecos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `telefone1` varchar(45) DEFAULT NULL,
  `telefone2` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'cliente','cliente@email.com','4983a0ab83ed86e0e7213c8783940193',NULL,NULL),(2,'josé','jose@email.com','662eaa47199461d01a623884080934ab',NULL,NULL),(3,'bruna','bruna@email.com','1f260fa281fb68be2a991eb6edc345fb',NULL,NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `complementos`
--

DROP TABLE IF EXISTS `complementos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `complementos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `descricao` varchar(80) NOT NULL,
  `preco` double NOT NULL,
  `produto_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`produto_id`),
  KEY `fk_complemento_produto1_idx` (`produto_id`),
  CONSTRAINT `fk_complemento_produto1` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `complementos`
--

LOCK TABLES `complementos` WRITE;
/*!40000 ALTER TABLE `complementos` DISABLE KEYS */;
INSERT INTO `complementos` VALUES (1,'Cebola','tttt',2,1);
/*!40000 ALTER TABLE `complementos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `culinarias`
--

DROP TABLE IF EXISTS `culinarias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `culinarias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idTipo` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `restaurante_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`restaurante_id`),
  KEY `fk_tipoCulinarias_restaurantes1_idx` (`restaurante_id`),
  CONSTRAINT `fk_tipoCulinarias_restaurantes1` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `culinarias`
--

LOCK TABLES `culinarias` WRITE;
/*!40000 ALTER TABLE `culinarias` DISABLE KEYS */;
INSERT INTO `culinarias` VALUES (1,1,'Brasileira',3),(2,4,'Chinesa',3),(3,13,'Marroquina',3);
/*!40000 ALTER TABLE `culinarias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enderecos`
--

DROP TABLE IF EXISTS `enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enderecos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rua` varchar(100) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `complemento` varchar(60) DEFAULT NULL,
  `cep` varchar(15) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '0',
  `cidade_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`cidade_id`),
  KEY `fk_endereços_cidades1_idx` (`cidade_id`),
  CONSTRAINT `fk_endereços_cidades1` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enderecos`
--

LOCK TABLES `enderecos` WRITE;
/*!40000 ALTER TABLE `enderecos` DISABLE KEYS */;
INSERT INTO `enderecos` VALUES (1,'rua franq',1,'bairro franq',NULL,'00000001',NULL,NULL,0,1),(2,'avenida brasil',709,'santa efigência',NULL,'30140-000',-19.927071,-43.926087,0,1),(3,'rua cliente',100,'bairro cliente',NULL,'00000003',NULL,NULL,0,1),(7,'Avenida Cristiano Machado',1400,'Sagrada Família','ap 907','31035-512',-19.896227,-43.927012,0,1),(8,'rua tavares bastos',10,'São Mateus',NULL,'31025-180',-21.774158,-43.351098,0,2),(9,'Avenida Cristiano Machado',1400,'Sagrada Família','','31035-512',NULL,NULL,0,1),(11,'Rua Mestre Luis',64,'São Pedro','','30330-070',-19.9426999,-44.0061124,0,1),(12,'Rua Monlevade',NULL,'Industrial','','35930-131',NULL,NULL,0,3),(13,'Avenida Getúlio Vargas',4284,'Carneirinhos','','35930-002',NULL,NULL,0,3),(14,'Avenida Getúlio Vargas',3508,'Carneirinhos','','35930-002',NULL,NULL,0,3),(15,'Avenida Getúlio Vargas',4484,'Belmonte','','35930-293',NULL,NULL,0,3),(16,'Rua Duque de Caxias',29,'José Elói','','35930-198',NULL,NULL,0,3),(17,'Rua Cerâmica',53,'José Elói','','35930-197',NULL,NULL,0,3),(18,'Avenida Wilson Alvarenga',1080,'Carneirinhos','','35930-480',NULL,NULL,0,3),(19,'Avenida Wilson Alvarenga',954,'Carneirinhos','','35930-480',NULL,NULL,0,3),(20,'Rua Padre José de Anchieta',NULL,'Aclimação','','35930-108',NULL,NULL,0,3),(21,'Avenida Wilson Alvarenga',1368,'Carneirinhos','','35930-001',-19.8120889,-43.1620699,0,3),(22,'Avenida Wilson Alvarenga',1283,'Carneirinhos','','35930-001',-19.8108558,-43.1664681,0,3),(23,'Avenida Getúlio Vargas',4743,'Carneirinhos','','35930-003',-19.8114766,-43.1662642,0,3),(25,'Avenida Brasil',709,'Santa Efigênia','','30140-000',NULL,NULL,0,1),(26,'Avenida Brasil',709,'Santa Efigênia','','30140-000',NULL,NULL,0,1),(27,'Avenida Brasil',709,'Santa Efigênia','','30140-000',NULL,NULL,0,1),(28,'Avenida Brasil',709,'Santa Efigênia','','30140-000',NULL,NULL,0,1),(29,'Avenida Brasil',709,'Santa Efigênia','','30140-000',NULL,NULL,0,1),(30,'Avenida Brasil',709,'Santa Efigênia','','30140-000',NULL,NULL,0,1),(31,'Avenida Brasil',709,'Santa Efigênia','','30140-000',-19.9270711,-43.9260866,0,1),(32,'Avenida Brasil',709,'Santa Efigênia','','30140-000',-19.9270711,-43.9260866,0,1);
/*!40000 ALTER TABLE `enderecos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'MG');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `franqueado_enderecos`
--

DROP TABLE IF EXISTS `franqueado_enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `franqueado_enderecos` (
  `endereco_id` int(11) NOT NULL,
  `franqueado_id` int(11) NOT NULL,
  PRIMARY KEY (`endereco_id`,`franqueado_id`),
  KEY `fk_clientes_has_enderecos_enderecos1_idx` (`endereco_id`),
  KEY `fk_franqueado_enderecos_franqueados1_idx` (`franqueado_id`),
  CONSTRAINT `fk_clientes_has_enderecos_enderecos10` FOREIGN KEY (`endereco_id`) REFERENCES `enderecos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_franqueado_enderecos_franqueados1` FOREIGN KEY (`franqueado_id`) REFERENCES `franqueados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `franqueado_enderecos`
--

LOCK TABLES `franqueado_enderecos` WRITE;
/*!40000 ALTER TABLE `franqueado_enderecos` DISABLE KEYS */;
INSERT INTO `franqueado_enderecos` VALUES (1,2),(9,3);
/*!40000 ALTER TABLE `franqueado_enderecos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `franqueados`
--

DROP TABLE IF EXISTS `franqueados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `franqueados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `senha` varchar(128) DEFAULT NULL,
  `telefone1` varchar(45) DEFAULT NULL,
  `telefone2` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `franqueados`
--

LOCK TABLES `franqueados` WRITE;
/*!40000 ALTER TABLE `franqueados` DISABLE KEYS */;
INSERT INTO `franqueados` VALUES (2,'franq','franq@email.com','42bdbeae3e95332244ae7d01c9d7a9e8',NULL,NULL),(3,'franq2','franq2@email.com','bfdbbd9d829f18cbde0e4867fc93b9d0','(33)99108-2335','');
/*!40000 ALTER TABLE `franqueados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gerentes`
--

DROP TABLE IF EXISTS `gerentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gerentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `senha` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gerentes`
--

LOCK TABLES `gerentes` WRITE;
/*!40000 ALTER TABLE `gerentes` DISABLE KEYS */;
INSERT INTO `gerentes` VALUES (1,'gerente','gerente@email.com','740d9c49b11f3ada7b9112614a54be41'),(2,'pão com manteiga','gpao@email.com','4e2dbfcd2d15aa3638ac0cc1e3559ec3'),(3,'gacai','gacai@email.com','4a17db54030a61cdc1b9fa9ce400a3a9'),(4,'gsucupira','gsucupira@email.com','3fab6874f6aaf3c821650cdc48763da4');
/*!40000 ALTER TABLE `gerentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagamentos`
--

DROP TABLE IF EXISTS `pagamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idDescricao` int(11) NOT NULL,
  `descricao` varchar(80) NOT NULL,
  `restaurante_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`restaurante_id`),
  KEY `fk_formasPagamentos_restaurantes1_idx` (`restaurante_id`),
  CONSTRAINT `fk_formasPagamentos_restaurantes1` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagamentos`
--

LOCK TABLES `pagamentos` WRITE;
/*!40000 ALTER TABLE `pagamentos` DISABLE KEYS */;
INSERT INTO `pagamentos` VALUES (1,1,'cartão',3);
/*!40000 ALTER TABLE `pagamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido_produtos`
--

DROP TABLE IF EXISTS `pedido_produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido_produtos` (
  `pedido_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `qtd` int(11) NOT NULL,
  PRIMARY KEY (`pedido_id`,`produto_id`),
  KEY `fk_pedidos_has_produtos_produtos1_idx` (`produto_id`),
  KEY `fk_pedidos_has_produtos_pedidos1_idx` (`pedido_id`),
  CONSTRAINT `fk_pedidos_has_produtos_pedidos1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_has_produtos_produtos1` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido_produtos`
--

LOCK TABLES `pedido_produtos` WRITE;
/*!40000 ALTER TABLE `pedido_produtos` DISABLE KEYS */;
INSERT INTO `pedido_produtos` VALUES (1,1,3);
/*!40000 ALTER TABLE `pedido_produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` double NOT NULL,
  `status` int(11) NOT NULL,
  `data` date NOT NULL,
  `troco` double DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `endereco_id` int(11) NOT NULL,
  `restaurante_id` int(11) NOT NULL,
  `pagamento_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`cliente_id`,`endereco_id`,`restaurante_id`,`pagamento_id`),
  KEY `fk_pedido_cliente1_idx` (`cliente_id`),
  KEY `fk_pedidos_enderecos1_idx` (`endereco_id`),
  KEY `fk_pedidos_restaurantes1_idx` (`restaurante_id`),
  KEY `fk_pedidos_pagamentos1_idx` (`pagamento_id`),
  CONSTRAINT `fk_pedido_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_enderecos1` FOREIGN KEY (`endereco_id`) REFERENCES `enderecos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_pagamentos1` FOREIGN KEY (`pagamento_id`) REFERENCES `pagamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pedidos_restaurantes1` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,31.5,0,'2017-06-07',NULL,1,3,3,1);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto_complementos`
--

DROP TABLE IF EXISTS `produto_complementos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto_complementos` (
  `qtd` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `complemento_id` int(11) NOT NULL,
  PRIMARY KEY (`pedido_id`,`produto_id`,`complemento_id`),
  KEY `fk_produto_complementos_produtos1_idx` (`produto_id`),
  KEY `fk_produto_complementos_complementos1_idx` (`complemento_id`),
  CONSTRAINT `fk_produto_complementos_complementos1` FOREIGN KEY (`complemento_id`) REFERENCES `complementos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_complementos_pedidos1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_produto_complementos_produtos1` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto_complementos`
--

LOCK TABLES `produto_complementos` WRITE;
/*!40000 ALTER TABLE `produto_complementos` DISABLE KEYS */;
/*!40000 ALTER TABLE `produto_complementos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `descricao` varchar(150) DEFAULT NULL,
  `preco` double NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `qtd_max_complemento` int(11) DEFAULT NULL,
  `restaurante_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`restaurante_id`),
  KEY `fk_produto_restaurante_idx` (`restaurante_id`),
  CONSTRAINT `fk_produto_restaurante` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'produto','1','<p>ratuaipnuis afhduasiofh uasio&nbsp;</p>',10.5,NULL,2,3);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurante_enderecos`
--

DROP TABLE IF EXISTS `restaurante_enderecos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurante_enderecos` (
  `endereco_id` int(11) NOT NULL,
  `restaurante_id` int(11) NOT NULL,
  PRIMARY KEY (`endereco_id`,`restaurante_id`),
  KEY `fk_enderecos_has_restaurantes_restaurantes1_idx` (`restaurante_id`),
  KEY `fk_enderecos_has_restaurantes_enderecos1_idx` (`endereco_id`),
  CONSTRAINT `fk_enderecos_has_restaurantes_enderecos1` FOREIGN KEY (`endereco_id`) REFERENCES `enderecos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_enderecos_has_restaurantes_restaurantes1` FOREIGN KEY (`restaurante_id`) REFERENCES `restaurantes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurante_enderecos`
--

LOCK TABLES `restaurante_enderecos` WRITE;
/*!40000 ALTER TABLE `restaurante_enderecos` DISABLE KEYS */;
INSERT INTO `restaurante_enderecos` VALUES (2,3),(11,11),(12,12),(13,13),(14,14),(15,15),(16,16),(17,17),(18,18),(19,19),(20,20),(21,21),(22,22),(23,23);
/*!40000 ALTER TABLE `restaurante_enderecos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurantes`
--

DROP TABLE IF EXISTS `restaurantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cnpj` varchar(45) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `descricao` text,
  `foto` varchar(255) DEFAULT NULL,
  `horario_abre` varchar(5) DEFAULT NULL,
  `horario_fecha` varchar(5) DEFAULT NULL,
  `tempo_mercado` varchar(45) DEFAULT NULL,
  `valor_min` varchar(45) NOT NULL,
  `telefone1` varchar(45) DEFAULT NULL,
  `telefone2` varchar(45) DEFAULT NULL,
  `gerente_id` int(11) NOT NULL,
  `franqueado_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`gerente_id`,`franqueado_id`),
  KEY `fk_restaurante_gerente1_idx` (`gerente_id`),
  KEY `fk_restaurantes_franqueados1_idx` (`franqueado_id`),
  CONSTRAINT `fk_restaurante_gerente1` FOREIGN KEY (`gerente_id`) REFERENCES `gerentes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_restaurantes_franqueados1` FOREIGN KEY (`franqueado_id`) REFERENCES `franqueados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurantes`
--

LOCK TABLES `restaurantes` WRITE;
/*!40000 ALTER TABLE `restaurantes` DISABLE KEYS */;
INSERT INTO `restaurantes` VALUES (3,'restaurante','54.132.628/9052-60','rest@email.com','<p>teste</p>','sapore-ditalia-8.jpg','10:00','18:00','5','10','(31)32135-4849','',1,2),(11,'Sapore D\'Italia','16.123.123/1201-23','sapore@email.com','','sapore-ditalia-7.jpg','19:30','00:00','5','10','(31)3018-4585','',1,3),(12,'Restaurante Doce Paladar','11.111.111/1111-11','doce@email.com','','cbk-2.jpg','11:00','15:00','5 anos','5','(31)3131-3113','(31)99999-9999',1,3),(13,'Padaria e Lanchonete Pão Com Manteiga','22.222.222/2222-22','pao@email.com','','cbk-1.jpg','08:00','20:00','15 anos','10','(33)33333-3333','(88)88888-8888',2,2),(14,'Senhor Botequim','33.333.333/3333-33','bot@email.com','<p>dsafndsauio</p>','cbk-2-2.jpg','19:00','00:00','14 anos','10','(33)33333-3333','(33)33333-3333',1,2),(15,'Linhares','88.888.888/8888-88','linhares@email.com','','v1.jpg','10:00','15:00','20 anos','10','(33)33333-3333','(33)33333-3333',1,2),(16,'Restaurante Casa Velha','44.444.444/4444-44','casa@email.com','','2017-05-23.jpg','10:00','15:30','10 anos','10','(33)33333-3333','(33)33333-3333',1,2),(17,'Tropical Lanches','66.666.666/6666-66','tropical@email.com','','img-20170611-210458778.jpg','08:00','16:00','12 anos','10','(22)22222-2222','(22)22222-2222',1,2),(18,'Big Lanches','44.444.444/4444-44','big@email.com','','cbk-3.jpg','18:00','23:00','10 anos','8','(33)33333-3333','',1,2),(19,'Pizzaria Bilis','55.555.555/5555-65','bilis@email.com','','cbk-4.jpg','10:00','15:30','10 anos','10','(66)66666-6666','',1,2),(20,'Bistrô Contemporânea','33.333.516/0510-65','bistro@email.com','','2017-03-11.jpg','12:00','14:00','15 anos','10','(25)64894-8948','',1,2),(21,'Açai Power Monlevade','48.945.610/5601-56','power@email.com','','acai.png','10:00','22:00','10 anos','10','(32)13211-2312','',3,2),(22,'Restaurante Sucupira','15.640.561/2312-31','sucupira@email.com','','s.jpg','10:00','15:00','5 anos','10','(33)21354-6456','',4,2),(23,'Restaurante e Pizzaria Bufalo Bill','12.315.648/9148-90','bufalo@email.com','','2017-03-21.jpg','10:00','16:00','15 anos','10','(33)46461-2123','',1,2);
/*!40000 ALTER TABLE `restaurantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sugestaos`
--

DROP TABLE IF EXISTS `sugestaos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sugestaos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_restaurante` varchar(120) NOT NULL,
  `mensagem` text,
  `tel_restaurante` varchar(45) DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`cliente_id`),
  KEY `fk_sugestao_cliente1_idx` (`cliente_id`),
  CONSTRAINT `fk_sugestao_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sugestaos`
--

LOCK TABLES `sugestaos` WRITE;
/*!40000 ALTER TABLE `sugestaos` DISABLE KEYS */;
/*!40000 ALTER TABLE `sugestaos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-16 12:22:05
