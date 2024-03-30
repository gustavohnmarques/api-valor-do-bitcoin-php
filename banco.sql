-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.24-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para valor_do_bitcoin
CREATE DATABASE IF NOT EXISTS `valor_do_bitcoin` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `valor_do_bitcoin`;

-- Copiando estrutura para tabela valor_do_bitcoin.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(15) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `url_tickers` varchar(255) NOT NULL,
  `last` varchar(20) NOT NULL DEFAULT '0',
  `vol` varchar(20) NOT NULL DEFAULT '0',
  `img` varchar(255) NOT NULL,
  `data_atualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` bit(1) NOT NULL DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela valor_do_bitcoin.empresas: ~11 rows (aproximadamente)
INSERT INTO `empresas` (`id`, `code`, `nome`, `url_tickers`, `last`, `vol`, `img`, `data_atualizacao`, `ativo`) VALUES
	(1, 'MercadoBitcoin', 'Mercado Bitcoin', 'https://api.mercadobitcoin.net/api/v4/tickers?symbols=BTC-BRL', '354000.00000000', '10.55664975', 'https://api-valor-do-bitcoin.pages.dev/mercadobitcoin.png', '2024-03-30 15:42:59', b'1'),
	(2, 'BityPreco', 'Bitypreço', 'https://api.bitpreco.com/btc-brl/ticker', '354172.000022', '20.05664342', 'https://api-valor-do-bitcoin.pages.dev/bitypreco.png', '2024-03-30 15:42:59', b'1'),
	(3, 'Binance', 'Binance', 'https://api.binance.com/api/v3/ticker/24hr?symbol=BTCBRL', '354189.00000000', '68.27345000', 'https://api-valor-do-bitcoin.pages.dev/binance.png', '2024-03-30 15:42:59', b'1'),
	(4, 'Foxbit', 'Foxbit', 'https://api.foxbit.com.br/rest/v3/markets/quotes?side=buy&base_currency=btc&quote_currency=brl&amount=1', '354557.9816000000000', '0', 'https://api-valor-do-bitcoin.pages.dev/foxbit.png', '2024-03-30 15:43:00', b'1'),
	(5, 'BrasilBitcoin', 'Brasil Bitcoin', 'https://brasilbitcoin.com.br/API/prices/BTC', '352907.02000000', '0.42375485', 'https://api-valor-do-bitcoin.pages.dev/brasilbitcoin.png', '2024-03-30 15:43:00', b'1'),
	(6, 'Ripio', 'Ripio', 'https://api.ripiotrade.co/v4/public/tickers/BTC_BRL', '354050', '4.28007208', 'https://api-valor-do-bitcoin.pages.dev/ripio.png', '2024-03-30 15:43:00', b'1'),
	(7, 'Coinext', 'Coinext', 'https://api.coinext.com.br:8443/AP/GetL2Snapshot', '353900', '0', 'https://api-valor-do-bitcoin.pages.dev/coinext.png', '2024-03-30 15:43:01', b'1'),
	(8, 'Bitso', 'Bitso', 'https://sandbox.bitso.com/api/v3/ticker/?book=btc_brl', '354120.00', '99.25684030', 'https://api-valor-do-bitcoin.pages.dev/bitso.png', '2024-03-30 15:43:01', b'1'),
	(9, 'NovaDax', 'NovaDAX', 'https://api.novadax.com/v1/market/ticker?symbol=BTC_BRL', '354771.44', '1.93565521', 'https://api-valor-do-bitcoin.pages.dev/novadax.png', '2024-03-30 15:43:01', b'1'),
	(10, 'FlowBtc', 'FlowBTC', 'https://api.flowbtc.com.br:8443/ap/GetLevel1?OMSId=1&InstrumentId=1', '351312.21', '0.009', 'https://api-valor-do-bitcoin.pages.dev/flowbtc.png', '2024-03-30 15:43:03', b'1'),
	(11, 'Bitnuvem', 'Bitnuvem', 'https://bitnuvem.com/api/BTC/ticker', '354624.16', '1.06681857', 'https://api-valor-do-bitcoin.pages.dev/bitnuvem.png', '2024-03-30 15:43:03', b'1');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
