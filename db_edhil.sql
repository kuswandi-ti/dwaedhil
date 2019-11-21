-- --------------------------------------------------------
-- Host:                         192.168.0.6
-- Server version:               10.1.37-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_edhil
CREATE DATABASE IF NOT EXISTS `db_edhil` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_edhil`;

-- Dumping structure for table db_edhil.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.migrations: ~48 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2019_03_22_101100_create_product_group_table', 2),
	(3, '2019_03_28_111136_create_supplier_table', 3),
	(4, '2019_03_29_162318_create_table_customer', 4),
	(5, '2019_04_05_134103_create_table_unit', 5),
	(6, '2019_04_05_162341_create_table_product', 6),
	(7, '2019_04_08_085937_add_product_group_id_to_product_table', 7),
	(8, '2019_04_09_103122_add_some_columns_to_product_table', 8),
	(9, '2019_04_09_132547_create_table_raw_material', 9),
	(10, '2019_04_10_102503_create_table_bill_of_material_hdr', 10),
	(11, '2019_04_15_095740_create_table_bill_of_material_dtl', 11),
	(12, '2019_04_22_104802_add_column_cpn_project_to_table_product', 12),
	(13, '2019_04_22_110407_add_column_supplier_to_table_raw_material', 13),
	(14, '2019_04_23_110754_create_table_goods_receive_header', 14),
	(15, '2019_04_23_114539_create_table_goods_receive_detail', 14),
	(16, '2019_04_23_163647_create_table_sys_counter_doc_number', 15),
	(17, '2019_04_23_113327_create_table_stock', 16),
	(18, '2019_04_23_145305_create_trigger_on_tbl_trx_goods_receive_dtl_after_insert', 16),
	(19, '2019_04_26_111715_create_trigger_on_tbl_trx_goods_receive_dtl_after_update', 17),
	(20, '2019_04_26_141612_create_trigger_on_tbl_trx_goods_receive_dtl_after_delete', 18),
	(21, '2019_04_29_090115_create_table_trx_production_planning_header', 19),
	(22, '2019_04_29_090736_create_table_trx_production_planning_detail', 19),
	(23, '2019_05_03_085218_create_table_trx_material_request_header', 20),
	(24, '2019_05_03_085834_create_table_trx_material_request_detail', 20),
	(25, '2019_05_03_101002_add_column_trx_description_to_tbl_counter_doc_number', 21),
	(26, '2019_05_06_160451_create_trigger_on_tbl_trx_material_request_dtl_after_insert', 22),
	(27, '2019_05_06_160648_create_trigger_on_tbl_trx_material_request_dtl_after_update', 22),
	(28, '2019_05_06_160702_create_trigger_on_tbl_trx_material_request_dtl_after_delete', 22),
	(29, '2019_05_08_132724_create_view_stock_onhand', 23),
	(30, '2019_05_09_093330_create_view_tbl_mst_product', 24),
	(31, '2019_05_09_093711_create_view_tbl_mst_raw_material', 25),
	(32, '2019_05_09_094327_create_view_tbl_trx_bom_hdr', 26),
	(33, '2019_05_09_094708_create_view_tbl_trx_bom_dtl', 27),
	(34, '2019_05_09_095330_create_view_tbl_trx_gr_hdr', 28),
	(35, '2019_05_09_095347_create_view_tbl_trx_gr_dtl', 28),
	(36, '2019_05_09_100347_create_view_tbl_trx_ppl_hdr', 29),
	(37, '2019_05_09_100520_create_view_tbl_trx_ppl_dtl', 29),
	(38, '2019_05_09_100533_create_view_tbl_trx_matreq_hdr', 29),
	(39, '2019_05_09_100543_create_view_tbl_trx_matreq_dtl', 29),
	(40, '2019_05_10_105236_add_column_type_product_to_trx_stock', 30),
	(41, '2019_05_21_104210_add_column_unit_to_table_tbl_trx_stock', 31),
	(42, '2019_05_21_145000_create_view_tbl_trx_stock', 32),
	(43, '2019_05_16_090222_create_table_trx_material_usage_header', 33),
	(44, '2019_05_16_090730_create_table_trx_material_usage_detail', 33),
	(45, '2019_05_21_145856_create_view_tbl_product_material_union', 34),
	(46, '2019_05_22_091616_create_view_trx_matusage_hdr', 35),
	(47, '2019_05_22_091907_create_view_trx_matusage_dtl', 35),
	(48, '2019_05_23_101238_create_trigger_on_tbl_trx_material_usage_dtl_after_insert', 36),
	(49, '2019_05_23_101437_create_trigger_on_tbl_trx_material_usage_dtl_after_update', 36),
	(50, '2019_05_23_101453_create_trigger_on_tbl_trx_material_usage_dtl_after_delete', 36),
	(51, '2019_05_27_111520_create_table_trx_production_planning_header', 37),
	(52, '2019_05_27_111521_create_table_trx_production_planning_detail', 37),
	(53, '2019_05_27_111522_create_view_tbl_trx_prodplan_hdr', 37),
	(54, '2019_05_27_111523_create_view_tbl_trx_prodplan_dtl', 37),
	(55, '2019_05_27_110036_create_table_tbl_trx_prodactual_hdr', 38),
	(56, '2019_05_27_110320_create_table_tbl_trx_prodactual_dtl', 38),
	(57, '2019_05_27_134920_create_view_trx_production_actual_hdr', 39),
	(58, '2019_05_27_135358_create_view_trx_production_actual_dtl', 39),
	(59, '2019_05_28_134142_remove_column_on_tbl_trx_production_planning_hdr', 40),
	(60, '2019_05_28_134917_add_column_product_to_table_tbl_trx_production_planning_dtl', 41),
	(61, '2019_06_19_143630_create_table_alloc_fg_hdr', 42),
	(62, '2019_06_19_144140_create_table_alloc_fg_dtl', 42),
	(63, '2019_06_20_141055_create_view_alloc_fg_header', 43),
	(64, '2019_06_20_141243_create_view_alloc_fg_detail', 43),
	(65, '2019_06_24_090057_create_table_trx_delivery_order_header', 44),
	(66, '2019_06_24_090310_create_table_trx_delivery_order_detail', 44),
	(67, '2019_06_24_161252_create_view_do_header', 45),
	(68, '2019_06_24_161407_create_view_do_detail', 45);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_mst_bom_dtl
CREATE TABLE IF NOT EXISTS `tbl_mst_bom_dtl` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_hdr` bigint(20) unsigned NOT NULL,
  `id_raw_material` bigint(20) unsigned NOT NULL,
  `qty_usage` double(12,5) NOT NULL DEFAULT '0.00000',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `percent_rejection` double(8,2) NOT NULL DEFAULT '0.00',
  `active` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_mst_bom_dtl_uuid_unique` (`uuid`),
  KEY `tbl_mst_bom_dtl_id_hdr_foreign` (`id_hdr`),
  KEY `tbl_mst_bom_dtl_id_raw_material_foreign` (`id_raw_material`),
  CONSTRAINT `tbl_mst_bom_dtl_id_hdr_foreign` FOREIGN KEY (`id_hdr`) REFERENCES `tbl_mst_bom_hdr` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_mst_bom_dtl_id_raw_material_foreign` FOREIGN KEY (`id_raw_material`) REFERENCES `tbl_mst_raw_material` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_mst_bom_dtl: ~9 rows (approximately)
DELETE FROM `tbl_mst_bom_dtl`;
/*!40000 ALTER TABLE `tbl_mst_bom_dtl` DISABLE KEYS */;
INSERT INTO `tbl_mst_bom_dtl` (`id`, `uuid`, `id_hdr`, `id_raw_material`, `qty_usage`, `remarks`, `percent_rejection`, `active`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`) VALUES
	(1, '163d84a2-91da-4eb4-870d-80de9d4208d4', 1, 9, 0.08330, '12 pcs/bag (returnable)', 1.00, '1', 'admin', '2019-04-18 11:37:10', 'admin', '2019-04-18 11:37:10'),
	(2, '45673b93-d3f4-420c-9782-a4a98f8108b2', 1, 8, 0.04167, '24 pcs/trolley (returnable)', 0.00, '1', 'admin', '2019-04-18 11:37:56', 'admin', '2019-04-18 11:37:56'),
	(3, 'f0e4a0ff-3c7c-4232-af99-568e124bdab2', 1, 7, 0.04160, 'From DWA Indonesia', 2.00, '1', 'admin', '2019-04-18 11:38:34', 'admin', '2019-04-18 11:38:34'),
	(4, 'b1605b70-c328-4487-a108-07add7e3c509', 1, 6, 1.00000, 'From DWA Indonesia', 1.00, '1', 'admin', '2019-04-18 11:38:55', 'admin', '2019-04-18 11:38:55'),
	(5, '945776ce-e9c0-415e-97fd-6aa172fa0d83', 1, 5, 1.00000, 'From DWA Indonesia', 1.00, '1', 'admin', '2019-04-18 11:39:17', 'admin', '2019-04-18 11:39:17'),
	(6, '9566b12c-643d-40b6-a3df-3ebd2c6da39a', 1, 4, 1.00000, 'From DWA Indonesia', 1.00, '1', 'admin', '2019-04-18 11:39:28', 'admin', '2019-04-18 11:39:28'),
	(7, '931b2666-059a-45dd-a3fb-7e391bac298e', 1, 3, 1.00000, 'From DWA Indonesia', 1.00, '1', 'admin', '2019-04-18 11:39:39', 'admin', '2019-04-18 11:39:39'),
	(8, '83800aa6-32d3-40a7-9413-d53c634797a0', 1, 2, 1.00000, 'From DWA Indonesia', 1.00, '1', 'admin', '2019-04-18 11:40:32', 'admin', '2019-04-18 11:40:51'),
	(9, 'a0cb7775-5840-4ab2-82ca-5b779cf17c91', 1, 1, 1.00000, 'Manufactured in HIL BK', 5.00, '1', 'admin', '2019-04-18 11:41:10', 'admin', '2019-04-25 13:48:35'),
	(10, 'a8235a99-5ead-40ad-b632-e79bd29c5558', 3, 10, 3.42240, 'For Layer (A-surface)', 3.00, '1', 'admin', '2019-05-02 11:51:22', 'admin', '2019-05-02 11:51:22'),
	(11, 'c23ef0aa-b88f-43a1-93ff-47424615937c', 3, 11, 3.37280, 'For Layer', 3.00, '1', 'admin', '2019-05-02 11:54:14', 'admin', '2019-05-09 10:41:30');
/*!40000 ALTER TABLE `tbl_mst_bom_dtl` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_mst_bom_hdr
CREATE TABLE IF NOT EXISTS `tbl_mst_bom_hdr` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_bom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_product` bigint(20) unsigned NOT NULL,
  `prepared_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_issue` date DEFAULT NULL,
  `revision` smallint(6) NOT NULL DEFAULT '0',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `active` char(1) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_mst_bom_hdr_uuid_unique` (`uuid`),
  KEY `tbl_mst_bom_hdr_id_product_foreign` (`id_product`),
  CONSTRAINT `tbl_mst_bom_hdr_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `tbl_mst_product` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_mst_bom_hdr: ~3 rows (approximately)
DELETE FROM `tbl_mst_bom_hdr`;
/*!40000 ALTER TABLE `tbl_mst_bom_hdr` DISABLE KEYS */;
INSERT INTO `tbl_mst_bom_hdr` (`id`, `uuid`, `status_bom`, `id_product`, `prepared_by`, `date_of_issue`, `revision`, `notes`, `active`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`) VALUES
	(1, 'b5cdb4ae-bc1c-45f1-9a6b-71019dcc98a0', 'NEW PART', 2, 'MOHD. FIRDAUS', '2019-04-01', 0, NULL, '1', 'admin', '2019-04-15 10:57:50', 'admin', '2019-09-19 09:31:30'),
	(2, '4535021a-cc9b-4a5e-9137-3df10c91d621', 'AMENDMENT', 1, 'M.F.x', '2019-04-17', 1, NULL, '1', 'admin', '2019-04-16 11:34:31', 'admin', '2019-09-17 14:19:21'),
	(3, '26316daa-7158-497a-873f-73a0b155be05', 'NEW PART', 3, 'MOHD. FERDAUS', '2019-05-02', 0, NULL, '1', 'admin', '2019-05-02 11:49:52', 'admin', '2019-11-19 15:35:25');
/*!40000 ALTER TABLE `tbl_mst_bom_hdr` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_mst_customer
CREATE TABLE IF NOT EXISTS `tbl_mst_customer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_title_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_address_1` text COLLATE utf8mb4_unicode_ci,
  `address_city_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_phone_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_fax_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_email_1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_person_name_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_person_phone_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_person_email_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_title_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_address_2` text COLLATE utf8mb4_unicode_ci,
  `address_city_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_phone_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_fax_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_email_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_person_name_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_person_phone_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_person_email_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_mst_customer_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_mst_customer: ~2 rows (approximately)
DELETE FROM `tbl_mst_customer`;
/*!40000 ALTER TABLE `tbl_mst_customer` DISABLE KEYS */;
INSERT INTO `tbl_mst_customer` (`id`, `uuid`, `customer_code`, `customer_name`, `address_title_1`, `address_address_1`, `address_city_1`, `address_phone_1`, `address_fax_1`, `address_email_1`, `address_person_name_1`, `address_person_phone_1`, `address_person_email_1`, `address_title_2`, `address_address_2`, `address_city_2`, `address_phone_2`, `address_fax_2`, `address_email_2`, `address_person_name_2`, `address_person_phone_2`, `address_person_email_2`, `active`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`) VALUES
	(3, '3bf3f149-24d3-450c-bc8f-98e6885f2e55', 'C0001', 'PERODUA', 'DELIVERY ADDRESS', 'Delivery Address', NULL, NULL, NULL, 'perodua@mail.com', NULL, NULL, NULL, 'PAYMENT ADDRESS', 'Payment Address', NULL, NULL, NULL, 'perodua@mail.com', NULL, NULL, NULL, '1', 'admin', '2019-04-09 09:03:47', 'admin', '2019-04-09 09:03:47');
/*!40000 ALTER TABLE `tbl_mst_customer` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_mst_product
CREATE TABLE IF NOT EXISTS `tbl_mst_product` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpn_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_project` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_product_group` int(10) unsigned NOT NULL,
  `id_unit` int(10) unsigned NOT NULL,
  `id_customer` int(10) unsigned,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `life_span_num` int(11) NOT NULL DEFAULT '0',
  `life_span_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cavity` double(8,2) NOT NULL DEFAULT '0.00',
  `machine_tonage` double(8,2) NOT NULL DEFAULT '0.00',
  `machine_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_of_material` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gross_weight` double(8,2) NOT NULL DEFAULT '0.00',
  `net_weight` double(8,2) NOT NULL DEFAULT '0.00',
  `mp_net_weight` double(8,2) NOT NULL DEFAULT '0.00',
  `process` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cycle_time_num` double(8,2) NOT NULL DEFAULT '0.00',
  `cycle_time_mp` int(11) NOT NULL DEFAULT '0',
  `assy_time_num` double(8,2) NOT NULL DEFAULT '0.00',
  `assy_time_mp` int(11) NOT NULL DEFAULT '0',
  `active` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_mst_product_uuid_unique` (`uuid`),
  KEY `tbl_mst_product_id_unit_foreign` (`id_unit`),
  KEY `tbl_mst_product_id_product_group_foreign` (`id_product_group`),
  KEY `tbl_mst_product_id_customer_foreign` (`id_customer`),
  CONSTRAINT `tbl_mst_product_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `tbl_mst_customer` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_mst_product_id_product_group_foreign` FOREIGN KEY (`id_product_group`) REFERENCES `tbl_mst_product_group` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_mst_product_id_unit_foreign` FOREIGN KEY (`id_unit`) REFERENCES `tbl_mst_unit` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_mst_product: ~3 rows (approximately)
DELETE FROM `tbl_mst_product`;
/*!40000 ALTER TABLE `tbl_mst_product` DISABLE KEYS */;
INSERT INTO `tbl_mst_product` (`id`, `uuid`, `product_code`, `product_name`, `cpn_no`, `model_project`, `id_product_group`, `id_unit`, `id_customer`, `description`, `life_span_num`, `life_span_time`, `cavity`, `machine_tonage`, `machine_code`, `color`, `type_of_material`, `gross_weight`, `net_weight`, `mp_net_weight`, `process`, `cycle_time_num`, `cycle_time_mp`, `assy_time_num`, `assy_time_mp`, `active`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`) VALUES
	(1, '710bf802-4095-455e-9825-5b64f1f2bc7a', '9.CP06.9503.00', 'D38L HEADLINING ASSY ROOF 63310-P0010', '9.CP06.9503.00', 'D38L', 1, 5, 3, NULL, 0, '0', 0.00, 0.00, NULL, NULL, NULL, 0.00, 0.00, 0.00, NULL, 0.00, 0, 0.00, 0, '1', 'admin', '2019-04-08 14:14:15', 'admin', '2019-11-06 13:40:08'),
	(2, 'c14b25c6-c572-480c-85e0-29beb84132be', '9.CP06.9500.00', 'D98L HEADLINING ASSY ROOF 63310-BZC10', '-', 'D98L', 1, 5, 3, NULL, 7, '0', 1.00, 100.00, 'PRESS MOULDING', 'Light Grey (105B)', 'Non Woven Velour 180g/m3', 0.00, 100.00, 0.00, 'Press Moulding, Water Jet Cutting, & Assembly', 315.00, 14, 150.00, 3, '0', 'admin', '2019-04-08 15:16:46', 'admin', '2019-04-24 15:42:35'),
	(3, 'a033e21d-d908-4856-9d3e-df4e2f864a71', '8.CP06.9500.VP', 'D98L HEADLINING ROOF 63310-BZC10', '8.CP06.9500.VP', 'D38L/D98L', 1, 5, 3, NULL, 7, '1', 1.00, 150.00, 'PRESS MOULDING & WATER JET CUTTING', 'Light Grey (105B)', 'Non Woven Velour 180g/m2', 0.00, 1.95, 0.00, 'Moulding', 165.00, 11, 0.00, 0, '1', 'admin', '2019-05-02 11:09:16', 'admin', '2019-11-06 13:39:32');
/*!40000 ALTER TABLE `tbl_mst_product` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_mst_product_group
CREATE TABLE IF NOT EXISTS `tbl_mst_product_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_group_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_group_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_mst_product_group_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_mst_product_group: ~1 rows (approximately)
DELETE FROM `tbl_mst_product_group`;
/*!40000 ALTER TABLE `tbl_mst_product_group` DISABLE KEYS */;
INSERT INTO `tbl_mst_product_group` (`id`, `uuid`, `product_group_code`, `product_group_name`, `active`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`) VALUES
	(1, 'aafba090-c42e-4302-b08b-5915f4fe3b84', 'GEN', 'General', '1', 'admin', '2019-03-22 11:10:24', 'admin', '2019-04-09 09:10:06'),
	(2, 'd58597b0-2b7d-4677-9cff-535f1b02c91d', 'EXC', 'EXCLUSIVE', '1', 'admin', '2019-05-02 11:11:22', 'admin', '2019-05-02 11:11:22');
/*!40000 ALTER TABLE `tbl_mst_product_group` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_mst_raw_material
CREATE TABLE IF NOT EXISTS `tbl_mst_raw_material` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vpn_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_unit_buying` int(10) unsigned NOT NULL,
  `id_unit_usage` int(10) unsigned NOT NULL,
  `id_supplier` int(10) unsigned DEFAULT NULL,
  `qty_conversion` double(8,2) NOT NULL DEFAULT '0.00',
  `active` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_mst_raw_material_uuid_unique` (`uuid`),
  KEY `tbl_mst_raw_material_id_unit_selling_foreign` (`id_unit_buying`),
  KEY `tbl_mst_raw_material_id_unit_usage_foreign` (`id_unit_usage`),
  KEY `tbl_mst_raw_material_id_supplier_foreign` (`id_supplier`),
  CONSTRAINT `tbl_mst_raw_material_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `tbl_mst_supplier` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_mst_raw_material_id_unit_selling_foreign` FOREIGN KEY (`id_unit_buying`) REFERENCES `tbl_mst_unit` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_mst_raw_material_id_unit_usage_foreign` FOREIGN KEY (`id_unit_usage`) REFERENCES `tbl_mst_unit` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_mst_raw_material: ~20 rows (approximately)
DELETE FROM `tbl_mst_raw_material`;
/*!40000 ALTER TABLE `tbl_mst_raw_material` DISABLE KEYS */;
INSERT INTO `tbl_mst_raw_material` (`id`, `uuid`, `material_code`, `material_name`, `vpn_no`, `id_unit_buying`, `id_unit_usage`, `id_supplier`, `qty_conversion`, `active`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`) VALUES
	(1, 'c520e3c4-07cc-4395-88ae-64ac7d0c6398', '8.CP06.9500.VP', 'D38L/D98L Headlining Roof 6311-BZ620', NULL, 1, 1, 1, 1.00, '1', 'admin', '2019-04-10 08:33:13', 'admin', '2019-04-10 08:33:13'),
	(2, '647f39a7-9cf5-40d2-a2fa-760a190557ae', '2.5013.0001.00', 'Retainer Roof 63317-BZ010', NULL, 1, 1, 1, 1.00, '1', 'admin', '2019-04-10 08:34:12', 'admin', '2019-04-10 08:34:12'),
	(3, '5bc4b659-cca1-43cf-ba8a-f5791bd07743', '2.5013.0002.00', 'Retainer Roof 63317-BZ020', NULL, 1, 1, 1, 1.00, '1', 'admin', '2019-04-10 08:34:47', 'admin', '2019-04-10 08:34:47'),
	(4, '42ae6d28-048e-4d2f-aff9-88797cc17a81', '2.5013.0003.00', 'Retainer Roof 63317-BZ030', NULL, 1, 1, 1, 1.00, '1', 'admin', '2019-04-10 08:35:46', 'admin', '2019-04-10 08:35:46'),
	(5, '602fe736-b4ac-47a1-be8f-1f04802c20fb', '2.5013.0004.00', 'Retainer Roof 63317-BZ040', NULL, 1, 1, 1, 1.00, '1', 'admin', '2019-04-10 08:36:12', 'admin', '2019-04-10 08:36:12'),
	(6, '574deeb3-fa1a-4a6e-b49b-f820015f3c89', '2.5013.0005.00', 'Retainer Roof 63317-BZ150', NULL, 1, 1, 1, 1.00, '1', 'admin', '2019-04-10 08:36:33', 'admin', '2019-04-10 08:36:33'),
	(7, '53146d96-a522-48dc-b888-bbe26a35e57e', '2.5015.0003.00', 'Teroson SB 108L', NULL, 7, 4, 1, 15.00, '1', 'admin', '2019-04-10 08:37:15', 'admin', '2019-04-10 10:02:20'),
	(8, 'bfe58c38-7cad-410b-b502-2c568d8ec203', '3.7102.0012.00', 'Trolley', NULL, 8, 5, 1, 24.00, '1', 'admin', '2019-04-10 08:38:12', 'admin', '2019-04-10 10:01:20'),
	(9, '1a3f1005-41c6-4733-a547-992918cd101a', '2.1005.0001.00', 'Packing Bag', NULL, 6, 1, 1, 12.00, '1', 'admin', '2019-04-10 08:38:33', 'admin', '2019-04-10 10:02:42'),
	(10, 'af99d726-42a5-4cd0-bc6b-f89044b3cce3', '2.5003.0003.00', 'Non Woven Fabric; DTP 180gsm; color 105B; w 1380mm', '2.5003.0003.00', 10, 9, 1, 133.86, '1', 'admin', '2019-05-02 11:16:50', 'admin', '2019-05-02 11:18:03'),
	(11, '11fb0d2c-6220-412f-b777-2d1d6d590e6c', '2.5002.0001.00', 'Film Thermofusible, DWPP4214, Aichi, t=42micron, w=1360mm', '2.5002.0001.00', 10, 9, 1, 1360.00, '1', 'admin', '2019-05-02 11:19:33', 'admin', '2019-05-02 11:19:33'),
	(12, '712321b7-ed6c-468a-9ecf-3a9d5826f177', '2.5002.0002.00', 'Glass R/F Chopped Strand Mat, 100gsm, E glass, Powder, w=1330mm', '2.5002.0002.00', 10, 4, 1, 32.00, '1', 'admin', '2019-05-02 11:21:09', 'admin', '2019-05-02 11:32:09'),
	(13, '6c49128d-ce18-4844-99cb-a3813fa55c00', '2.5002.0003.00', 'Glass R/F Chopped Strand Mat, 180gsm, E glass, Powder, w=1330mm', '2.5002.0003.00', 10, 4, 1, 36.00, '1', 'admin', '2019-05-02 11:22:08', 'admin', '2019-05-02 11:22:23'),
	(14, 'dad955e8-e209-44c9-8145-5252ba7d44f9', '2.5003.0109.00', 'PU HD; Semi Rigid Foam, t=6.0mm; d=33; 2450x1300', '2.5003.0109.00', 6, 11, 1, 70.00, '1', 'admin', '2019-05-02 11:23:28', 'admin', '2019-05-02 11:24:03'),
	(15, 'f80db848-9827-44a0-a60b-c6dc9654e80c', '2.5003.0110.00', 'PU HD; Semi Rigid Foam, t=4.5mm; d=33; 800x300', '2.5003.0110.00', 6, 11, 1, 1.00, '1', 'admin', '2019-05-02 11:25:45', 'admin', '2019-05-02 11:25:45'),
	(16, 'bf4f899f-42c4-4378-b74c-afb4fa39d68d', '2.5003.0004.00', 'Fabric, Non Woven, Spun Bond PP, 40gsm PRBK040, w=1360mm, Black', '2.5003.0004.00', 10, 9, 1, 680.00, '1', 'admin', '2019-05-02 11:26:52', 'admin', '2019-05-02 11:26:52'),
	(17, 'fefbfc29-aa5f-4d5a-981e-6c51593f2d15', '2.5015.0002.00', 'Elasten KC-1975 C-B', '2.5015.0002.00', 12, 4, 1, 200.00, '1', 'admin', '2019-05-02 11:27:43', 'admin', '2019-05-02 11:28:08'),
	(18, 'd2630a8a-1384-4785-8f15-f829b7de5fbb', '2.5009.0004.00', 'Release Agent', '2.5009.0004.00', 4, 4, 1, 1.00, '1', 'admin', '2019-05-02 11:28:44', 'admin', '2019-05-02 11:28:44'),
	(19, '58309e7d-84b0-4844-a8ab-88f8039a6e54', '2.5008.0004.00', 'Chemical, Solvent, Freesol 4410', '2.5008.0004.00', 13, 4, 1, 5.00, '1', 'admin', '2019-05-02 11:29:31', 'admin', '2019-05-02 11:30:46'),
	(20, '286ab63a-4bf3-4f7f-b0ec-d4d0028ccd62', '2.5015.0005.00', 'Cleaner Smart 475', '2.5015.0005.00', 13, 4, 1, 25.00, '1', 'admin', '2019-05-02 11:30:05', 'admin', '2019-05-02 11:30:52'),
	(21, '95c906b2-2d81-4970-8950-e81691f67b92', '2.5015.0007.00', 'Methylene Chloride', '2.5015.0007.00', 13, 4, 1, 20.00, '1', 'admin', '2019-05-02 11:31:25', 'admin', '2019-05-02 11:31:25'),
	(22, 'f07afd0e-2357-4e1d-9618-b0060a8432bc', '2.5015.0006.00', 'Catalyst Oshca 33', '2.5015.0006.00', 7, 4, 1, 20.00, '1', 'admin', '2019-05-02 11:31:58', 'admin', '2019-05-09 10:35:31');
/*!40000 ALTER TABLE `tbl_mst_raw_material` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_mst_supplier
CREATE TABLE IF NOT EXISTS `tbl_mst_supplier` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_mst_supplier_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_mst_supplier: ~1 rows (approximately)
DELETE FROM `tbl_mst_supplier`;
/*!40000 ALTER TABLE `tbl_mst_supplier` DISABLE KEYS */;
INSERT INTO `tbl_mst_supplier` (`id`, `uuid`, `supplier_code`, `supplier_name`, `active`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`) VALUES
	(1, '30c85c5c-50db-49ff-8597-fac8518a4456', 'S0002', 'PT. DASA WINDU AGUNG', '1', 'admin', '2019-03-28 13:00:13', 'admin', '2019-04-23 13:52:01'),
	(2, '1177aaa5-9bc1-4381-b44d-59db44efed28', 'S0003', 'EXTERNAL', '1', 'admin', '2019-05-02 11:19:55', 'admin', '2019-05-29 16:02:09'),
	(3, '4cc3c23a-f204-4b30-a446-ced95acdff69', 'S0004', '123', '0', 'admin', '2019-05-16 10:58:50', 'admin', '2019-05-16 10:59:11'),
	(4, '0158fcff-c4d4-4130-9141-125cc576f73a', 'S0005', '345', '0', 'admin', '2019-09-11 11:08:20', 'admin', '2019-09-11 11:08:30');
/*!40000 ALTER TABLE `tbl_mst_supplier` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_mst_unit
CREATE TABLE IF NOT EXISTS `tbl_mst_unit` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_mst_unit_uuid_unique` (`uuid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_mst_unit: ~11 rows (approximately)
DELETE FROM `tbl_mst_unit`;
/*!40000 ALTER TABLE `tbl_mst_unit` DISABLE KEYS */;
INSERT INTO `tbl_mst_unit` (`id`, `uuid`, `unit_code`, `unit_name`, `active`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`) VALUES
	(1, '2371c541-751e-4940-8c72-a701bd4e195d', 'pcs', 'Pieces', '1', 'admin', '2019-04-05 16:16:42', 'admin', '2019-04-09 09:07:45'),
	(4, '53af043c-c541-4ce6-866a-bb4523e529c3', 'kg', 'Kilogram', '1', 'admin', '2019-04-09 09:07:56', 'admin', '2019-04-09 09:07:56'),
	(5, 'e66ccc8c-328f-4546-8e6e-612216da2878', 'unit', 'Unit', '1', 'admin', '2019-04-09 09:08:15', 'admin', '2019-04-23 13:43:05'),
	(6, '17311f9f-06ca-483c-a5a5-7d9dcfc2b0d6', 'bag', 'Bag', '1', 'admin', '2019-04-09 09:08:25', 'admin', '2019-04-09 09:08:25'),
	(7, '140d6966-d466-41fe-a791-00701316f95f', 'can', 'Can', '1', 'admin', '2019-04-10 08:40:45', 'admin', '2019-04-10 08:40:45'),
	(8, '22312298-8111-459b-b3d2-9b0b760a3ca0', 'trolley', 'Trolley', '1', 'admin', '2019-04-10 09:57:42', 'admin', '2019-05-02 08:28:00'),
	(9, '07be1639-f252-435d-b32d-07d0abd84c99', 'm', 'Meter', '1', 'admin', '2019-05-02 11:11:35', 'admin', '2019-05-02 11:17:11'),
	(10, '35f4a47a-5e5e-430c-a3ee-e2fb74c6435a', 'roll', 'Roll', '1', 'admin', '2019-05-02 11:17:23', 'admin', '2019-05-02 11:17:23'),
	(11, '942f16e2-09f2-4039-98ca-a890156dea16', 'sheet', 'Sheet', '1', 'admin', '2019-05-02 11:23:42', 'admin', '2019-05-02 11:23:42'),
	(12, '63ea353d-c798-4da3-8c1a-3ee53b690c48', 'drum', 'Drum', '1', 'admin', '2019-05-02 11:27:57', 'admin', '2019-05-02 11:27:57'),
	(13, '85e6677f-386d-4985-92a0-231039658528', 'jerry can', 'Jerry Can', '1', 'admin', '2019-05-02 11:30:26', 'admin', '2019-05-02 11:30:26');
/*!40000 ALTER TABLE `tbl_mst_unit` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_sys_counter_doc_number
CREATE TABLE IF NOT EXISTS `tbl_sys_counter_doc_number` (
  `trx_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx_month` int(11) DEFAULT NULL,
  `trx_year` int(11) DEFAULT NULL,
  `trx_curr_doc_number` int(11) NOT NULL DEFAULT '0',
  `trx_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_sys_counter_doc_number: ~10 rows (approximately)
DELETE FROM `tbl_sys_counter_doc_number`;
/*!40000 ALTER TABLE `tbl_sys_counter_doc_number` DISABLE KEYS */;
INSERT INTO `tbl_sys_counter_doc_number` (`trx_name`, `trx_month`, `trx_year`, `trx_curr_doc_number`, `trx_description`) VALUES
	('PPL', 9, 2019, 2, 'PRODUCTION_PLANNING'),
	('PPL', 10, 2019, 3, 'PRODUCTION_PLANNING'),
	('PPL', 8, 2019, 2, 'PRODUCTION_PLANNING'),
	('PPL', 7, 2019, 2, 'PRODUCTION_PLANNING'),
	('PPL', 6, 2019, 2, 'PRODUCTION_PLANNING'),
	('PAC', 10, 2019, 10, 'PRODUCTION_ACTUAL'),
	('PAC', 9, 2019, 13, 'PRODUCTION_ACTUAL'),
	('PPL', 5, 2019, 2, 'PRODUCTION_PLANNING'),
	('PPL', 4, 2019, 2, 'PRODUCTION_PLANNING'),
	('PAC', 11, 2019, 4, 'PRODUCTION_ACTUAL');
/*!40000 ALTER TABLE `tbl_sys_counter_doc_number` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_sys_users
CREATE TABLE IF NOT EXISTS `tbl_sys_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datetime_created` datetime DEFAULT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datetime_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_sys_users_uuid_unique` (`uuid`),
  UNIQUE KEY `tbl_sys_users_username_unique` (`username`),
  UNIQUE KEY `tbl_sys_users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_sys_users: ~6 rows (approximately)
DELETE FROM `tbl_sys_users`;
/*!40000 ALTER TABLE `tbl_sys_users` DISABLE KEYS */;
INSERT INTO `tbl_sys_users` (`id`, `uuid`, `name`, `username`, `email`, `password`, `remember_token`, `active`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`) VALUES
	(1, '8a78d0c1-b7e3-4201-923c-6e8a269579ce', 'administrator', 'admin_', 'admin_@mail.com', '$2y$10$Z1/WDBlOa4Ks.sBzyxZRyuP4v0tH5CdxM3V1g8iQIo6xsfstW5ugm', '11NEh8uBT9w2BXqtynCW3q6HOx6MKyLO1nI1GzqeNrYhfI45DcE7FZfG2Ojb', '1', 'admin', '2019-03-18 09:39:00', 'admin', '2019-03-19 15:07:18'),
	(2, '64b7a87d-5b99-4298-93b4-e7e93bf8f263', 'Kuswandi2', 'kuswandi', 'kuswandi@dwa.co.id', NULL, NULL, '0', 'admin', '2019-03-20 15:21:16', 'admin', '2019-03-20 15:22:17'),
	(3, '51538b26-012c-45c2-b58c-fed0b7664adc', 'x--x', 'x---x', 'demox@gmail.com', NULL, NULL, '1', 'admin', '2019-03-22 11:17:10', 'admin', '2019-04-05 13:38:33'),
	(4, 'd2052755-167b-4c9a-984c-e51c2f5f2c92', 'administrator2', 'admin2', 'admin2@mail.com', NULL, NULL, '0', 'admin', '2019-03-28 10:59:37', 'admin', '2019-03-28 10:59:43'),
	(5, '02844f12-a177-48f8-abca-85b052260784', 'Administrator', 'admin', 'admin@gmail.com', '$2y$10$zVF6BchoTnYqdu8Ts.PG0ukvtTV3shRQ/hLn4vKu4nNeeoruoB1Ky', 'pAIw82Zu8cUbprfn7K1ZlcJKVDPhjlFeGrBmgV7YC7L8803L3WeqEUyLdpb6', '1', NULL, NULL, NULL, NULL),
	(6, '63614566-01e5-4427-9d27-6a52ef28914a', 'abc', '123', 'abc@admin.com', NULL, NULL, '1', 'admin', '2019-11-07 09:49:00', 'admin', '2019-11-07 09:49:00');
/*!40000 ALTER TABLE `tbl_sys_users` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_trx_allocfg_dtl
CREATE TABLE IF NOT EXISTS `tbl_trx_allocfg_dtl` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_hdr` bigint(20) unsigned NOT NULL,
  `id_product` bigint(20) unsigned NOT NULL,
  `qty_alloc` double(12,5) NOT NULL DEFAULT '0.00000',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_trx_allocfg_dtl_uuid_unique` (`uuid`),
  KEY `tbl_trx_allocfg_dtl_id_hdr_foreign` (`id_hdr`),
  KEY `tbl_trx_allocfg_dtl_id_product_foreign` (`id_product`),
  CONSTRAINT `tbl_trx_allocfg_dtl_id_hdr_foreign` FOREIGN KEY (`id_hdr`) REFERENCES `tbl_trx_allocfg_hdr` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_trx_allocfg_dtl_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `tbl_mst_product` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_trx_allocfg_dtl: ~0 rows (approximately)
DELETE FROM `tbl_trx_allocfg_dtl`;
/*!40000 ALTER TABLE `tbl_trx_allocfg_dtl` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_trx_allocfg_dtl` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_trx_allocfg_hdr
CREATE TABLE IF NOT EXISTS `tbl_trx_allocfg_hdr` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_date` date DEFAULT NULL,
  `doc_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `active` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_trx_allocfg_hdr_uuid_unique` (`uuid`),
  UNIQUE KEY `tbl_trx_allocfg_hdr_doc_no_unique` (`doc_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_trx_allocfg_hdr: ~0 rows (approximately)
DELETE FROM `tbl_trx_allocfg_hdr`;
/*!40000 ALTER TABLE `tbl_trx_allocfg_hdr` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_trx_allocfg_hdr` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_trx_do_dtl
CREATE TABLE IF NOT EXISTS `tbl_trx_do_dtl` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_hdr` bigint(20) unsigned NOT NULL,
  `id_product` bigint(20) unsigned NOT NULL,
  `qty_do` double(12,5) NOT NULL DEFAULT '0.00000',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_trx_do_dtl_uuid_unique` (`uuid`),
  KEY `tbl_trx_do_dtl_id_hdr_foreign` (`id_hdr`),
  KEY `tbl_trx_do_dtl_id_product_foreign` (`id_product`),
  CONSTRAINT `tbl_trx_do_dtl_id_hdr_foreign` FOREIGN KEY (`id_hdr`) REFERENCES `tbl_trx_do_hdr` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_trx_do_dtl_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `tbl_mst_product` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_trx_do_dtl: ~0 rows (approximately)
DELETE FROM `tbl_trx_do_dtl`;
/*!40000 ALTER TABLE `tbl_trx_do_dtl` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_trx_do_dtl` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_trx_do_hdr
CREATE TABLE IF NOT EXISTS `tbl_trx_do_hdr` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_date` date DEFAULT NULL,
  `doc_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driver_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loading_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `active` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_trx_do_hdr_uuid_unique` (`uuid`),
  UNIQUE KEY `tbl_trx_do_hdr_doc_no_unique` (`doc_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_trx_do_hdr: ~1 rows (approximately)
DELETE FROM `tbl_trx_do_hdr`;
/*!40000 ALTER TABLE `tbl_trx_do_hdr` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_trx_do_hdr` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_trx_gr_dtl
CREATE TABLE IF NOT EXISTS `tbl_trx_gr_dtl` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_hdr` bigint(20) unsigned NOT NULL,
  `id_raw_material` bigint(20) unsigned NOT NULL,
  `qty_gr` double(12,5) NOT NULL DEFAULT '0.00000',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_trx_gr_dtl_uuid_unique` (`uuid`),
  KEY `tbl_trx_gr_dtl_id_hdr_foreign` (`id_hdr`),
  KEY `tbl_trx_gr_dtl_id_raw_material_foreign` (`id_raw_material`),
  CONSTRAINT `tbl_trx_gr_dtl_id_hdr_foreign` FOREIGN KEY (`id_hdr`) REFERENCES `tbl_trx_gr_hdr` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_trx_gr_dtl_id_raw_material_foreign` FOREIGN KEY (`id_raw_material`) REFERENCES `tbl_mst_raw_material` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Goods Receive Raw Material - Detail';

-- Dumping data for table db_edhil.tbl_trx_gr_dtl: ~0 rows (approximately)
DELETE FROM `tbl_trx_gr_dtl`;
/*!40000 ALTER TABLE `tbl_trx_gr_dtl` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_trx_gr_dtl` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_trx_gr_hdr
CREATE TABLE IF NOT EXISTS `tbl_trx_gr_hdr` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_date` date DEFAULT NULL,
  `doc_time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reff_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_supplier` int(10) unsigned NOT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `active` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_trx_gr_hdr_uuid_unique` (`uuid`),
  UNIQUE KEY `tbl_trx_gr_hdr_doc_no_unique` (`doc_no`),
  KEY `tbl_trx_gr_hdr_id_supplier_foreign` (`id_supplier`),
  CONSTRAINT `tbl_trx_gr_hdr_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `tbl_mst_supplier` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Goods Receive Raw Material - Header';

-- Dumping data for table db_edhil.tbl_trx_gr_hdr: ~1 rows (approximately)
DELETE FROM `tbl_trx_gr_hdr`;
/*!40000 ALTER TABLE `tbl_trx_gr_hdr` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_trx_gr_hdr` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_trx_matreq_dtl
CREATE TABLE IF NOT EXISTS `tbl_trx_matreq_dtl` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_hdr` bigint(20) unsigned NOT NULL,
  `id_raw_material` bigint(20) unsigned NOT NULL,
  `qty_matreq` double(12,5) NOT NULL DEFAULT '0.00000',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_trx_matreq_dtl_uuid_unique` (`uuid`),
  KEY `tbl_trx_matreq_dtl_id_hdr_foreign` (`id_hdr`),
  KEY `tbl_trx_matreq_dtl_id_raw_material_foreign` (`id_raw_material`),
  CONSTRAINT `tbl_trx_matreq_dtl_id_hdr_foreign` FOREIGN KEY (`id_hdr`) REFERENCES `tbl_trx_matreq_hdr` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_trx_matreq_dtl_id_raw_material_foreign` FOREIGN KEY (`id_raw_material`) REFERENCES `tbl_mst_raw_material` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_trx_matreq_dtl: ~0 rows (approximately)
DELETE FROM `tbl_trx_matreq_dtl`;
/*!40000 ALTER TABLE `tbl_trx_matreq_dtl` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_trx_matreq_dtl` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_trx_matreq_hdr
CREATE TABLE IF NOT EXISTS `tbl_trx_matreq_hdr` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_date` date DEFAULT NULL,
  `doc_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `active` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_trx_matreq_hdr_uuid_unique` (`uuid`),
  UNIQUE KEY `tbl_trx_matreq_hdr_doc_no_unique` (`doc_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_trx_matreq_hdr: ~0 rows (approximately)
DELETE FROM `tbl_trx_matreq_hdr`;
/*!40000 ALTER TABLE `tbl_trx_matreq_hdr` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_trx_matreq_hdr` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_trx_matusage_dtl
CREATE TABLE IF NOT EXISTS `tbl_trx_matusage_dtl` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_hdr` bigint(20) unsigned NOT NULL,
  `id_raw_material` bigint(20) unsigned NOT NULL,
  `id_unit` int(10) unsigned NOT NULL,
  `qty_matusage` double(12,5) NOT NULL DEFAULT '0.00000',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_trx_matusage_dtl_uuid_unique` (`uuid`),
  KEY `tbl_trx_matusage_dtl_id_hdr_foreign` (`id_hdr`),
  KEY `tbl_trx_matusage_dtl_id_raw_material_foreign` (`id_raw_material`),
  KEY `tbl_trx_matusage_dtl_id_unit_foreign` (`id_unit`),
  CONSTRAINT `tbl_trx_matusage_dtl_id_hdr_foreign` FOREIGN KEY (`id_hdr`) REFERENCES `tbl_trx_matusage_hdr` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_trx_matusage_dtl_id_raw_material_foreign` FOREIGN KEY (`id_raw_material`) REFERENCES `tbl_mst_raw_material` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_trx_matusage_dtl_id_unit_foreign` FOREIGN KEY (`id_unit`) REFERENCES `tbl_mst_unit` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_trx_matusage_dtl: ~0 rows (approximately)
DELETE FROM `tbl_trx_matusage_dtl`;
/*!40000 ALTER TABLE `tbl_trx_matusage_dtl` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_trx_matusage_dtl` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_trx_matusage_hdr
CREATE TABLE IF NOT EXISTS `tbl_trx_matusage_hdr` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_date` date DEFAULT NULL,
  `doc_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `active` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_trx_matusage_hdr_uuid_unique` (`uuid`),
  UNIQUE KEY `tbl_trx_matusage_hdr_doc_no_unique` (`doc_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_trx_matusage_hdr: ~0 rows (approximately)
DELETE FROM `tbl_trx_matusage_hdr`;
/*!40000 ALTER TABLE `tbl_trx_matusage_hdr` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_trx_matusage_hdr` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_trx_prodactual_dtl
CREATE TABLE IF NOT EXISTS `tbl_trx_prodactual_dtl` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_hdr` bigint(20) unsigned NOT NULL,
  `id_product` bigint(20) unsigned NOT NULL,
  `qty_ok` double(12,5) NOT NULL DEFAULT '0.00000',
  `qty_reject` double(12,5) NOT NULL DEFAULT '0.00000' COMMENT 'alias = qty scrap',
  `qty_rework` double(12,5) NOT NULL DEFAULT '0.00000',
  `qty_total` double(12,5) NOT NULL DEFAULT '0.00000',
  `time_start` time NOT NULL DEFAULT '00:00:00',
  `time_finish` time NOT NULL DEFAULT '00:00:00',
  `time_total` float NOT NULL DEFAULT '0',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_trx_prodactual_dtl_uuid_unique` (`uuid`),
  KEY `tbl_trx_prodactual_dtl_id_hdr_foreign` (`id_hdr`),
  KEY `tbl_trx_prodactual_dtl_id_product_foreign` (`id_product`),
  CONSTRAINT `tbl_trx_prodactual_dtl_id_hdr_foreign` FOREIGN KEY (`id_hdr`) REFERENCES `tbl_trx_prodactual_hdr` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_trx_prodactual_dtl_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `tbl_mst_product` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_trx_prodactual_dtl: ~31 rows (approximately)
DELETE FROM `tbl_trx_prodactual_dtl`;
/*!40000 ALTER TABLE `tbl_trx_prodactual_dtl` DISABLE KEYS */;
INSERT INTO `tbl_trx_prodactual_dtl` (`id`, `uuid`, `id_hdr`, `id_product`, `qty_ok`, `qty_reject`, `qty_rework`, `qty_total`, `time_start`, `time_finish`, `time_total`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`) VALUES
	(1, '5f6761e5-99f8-478f-918e-ac42f2c0e5c3', 30, 1, 362.00000, 3.00000, 30.00000, 395.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:36:31', 'admin', '2019-11-06 16:36:31'),
	(2, '9ac473a3-4acd-4fc3-b90e-1a5f9b27fc8c', 31, 1, 264.00000, 2.00000, 20.00000, 286.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:48:09', 'admin', '2019-11-06 16:48:09'),
	(3, 'b917628b-8778-4777-80cd-c46b707b2479', 32, 1, 359.00000, 1.00000, 29.00000, 389.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:52:31', 'admin', '2019-11-06 16:52:31'),
	(4, 'a592f46c-4f26-4806-8906-41a49254233b', 33, 1, 264.00000, 1.00000, 20.00000, 285.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:55:53', 'admin', '2019-11-06 16:55:53'),
	(5, 'da57341f-8e27-419e-addb-a18a7a981398', 34, 1, 359.00000, 4.00000, 38.00000, 401.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-07 07:44:32', 'admin', '2019-11-07 07:44:32'),
	(6, '69c96d4c-85a9-4df3-8941-bc5ffabf8b1e', 35, 1, 262.00000, 2.00000, 25.00000, 289.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-07 07:49:56', 'admin', '2019-11-07 07:49:56'),
	(7, '30a3d6d1-eec7-4084-9594-06858e342e5f', 36, 1, 359.00000, 3.00000, 36.00000, 398.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-07 07:56:17', 'admin', '2019-11-07 07:56:17'),
	(8, '6709e428-caec-4d77-9d05-febff7a84fa4', 37, 1, 215.00000, 2.00000, 7.00000, 224.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-07 08:07:10', 'admin', '2019-11-07 08:07:10'),
	(9, 'c07f7cce-4339-41bb-b3ed-6f925bf9e4b7', 38, 1, 361.00000, 4.00000, 39.00000, 404.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-07 08:15:55', 'admin', '2019-11-07 08:15:55'),
	(10, '5d22bff1-b5e9-4a56-a087-1b1b7caa83e7', 39, 3, 250.00000, 2.00000, 11.00000, 263.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-07 08:18:00', 'admin', '2019-11-07 08:18:00'),
	(11, '4356f7b0-936a-43fe-b7fc-6479f65525f9', 40, 1, 56.00000, 1.00000, 6.00000, 63.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-07 08:59:07', 'admin', '2019-11-07 08:59:07'),
	(12, 'e1e90b18-52e8-4dc0-aa87-cd16e83e9525', 41, 1, 223.00000, 2.00000, 18.00000, 243.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-07 09:41:55', 'admin', '2019-11-07 09:41:55'),
	(13, '091a404b-9637-453f-b772-9b4e418b42cf', 42, 1, 238.00000, 2.00000, 12.00000, 252.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-07 09:46:14', 'admin', '2019-11-07 09:46:14'),
	(14, 'bbcb10e0-9165-464a-8594-b5202755d372', 43, 1, 210.00000, 3.00000, 32.00000, 245.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-07 11:20:29', 'admin', '2019-11-07 11:20:29'),
	(15, '2d85bb07-10ce-4dfd-a915-b207d8881077', 44, 1, 183.00000, 0.00000, 8.00000, 191.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-07 11:31:24', 'admin', '2019-11-07 11:31:24'),
	(16, 'd8248562-2099-4306-b968-d62d3d260741', 44, 3, 72.00000, 4.00000, 8.00000, 84.00000, '08:00:00', '19:00:00', 660, 'admin', '2019-11-20 07:43:13', 'admin', '2019-11-20 07:43:13'),
	(17, '7b6c3220-ec41-43f2-90d5-a2344268754b', 45, 1, 143.00000, 1.00000, 10.00000, 154.00000, '08:00:00', '19:00:00', 660, 'admin', '2019-11-20 07:47:17', 'admin', '2019-11-20 07:47:17'),
	(18, '9f837c21-f5a2-4f6e-a6d3-488a310bf1fd', 45, 3, 72.00000, 0.00000, 7.00000, 79.00000, '08:00:00', '19:00:00', 660, 'admin', '2019-11-20 07:48:17', 'admin', '2019-11-20 07:48:59'),
	(19, '7267e48c-9865-4af2-8e74-c61aea056fdb', 46, 1, 253.00000, 1.00000, 13.00000, 267.00000, '08:00:00', '19:00:00', 660, 'admin', '2019-11-20 07:59:53', 'admin', '2019-11-20 07:59:53'),
	(20, '54d6bf0f-811f-40d1-a00b-e3315dd57dd3', 47, 1, 178.00000, 2.00000, 10.00000, 190.00000, '08:00:00', '19:00:00', 660, 'admin', '2019-11-20 08:15:28', 'admin', '2019-11-20 08:15:28'),
	(21, '58527c06-78d4-46da-bad0-c39588077b58', 47, 3, 69.00000, 1.00000, 2.00000, 72.00000, '08:00:00', '19:00:00', 660, 'admin', '2019-11-20 08:16:21', 'admin', '2019-11-20 08:16:21'),
	(22, '2e8115e6-e856-48b0-8b91-4014859b6bc1', 48, 1, 252.00000, 1.00000, 11.00000, 264.00000, '08:00:00', '19:00:00', 660, 'admin', '2019-11-20 08:18:06', 'admin', '2019-11-20 08:18:06'),
	(23, '629120a6-31f2-457e-b176-4595b719158a', 49, 1, 250.00000, 2.00000, 16.00000, 268.00000, '08:00:00', '19:00:00', 660, 'admin', '2019-11-20 08:19:38', 'admin', '2019-11-20 08:19:38'),
	(24, '85d3713c-53c1-4210-8988-15f6752ac802', 50, 1, 251.00000, 2.00000, 19.00000, 272.00000, '08:00:00', '19:00:00', 660, 'admin', '2019-11-20 08:20:51', 'admin', '2019-11-20 08:20:51'),
	(25, 'e996cf10-a960-4e13-ba2f-441fc1e010c1', 51, 1, 179.00000, 3.00000, 9.00000, 191.00000, '08:00:00', '19:00:00', 660, 'admin', '2019-11-20 08:23:30', 'admin', '2019-11-20 08:23:30'),
	(26, '377b7d0c-c9e3-487c-95bf-d9f3c108d9dd', 51, 3, 75.00000, 0.00000, 7.00000, 82.00000, '08:00:00', '19:00:00', 660, 'admin', '2019-11-20 08:24:12', 'admin', '2019-11-20 08:24:12'),
	(27, 'da8c8409-d2ab-458c-8492-2a657b8f86df', 52, 1, 253.00000, 2.00000, 12.00000, 267.00000, '08:00:00', '19:00:00', 660, 'admin', '2019-11-20 08:25:38', 'admin', '2019-11-20 08:25:38'),
	(28, '03d175c3-510c-4238-a906-51316a7e6b50', 54, 1, 228.00000, 2.00000, 21.00000, 251.00000, '08:00:00', '19:00:00', 660, 'admin', '2019-11-20 08:34:48', 'admin', '2019-11-20 08:34:48'),
	(29, '2fb697c0-8cbb-41c9-b7ea-d734b925a6e5', 55, 1, 240.00000, 2.00000, 4.00000, 246.00000, '08:00:00', '19:00:00', 660, 'admin', '2019-11-20 08:45:27', 'admin', '2019-11-20 08:45:27'),
	(30, 'a3a341b7-d792-4111-b55c-c17df93cbb94', 56, 1, 94.00000, 2.00000, 1.00000, 97.00000, '08:00:00', '19:00:00', 660, 'admin', '2019-11-20 09:39:37', 'admin', '2019-11-20 09:39:37'),
	(31, '714e68b3-02ee-44a6-b4a5-9065472b399c', 57, 1, 209.00000, 2.00000, 2.00000, 213.00000, '08:00:00', '19:00:00', 660, 'admin', '2019-11-20 09:40:42', 'admin', '2019-11-20 09:40:42');
/*!40000 ALTER TABLE `tbl_trx_prodactual_dtl` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_trx_prodactual_hdr
CREATE TABLE IF NOT EXISTS `tbl_trx_prodactual_hdr` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_date` date DEFAULT NULL,
  `doc_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prod_actual_date` date DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `active` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_trx_prodactual_hdr_uuid_unique` (`uuid`),
  UNIQUE KEY `tbl_trx_prodactual_hdr_doc_no_unique` (`doc_no`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_trx_prodactual_hdr: ~27 rows (approximately)
DELETE FROM `tbl_trx_prodactual_hdr`;
/*!40000 ALTER TABLE `tbl_trx_prodactual_hdr` DISABLE KEYS */;
INSERT INTO `tbl_trx_prodactual_hdr` (`id`, `uuid`, `doc_no`, `doc_date`, `doc_time`, `prod_actual_date`, `remarks`, `active`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`) VALUES
	(30, '5ecba58d-7243-436b-a1b2-34b5cc171c8d', 'PAC-1910-0001', '2019-10-02', '16:33:15', '2019-10-02', NULL, '1', 'admin', '2019-11-06 16:33:15', 'admin', '2019-11-06 16:57:21'),
	(31, 'b06b7377-bedb-4f33-99e9-727febf625ec', 'PAC-1910-0002', '2019-10-03', '16:43:59', '2019-10-03', NULL, '1', 'admin', '2019-11-06 16:43:59', 'admin', '2019-11-06 16:50:11'),
	(32, 'c0128647-d098-4217-bac5-5620ed50387c', 'PAC-1910-0003', '2019-10-04', '16:50:11', '2019-10-04', NULL, '1', 'admin', '2019-11-06 16:50:11', 'admin', '2019-11-06 16:52:06'),
	(33, 'a329c0e2-2f4d-425a-95af-6a593c1ad591', 'PAC-1910-0004', '2019-10-05', '16:55:03', '2019-10-05', NULL, '1', 'admin', '2019-11-06 16:55:03', 'admin', '2019-11-06 16:55:03'),
	(34, 'a33dedd4-41a1-4cdf-ab6b-52bce9e2051c', 'PAC-1910-0005', '2019-10-14', '07:43:27', '2019-10-14', NULL, '1', 'admin', '2019-11-07 07:43:27', 'admin', '2019-11-07 07:43:27'),
	(35, '11e127f1-f9f9-4f0d-b3aa-1ef14cd225ea', 'PAC-1910-0006', '2019-10-15', '07:49:12', '2019-10-15', NULL, '1', 'admin', '2019-11-07 07:49:12', 'admin', '2019-11-07 07:49:12'),
	(36, '5e0da5d5-1370-47f5-9d85-a22da43a0976', 'PAC-1910-0007', '2019-10-16', '07:55:26', '2019-10-16', NULL, '1', 'admin', '2019-11-07 07:55:26', 'admin', '2019-11-07 07:55:26'),
	(37, '6acf376c-8b15-49a7-99d1-875e0609aa96', 'PAC-1910-0008', '2019-10-17', '08:03:33', '2019-10-17', NULL, '1', 'admin', '2019-11-07 08:03:33', 'admin', '2019-11-07 08:03:33'),
	(38, '6ff2e05f-3441-440d-93da-dbfaf0c186de', 'PAC-1910-0009', '2019-10-18', '08:14:47', '2019-10-18', NULL, '1', 'admin', '2019-11-07 08:14:47', 'admin', '2019-11-07 08:14:47'),
	(39, '09f97f3e-2b26-42bf-9e2f-aa33b1fd46a0', 'PAC-1910-0010', '2019-10-01', '08:16:55', '2019-10-01', NULL, '1', 'admin', '2019-11-07 08:16:55', 'admin', '2019-11-15 15:09:00'),
	(40, '8888ef12-5946-4922-b9b6-e839c52f95d6', 'PAC-1909-0001', '2019-09-03', '08:57:57', '2019-09-03', NULL, '1', 'admin', '2019-11-07 08:57:57', 'admin', '2019-11-07 08:57:57'),
	(41, '29c8b14a-6465-410d-937d-a0f5a6e45b5b', 'PAC-1909-0002', '2019-09-06', '09:02:26', '2019-09-06', NULL, '1', 'admin', '2019-11-07 09:02:26', 'admin', '2019-11-07 09:40:54'),
	(42, 'a5616be4-ebce-461f-ae75-802813d0d06b', 'PAC-1909-0003', '2019-09-07', '09:45:28', '2019-09-07', NULL, '1', 'admin', '2019-11-07 09:45:28', 'admin', '2019-11-07 09:52:47'),
	(43, 'f05df5f3-777e-41b1-8f0e-f888b27e30f1', 'PAC-1909-0004', '2019-09-10', '07:40:53', '2019-09-10', NULL, '1', 'admin', '2019-11-07 11:19:45', 'admin', '2019-11-20 07:40:53'),
	(44, '70b0a0b6-1a8f-4263-9f7b-7db969bf7efe', 'PAC-1909-0005', '2019-09-11', '07:41:26', '2019-09-11', NULL, '1', 'admin', '2019-11-07 11:30:11', 'admin', '2019-11-20 07:41:26'),
	(45, '303c3c07-c1d0-4465-8b66-3c277dd5ad9f', 'PAC-1909-0006', '2019-09-17', '07:46:23', '2019-09-17', NULL, '1', 'admin', '2019-11-20 07:45:57', 'admin', '2019-11-20 07:46:23'),
	(46, '6dcd3f9a-4891-47b0-ba9f-73e43221d167', 'PAC-1909-0007', '2019-09-18', '08:14:26', '2019-09-18', NULL, '1', 'admin', '2019-11-20 07:56:03', 'admin', '2019-11-20 08:14:26'),
	(47, 'ea685d15-8404-4d53-8adf-9c3fd555ba9d', 'PAC-1909-0008', '2019-09-19', '08:14:36', '2019-09-19', NULL, '1', 'admin', '2019-11-20 08:02:03', 'admin', '2019-11-20 08:14:36'),
	(48, '6adbf101-c86a-484e-97ef-faa9bbd708c4', 'PAC-1909-0009', '2019-09-20', '08:17:26', '2019-09-20', NULL, '1', 'admin', '2019-11-20 08:17:26', 'admin', '2019-11-20 08:17:26'),
	(49, '7b66c049-ada4-45aa-b233-a36aebed51a7', 'PAC-1909-0010', '2019-09-23', '08:19:02', '2019-09-23', NULL, '1', 'admin', '2019-11-20 08:19:02', 'admin', '2019-11-20 08:19:02'),
	(50, '801708c0-2b10-4511-a2b0-e11aa8b6ca99', 'PAC-1909-0011', '2019-09-24', '08:20:13', '2019-09-24', NULL, '1', 'admin', '2019-11-20 08:20:13', 'admin', '2019-11-20 08:20:13'),
	(51, 'aaa54f72-05bf-4e1d-acd6-56431e95b27f', 'PAC-1909-0012', '2019-09-25', '08:21:21', '2019-09-25', NULL, '1', 'admin', '2019-11-20 08:21:21', 'admin', '2019-11-20 08:21:21'),
	(52, '64b57764-5f45-467a-ad14-5bc239b75b8e', 'PAC-1909-0013', '2019-09-26', '08:24:49', '2019-09-26', NULL, '1', 'admin', '2019-11-20 08:24:49', 'admin', '2019-11-20 08:24:49'),
	(54, '04e8fdde-cf3b-4ac6-96f9-d1ff5b52b8c9', 'PAC-1911-0001', '2019-11-20', '08:34:06', '2019-08-01', NULL, '1', 'admin', '2019-11-20 08:34:06', 'admin', '2019-11-20 08:34:06'),
	(55, '55981e37-c275-4398-8b7e-9373f0202c84', 'PAC-1911-0002', '2019-11-20', '08:44:37', '2019-08-06', NULL, '1', 'admin', '2019-11-20 08:44:37', 'admin', '2019-11-20 08:44:37'),
	(56, 'ee1905fb-234c-4f9e-bdcf-45dd25548fa5', 'PAC-1911-0003', '2019-11-20', '09:38:10', '2019-08-07', NULL, '1', 'admin', '2019-11-20 09:38:10', 'admin', '2019-11-20 09:38:10'),
	(57, 'b2374d20-3c65-4dd5-a14b-defcbd52ad1c', 'PAC-1911-0004', '2019-11-20', '10:41:57', '2019-08-08', NULL, '1', 'admin', '2019-11-20 09:40:08', 'admin', '2019-11-20 10:41:57');
/*!40000 ALTER TABLE `tbl_trx_prodactual_hdr` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_trx_prodplan_dtl
CREATE TABLE IF NOT EXISTS `tbl_trx_prodplan_dtl` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_hdr` bigint(20) unsigned NOT NULL,
  `id_product` bigint(20) unsigned NOT NULL,
  `day_prodplan` int(11) DEFAULT NULL COMMENT '1, 2, 3, ...',
  `date_prodplan` date DEFAULT NULL COMMENT '1/1/2019, 1/2/2019, ...',
  `qty_prodplan` double(12,5) NOT NULL DEFAULT '0.00000',
  `time_start` time DEFAULT '00:00:00',
  `time_finish` time DEFAULT '00:00:00',
  `time_total` float NOT NULL DEFAULT '0',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_trx_prodplan_dtl_uuid_unique` (`uuid`),
  KEY `tbl_trx_prodplan_dtl_id_hdr_foreign` (`id_hdr`),
  KEY `tbl_trx_prodplan_dtl_id_product_foreign` (`id_product`),
  CONSTRAINT `tbl_trx_prodplan_dtl_id_hdr_foreign` FOREIGN KEY (`id_hdr`) REFERENCES `tbl_trx_prodplan_hdr` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `tbl_trx_prodplan_dtl_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `tbl_mst_product` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_trx_prodplan_dtl: ~124 rows (approximately)
DELETE FROM `tbl_trx_prodplan_dtl`;
/*!40000 ALTER TABLE `tbl_trx_prodplan_dtl` DISABLE KEYS */;
INSERT INTO `tbl_trx_prodplan_dtl` (`id`, `uuid`, `id_hdr`, `id_product`, `day_prodplan`, `date_prodplan`, `qty_prodplan`, `time_start`, `time_finish`, `time_total`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`) VALUES
	(1, '0cc05d45-0d9b-4849-8201-51c89d69f3dd', 3, 1, 2, '2019-10-02', 360.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 13:41:48', 'admin', '2019-11-06 13:41:48'),
	(2, 'ea3684fb-c0c6-44dd-9525-836971c110fa', 3, 1, 3, '2019-10-03', 264.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 13:42:01', 'admin', '2019-11-06 13:42:01'),
	(3, 'f748da29-52f0-453f-929b-9d43789bf0d0', 3, 1, 4, '2019-10-04', 360.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 13:42:29', 'admin', '2019-11-06 13:42:29'),
	(4, '1fbf8b4f-12e8-4dd9-9464-96e63d49496f', 3, 1, 5, '2019-10-05', 264.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 13:42:40', 'admin', '2019-11-06 13:42:40'),
	(5, '765e1e7f-c161-4c2d-807a-b0804fdbd85f', 3, 1, 14, '2019-10-14', 360.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 13:44:37', 'admin', '2019-11-06 13:44:37'),
	(6, 'bd8292a6-9d06-4206-91c5-7b081b1a6225', 3, 1, 15, '2019-10-15', 264.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 13:44:47', 'admin', '2019-11-06 13:44:47'),
	(7, '99f08291-d4c3-4615-9fbd-c07254886df8', 3, 1, 16, '2019-10-16', 360.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 13:45:06', 'admin', '2019-11-06 13:45:06'),
	(8, '57dc8d8a-2189-45c1-8c51-67f815318d1e', 3, 1, 17, '2019-10-17', 264.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 13:45:17', 'admin', '2019-11-06 13:45:17'),
	(9, '14bcb36a-ac5c-401c-9001-9cdbb7bdc20c', 3, 1, 18, '2019-10-18', 360.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 13:45:35', 'admin', '2019-11-06 13:45:35'),
	(10, 'eb0a7cae-9a0b-45a1-94a4-00b64124cceb', 4, 3, 1, '2019-10-01', 264.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 13:48:08', 'admin', '2019-11-06 13:48:08'),
	(11, '08e5b8d1-7e4e-4542-9dd0-3f51b4198797', 5, 3, 11, '2019-09-11', 72.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 13:53:56', 'admin', '2019-11-06 13:53:56'),
	(12, 'b71be0fc-8c34-464b-b987-a17dd0656880', 5, 3, 17, '2019-09-17', 72.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 13:54:21', 'admin', '2019-11-06 13:54:21'),
	(13, '22deced8-7b82-43ae-b812-d61e4194bb10', 5, 3, 19, '2019-09-19', 72.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 13:54:27', 'admin', '2019-11-06 13:54:27'),
	(14, '4dd504af-c748-4673-a5d4-c19a613f6d31', 5, 3, 25, '2019-09-25', 72.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 13:54:34', 'admin', '2019-11-06 13:54:34'),
	(15, 'c583242a-99d1-4dbf-8dee-7333973a5945', 6, 1, 3, '2019-09-03', 144.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 14:00:11', 'admin', '2019-11-06 14:00:11'),
	(16, '014e6127-6e31-4273-a606-b124d0a20c05', 6, 1, 4, '2019-09-04', 250.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 14:00:44', 'admin', '2019-11-06 14:00:44'),
	(17, 'b6eba326-1b01-41de-b34e-e22b84440e85', 6, 1, 5, '2019-09-05', 250.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 14:01:18', 'admin', '2019-11-06 14:01:18'),
	(18, 'c7fcced4-62a0-47f4-a793-aa194ab3b711', 6, 1, 6, '2019-09-06', 250.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 14:01:37', 'admin', '2019-11-06 14:01:37'),
	(19, 'a38d91b4-4b02-4085-be61-46b587c75808', 6, 1, 10, '2019-09-10', 200.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 14:02:07', 'admin', '2019-11-06 14:02:07'),
	(20, 'ad94ce0e-96ca-4f4c-9499-5c5633e9a8c4', 6, 1, 11, '2019-09-11', 178.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 14:02:33', 'admin', '2019-11-06 14:02:33'),
	(21, '907a7325-358a-4cd0-9610-793c425f987a', 6, 1, 12, '2019-09-12', 250.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 14:02:48', 'admin', '2019-11-06 14:02:48'),
	(22, '1cad9c5b-160c-47fe-89f4-ca4847904817', 6, 1, 13, '2019-09-13', 130.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 14:03:06', 'admin', '2019-11-06 14:03:06'),
	(23, '851d8e8a-cdaa-4ef3-8bf8-ae028e84d4af', 6, 1, 17, '2019-09-17', 144.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 14:03:29', 'admin', '2019-11-06 14:03:29'),
	(24, '649eb03f-a1da-4d9f-b72f-7b8da8352db7', 6, 1, 18, '2019-09-18', 250.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 14:03:55', 'admin', '2019-11-06 14:03:55'),
	(25, 'd89f845d-cc09-455b-bf3c-b61229da87be', 6, 1, 26, '2019-09-26', 250.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 14:04:16', 'admin', '2019-11-06 15:22:32'),
	(26, '231a22fb-3fd3-42c6-9796-e9abfd7b126d', 7, 1, 1, '2019-08-01', 230.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:30:59', 'admin', '2019-11-06 15:30:59'),
	(27, '0a31a683-48ae-4df2-9232-e5750e98f5bb', 7, 1, 6, '2019-08-06', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:31:32', 'admin', '2019-11-06 15:31:32'),
	(28, '6ba68288-074e-4720-8afd-a8f5d90202d8', 7, 1, 7, '2019-08-07', 96.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:32:03', 'admin', '2019-11-06 15:32:03'),
	(29, '71f9b1da-02ed-4155-b0f9-7b9e5277cb7a', 7, 1, 8, '2019-08-08', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:32:30', 'admin', '2019-11-06 15:32:30'),
	(30, 'ca6c0c9e-e7ac-4059-8776-573597cdea3b', 7, 1, 9, '2019-08-09', 144.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:32:54', 'admin', '2019-11-06 15:32:54'),
	(31, '7d3d9c78-0068-4d28-a52c-788e1899faa8', 7, 1, 14, '2019-08-14', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:33:22', 'admin', '2019-11-06 15:33:22'),
	(32, 'e0ebf061-0b6b-418c-94de-c67fb4a42c6b', 7, 1, 15, '2019-08-15', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:33:43', 'admin', '2019-11-06 15:33:43'),
	(33, '57a49709-f9ff-4848-84e8-2263a0a1dfd7', 7, 1, 19, '2019-08-19', 200.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:34:23', 'admin', '2019-11-06 15:34:23'),
	(34, '0263a9a8-146b-4765-84de-f2610b30e6de', 7, 1, 20, '2019-08-20', 168.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:35:58', 'admin', '2019-11-06 15:35:58'),
	(35, '8920e9db-17c9-4dbb-96f6-05813b1bc152', 7, 1, 21, '2019-08-21', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:36:18', 'admin', '2019-11-06 15:36:18'),
	(36, '81ca41be-260e-47ca-8098-108112f9d5eb', 7, 1, 22, '2019-08-22', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:36:31', 'admin', '2019-11-06 15:36:31'),
	(37, '33cf96aa-cc06-483f-a609-297a49a17152', 7, 1, 23, '2019-08-23', 72.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:36:58', 'admin', '2019-11-06 15:36:58'),
	(38, '5dcee150-f9da-4877-b4c9-3f496730ffbb', 7, 1, 26, '2019-08-26', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:37:19', 'admin', '2019-11-06 15:37:19'),
	(39, '607812e9-0960-4c46-9daf-1e4d31250fb3', 7, 1, 27, '2019-08-27', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:37:45', 'admin', '2019-11-06 15:37:45'),
	(40, 'c2904800-f5c7-4c39-9c56-7c2c47081480', 7, 1, 28, '2019-08-28', 144.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:38:08', 'admin', '2019-11-06 15:38:08'),
	(41, '6effb69e-8707-4535-bdcd-1ec6540b363a', 7, 1, 29, '2019-08-29', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:38:29', 'admin', '2019-11-06 15:38:29'),
	(42, 'f317d8fb-1f31-4432-8940-da289033ecd3', 7, 1, 30, '2019-08-30', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:38:53', 'admin', '2019-11-06 15:38:53'),
	(43, 'f0b2ee64-5c8e-44a5-92f1-aab345b585ad', 8, 3, 2, '2019-08-02', 96.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:41:56', 'admin', '2019-11-06 15:41:56'),
	(44, 'daf56ffb-f0fe-4508-87ce-ee2bbf8ee641', 8, 3, 9, '2019-08-09', 96.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:42:26', 'admin', '2019-11-06 15:42:26'),
	(45, 'fb2b1c8e-e039-48bd-9848-52a85a76e6af', 8, 3, 20, '2019-08-20', 72.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:42:54', 'admin', '2019-11-06 15:42:54'),
	(46, '5b247892-df54-4a15-9f9f-fa17a8dd7feb', 8, 3, 23, '2019-08-23', 96.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:43:22', 'admin', '2019-11-06 15:43:22'),
	(47, 'a04acb0a-e033-411e-ab36-268eda23b542', 8, 3, 28, '2019-08-28', 96.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:43:37', 'admin', '2019-11-06 15:43:37'),
	(48, '4a2c526b-c2d5-4fd1-a461-8ea4227bfb72', 9, 1, 1, '2019-07-01', 120.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:55:03', 'admin', '2019-11-06 15:55:03'),
	(49, '02f68626-8f1e-4b30-a308-f13ade7d7e8f', 9, 1, 2, '2019-07-02', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:55:30', 'admin', '2019-11-06 15:55:30'),
	(50, '04a52a53-13d8-4ce3-acf7-e23444f042bb', 9, 1, 3, '2019-07-03', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:55:51', 'admin', '2019-11-06 15:55:51'),
	(51, '0a169984-b902-4b07-9c1f-c27c536eb433', 9, 1, 4, '2019-07-04', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:56:06', 'admin', '2019-11-06 15:56:06'),
	(52, '35f5ba20-d120-4194-928a-11b6d9d7e436', 9, 1, 8, '2019-07-08', 120.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:56:36', 'admin', '2019-11-06 15:56:36'),
	(53, '54c07661-b4d9-4fd9-bef2-3ff20bd1a6e7', 9, 1, 9, '2019-07-09', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:57:09', 'admin', '2019-11-06 15:57:09'),
	(54, '90ac3f17-69f4-476a-9ba1-11236a299ae0', 9, 1, 10, '2019-07-10', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:57:14', 'admin', '2019-11-06 15:57:14'),
	(55, 'a24250ac-6261-489a-8006-8d91fbbdf371', 9, 1, 11, '2019-07-11', 120.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:57:39', 'admin', '2019-11-06 15:57:39'),
	(56, '1b6a0b05-5711-4e01-9502-cf098393c61f', 9, 1, 12, '2019-07-12', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:58:14', 'admin', '2019-11-06 15:58:14'),
	(57, 'b826146f-92a3-4e1d-b46d-3bbd5881b821', 9, 1, 15, '2019-07-15', 128.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:58:39', 'admin', '2019-11-06 15:58:39'),
	(58, '8d9520cb-1e07-4107-9ae6-2ef2591ed19b', 9, 1, 16, '2019-07-16', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:59:03', 'admin', '2019-11-06 15:59:03'),
	(59, '4c3ebc0e-3b75-460a-9f77-24008c621493', 9, 1, 17, '2019-07-17', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:59:29', 'admin', '2019-11-06 15:59:29'),
	(60, 'b22b8f41-1ed5-4600-b1d4-422b82e15316', 9, 1, 18, '2019-07-18', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 15:59:51', 'admin', '2019-11-06 15:59:51'),
	(61, 'b0532fce-59a7-4bce-a290-dda1293f9234', 9, 1, 19, '2019-07-19', 120.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:00:13', 'admin', '2019-11-06 16:00:13'),
	(62, '2a9a682b-d2e4-4691-944a-bbe5645b7793', 9, 1, 22, '2019-07-22', 168.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:00:40', 'admin', '2019-11-06 16:00:40'),
	(63, 'f18512f4-2711-4eba-9481-b9735803cf2c', 9, 1, 23, '2019-07-23', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:00:56', 'admin', '2019-11-06 16:00:56'),
	(64, 'cb649836-11d4-4820-ae61-88a4394d6e3f', 9, 1, 24, '2019-07-24', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:01:11', 'admin', '2019-11-06 16:01:11'),
	(65, 'b5eb0cc0-371a-45a2-8e9e-127ccfe918fb', 9, 1, 25, '2019-07-25', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:01:24', 'admin', '2019-11-06 16:01:24'),
	(66, '7e77d58b-8707-4162-a176-5bc95e41cc8e', 9, 1, 29, '2019-07-29', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:01:46', 'admin', '2019-11-06 16:01:46'),
	(67, '0a8305d7-b7e6-4f6c-8527-1f95bbffe1ed', 9, 1, 30, '2019-07-30', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:01:59', 'admin', '2019-11-06 16:01:59'),
	(68, '66444343-4c00-4ab8-8f1a-5b2248512ada', 9, 1, 31, '2019-07-31', 240.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:02:16', 'admin', '2019-11-06 16:02:16'),
	(69, 'e218aee0-9d96-4fae-9593-01ca2ecbc7fc', 10, 3, 1, '2019-07-01', 120.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:07:32', 'admin', '2019-11-06 16:07:32'),
	(70, '1c09495f-a9db-4afb-a542-612a2d9b2304', 10, 3, 8, '2019-07-08', 120.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:07:56', 'admin', '2019-11-06 16:07:56'),
	(71, '1e27cbda-4470-4a3b-a188-05c820593cd2', 10, 3, 11, '2019-07-11', 72.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:08:51', 'admin', '2019-11-06 16:08:51'),
	(72, 'e3453294-4465-4f24-8005-1736a9e188b8', 10, 3, 15, '2019-07-15', 72.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:14:12', 'admin', '2019-11-06 16:14:12'),
	(73, 'cb77fe19-8677-41d9-a8cc-db93d7070295', 10, 3, 22, '2019-07-22', 72.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:14:43', 'admin', '2019-11-06 16:14:43'),
	(74, 'bc528388-867f-450a-9036-42d7d4f9e9c1', 11, 1, 3, '2019-06-03', 170.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:19:28', 'admin', '2019-11-06 16:19:28'),
	(75, 'a01c800b-09d5-4744-8578-641a640db324', 11, 1, 10, '2019-06-10', 228.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:19:53', 'admin', '2019-11-06 16:19:53'),
	(76, 'e709455e-aa2d-4b05-853e-7a79c052fe13', 11, 1, 11, '2019-06-11', 168.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:20:12', 'admin', '2019-11-06 16:20:12'),
	(77, '9e4e270e-f8f1-4ee7-aaf1-d0a5907274f1', 11, 1, 12, '2019-06-12', 228.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:20:50', 'admin', '2019-11-06 16:20:50'),
	(78, 'fbe8b22f-af9e-4620-bf24-06f13ab4e2cf', 11, 1, 13, '2019-06-13', 156.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:21:15', 'admin', '2019-11-06 16:21:15'),
	(79, '9e30b6d6-a9d5-4f33-bb38-bc979101def2', 11, 1, 14, '2019-06-14', 228.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:21:29', 'admin', '2019-11-06 16:21:29'),
	(80, '0487f53e-8d73-4256-a308-75e4394d76aa', 11, 1, 17, '2019-06-17', 228.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:21:51', 'admin', '2019-11-06 16:21:51'),
	(81, 'f843a42e-c5cc-4439-9e07-40d49bcd4022', 11, 1, 18, '2019-06-18', 228.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:22:06', 'admin', '2019-11-06 16:22:06'),
	(82, '74415df7-ce1f-450b-9471-13c33ec7d52e', 11, 1, 19, '2019-06-19', 168.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:22:34', 'admin', '2019-11-06 16:22:34'),
	(83, '163f68c7-d201-4a98-a1ad-20e742083b73', 11, 1, 20, '2019-06-20', 228.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:22:55', 'admin', '2019-11-06 16:22:55'),
	(84, '7b724be3-ab72-4fa6-a6b1-3c5cb917bdeb', 11, 1, 21, '2019-06-21', 156.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:23:14', 'admin', '2019-11-06 16:23:14'),
	(85, 'aa2aef41-71c5-43e0-89df-59417445b76f', 11, 1, 24, '2019-06-24', 228.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:23:31', 'admin', '2019-11-06 16:23:31'),
	(86, 'dc1a5ebb-12a3-4117-b397-28561bc14360', 11, 1, 25, '2019-06-25', 228.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:23:47', 'admin', '2019-11-06 16:23:47'),
	(87, 'e50e6fc9-bd2c-4b17-910c-6b7659fc77e6', 11, 1, 26, '2019-06-26', 228.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:23:52', 'admin', '2019-11-06 16:23:52'),
	(88, '3f7aac6c-f530-4c6f-a51f-0f978adbac96', 11, 1, 27, '2019-06-27', 228.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:23:57', 'admin', '2019-11-06 16:23:57'),
	(89, 'c99b52fc-620f-4cad-9bd6-f130792c6677', 11, 1, 28, '2019-06-28', 228.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:24:10', 'admin', '2019-11-06 16:24:10'),
	(90, '80ecb22c-8894-4b47-86fa-da82843664a7', 12, 3, 11, '2019-06-11', 60.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:28:26', 'admin', '2019-11-06 16:28:26'),
	(91, '01b87e7a-ae59-40e0-968c-90eb9d19a808', 12, 3, 13, '2019-06-13', 72.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:28:44', 'admin', '2019-11-06 16:28:44'),
	(92, '45138142-a53b-447a-aedb-9dbcf8c4a2ef', 12, 3, 19, '2019-06-19', 72.00000, '00:00:00', '00:00:00', 0, 'admin', '2019-11-06 16:29:37', 'admin', '2019-11-06 16:29:37'),
	(93, '628526df-78a9-4409-ac05-60188ad6a274', 12, 3, 21, '2019-06-21', 72.00000, '12:00:00', '13:05:00', 65, 'admin', '2019-11-06 16:29:52', 'admin', '2019-11-12 11:58:33'),
	(95, '81f9e3d2-d5d0-4139-875b-7d548520140e', 13, 1, 2, '2019-05-02', 180.00000, '08:00:00', '15:30:00', 450, 'admin', '2019-11-12 15:19:44', 'admin', '2019-11-12 15:19:44'),
	(96, 'b5a8ef31-73af-46ac-8b67-5ae8f9753874', 14, 3, 2, '2019-05-02', 72.00000, '08:00:00', '17:30:00', 570, 'admin', '2019-11-12 15:21:47', 'admin', '2019-11-12 15:30:34'),
	(97, '72778488-a27a-4a33-9fb3-1e7420e21c63', 13, 1, 3, '2019-05-03', 228.00000, '08:00:00', '17:30:00', 570, 'admin', '2019-11-12 15:36:14', 'admin', '2019-11-12 15:36:14'),
	(98, 'db6482df-1d4b-446d-8dcb-0abb1c6eb365', 13, 1, 6, '2019-05-06', 204.00000, '08:00:00', '16:30:00', 510, 'admin', '2019-11-12 15:37:57', 'admin', '2019-11-12 15:37:57'),
	(99, '8665655b-8b3d-4bc8-806b-59ab9ac6e5eb', 13, 1, 7, '2019-05-07', 204.00000, '08:00:00', '16:30:00', 510, 'admin', '2019-11-12 15:38:32', 'admin', '2019-11-12 15:38:32'),
	(100, 'bfb4e036-c6aa-489a-b882-744141bebd44', 13, 1, 8, '2019-05-08', 204.00000, '08:00:00', '16:30:00', 510, 'admin', '2019-11-12 15:39:05', 'admin', '2019-11-12 15:39:05'),
	(101, '9d813a06-9ea1-4b10-ba0b-df59f9f666c9', 13, 1, 9, '2019-05-09', 204.00000, '08:00:00', '16:30:00', 510, 'admin', '2019-11-12 15:39:39', 'admin', '2019-11-12 15:39:39'),
	(102, 'e89a17f9-6439-49e0-8e80-b394894a3deb', 13, 1, 13, '2019-05-13', 204.00000, '08:00:00', '16:30:00', 510, 'admin', '2019-11-12 15:40:23', 'admin', '2019-11-12 15:40:23'),
	(103, '5b18bada-778f-43ed-9ecc-b37fbf14d1bc', 13, 1, 14, '2019-05-14', 204.00000, '08:00:00', '16:30:00', 510, 'admin', '2019-11-12 16:01:06', 'admin', '2019-11-12 16:01:06'),
	(104, '7b426951-92f2-41de-b63b-27ec36533531', 13, 1, 15, '2019-05-15', 204.00000, '08:00:00', '16:30:00', 510, 'admin', '2019-11-12 16:01:56', 'admin', '2019-11-12 16:01:56'),
	(105, 'b5b3ca9f-f3b8-4aaf-9b48-4e25b5095d75', 13, 1, 16, '2019-05-16', 204.00000, '08:00:00', '16:30:00', 510, 'admin', '2019-11-12 16:04:25', 'admin', '2019-11-12 16:04:25'),
	(106, '3108c224-f458-43bb-a8a7-2aff1f6babf2', 13, 1, 23, '2019-05-23', 204.00000, '08:00:00', '16:30:00', 510, 'admin', '2019-11-12 16:06:14', 'admin', '2019-11-12 16:06:14'),
	(107, '7b98b2e4-9482-4a02-b0ca-b35970bff928', 13, 1, 24, '2019-05-24', 204.00000, '08:00:00', '16:30:00', 510, 'admin', '2019-11-12 16:06:48', 'admin', '2019-11-12 16:06:48'),
	(108, '974af3a9-b8e4-46c4-b158-ed289be63fe6', 13, 1, 27, '2019-05-27', 204.00000, '08:00:00', '16:30:00', 510, 'admin', '2019-11-12 16:07:17', 'admin', '2019-11-12 16:07:17'),
	(109, '70a37f52-984d-49db-b4e7-3804861594bf', 13, 1, 28, '2019-05-28', 204.00000, '08:00:00', '16:30:00', 510, 'admin', '2019-11-12 16:07:38', 'admin', '2019-11-12 16:07:38'),
	(110, '78bc4a35-064b-494a-b018-8e098d8680fc', 13, 1, 29, '2019-05-29', 204.00000, '08:00:00', '16:30:00', 510, 'admin', '2019-11-12 16:08:00', 'admin', '2019-11-12 16:08:00'),
	(111, '759a10f1-48bf-49d6-861b-3096dacd8b34', 13, 1, 30, '2019-05-30', 204.00000, '08:00:00', '16:30:00', 510, 'admin', '2019-11-12 16:08:32', 'admin', '2019-11-12 16:08:32'),
	(112, 'cfd26b3a-928f-495e-ac62-8237eefd74fe', 16, 3, 4, '2019-04-04', 205.00000, '08:00:00', '16:50:00', 530, 'admin', '2019-11-12 16:24:29', 'admin', '2019-11-13 14:54:44'),
	(113, 'c591eb13-2c10-4362-95c3-fc416ee3ff42', 15, 1, 1, '2019-04-01', 243.00000, '08:00:00', '18:25:00', 625, 'admin', '2019-11-13 14:56:56', 'admin', '2019-11-13 14:56:56'),
	(114, '3aa3e6ad-bf1d-4fa3-97bb-8eef6d91c132', 15, 1, 2, '2019-04-02', 243.00000, '08:00:00', '18:25:00', 625, 'admin', '2019-11-13 14:58:08', 'admin', '2019-11-13 14:58:08'),
	(115, '1dc91136-a825-4891-80a7-89c5ec1c1229', 15, 1, 3, '2019-04-03', 243.00000, '08:00:00', '18:25:00', 625, 'admin', '2019-11-13 14:59:19', 'admin', '2019-11-13 14:59:35'),
	(116, 'eac0809f-81d0-4133-991b-015b1a86fa39', 15, 1, 8, '2019-04-08', 224.00000, '08:00:00', '18:30:00', 630, 'admin', '2019-11-13 15:01:03', 'admin', '2019-11-13 15:01:03'),
	(117, 'e935890b-c515-4e75-b24a-5c52e76e5a09', 15, 1, 9, '2019-04-09', 224.00000, '08:00:00', '18:30:00', 630, 'admin', '2019-11-13 15:02:01', 'admin', '2019-11-13 15:02:01'),
	(118, '2737be0b-3795-4dd9-ad32-3f29e883822a', 15, 1, 10, '2019-04-10', 224.00000, '08:00:00', '18:30:00', 630, 'admin', '2019-11-13 15:02:56', 'admin', '2019-11-13 15:02:56'),
	(119, '09f66e8c-8a1d-4edf-8a16-3cd3c8538c42', 15, 1, 11, '2019-04-11', 224.00000, '08:00:00', '18:30:00', 630, 'admin', '2019-11-13 15:03:28', 'admin', '2019-11-13 15:04:16'),
	(120, '6579ecd8-89db-4cd6-9942-cfc9da633fe3', 15, 1, 15, '2019-04-15', 224.00000, '08:00:00', '18:30:00', 630, 'admin', '2019-11-13 15:05:18', 'admin', '2019-11-13 15:05:18'),
	(121, 'aeb6bd0f-d951-4102-998d-7091f43ffd2a', 15, 1, 16, '2019-04-16', 224.00000, '08:00:00', '18:30:00', 630, 'admin', '2019-11-13 15:06:14', 'admin', '2019-11-13 15:06:14'),
	(122, 'daa0554a-8687-4ae9-a236-204a0dbd4364', 15, 1, 17, '2019-04-17', 224.00000, '08:00:00', '18:30:00', 630, 'admin', '2019-11-13 15:07:09', 'admin', '2019-11-13 15:07:09'),
	(123, '64a9ceef-72d3-4d4a-ba96-3b5f948d62f7', 15, 1, 18, '2019-04-18', 224.00000, '08:00:00', '18:30:00', 630, 'admin', '2019-11-13 15:07:48', 'admin', '2019-11-13 15:08:02'),
	(124, 'fb8d6ed7-c415-4611-9525-8d97109aa6dd', 15, 1, 22, '2019-04-22', 224.00000, '08:00:00', '18:30:00', 630, 'admin', '2019-11-13 15:08:53', 'admin', '2019-11-13 15:09:13'),
	(125, 'e17dba31-fc1b-4407-851e-2e27ac63e64b', 15, 1, 23, '2019-04-23', 224.00000, '08:00:00', '18:30:00', 630, 'admin', '2019-11-13 15:10:07', 'admin', '2019-11-13 15:10:07'),
	(126, '30dde1c9-e708-4aad-8980-dc6a56b95972', 15, 1, 24, '2019-04-24', 224.00000, '08:00:00', '18:30:00', 630, 'admin', '2019-11-13 15:11:04', 'admin', '2019-11-13 15:11:30');
/*!40000 ALTER TABLE `tbl_trx_prodplan_dtl` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_trx_prodplan_hdr
CREATE TABLE IF NOT EXISTS `tbl_trx_prodplan_hdr` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_date` date DEFAULT NULL,
  `doc_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `active` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_trx_prodplan_hdr_uuid_unique` (`uuid`),
  UNIQUE KEY `tbl_trx_prodplan_hdr_doc_no_unique` (`doc_no`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_trx_prodplan_hdr: ~15 rows (approximately)
DELETE FROM `tbl_trx_prodplan_hdr`;
/*!40000 ALTER TABLE `tbl_trx_prodplan_hdr` DISABLE KEYS */;
INSERT INTO `tbl_trx_prodplan_hdr` (`id`, `uuid`, `doc_no`, `doc_date`, `doc_time`, `month`, `year`, `remarks`, `active`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`) VALUES
	(3, '685515cc-5b12-41d4-9318-ed5284098ccd', 'PPL-1910-0001', '2019-10-01', '13:28:15', 10, 2019, NULL, '1', 'admin', '2019-11-06 13:28:15', 'admin', '2019-11-20 07:51:53'),
	(4, 'b85789e7-21e5-472d-ad47-636a46b3b5d7', 'PPL-1910-0002', '2019-10-01', '13:47:46', 10, 2019, NULL, '1', 'admin', '2019-11-06 13:47:46', 'admin', '2019-11-20 07:52:16'),
	(5, '11dca029-ec8f-4890-b85d-088a91d78153', 'PPL-1909-0001', '2019-09-01', '13:52:50', 9, 2019, NULL, '1', 'admin', '2019-11-06 13:52:50', 'admin', '2019-11-06 13:52:50'),
	(6, '75a9410f-9c9f-4b1f-8611-109f453fff3b', 'PPL-1909-0002', '2019-09-01', '13:59:29', 9, 2019, NULL, '1', 'admin', '2019-11-06 13:59:29', 'admin', '2019-11-06 15:19:29'),
	(7, '781c883e-4142-4bad-b91a-e7966fa625b6', 'PPL-1908-0001', '2019-08-01', '15:30:07', 8, 2019, NULL, '1', 'admin', '2019-11-06 15:30:07', 'admin', '2019-11-06 15:30:07'),
	(8, 'd05125e6-392c-4bab-85f1-d12ceb8ce081', 'PPL-1908-0002', '2019-08-01', '15:41:02', 8, 2019, NULL, '1', 'admin', '2019-11-06 15:41:02', 'admin', '2019-11-06 15:41:02'),
	(9, '9e8b0bca-fc3e-47c5-9b38-1ab6d76c1edc', 'PPL-1907-0001', '2019-07-01', '15:53:10', 7, 2019, NULL, '1', 'admin', '2019-11-06 15:53:10', 'admin', '2019-11-06 15:53:10'),
	(10, '760c0ae2-9a04-4a02-9816-fc60b65e3216', 'PPL-1907-0002', '2019-07-01', '16:03:51', 7, 2019, NULL, '1', 'admin', '2019-11-06 16:03:51', 'admin', '2019-11-18 09:39:13'),
	(11, '750b7cba-6cee-4ad4-901a-d8993901544e', 'PPL-1906-0001', '2019-06-01', '16:18:34', 6, 2019, NULL, '1', 'admin', '2019-11-06 16:18:34', 'admin', '2019-11-06 16:18:34'),
	(12, '4edb4e2e-ed17-4bb8-8ad4-c53acabba2b1', 'PPL-1906-0002', '2019-06-01', '16:27:34', 6, 2019, NULL, '1', 'admin', '2019-11-06 16:27:34', 'admin', '2019-11-12 15:32:33'),
	(13, 'e8a84ad6-9bfe-4d16-b54f-99b7f55b74d0', 'PPL-1905-0001', '2019-05-01', '15:17:00', 5, 2019, NULL, '1', 'admin', '2019-11-12 15:17:00', 'admin', '2019-11-12 15:34:30'),
	(14, 'b7011de3-4241-4fe6-864a-ce7974e7606a', 'PPL-1905-0002', '2019-05-01', '15:20:15', 5, 2019, NULL, '1', 'admin', '2019-11-12 15:20:15', 'admin', '2019-11-15 16:08:41'),
	(15, '6893f376-38c1-4ab2-a57c-58fe06254cdb', 'PPL-1904-0001', '2019-04-01', '16:22:36', 4, 2019, NULL, '1', 'admin', '2019-11-12 16:22:36', 'admin', '2019-11-13 14:55:00'),
	(16, '8bdfc685-7262-4335-a307-2ab5745e7e9c', 'PPL-1904-0002', '2019-04-01', '16:22:58', 4, 2019, NULL, '1', 'admin', '2019-11-12 16:22:58', 'admin', '2019-11-20 10:40:23'),
	(17, 'b2d7f33a-844c-4ca2-ac49-71bbea1fb2bd', 'PPL-1910-0003', '2019-11-15', '15:48:53', 10, 2019, NULL, '0', 'admin', '2019-11-15 15:48:53', 'admin', '2019-11-20 07:51:16');
/*!40000 ALTER TABLE `tbl_trx_prodplan_hdr` ENABLE KEYS */;

-- Dumping structure for table db_edhil.tbl_trx_stock
CREATE TABLE IF NOT EXISTS `tbl_trx_stock` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trx_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Document Number Transaction',
  `trx_date` date DEFAULT NULL COMMENT 'Document Date Transaction',
  `id_product_material` bigint(20) DEFAULT NULL COMMENT 'Bisa dari Product FG atau dari Raw Material',
  `type_product_material` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx_source` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'GR_RAW_MATERIAL, ...',
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Warehouse Raw Material HIL (WRM), Warehouse WIP Edrola (WWIP), Warehouse FG (WFG)',
  `stock_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'I=Insert, U=Update, D=Delete',
  `stock_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty_begin` double(12,5) NOT NULL DEFAULT '0.00000',
  `qty_in` double(12,5) NOT NULL DEFAULT '0.00000',
  `qty_out` double(12,5) NOT NULL DEFAULT '0.00000',
  `qty_opname` double(12,5) NOT NULL DEFAULT '0.00000',
  `qty_balance` double(12,5) NOT NULL DEFAULT '0.00000',
  `id_unit` int(10) unsigned NOT NULL,
  `user_created` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_created` datetime NOT NULL,
  `user_updated` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tbl_trx_stock_uuid_unique` (`uuid`),
  KEY `tbl_trx_stock_id_unit_foreign` (`id_unit`),
  CONSTRAINT `tbl_trx_stock_id_unit_foreign` FOREIGN KEY (`id_unit`) REFERENCES `tbl_mst_unit` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_edhil.tbl_trx_stock: ~0 rows (approximately)
DELETE FROM `tbl_trx_stock`;
/*!40000 ALTER TABLE `tbl_trx_stock` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_trx_stock` ENABLE KEYS */;

-- Dumping structure for view db_edhil.view_mst_bom_dtl
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_mst_bom_dtl` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`uuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`id_hdr` BIGINT(20) UNSIGNED NOT NULL,
	`id_raw_material` BIGINT(20) UNSIGNED NOT NULL,
	`qty_usage` DOUBLE(12,5) NOT NULL,
	`remarks` TEXT NULL COLLATE 'utf8mb4_unicode_ci',
	`percent_rejection` DOUBLE(8,2) NOT NULL,
	`active` CHAR(1) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`user_created` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_created` DATETIME NOT NULL,
	`user_updated` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_updated` DATETIME NOT NULL,
	`material_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`material_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`vpn_no` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`id_unit_buying` INT(10) UNSIGNED NULL,
	`unit_code_buying` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_name_buying` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`id_unit_usage` INT(10) UNSIGNED NULL,
	`unit_code_usage` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_name_usage` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`id_supplier` INT(10) UNSIGNED NULL,
	`supplier_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`supplier_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`qty_conversion` DOUBLE(8,2) NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_mst_bom_hdr
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_mst_bom_hdr` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`uuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`status_bom` VARCHAR(50) NULL COLLATE 'utf8mb4_unicode_ci',
	`id_product` BIGINT(20) UNSIGNED NOT NULL,
	`prepared_by` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`date_of_issue` DATE NULL,
	`revision` SMALLINT(6) NOT NULL,
	`notes` TEXT NULL COLLATE 'utf8mb4_unicode_ci',
	`active` CHAR(1) NULL COLLATE 'utf8mb4_unicode_ci',
	`user_created` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_created` DATETIME NOT NULL,
	`user_updated` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_updated` DATETIME NOT NULL,
	`product_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`product_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`cpn_no` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`model_project` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`id_product_group` INT(10) UNSIGNED NULL,
	`product_group_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`product_group_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`id_unit` INT(10) UNSIGNED NULL,
	`unit_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`id_customer` INT(10) UNSIGNED NULL,
	`customer_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`customer_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`color` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`type_of_material` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`gross_weight` DOUBLE(8,2) NULL,
	`net_weight` DOUBLE(8,2) NULL,
	`life_span_num` INT(11) NULL,
	`life_span_time` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`life_span_num_time` VARCHAR(17) NULL COLLATE 'utf8mb4_general_ci',
	`cavity` DOUBLE(8,2) NULL,
	`cavity_text` VARCHAR(15) NULL COLLATE 'utf8mb4_general_ci',
	`mp_net_weight` DOUBLE(8,2) NULL,
	`machine_tonage` DOUBLE(8,2) NULL,
	`machine_tonage_text` VARCHAR(12) NULL COLLATE 'utf8mb4_general_ci',
	`process` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`machine_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`cycle_time_num` DOUBLE(8,2) NULL,
	`cycle_time_mp` INT(11) NULL,
	`assy_time_num` DOUBLE(8,2) NULL,
	`assy_time_mp` INT(11) NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_mst_product
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_mst_product` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`uuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`product_code` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`product_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`cpn_no` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`model_project` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`id_product_group` INT(10) UNSIGNED NOT NULL,
	`id_unit` INT(10) UNSIGNED NOT NULL,
	`id_customer` INT(10) UNSIGNED NULL,
	`description` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`life_span_num` INT(11) NOT NULL,
	`life_span_time` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`cavity` DOUBLE(8,2) NOT NULL,
	`machine_tonage` DOUBLE(8,2) NOT NULL,
	`machine_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`color` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`type_of_material` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`gross_weight` DOUBLE(8,2) NOT NULL,
	`net_weight` DOUBLE(8,2) NOT NULL,
	`mp_net_weight` DOUBLE(8,2) NOT NULL,
	`process` VARCHAR(255) NULL COLLATE 'utf8mb4_unicode_ci',
	`cycle_time_num` DOUBLE(8,2) NOT NULL,
	`cycle_time_mp` INT(11) NOT NULL,
	`assy_time_num` DOUBLE(8,2) NOT NULL,
	`assy_time_mp` INT(11) NOT NULL,
	`active` CHAR(1) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`user_created` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_created` DATETIME NOT NULL,
	`user_updated` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_updated` DATETIME NOT NULL,
	`product_group_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`product_group_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`customer_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`customer_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`life_span_num_time` VARCHAR(17) NULL COLLATE 'utf8mb4_general_ci',
	`cavity_text` VARCHAR(15) NOT NULL COLLATE 'utf8mb4_general_ci',
	`machine_tonage_text` VARCHAR(12) NOT NULL COLLATE 'utf8mb4_general_ci',
	`type_product` VARCHAR(12) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_mst_product_material_union
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_mst_product_material_union` (
	`product_material_id` BIGINT(20) UNSIGNED NOT NULL,
	`product_material_code` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`product_material_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`product_material_type` VARCHAR(12) NOT NULL COLLATE 'utf8mb4_general_ci',
	`active` CHAR(1) NOT NULL COLLATE 'utf8mb4_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_mst_raw_material
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_mst_raw_material` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`uuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`material_code` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`material_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`vpn_no` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`id_unit_buying` INT(10) UNSIGNED NOT NULL,
	`id_unit_usage` INT(10) UNSIGNED NOT NULL,
	`id_supplier` INT(10) UNSIGNED NULL,
	`qty_conversion` DOUBLE(8,2) NOT NULL,
	`active` CHAR(1) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`user_created` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_created` DATETIME NOT NULL,
	`user_updated` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_updated` DATETIME NOT NULL,
	`unit_code_buying` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_name_buying` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_code_usage` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_name_usage` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`supplier_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`supplier_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`type_product` VARCHAR(12) NOT NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_trx_allocfg_dtl
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trx_allocfg_dtl` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`uuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`id_hdr` BIGINT(20) UNSIGNED NOT NULL,
	`id_product` BIGINT(20) UNSIGNED NOT NULL,
	`qty_alloc` DOUBLE(12,5) NOT NULL,
	`user_created` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_created` DATETIME NOT NULL,
	`user_updated` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_updated` DATETIME NOT NULL,
	`product_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`product_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`cpn_no` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`id_unit` INT(10) UNSIGNED NULL,
	`unit_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_trx_allocfg_hdr
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trx_allocfg_hdr` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`uuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`doc_no` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`doc_date` DATE NULL,
	`doc_time` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`remarks` TEXT NULL COLLATE 'utf8mb4_unicode_ci',
	`active` CHAR(1) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`user_created` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_created` DATETIME NOT NULL,
	`user_updated` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_updated` DATETIME NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_trx_do_dtl
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trx_do_dtl` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`uuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`id_hdr` BIGINT(20) UNSIGNED NOT NULL,
	`id_product` BIGINT(20) UNSIGNED NOT NULL,
	`qty_do` DOUBLE(12,5) NOT NULL,
	`user_created` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_created` DATETIME NOT NULL,
	`user_updated` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_updated` DATETIME NOT NULL,
	`product_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`product_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`cpn_no` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`id_unit` INT(10) UNSIGNED NULL,
	`unit_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_trx_do_hdr
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trx_do_hdr` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`uuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`doc_no` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`doc_date` DATE NULL,
	`doc_time` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`vehicle_number` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`driver_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`loading_time` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`remarks` TEXT NULL COLLATE 'utf8mb4_unicode_ci',
	`active` CHAR(1) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`user_created` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_created` DATETIME NOT NULL,
	`user_updated` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_updated` DATETIME NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_trx_gr_dtl
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trx_gr_dtl` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`uuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`id_hdr` BIGINT(20) UNSIGNED NOT NULL,
	`id_raw_material` BIGINT(20) UNSIGNED NOT NULL,
	`qty_gr` DOUBLE(12,5) NOT NULL,
	`user_created` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_created` DATETIME NOT NULL,
	`user_updated` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_updated` DATETIME NOT NULL,
	`material_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`material_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`vpn_no` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`id_unit_buying` INT(10) UNSIGNED NULL,
	`unit_code_buying` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_name_buying` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`id_unit_usage` INT(10) UNSIGNED NULL,
	`unit_code_usage` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_name_usage` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`qty_conversion` DOUBLE(8,2) NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_trx_gr_hdr
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trx_gr_hdr` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`uuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`doc_no` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`doc_date` DATE NULL,
	`doc_time` VARCHAR(50) NULL COLLATE 'utf8mb4_unicode_ci',
	`reff_no` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`id_supplier` INT(10) UNSIGNED NOT NULL,
	`remarks` TEXT NULL COLLATE 'utf8mb4_unicode_ci',
	`active` CHAR(1) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`user_created` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_created` DATETIME NOT NULL,
	`user_updated` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_updated` DATETIME NOT NULL,
	`supplier_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`supplier_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_trx_matreq_dtl
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trx_matreq_dtl` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`uuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`id_hdr` BIGINT(20) UNSIGNED NOT NULL,
	`id_raw_material` BIGINT(20) UNSIGNED NOT NULL,
	`qty_matreq` DOUBLE(12,5) NOT NULL,
	`user_created` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_created` DATETIME NOT NULL,
	`user_updated` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_updated` DATETIME NOT NULL,
	`material_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`material_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`vpn_no` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`id_unit_buying` INT(10) UNSIGNED NULL,
	`unit_code_buying` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_name_buying` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`id_unit_usage` INT(10) UNSIGNED NULL,
	`unit_code_usage` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_name_usage` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`id_supplier` INT(10) UNSIGNED NULL,
	`supplier_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`supplier_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`qty_conversion` DOUBLE(8,2) NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_trx_matreq_hdr
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trx_matreq_hdr` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`uuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`doc_no` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`doc_date` DATE NULL,
	`doc_time` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`remarks` TEXT NULL COLLATE 'utf8mb4_unicode_ci',
	`active` CHAR(1) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`user_created` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_created` DATETIME NOT NULL,
	`user_updated` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_updated` DATETIME NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_trx_matusage_dtl
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trx_matusage_dtl` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`uuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`id_hdr` BIGINT(20) UNSIGNED NOT NULL,
	`id_raw_material` BIGINT(20) UNSIGNED NOT NULL,
	`id_unit` INT(10) UNSIGNED NOT NULL,
	`qty_matusage` DOUBLE(12,5) NOT NULL,
	`user_created` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_created` DATETIME NOT NULL,
	`user_updated` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_updated` DATETIME NOT NULL,
	`material_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`material_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`vpn_no` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_trx_matusage_hdr
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trx_matusage_hdr` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`uuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`doc_no` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`doc_date` DATE NULL,
	`doc_time` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`remarks` TEXT NULL COLLATE 'utf8mb4_unicode_ci',
	`active` CHAR(1) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`user_created` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_created` DATETIME NOT NULL,
	`user_updated` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_updated` DATETIME NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_trx_prodactual_dtl
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trx_prodactual_dtl` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`uuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`id_hdr` BIGINT(20) UNSIGNED NOT NULL,
	`id_product` BIGINT(20) UNSIGNED NOT NULL,
	`qty_ok` DOUBLE(12,5) NOT NULL,
	`qty_reject` DOUBLE(12,5) NOT NULL COMMENT 'alias = qty scrap',
	`qty_rework` DOUBLE(12,5) NOT NULL,
	`qty_total` DOUBLE(12,5) NOT NULL,
	`time_start` TIME NOT NULL,
	`time_finish` TIME NOT NULL,
	`time_total` FLOAT NOT NULL,
	`user_created` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_created` DATETIME NOT NULL,
	`user_updated` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_updated` DATETIME NOT NULL,
	`product_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`product_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`cpn_no` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_trx_prodactual_hdr
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trx_prodactual_hdr` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`uuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`doc_no` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`doc_date` DATE NULL,
	`doc_time` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`prod_actual_date` DATE NULL,
	`remarks` TEXT NULL COLLATE 'utf8mb4_unicode_ci',
	`active` CHAR(1) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`user_created` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_created` DATETIME NOT NULL,
	`user_updated` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_updated` DATETIME NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_trx_prodactual_qty
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trx_prodactual_qty` (
	`tahun` INT(4) NULL,
	`bulan` INT(2) NULL,
	`tanggal` INT(2) NULL,
	`qty_ok` DOUBLE(12,5) NULL,
	`qty_reject` DOUBLE(12,5) NULL COMMENT 'alias = qty scrap',
	`qty_rework` DOUBLE(12,5) NULL,
	`qty_produce` DOUBLE(12,5) NULL,
	`time_start` TIME NULL,
	`time_finish` TIME NULL,
	`time_total` FLOAT NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_trx_prodplan_dtl
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trx_prodplan_dtl` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`uuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`id_hdr` BIGINT(20) UNSIGNED NOT NULL,
	`id_product` BIGINT(20) UNSIGNED NOT NULL,
	`day_prodplan` INT(11) NULL COMMENT '1, 2, 3, ...',
	`date_prodplan` DATE NULL COMMENT '1/1/2019, 1/2/2019, ...',
	`qty_prodplan` DOUBLE(12,5) NOT NULL,
	`time_start` TIME NULL,
	`time_finish` TIME NULL,
	`time_total` FLOAT NOT NULL,
	`user_created` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_created` DATETIME NOT NULL,
	`user_updated` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_updated` DATETIME NOT NULL,
	`product_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`product_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`month` INT(11) NULL,
	`year` INT(11) NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_trx_prodplan_hdr
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trx_prodplan_hdr` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`uuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`doc_no` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`doc_date` DATE NULL,
	`doc_time` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`month` INT(11) NULL,
	`year` INT(11) NULL,
	`remarks` TEXT NULL COLLATE 'utf8mb4_unicode_ci',
	`active` CHAR(1) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`user_created` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_created` DATETIME NOT NULL,
	`user_updated` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_updated` DATETIME NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_trx_prodplan_qty
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trx_prodplan_qty` (
	`tahun` INT(4) NULL,
	`bulan` INT(2) NULL,
	`tanggal` INT(2) NULL,
	`qty` DOUBLE(12,5) NOT NULL,
	`time_start` TIME NULL,
	`time_finish` TIME NULL,
	`time_total` FLOAT NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_trx_stock
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trx_stock` (
	`id` BIGINT(20) UNSIGNED NOT NULL,
	`uuid` CHAR(36) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`trx_no` VARCHAR(191) NULL COMMENT 'Document Number Transaction' COLLATE 'utf8mb4_unicode_ci',
	`trx_date` DATE NULL COMMENT 'Document Date Transaction',
	`id_product_material` BIGINT(20) NULL COMMENT 'Bisa dari Product FG atau dari Raw Material',
	`type_product_material` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`trx_source` VARCHAR(191) NULL COMMENT 'GR_RAW_MATERIAL, ...' COLLATE 'utf8mb4_unicode_ci',
	`location` VARCHAR(191) NULL COMMENT 'Warehouse Raw Material HIL (WRM), Warehouse WIP Edrola (WWIP), Warehouse FG (WFG)' COLLATE 'utf8mb4_unicode_ci',
	`stock_status` VARCHAR(191) NULL COMMENT 'I=Insert, U=Update, D=Delete' COLLATE 'utf8mb4_unicode_ci',
	`stock_note` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`qty_begin` DOUBLE(12,5) NOT NULL,
	`qty_in` DOUBLE(12,5) NOT NULL,
	`qty_out` DOUBLE(12,5) NOT NULL,
	`qty_opname` DOUBLE(12,5) NOT NULL,
	`qty_balance` DOUBLE(12,5) NOT NULL,
	`id_unit` INT(10) UNSIGNED NOT NULL,
	`user_created` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_created` DATETIME NOT NULL,
	`user_updated` VARCHAR(191) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`datetime_updated` DATETIME NOT NULL,
	`product_material_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`product_material_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`active` CHAR(1) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_edhil.view_trx_stock_onhand
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_trx_stock_onhand` (
	`id_product_material` BIGINT(20) NULL COMMENT 'Bisa dari Product FG atau dari Raw Material',
	`type_product_material` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`product_material_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`product_material_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`active` CHAR(1) NULL COLLATE 'utf8mb4_unicode_ci',
	`location` VARCHAR(191) NULL COMMENT 'Warehouse Raw Material HIL (WRM), Warehouse WIP Edrola (WWIP), Warehouse FG (WFG)' COLLATE 'utf8mb4_unicode_ci',
	`qty_balance` DOUBLE(12,5) NOT NULL,
	`id_unit` INT(10) UNSIGNED NOT NULL,
	`unit_code` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci',
	`unit_name` VARCHAR(191) NULL COLLATE 'utf8mb4_unicode_ci'
) ENGINE=MyISAM;

-- Dumping structure for trigger db_edhil.trg_trx_allocfg_dtl_after_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_trx_allocfg_dtl_after_delete` AFTER DELETE ON `tbl_trx_allocfg_dtl` FOR EACH ROW BEGIN
	DECLARE v_location VARCHAR(50);
 	DECLARE v_type_product VARCHAR(50);
 	DECLARE v_trx_source VARCHAR(50);
	
 	DECLARE v_qty_balance FLOAT(8, 5);
 	DECLARE v_trx_no VARCHAR(50);
 	DECLARE v_trx_date DATE;
 	DECLARE v_id_unit INT;
 	DECLARE v_qty_alloc_old FLOAT(8, 5);
 	DECLARE v_qty_alloc_result FLOAT(8, 5);
                
 	SET v_location = "WFG";
 	SET v_type_product = "FINISH_GOODS";
 	SET v_trx_source = "ALLOCATION_FINISH_GOODS";

	/* Cari qty_balance */
	IF EXISTS (SELECT `qty_balance` 
	         FROM `tbl_trx_stock` 
	         WHERE `id_product_material` = OLD.id_product
	            AND `location` = v_location
	         ORDER BY `id` DESC
	         LIMIT 1) THEN
	  SET v_qty_balance = (SELECT `qty_balance`
	                       FROM `tbl_trx_stock` 
	                       WHERE `id_product_material` = OLD.id_product
	                          AND `location` = v_location
	                       ORDER BY id DESC
	                       LIMIT 1);
	ELSE
	  SET v_qty_balance = 0;
	END IF;

	/* Cari doc_no dan doc_date */
	IF EXISTS (SELECT `doc_no`, `doc_date` 
	         FROM `tbl_trx_allocfg_hdr` 
	         WHERE `id` = OLD.id_hdr
	         LIMIT 1) THEN
	  SET v_trx_no = (SELECT `doc_no` 
	                  FROM `tbl_trx_allocfg_hdr` 
	                  WHERE `id` = OLD.id_hdr
	                  LIMIT 1);
	  SET v_trx_date = (SELECT `doc_date` 
	                    FROM `tbl_trx_allocfg_hdr` 
	                    WHERE `id` = OLD.id_hdr
	                    LIMIT 1);
	ELSE
	  SET v_trx_no = NULL;
	  SET v_trx_date = NULL;
	END IF;

	/* Cari id_unit */
	IF EXISTS (SELECT `id_unit` 
	         FROM `tbl_mst_product` 
	         WHERE `id` = OLD.id_product
	         LIMIT 1) THEN
	  SET v_id_unit = (SELECT `id_unit`
	                   FROM `tbl_mst_product` 
	                   WHERE `id` = OLD.id_product
	                   LIMIT 1);
	ELSE
	  SET v_id_unit = 0;
	END IF;

	SET v_qty_alloc_old = OLD.qty_alloc;
	SET v_qty_alloc_result = v_qty_balance - v_qty_alloc_old;

	/* https://mysqlserverteam.com/storing-uuid-values-in-mysql-tables/ */
	/* https://stackoverflow.com/questions/25658779/mysql-insert-current-date-only-in-insert-time */
	INSERT INTO `tbl_trx_stock` (`uuid`, `trx_no`, `trx_date`, `id_product_material`, `type_product_material`, `trx_source`, `location`, `stock_status`, `stock_note`, `qty_begin`, `qty_in`, `qty_out`, `qty_balance`, `id_unit`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`)
	VALUES (uuid(), v_trx_no, v_trx_date, OLD.id_product, v_type_product, v_trx_source, v_location, "D", concat("Delete by ", OLD.user_updated, " on ", OLD.datetime_updated, " from qty ", v_qty_alloc_old, " to 0"), v_qty_balance, 0, v_qty_alloc_old, v_qty_alloc_result, v_id_unit, OLD.user_created, OLD.datetime_created, OLD.user_updated, OLD.datetime_updated);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_edhil.trg_trx_allocfg_dtl_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_trx_allocfg_dtl_after_insert` AFTER INSERT ON `tbl_trx_allocfg_dtl` FOR EACH ROW BEGIN
    DECLARE v_location VARCHAR(50);                
    DECLARE v_type_product VARCHAR(50);
    DECLARE v_trx_source VARCHAR(50);

    DECLARE v_qty_begin FLOAT(8, 5);
    DECLARE v_trx_no VARCHAR(50);
    DECLARE v_trx_date DATE;
    DECLARE v_id_unit INT;
    DECLARE v_qty_balance FLOAT(8, 5);  

    SET v_location = "WFG";
    SET v_type_product = "FINISH_GOODS";
    SET v_trx_source = "ALLOCATION_FINISH_GOODS";

    /* Cari qty_balance terakhir */
    IF EXISTS (SELECT `qty_balance` 
               FROM `tbl_trx_stock` 
               WHERE `id_product_material` = NEW.id_product
                  AND `location` = v_location
               ORDER BY `id` DESC
               LIMIT 1) THEN
        SET v_qty_begin = (SELECT `qty_balance`
                           FROM `tbl_trx_stock` 
                           WHERE `id_product_material` = NEW.id_product
                              AND `location` = v_location
                           ORDER BY id DESC
                           LIMIT 1);
    ELSE
        SET v_qty_begin = 0;
    END IF;
    
    /* Cari doc_no dan doc_date terakhir */
    IF EXISTS (SELECT `doc_no`, `doc_date` 
               FROM `tbl_trx_allocfg_hdr` 
               WHERE `id` = NEW.id_hdr
               LIMIT 1) THEN
        SET v_trx_no = (SELECT `doc_no` 
                        FROM `tbl_trx_allocfg_hdr` 
                        WHERE `id` = NEW.id_hdr
                        LIMIT 1);
        SET v_trx_date = (SELECT `doc_date` 
                          FROM `tbl_trx_allocfg_hdr` 
                          WHERE `id` = NEW.id_hdr
                          LIMIT 1);
    ELSE
        SET v_trx_no = NULL;
        SET v_trx_date = NULL;
    END IF;
    
    /* Cari id_unit */
    IF EXISTS (SELECT `id_unit` 
               FROM `tbl_mst_product` 
               WHERE `id` = NEW.id_product
               LIMIT 1) THEN
        SET v_id_unit = (SELECT `id_unit`
                         FROM `tbl_mst_product` 
                         WHERE `id` = NEW.id_product
                         LIMIT 1);
    ELSE
        SET v_id_unit = 0;
    END IF;

    SET v_qty_balance = v_qty_begin + NEW.qty_alloc;

    /* https://mysqlserverteam.com/storing-uuid-values-in-mysql-tables/ */
    /* https://stackoverflow.com/questions/25658779/mysql-insert-current-date-only-in-insert-time */
    INSERT INTO `tbl_trx_stock` (`uuid`, `trx_no`, `trx_date`, `id_product_material`, `type_product_material`, `trx_source`, `location`, `stock_status`, `stock_note`, `qty_begin`, `qty_in`, `qty_balance`, `id_unit`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`)
    VALUES (uuid(), v_trx_no, v_trx_date, NEW.id_product, v_type_product, v_trx_source, v_location, "I", concat("Insert by ", NEW.user_created, " on ", NEW.datetime_created), v_qty_begin, NEW.qty_alloc, v_qty_balance, v_id_unit, NEW.user_created, NEW.datetime_created, NEW.user_updated, NEW.datetime_updated);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_edhil.trg_trx_allocfg_dtl_after_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_trx_allocfg_dtl_after_update` AFTER UPDATE ON `tbl_trx_allocfg_dtl` FOR EACH ROW BEGIN
    DECLARE v_location VARCHAR(50);
    DECLARE v_type_product VARCHAR(50);
    DECLARE v_trx_source VARCHAR(50);

    DECLARE v_qty_balance FLOAT(8, 5);
    DECLARE v_trx_no VARCHAR(50);
    DECLARE v_trx_date DATE;
    DECLARE v_id_unit INT;
    DECLARE v_qty_alloc_new FLOAT(8, 5);
    DECLARE v_qty_alloc_old FLOAT(8, 5);
    DECLARE v_qty_alloc_result FLOAT(8, 5);

    SET v_location = "WFG";
    SET v_type_product = "FINISH_GOODS";
    SET v_trx_source = "ALLOCATION_FINISH_GOODS";

    /* Cari qty_balance */
    IF EXISTS (SELECT `qty_balance` 
               FROM `tbl_trx_stock` 
               WHERE `id_product_material` = OLD.id_product 
                    AND `location` = v_location
               ORDER BY `id` DESC
               LIMIT 1) THEN
        SET v_qty_balance = (SELECT `qty_balance`
                             FROM `tbl_trx_stock` 
                             WHERE `id_product_material` = OLD.id_product
                                AND `location` = v_location
                             ORDER BY id DESC
                             LIMIT 1);
    ELSE
        SET v_qty_balance = 0;
    END IF;

    /* Cari doc_no dan doc_date */
    IF EXISTS (SELECT `doc_no`, `doc_date` 
               FROM `tbl_trx_allocfg_hdr` 
               WHERE `id` = OLD.id_hdr
               LIMIT 1) THEN
        SET v_trx_no = (SELECT `doc_no` 
                        FROM `tbl_trx_allocfg_hdr` 
                        WHERE `id` = OLD.id_hdr
                        LIMIT 1);
        SET v_trx_date = (SELECT `doc_date` 
                          FROM `tbl_trx_allocfg_hdr` 
                          WHERE `id` = OLD.id_hdr
                          LIMIT 1);
    ELSE
        SET v_trx_no = NULL;
        SET v_trx_date = NULL;
    END IF;

    /* Cari id_unit */
    IF EXISTS (SELECT `id_unit` 
               FROM `tbl_mst_product` 
               WHERE `id` = OLD.id_product
               LIMIT 1) THEN
        SET v_id_unit = (SELECT `id_unit`
                         FROM `tbl_mst_product`
                         WHERE `id` = OLD.id_product
                         LIMIT 1);
    ELSE
        SET v_id_unit = 0;
    END IF;

    SET v_qty_alloc_new = NEW.qty_alloc;
    SET v_qty_alloc_old = OLD.qty_alloc;
    SET v_qty_alloc_result = (v_qty_alloc_new - v_qty_alloc_old) + v_qty_balance;

    /* https://mysqlserverteam.com/storing-uuid-values-in-mysql-tables/ */
    /* https://stackoverflow.com/questions/25658779/mysql-insert-current-date-only-in-insert-time */
    INSERT INTO `tbl_trx_stock` (`uuid`, `trx_no`, `trx_date`, `id_product_material`, `type_product_material`, `trx_source`, `location`, `stock_status`, `stock_note`, `qty_begin`, `qty_in`, `qty_out`, `qty_balance`, `id_unit`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`)
    VALUES (uuid(), v_trx_no, v_trx_date, OLD.id_product, v_type_product, v_trx_source, v_location, "U", concat("Update by ", NEW.user_updated, " on ", NEW.datetime_updated, " from qty ", v_qty_alloc_old, " to ", v_qty_alloc_new), v_qty_balance, v_qty_alloc_new, v_qty_alloc_old, v_qty_alloc_result, v_id_unit, NEW.user_created, NEW.datetime_created, NEW.user_updated, NEW.datetime_updated);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_edhil.trg_trx_do_dtl_after_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_trx_do_dtl_after_delete` AFTER DELETE ON `tbl_trx_do_dtl` FOR EACH ROW BEGIN
	DECLARE v_location VARCHAR(50);
 	DECLARE v_type_product VARCHAR(50);
 	DECLARE v_trx_source VARCHAR(50);
	
 	DECLARE v_qty_balance FLOAT(8, 5);
 	DECLARE v_trx_no VARCHAR(50);
 	DECLARE v_trx_date DATE;
 	DECLARE v_id_unit INT;
 	DECLARE v_qty_do_old FLOAT(8, 5);
 	DECLARE v_qty_do_result FLOAT(8, 5);
                
 	SET v_location = "WFG";
 	SET v_type_product = "FINISH_GOODS";
 	SET v_trx_source = "DELIVERY_ORDER";

	/* Cari qty_balance */
	IF EXISTS (SELECT `qty_balance` 
	         FROM `tbl_trx_stock` 
	         WHERE `id_product_material` = OLD.id_product
	            AND `location` = v_location
	         ORDER BY `id` DESC
	         LIMIT 1) THEN
	  SET v_qty_balance = (SELECT `qty_balance`
	                       FROM `tbl_trx_stock` 
	                       WHERE `id_product_material` = OLD.id_product
	                          AND `location` = v_location
	                       ORDER BY id DESC
	                       LIMIT 1);
	ELSE
	  SET v_qty_balance = 0;
	END IF;

	/* Cari doc_no dan doc_date */
	IF EXISTS (SELECT `doc_no`, `doc_date` 
	         FROM `tbl_trx_do_hdr` 
	         WHERE `id` = OLD.id_hdr
	         LIMIT 1) THEN
	  SET v_trx_no = (SELECT `doc_no` 
	                  FROM `tbl_trx_do_hdr` 
	                  WHERE `id` = OLD.id_hdr
	                  LIMIT 1);
	  SET v_trx_date = (SELECT `doc_date` 
	                    FROM `tbl_trx_do_hdr` 
	                    WHERE `id` = OLD.id_hdr
	                    LIMIT 1);
	ELSE
	  SET v_trx_no = NULL;
	  SET v_trx_date = NULL;
	END IF;

	/* Cari id_unit */
	IF EXISTS (SELECT `id_unit` 
	         FROM `tbl_mst_product` 
	         WHERE `id` = OLD.id_product
	         LIMIT 1) THEN
	  SET v_id_unit = (SELECT `id_unit`
	                   FROM `tbl_mst_product` 
	                   WHERE `id` = OLD.id_product
	                   LIMIT 1);
	ELSE
	  SET v_id_unit = 0;
	END IF;

	SET v_qty_do_old = OLD.qty_do;
	SET v_qty_do_result = v_qty_balance + v_qty_do_old;

	/* https://mysqlserverteam.com/storing-uuid-values-in-mysql-tables/ */
	/* https://stackoverflow.com/questions/25658779/mysql-insert-current-date-only-in-insert-time */
	INSERT INTO `tbl_trx_stock` (`uuid`, `trx_no`, `trx_date`, `id_product_material`, `type_product_material`, `trx_source`, `location`, `stock_status`, `stock_note`, `qty_begin`, `qty_in`, `qty_out`, `qty_balance`, `id_unit`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`)
	VALUES (uuid(), v_trx_no, v_trx_date, OLD.id_product, v_type_product, v_trx_source, v_location, "D", concat("Delete by ", OLD.user_updated, " on ", OLD.datetime_updated, " from qty ", v_qty_do_old, " to 0"), v_qty_balance, v_qty_do_old, 0, v_qty_do_result, v_id_unit, OLD.user_created, OLD.datetime_created, OLD.user_updated, OLD.datetime_updated);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_edhil.trg_trx_do_dtl_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_trx_do_dtl_after_insert` AFTER INSERT ON `tbl_trx_do_dtl` FOR EACH ROW BEGIN
    DECLARE v_location VARCHAR(50);                
    DECLARE v_type_product VARCHAR(50);
    DECLARE v_trx_source VARCHAR(50);

    DECLARE v_qty_begin FLOAT(8, 5);
    DECLARE v_trx_no VARCHAR(50);
    DECLARE v_trx_date DATE;
    DECLARE v_id_unit INT;
    DECLARE v_qty_balance FLOAT(8, 5);  

    SET v_location = "WFG";
    SET v_type_product = "FINISH_GOODS";
    SET v_trx_source = "DELIVERY_ORDER";

    /* Cari qty_balance terakhir */
    IF EXISTS (SELECT `qty_balance` 
               FROM `tbl_trx_stock` 
               WHERE `id_product_material` = NEW.id_product
                  AND `location` = v_location
               ORDER BY `id` DESC
               LIMIT 1) THEN
        SET v_qty_begin = (SELECT `qty_balance`
                           FROM `tbl_trx_stock` 
                           WHERE `id_product_material` = NEW.id_product
                              AND `location` = v_location
                           ORDER BY id DESC
                           LIMIT 1);
    ELSE
        SET v_qty_begin = 0;
    END IF;
    
    /* Cari doc_no dan doc_date terakhir */
    IF EXISTS (SELECT `doc_no`, `doc_date` 
               FROM `tbl_trx_do_hdr` 
               WHERE `id` = NEW.id_hdr
               LIMIT 1) THEN
        SET v_trx_no = (SELECT `doc_no` 
                        FROM `tbl_trx_do_hdr` 
                        WHERE `id` = NEW.id_hdr
                        LIMIT 1);
        SET v_trx_date = (SELECT `doc_date` 
                          FROM `tbl_trx_do_hdr` 
                          WHERE `id` = NEW.id_hdr
                          LIMIT 1);
    ELSE
        SET v_trx_no = NULL;
        SET v_trx_date = NULL;
    END IF;
    
    /* Cari id_unit */
    IF EXISTS (SELECT `id_unit` 
               FROM `tbl_mst_product` 
               WHERE `id` = NEW.id_product
               LIMIT 1) THEN
        SET v_id_unit = (SELECT `id_unit`
                         FROM `tbl_mst_product` 
                         WHERE `id` = NEW.id_product
                         LIMIT 1);
    ELSE
        SET v_id_unit = 0;
    END IF;

    SET v_qty_balance = v_qty_begin - NEW.qty_do;

    /* https://mysqlserverteam.com/storing-uuid-values-in-mysql-tables/ */
    /* https://stackoverflow.com/questions/25658779/mysql-insert-current-date-only-in-insert-time */
    INSERT INTO `tbl_trx_stock` (`uuid`, `trx_no`, `trx_date`, `id_product_material`, `type_product_material`, `trx_source`, `location`, `stock_status`, `stock_note`, `qty_begin`, `qty_in`, `qty_balance`, `id_unit`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`)
    VALUES (uuid(), v_trx_no, v_trx_date, NEW.id_product, v_type_product, v_trx_source, v_location, "I", concat("Insert by ", NEW.user_created, " on ", NEW.datetime_created), v_qty_begin, NEW.qty_do, v_qty_balance, v_id_unit, NEW.user_created, NEW.datetime_created, NEW.user_updated, NEW.datetime_updated);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_edhil.trg_trx_do_dtl_after_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_trx_do_dtl_after_update` AFTER UPDATE ON `tbl_trx_do_dtl` FOR EACH ROW BEGIN
    DECLARE v_location VARCHAR(50);
    DECLARE v_type_product VARCHAR(50);
    DECLARE v_trx_source VARCHAR(50);

    DECLARE v_qty_balance FLOAT(8, 5);
    DECLARE v_trx_no VARCHAR(50);
    DECLARE v_trx_date DATE;
    DECLARE v_id_unit INT;
    DECLARE v_qty_do_new FLOAT(8, 5);
    DECLARE v_qty_do_old FLOAT(8, 5);
    DECLARE v_qty_do_result FLOAT(8, 5);

    SET v_location = "WFG";
    SET v_type_product = "FINISH_GOODS";
    SET v_trx_source = "DELIVERY_ORDER";

    /* Cari qty_balance */
    IF EXISTS (SELECT `qty_balance` 
               FROM `tbl_trx_stock` 
               WHERE `id_product_material` = OLD.id_product 
                    AND `location` = v_location
               ORDER BY `id` DESC
               LIMIT 1) THEN
        SET v_qty_balance = (SELECT `qty_balance`
                             FROM `tbl_trx_stock` 
                             WHERE `id_product_material` = OLD.id_product
                                AND `location` = v_location
                             ORDER BY id DESC
                             LIMIT 1);
    ELSE
        SET v_qty_balance = 0;
    END IF;

    /* Cari doc_no dan doc_date */
    IF EXISTS (SELECT `doc_no`, `doc_date` 
               FROM `tbl_trx_do_hdr` 
               WHERE `id` = OLD.id_hdr
               LIMIT 1) THEN
        SET v_trx_no = (SELECT `doc_no` 
                        FROM `tbl_trx_do_hdr` 
                        WHERE `id` = OLD.id_hdr
                        LIMIT 1);
        SET v_trx_date = (SELECT `doc_date` 
                          FROM `tbl_trx_do_hdr` 
                          WHERE `id` = OLD.id_hdr
                          LIMIT 1);
    ELSE
        SET v_trx_no = NULL;
        SET v_trx_date = NULL;
    END IF;

    /* Cari id_unit */
    IF EXISTS (SELECT `id_unit` 
               FROM `tbl_mst_product` 
               WHERE `id` = OLD.id_product
               LIMIT 1) THEN
        SET v_id_unit = (SELECT `id_unit`
                         FROM `tbl_mst_product`
                         WHERE `id` = OLD.id_product
                         LIMIT 1);
    ELSE
        SET v_id_unit = 0;
    END IF;

    SET v_qty_do_new = NEW.qty_do;
    SET v_qty_do_old = OLD.qty_do;
    SET v_qty_do_result = (v_qty_balance + v_qty_do_old) - v_qty_do_new;

    /* https://mysqlserverteam.com/storing-uuid-values-in-mysql-tables/ */
    /* https://stackoverflow.com/questions/25658779/mysql-insert-current-date-only-in-insert-time */
    INSERT INTO `tbl_trx_stock` (`uuid`, `trx_no`, `trx_date`, `id_product_material`, `type_product_material`, `trx_source`, `location`, `stock_status`, `stock_note`, `qty_begin`, `qty_in`, `qty_out`, `qty_balance`, `id_unit`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`)
    VALUES (uuid(), v_trx_no, v_trx_date, OLD.id_product, v_type_product, v_trx_source, v_location, "U", concat("Update by ", NEW.user_updated, " on ", NEW.datetime_updated, " from qty ", v_qty_do_old, " to ", v_qty_do_new), v_qty_balance, v_qty_do_old, v_qty_do_new, v_qty_do_result, v_id_unit, NEW.user_created, NEW.datetime_created, NEW.user_updated, NEW.datetime_updated);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_edhil.trg_trx_gr_dtl_after_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_trx_gr_dtl_after_delete` AFTER DELETE ON `tbl_trx_gr_dtl` FOR EACH ROW BEGIN
	DECLARE v_location VARCHAR(50);
                DECLARE v_type_product_material VARCHAR(50);
                DECLARE v_trx_source VARCHAR(50);

                DECLARE v_qty_balance FLOAT(8, 5);
                DECLARE v_trx_no VARCHAR(50);
                DECLARE v_trx_date DATE;
                DECLARE v_id_unit_buying INT;
                DECLARE v_qty_in_old FLOAT(8, 5);
                DECLARE v_qty_result FLOAT(8, 5);
                
                SET v_location = "WRM";
                SET v_type_product_material = "RAW_MATERIAL";
                SET v_trx_source = "GR_RAW_MATERIAL";

                /* Cari qty_balance */
                IF EXISTS (SELECT `qty_balance` 
                           FROM `tbl_trx_stock` 
                           WHERE `id_product_material` = OLD.id_raw_material
                              AND `location` = v_location
                           ORDER BY `id` DESC
                           LIMIT 1) THEN
                    SET v_qty_balance = (SELECT `qty_balance`
                                         FROM `tbl_trx_stock` 
                                         WHERE `id_product_material` = OLD.id_raw_material
                                            AND `location` = v_location
                                         ORDER BY id DESC
                                         LIMIT 1);
                ELSE
                    SET v_qty_balance = 0;
                END IF;

                /* Cari doc_no dan doc_date */
                IF EXISTS (SELECT `doc_no`, `doc_date` 
                           FROM `tbl_trx_gr_hdr` 
                           WHERE `id` = OLD.id_hdr
                           LIMIT 1) THEN
                    SET v_trx_no = (SELECT `doc_no` 
                                    FROM `tbl_trx_gr_hdr` 
                                    WHERE `id` = OLD.id_hdr
                                    LIMIT 1);
                    SET v_trx_date = (SELECT `doc_date` 
                                      FROM `tbl_trx_gr_hdr` 
                                      WHERE `id` = OLD.id_hdr
                                      LIMIT 1);
                ELSE
                    SET v_trx_no = NULL;
                    SET v_trx_date = NULL;
                END IF;

                /* Cari id_unit_buying berdasarkan id_raw_material */
                IF EXISTS (SELECT `id_unit_buying` 
                           FROM `tbl_mst_raw_material` 
                           WHERE `id` = OLD.id_raw_material
                           LIMIT 1) THEN
                    SET v_id_unit_buying = (SELECT `id_unit_buying`
                                            FROM `tbl_mst_raw_material` 
                                            WHERE `id` = OLD.id_raw_material
                                            LIMIT 1);
                ELSE
                    SET v_id_unit_buying = 0;
                END IF;

                SET v_qty_in_old = OLD.qty_gr;
                SET v_qty_result = v_qty_balance - v_qty_in_old;

                /* https://mysqlserverteam.com/storing-uuid-values-in-mysql-tables/ */
                /* https://stackoverflow.com/questions/25658779/mysql-insert-current-date-only-in-insert-time */
                INSERT INTO `tbl_trx_stock` (`uuid`, `trx_no`, `trx_date`, `id_product_material`, `type_product_material`, `trx_source`, `location`, `stock_status`, `stock_note`, `qty_begin`, `qty_in`, `qty_out`, `qty_balance`, `id_unit`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`)
                VALUES (uuid(), v_trx_no, v_trx_date, OLD.id_raw_material, v_type_product_material, v_trx_source, v_location, "D", concat("Delete by ", OLD.user_updated, " on ", OLD.datetime_updated, " from qty ", v_qty_in_old, " to 0"), v_qty_balance, 0, v_qty_in_old, v_qty_result, v_id_unit_buying, OLD.user_created, OLD.datetime_created, OLD.user_updated, OLD.datetime_updated);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_edhil.trg_trx_gr_dtl_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_trx_gr_dtl_after_insert` AFTER INSERT ON `tbl_trx_gr_dtl` FOR EACH ROW BEGIN
                DECLARE v_location VARCHAR(50);                
                DECLARE v_type_product_material VARCHAR(50);
                DECLARE v_trx_source VARCHAR(50);

                DECLARE v_qty_begin FLOAT(8, 5);
                DECLARE v_trx_no VARCHAR(50);
                DECLARE v_trx_date DATE;
                DECLARE v_id_unit_buying INT;                
                DECLARE v_qty_balance FLOAT(8, 5);  

                SET v_location = "WRM";
                SET v_type_product_material = "RAW_MATERIAL";
                SET v_trx_source = "GR_RAW_MATERIAL";

                /* Cari qty_balance terakhir */
                IF EXISTS (SELECT `qty_balance` 
                           FROM `tbl_trx_stock` 
                           WHERE `id_product_material` = NEW.id_raw_material
                              AND `location` = v_location
                           ORDER BY `id` DESC
                           LIMIT 1) THEN
                    SET v_qty_begin = (SELECT `qty_balance`
                                       FROM `tbl_trx_stock` 
                                       WHERE `id_product_material` = NEW.id_raw_material
                                          AND `location` = v_location
                                       ORDER BY id DESC
                                       LIMIT 1);
                ELSE
                    SET v_qty_begin = 0;
                END IF;
                
                /* Cari doc_no dan doc_date terakhir */
                IF EXISTS (SELECT `doc_no`, `doc_date` 
                           FROM `tbl_trx_gr_hdr` 
                           WHERE `id` = NEW.id_hdr
                           LIMIT 1) THEN
                    SET v_trx_no = (SELECT `doc_no` 
                                    FROM `tbl_trx_gr_hdr` 
                                    WHERE `id` = NEW.id_hdr
                                    LIMIT 1);
                    SET v_trx_date = (SELECT `doc_date` 
                                      FROM `tbl_trx_gr_hdr` 
                                      WHERE `id` = NEW.id_hdr
                                      LIMIT 1);
                ELSE
                    SET v_trx_no = NULL;
                    SET v_trx_date = NULL;
                END IF;

                /* Cari id_unit_buying berdasarkan id_raw_material */
                IF EXISTS (SELECT `id_unit_buying` 
                           FROM `tbl_mst_raw_material` 
                           WHERE `id` = NEW.id_raw_material
                           LIMIT 1) THEN
                    SET v_id_unit_buying = (SELECT `id_unit_buying`
                                            FROM `tbl_mst_raw_material` 
                                            WHERE `id` = NEW.id_raw_material
                                            LIMIT 1);
                ELSE
                    SET v_id_unit_buying = 0;
                END IF;

                SET v_qty_balance = v_qty_begin + NEW.qty_gr;

                /* https://mysqlserverteam.com/storing-uuid-values-in-mysql-tables/ */
                /* https://stackoverflow.com/questions/25658779/mysql-insert-current-date-only-in-insert-time */
                INSERT INTO `tbl_trx_stock` (`uuid`, `trx_no`, `trx_date`, `id_product_material`, `type_product_material`, `trx_source`, `location`, `stock_status`, `stock_note`, `qty_begin`, `qty_in`, `qty_balance`, `id_unit`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`)
                VALUES (uuid(), v_trx_no, v_trx_date, NEW.id_raw_material, v_type_product_material, v_trx_source, v_location, "I", concat("Insert by ", NEW.user_created, " on ", NEW.datetime_created), v_qty_begin, NEW.qty_gr, v_qty_balance, v_id_unit_buying, NEW.user_created, NEW.datetime_created, NEW.user_updated, NEW.datetime_updated);
            END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_edhil.trg_trx_gr_dtl_after_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_trx_gr_dtl_after_update` AFTER UPDATE ON `tbl_trx_gr_dtl` FOR EACH ROW BEGIN
    DECLARE v_location VARCHAR(50);
    DECLARE v_type_product_material VARCHAR(50);
    DECLARE v_trx_source VARCHAR(50);

    DECLARE v_qty_balance FLOAT(8, 5);
    DECLARE v_trx_no VARCHAR(50);
    DECLARE v_trx_date DATE;
    DECLARE v_id_unit_buying INT;
    DECLARE v_qty_in_new FLOAT(8, 5);
    DECLARE v_qty_in_old FLOAT(8, 5);
    DECLARE v_qty_result FLOAT(8, 5);

    SET v_location = "WRM";
    SET v_type_product_material = "RAW_MATERIAL";
    SET v_trx_source = "GR_RAW_MATERIAL";

    /* Cari qty_balance */
    IF EXISTS (SELECT `qty_balance` 
               FROM `tbl_trx_stock` 
               WHERE `id_product_material` = OLD.id_raw_material 
                    AND `location` = v_location
               ORDER BY `id` DESC
               LIMIT 1) THEN
        SET v_qty_balance = (SELECT `qty_balance`
                             FROM `tbl_trx_stock` 
                             WHERE `id_product_material` = OLD.id_raw_material
                                AND `location` = v_location
                             ORDER BY id DESC
                             LIMIT 1);
    ELSE
        SET v_qty_balance = 0;
    END IF;

    /* Cari doc_no dan doc_date */
    IF EXISTS (SELECT `doc_no`, `doc_date` 
               FROM `tbl_trx_gr_hdr` 
               WHERE `id` = OLD.id_hdr
               LIMIT 1) THEN
        SET v_trx_no = (SELECT `doc_no` 
                        FROM `tbl_trx_gr_hdr` 
                        WHERE `id` = OLD.id_hdr
                        LIMIT 1);
        SET v_trx_date = (SELECT `doc_date` 
                          FROM `tbl_trx_gr_hdr` 
                          WHERE `id` = OLD.id_hdr
                          LIMIT 1);
    ELSE
        SET v_trx_no = NULL;
        SET v_trx_date = NULL;
    END IF;

    /* Cari id_unit_buying berdasarkan id_raw_material */
    IF EXISTS (SELECT `id_unit_buying` 
               FROM `tbl_mst_raw_material` 
               WHERE `id` = OLD.id_raw_material
               LIMIT 1) THEN
        SET v_id_unit_buying = (SELECT `id_unit_buying`
                                FROM `tbl_mst_raw_material`
                                WHERE `id` = OLD.id_raw_material
                                LIMIT 1);
    ELSE
        SET v_id_unit_buying = 0;
    END IF;

    SET v_qty_in_new = NEW.qty_gr;
    SET v_qty_in_old = OLD.qty_gr;
    SET v_qty_result = (v_qty_in_new - v_qty_in_old) + v_qty_balance;

    /* https://mysqlserverteam.com/storing-uuid-values-in-mysql-tables/ */
    /* https://stackoverflow.com/questions/25658779/mysql-insert-current-date-only-in-insert-time */
    INSERT INTO `tbl_trx_stock` (`uuid`, `trx_no`, `trx_date`, `id_product_material`, `type_product_material`, `trx_source`, `location`, `stock_status`, `stock_note`, `qty_begin`, `qty_in`, `qty_out`, `qty_balance`, `id_unit`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`)
    VALUES (uuid(), v_trx_no, v_trx_date, OLD.id_raw_material, v_type_product_material, v_trx_source, v_location, "U", concat("Update by ", NEW.user_updated, " on ", NEW.datetime_updated, " from qty ", v_qty_in_old, " to ", v_qty_in_new), v_qty_balance, v_qty_in_new, v_qty_in_old, v_qty_result, v_id_unit_buying, NEW.user_created, NEW.datetime_created, NEW.user_updated, NEW.datetime_updated);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_edhil.trg_trx_matreq_dtl_after_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_trx_matreq_dtl_after_delete` AFTER DELETE ON `tbl_trx_matreq_dtl` FOR EACH ROW BEGIN
                DECLARE v_type_product_material VARCHAR(50);
                DECLARE v_trx_source VARCHAR(50);
                DECLARE v_location_source VARCHAR(50);
                DECLARE v_location_dest VARCHAR(50);
                DECLARE v_qty_conversion FLOAT(8, 5);
                DECLARE v_id_unit_buying INT;
                DECLARE v_id_unit_usage INT;
                DECLARE v_qty_balance_source FLOAT(8, 5);
                DECLARE v_qty_balance_dest FLOAT(8, 5);
                DECLARE v_trx_no VARCHAR(50);
                DECLARE v_trx_date DATE;
                DECLARE v_qty_in_old FLOAT(8, 5);
                DECLARE v_qty_result_source FLOAT(8, 5);
                DECLARE v_qty_result_dest FLOAT(8, 5);

                SET v_type_product_material = "RAW_MATERIAL";
                SET v_trx_source = "MATERIAL_REQUEST";
                SET v_location_source = "WRM";
                SET v_location_dest = "WWIP";

                /* Cari konversinya berdasarkan id_raw_material */
                IF EXISTS (SELECT `qty_conversion` 
                           FROM `tbl_mst_raw_material` 
                           WHERE `id` = OLD.id_raw_material
                           LIMIT 1) THEN
                    SET v_qty_conversion = (SELECT `qty_conversion` 
                                            FROM `tbl_mst_raw_material`
                                            WHERE `id` = OLD.id_raw_material
                                            LIMIT 1);
                ELSE
                    SET v_qty_conversion = 0;
                END IF;

                IF EXISTS (SELECT `id_unit_buying`, `id_unit_usage` 
                           FROM `tbl_mst_raw_material` 
                           WHERE `id` = OLD.id_raw_material
                           LIMIT 1) THEN
                    SET v_id_unit_buying = (SELECT `id_unit_buying`
                                            FROM `tbl_mst_raw_material`
                                            WHERE `id` = OLD.id_raw_material
                                            LIMIT 1);
                    SET v_id_unit_usage = (SELECT `id_unit_usage`
                                           FROM `tbl_mst_raw_material` 
                                           WHERE `id` = OLD.id_raw_material
                                           LIMIT 1);
                ELSE
                    SET v_id_unit_buying = 1; /* Agar supaya jika tidak ada recordnya, tetap dikalikan dengan 1 */
                    SET v_id_unit_usage = 1;
                END IF;

                IF EXISTS (SELECT `qty_balance` 
                           FROM `tbl_trx_stock` 
                           WHERE `id_product_material` = OLD.id_raw_material
                              AND `location` = v_location_source
                           ORDER BY `id` DESC
                           LIMIT 1) THEN
                    SET v_qty_balance_source = (SELECT `qty_balance`
                                                FROM `tbl_trx_stock` 
                                                WHERE `id_product_material` = OLD.id_raw_material
                                                   AND `location` = v_location_source
                                                ORDER BY id DESC
                                                LIMIT 1);
                ELSE
                    SET v_qty_balance_source = 0;
                END IF;

                IF EXISTS (SELECT `qty_balance` 
                           FROM `tbl_trx_stock` 
                           WHERE `id_product_material` = OLD.id_raw_material
                              AND `location` = v_location_dest
                           ORDER BY `id` DESC
                           LIMIT 1) THEN
                    SET v_qty_balance_dest = (SELECT `qty_balance`
                                              FROM `tbl_trx_stock` 
                                              WHERE `id_product_material` = OLD.id_raw_material
                                                 AND `location` = v_location_dest
                                              ORDER BY id DESC
                                              LIMIT 1);
                ELSE
                    SET v_qty_balance_dest = 0;
                END IF;

                IF EXISTS (SELECT `doc_no`, `doc_date` 
                           FROM `tbl_trx_matreq_hdr` 
                           WHERE `id` = OLD.id_hdr
                           LIMIT 1) THEN
                    SET v_trx_no = (SELECT `doc_no` 
                                    FROM `tbl_trx_matreq_hdr` 
                                    WHERE `id` = OLD.id_hdr
                                    LIMIT 1);
                    SET v_trx_date = (SELECT `doc_date` 
                                      FROM `tbl_trx_matreq_hdr` 
                                      WHERE `id` = OLD.id_hdr
                                      LIMIT 1);
                ELSE
                    SET v_trx_no = NULL;
                    SET v_trx_date = NULL;
                END IF;

                SET v_qty_in_old = OLD.qty_matreq;
                SET v_qty_result_source = v_qty_balance_source + v_qty_in_old;
                SET v_qty_result_dest = v_qty_balance_dest - (v_qty_in_old * v_qty_conversion);

                /* https://mysqlserverteam.com/storing-uuid-values-in-mysql-tables/ */
                /* https://stackoverflow.com/questions/25658779/mysql-insert-current-date-only-in-insert-time */
                /* Source */
                INSERT INTO `tbl_trx_stock` (`uuid`, `trx_no`, `trx_date`, `id_product_material`, `type_product_material`, `trx_source`, `location`, `stock_status`, `stock_note`, `qty_begin`, `qty_in`, `qty_out`, `qty_balance`, `id_unit`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`)
                VALUES (uuid(), v_trx_no, v_trx_date, OLD.id_raw_material, v_type_product_material, v_trx_source, v_location_source, "D", concat("Delete by ", OLD.user_updated, " on ", OLD.datetime_updated, " from qty ", v_qty_in_old, " to 0"), v_qty_balance_source, v_qty_in_old, 0, v_qty_result_source, v_id_unit_buying, OLD.user_created, OLD.datetime_created, OLD.user_updated, OLD.datetime_updated);
                
                /* Destination */
                INSERT INTO `tbl_trx_stock` (`uuid`, `trx_no`, `trx_date`, `id_product_material`, `type_product_material`, `trx_source`, `location`, `stock_status`, `stock_note`, `qty_begin`, `qty_in`, `qty_out`, `qty_balance`, `id_unit`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`)
                VALUES (uuid(), v_trx_no, v_trx_date, OLD.id_raw_material, v_type_product_material, v_trx_source, v_location_dest, "D", concat("Delete by ", OLD.user_updated, " on ", OLD.datetime_updated, " from qty ", (v_qty_in_old * v_qty_conversion), " to 0"), v_qty_balance_dest, 0, (v_qty_in_old * v_qty_conversion), v_qty_result_dest, v_id_unit_usage, OLD.user_created, OLD.datetime_created, OLD.user_updated, OLD.datetime_updated);
            END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_edhil.trg_trx_matreq_dtl_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_trx_matreq_dtl_after_insert` AFTER INSERT ON `tbl_trx_matreq_dtl` FOR EACH ROW BEGIN
                DECLARE v_type_product_material VARCHAR(50);
                DECLARE v_trx_source VARCHAR(50);
                DECLARE v_location_min VARCHAR(50);
                DECLARE v_location_add VARCHAR(50);
                DECLARE v_id_unit_buying INT;
                DECLARE v_id_unit_usage INT;
                DECLARE v_qty_begin_min FLOAT(8, 5);
                DECLARE v_qty_begin_add FLOAT(8, 5);
                DECLARE v_trx_no VARCHAR(50);
                DECLARE v_trx_date DATE;
                DECLARE v_qty_conversion FLOAT(8, 5);
                DECLARE v_qty_balance_min FLOAT(8, 5);
                DECLARE v_qty_balance_add FLOAT(8, 5);

                SET v_type_product_material = "RAW_MATERIAL";
                SET v_trx_source = "MATERIAL_REQUEST";
                SET v_location_min = "WRM";
                SET v_location_add = "WWIP";

                /*
                    1. Dapatkan stok terakhir di lokasi min
                    2. Kurangkan stok terakhir di lokasi min dengan qty baru
                    3. Dapatkan stok terakhir di lokasi add
                    4. Tambahkan stok di lokasi add dengan qty baru                
                */

                IF EXISTS (SELECT `id_unit_buying`, `id_unit_usage` 
                           FROM `tbl_mst_raw_material` 
                           WHERE `id` = NEW.id_raw_material
                           LIMIT 1) THEN
                    SET v_id_unit_buying = (SELECT `id_unit_buying`
                                            FROM `tbl_mst_raw_material`
                                            WHERE `id` = NEW.id_raw_material
                                            LIMIT 1);
                    SET v_id_unit_usage = (SELECT `id_unit_usage`
                                           FROM `tbl_mst_raw_material` 
                                           WHERE `id` = NEW.id_raw_material
                                           LIMIT 1);
                ELSE
                    SET v_id_unit_buying = 1; /* Agar supaya jika tidak ada recordnya, tetap dikalikan dengan 1 */
                    SET v_id_unit_usage = 1;
                END IF;

                IF EXISTS (SELECT `qty_balance` 
                           FROM `tbl_trx_stock` 
                           WHERE `id_product_material` = NEW.id_raw_material
                              AND `location` = v_location_min
                           ORDER BY `id` DESC
                           LIMIT 1) THEN
                    SET v_qty_begin_min = (SELECT `qty_balance`
                                           FROM `tbl_trx_stock` 
                                           WHERE `id_product_material` = NEW.id_raw_material
                                              AND `location` = v_location_min
                                           ORDER BY id DESC
                                           LIMIT 1);
                ELSE
                    SET v_qty_begin_min = 0;
                END IF;

                IF EXISTS (SELECT `qty_balance` 
                           FROM `tbl_trx_stock` 
                           WHERE `id_product_material` = NEW.id_raw_material
                              AND `location` = v_location_add
                           ORDER BY `id` DESC
                           LIMIT 1) THEN
                    SET v_qty_begin_add = (SELECT `qty_balance`
                                           FROM `tbl_trx_stock` 
                                           WHERE `id_product_material` = NEW.id_raw_material
                                              AND `location` = v_location_add
                                           ORDER BY id DESC
                                           LIMIT 1);
                ELSE
                    SET v_qty_begin_add = 0;
                END IF;
    
                IF EXISTS (SELECT `doc_no`, `doc_date` 
                           FROM `tbl_trx_matreq_hdr` 
                           WHERE `id` = NEW.id_hdr
                           LIMIT 1) THEN
                    SET v_trx_no = (SELECT `doc_no` 
                                    FROM `tbl_trx_matreq_hdr` 
                                    WHERE `id` = NEW.id_hdr
                                    LIMIT 1);
                    SET v_trx_date = (SELECT `doc_date` 
                                      FROM `tbl_trx_matreq_hdr` 
                                      WHERE `id` = NEW.id_hdr
                                      LIMIT 1);
                ELSE
                    SET v_trx_no = NULL;
                    SET v_trx_date = NULL;
                END IF;

                /* Cari konversinya berdasarkan id_raw_material */
                IF EXISTS (SELECT `qty_conversion` 
                           FROM `tbl_mst_raw_material` 
                           WHERE `id` = NEW.id_raw_material
                           LIMIT 1) THEN
                    SET v_qty_conversion = (SELECT `qty_conversion` 
                                            FROM `tbl_mst_raw_material` 
                                            WHERE `id` = NEW.id_raw_material
                                            LIMIT 1);
                ELSE
                    SET v_qty_conversion = 0;
                END IF;

                SET v_qty_balance_min = v_qty_begin_min - NEW.qty_matreq;
                SET v_qty_balance_add = v_qty_begin_add + NEW.qty_matreq;

                /* https://mysqlserverteam.com/storing-uuid-values-in-mysql-tables/ */
                /* https://stackoverflow.com/questions/25658779/mysql-insert-current-date-only-in-insert-time */
                /* Kurangkan stok di lokasi awal */
                INSERT INTO `tbl_trx_stock` (`uuid`, `trx_no`, `trx_date`, `id_product_material`, `type_product_material`, `trx_source`, `location`, `stock_status`, `stock_note`, `qty_begin`, `qty_out`, `qty_balance`, `id_unit`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`)
                VALUES (uuid(), v_trx_no, v_trx_date, NEW.id_raw_material, v_type_product_material, v_trx_source, v_location_min, "O", concat("Out by ", NEW.user_created, " on ", NEW.datetime_created), v_qty_begin_min, NEW.qty_matreq, v_qty_balance_min, v_id_unit_buying, NEW.user_created, NEW.datetime_created, NEW.user_updated, NEW.datetime_updated);
                
                /* Tambahkan stok di lokasi tujuan */
                INSERT INTO `tbl_trx_stock` (`uuid`, `trx_no`, `trx_date`, `id_product_material`, `type_product_material`, `trx_source`, `location`, `stock_status`, `stock_note`, `qty_begin`, `qty_in`, `qty_balance`, `id_unit`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`)
                VALUES (uuid(), v_trx_no, v_trx_date, NEW.id_raw_material, v_type_product_material, v_trx_source, v_location_add, "I", concat("Insert by ", NEW.user_created, " on ", NEW.datetime_created), (v_qty_begin_add * v_qty_conversion), (NEW.qty_matreq * v_qty_conversion), (v_qty_balance_add * v_qty_conversion), v_id_unit_usage, NEW.user_created, NEW.datetime_created, NEW.user_updated, NEW.datetime_updated);
            END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_edhil.trg_trx_matreq_dtl_after_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_trx_matreq_dtl_after_update` AFTER UPDATE ON `tbl_trx_matreq_dtl` FOR EACH ROW BEGIN
                DECLARE v_type_product_material VARCHAR(50);
                DECLARE v_trx_source VARCHAR(50);
                DECLARE v_location_source VARCHAR(50);
                DECLARE v_location_dest VARCHAR(50);
                DECLARE v_qty_conversion FLOAT(8, 5);
                DECLARE v_id_unit_buying INT;
                DECLARE v_id_unit_usage INT;
                DECLARE v_qty_balance_source FLOAT(8, 5);
                DECLARE v_qty_balance_dest FLOAT(8, 5);
                DECLARE v_trx_no VARCHAR(50);
                DECLARE v_trx_date DATE;
                DECLARE v_qty_in_new FLOAT(8, 5);
                DECLARE v_qty_in_old FLOAT(8, 5);
                DECLARE v_qty_result_source FLOAT(8, 5);
                DECLARE v_qty_result_dest FLOAT(8, 5); 

                SET v_type_product_material = "RAW_MATERIAL";
                SET v_trx_source = "MATERIAL_REQUEST";
                SET v_location_source = "WRM";
                SET v_location_dest = "WWIP";

                /* Cari konversinya berdasarkan id_raw_material */
                IF EXISTS (SELECT `qty_conversion` 
                           FROM `tbl_mst_raw_material` 
                           WHERE `id` = OLD.id_raw_material
                           LIMIT 1) THEN
                    SET v_qty_conversion = (SELECT `qty_conversion` 
                                            FROM `tbl_mst_raw_material` 
                                            WHERE `id` = OLD.id_raw_material
                                            LIMIT 1);
                ELSE
                    SET v_qty_conversion = 0;
                END IF;

                IF EXISTS (SELECT `id_unit_buying`, `id_unit_usage` 
                           FROM `tbl_mst_raw_material` 
                           WHERE `id` = OLD.id_raw_material
                           LIMIT 1) THEN
                    SET v_id_unit_buying = (SELECT `id_unit_buying`
                                            FROM `tbl_mst_raw_material`
                                            WHERE `id` = OLD.id_raw_material
                                            LIMIT 1);
                    SET v_id_unit_usage = (SELECT `id_unit_usage`
                                           FROM `tbl_mst_raw_material` 
                                           WHERE `id` = OLD.id_raw_material
                                           LIMIT 1);
                ELSE
                    SET v_id_unit_buying = 1; /* Agar supaya jika tidak ada recordnya, tetap dikalikan dengan 1 */
                    SET v_id_unit_usage = 1;
                END IF;

                /* Stock awal di lokasi sumber */
                IF EXISTS (SELECT `qty_balance` 
                           FROM `tbl_trx_stock` 
                           WHERE `id_product_material` = OLD.id_raw_material
                              AND `location` = v_location_source
                           ORDER BY `id` DESC
                           LIMIT 1) THEN
                    SET v_qty_balance_source = (SELECT `qty_balance`
                                                FROM `tbl_trx_stock` 
                                                WHERE `id_product_material` = OLD.id_raw_material
                                                   AND `location` = v_location_source
                                                ORDER BY id DESC
                                                LIMIT 1);
                ELSE
                    SET v_qty_balance_source = 0;
                END IF;

                /* Stock awal di lokasi tujuan */
                IF EXISTS (SELECT `qty_balance` 
                           FROM `tbl_trx_stock` 
                           WHERE `id_product_material` = OLD.id_raw_material
                              AND `location` = v_location_dest
                           ORDER BY `id` DESC
                           LIMIT 1) THEN
                    SET v_qty_balance_dest = (SELECT `qty_balance`
                                              FROM `tbl_trx_stock` 
                                              WHERE `id_product_material` = OLD.id_raw_material
                                                 AND `location` = v_location_dest
                                              ORDER BY id DESC
                                              LIMIT 1);
                ELSE
                    SET v_qty_balance_dest = 0;
                END IF;

                /* Doc No & Doc Date transaksi */
                IF EXISTS (SELECT `doc_no`, `doc_date` 
                           FROM `tbl_trx_gr_hdr` 
                           WHERE `id` = OLD.id_hdr
                           LIMIT 1) THEN
                    SET v_trx_no = (SELECT `doc_no` 
                                    FROM `tbl_trx_matreq_hdr` 
                                    WHERE `id` = OLD.id_hdr
                                    LIMIT 1);
                    SET v_trx_date = (SELECT `doc_date` 
                                      FROM `tbl_trx_matreq_hdr` 
                                      WHERE `id` = OLD.id_hdr
                                      LIMIT 1);
                ELSE
                    SET v_trx_no = NULL;
                    SET v_trx_date = NULL;
                END IF;

                SET v_qty_in_new = NEW.qty_matreq;
                SET v_qty_in_old = OLD.qty_matreq;

                SET v_qty_result_source = (v_qty_in_old - v_qty_in_new) + v_qty_balance_source;
                SET v_qty_result_dest = ((v_qty_in_new * v_qty_conversion) - (v_qty_in_old * v_qty_conversion)) + v_qty_balance_dest;

                /* https://mysqlserverteam.com/storing-uuid-values-in-mysql-tables/ */
                /* https://stackoverflow.com/questions/25658779/mysql-insert-current-date-only-in-insert-time */
                /* Source */
                INSERT INTO `tbl_trx_stock` (`uuid`, `trx_no`, `trx_date`, `id_product_material`, `type_product_material`, `trx_source`, `location`, `stock_status`, `stock_note`, `qty_begin`, `qty_in`, `qty_out`, `qty_balance`, `id_unit`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`)
                VALUES (uuid(), v_trx_no, v_trx_date, OLD.id_raw_material, v_type_product_material, v_trx_source, v_location_source, "U", concat("Update by ", NEW.user_updated, " on ", NEW.datetime_updated, " from qty ", v_qty_in_old, " to ", v_qty_in_new), v_qty_balance_source, v_qty_in_old, v_qty_in_new, v_qty_result_source, v_id_unit_buying, NEW.user_created, NEW.datetime_created, NEW.user_updated, NEW.datetime_updated);
                
                /* Destination */
                INSERT INTO `tbl_trx_stock` (`uuid`, `trx_no`, `trx_date`, `id_product_material`, `type_product_material`, `trx_source`, `location`, `stock_status`, `stock_note`, `qty_begin`, `qty_in`, `qty_out`, `qty_balance`, `id_unit`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`)
                VALUES (uuid(), v_trx_no, v_trx_date, OLD.id_raw_material, v_type_product_material, v_trx_source, v_location_dest, "U", concat("Update by ", NEW.user_updated, " on ", NEW.datetime_updated, " from qty ", (v_qty_in_old * v_qty_conversion), " to ", (v_qty_in_new * v_qty_conversion)), v_qty_balance_dest, (v_qty_in_new * v_qty_conversion), (v_qty_in_old * v_qty_conversion), v_qty_result_dest, v_id_unit_usage, NEW.user_created, NEW.datetime_created, NEW.user_updated, NEW.datetime_updated);
            END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_edhil.trg_trx_matusage_dtl_after_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_trx_matusage_dtl_after_delete` AFTER DELETE ON `tbl_trx_matusage_dtl` FOR EACH ROW BEGIN
                DECLARE v_location VARCHAR(50);
                DECLARE v_type_product_material VARCHAR(50);
                DECLARE v_trx_source VARCHAR(50);

                DECLARE v_qty_balance FLOAT(8, 5);
                DECLARE v_trx_no VARCHAR(50);
                DECLARE v_trx_date DATE;
                DECLARE v_id_unit_usage INT;
                DECLARE v_qty_out_old FLOAT(8, 5);
                DECLARE v_qty_result FLOAT(8, 5);
                
                SET v_location = "WWIP";
                SET v_type_product_material = "RAW_MATERIAL";
                SET v_trx_source = "MATERIAL_USAGE";

                /* Cari qty_balance */
                IF EXISTS (SELECT `qty_balance` 
                           FROM `tbl_trx_stock` 
                           WHERE `id_product_material` = OLD.id_raw_material
                              AND `location` = v_location
                           ORDER BY `id` DESC
                           LIMIT 1) THEN
                    SET v_qty_balance = (SELECT `qty_balance`
                                         FROM `tbl_trx_stock` 
                                         WHERE `id_product_material` = OLD.id_raw_material
                                            AND `location` = v_location
                                         ORDER BY id DESC
                                         LIMIT 1);
                ELSE
                    SET v_qty_balance = 0;
                END IF;

                /* Cari doc_no dan doc_date */
                IF EXISTS (SELECT `doc_no`, `doc_date` 
                           FROM `tbl_trx_matusage_hdr` 
                           WHERE `id` = OLD.id_hdr
                           LIMIT 1) THEN
                    SET v_trx_no = (SELECT `doc_no` 
                                    FROM `tbl_trx_matusage_hdr` 
                                    WHERE `id` = OLD.id_hdr
                                    LIMIT 1);
                    SET v_trx_date = (SELECT `doc_date` 
                                      FROM `tbl_trx_matusage_hdr` 
                                      WHERE `id` = OLD.id_hdr
                                      LIMIT 1);
                ELSE
                    SET v_trx_no = NULL;
                    SET v_trx_date = NULL;
                END IF;

                /* Cari id_unit_usage berdasarkan id_raw_material */
                IF EXISTS (SELECT `id_unit_usage` 
                           FROM `tbl_mst_raw_material` 
                           WHERE `id` = OLD.id_raw_material
                           LIMIT 1) THEN
                    SET v_id_unit_usage = (SELECT `id_unit_usage`
                                           FROM `tbl_mst_raw_material` 
                                           WHERE `id` = OLD.id_raw_material
                                           LIMIT 1);
                ELSE
                    SET v_id_unit_usage = 0;
                END IF;

                SET v_qty_out_old = OLD.qty_matusage;
                SET v_qty_result = v_qty_balance + v_qty_out_old;

                /* https://mysqlserverteam.com/storing-uuid-values-in-mysql-tables/ */
                /* https://stackoverflow.com/questions/25658779/mysql-insert-current-date-only-in-insert-time */
                INSERT INTO `tbl_trx_stock` (`uuid`, `trx_no`, `trx_date`, `id_product_material`, `type_product_material`, `trx_source`, `location`, `stock_status`, `stock_note`, `qty_begin`, `qty_in`, `qty_out`, `qty_balance`, `id_unit`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`)
                VALUES (uuid(), v_trx_no, v_trx_date, OLD.id_raw_material, v_type_product_material, v_trx_source, v_location, "D", concat("Delete by ", OLD.user_updated, " on ", OLD.datetime_updated, " from qty ", v_qty_out_old, " to 0"), v_qty_balance, v_qty_out_old, 0, v_qty_result, v_id_unit_usage, OLD.user_created, OLD.datetime_created, OLD.user_updated, OLD.datetime_updated);
            END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_edhil.trg_trx_matusage_dtl_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_trx_matusage_dtl_after_insert` AFTER INSERT ON `tbl_trx_matusage_dtl` FOR EACH ROW BEGIN
                DECLARE v_location VARCHAR(50);                
                DECLARE v_type_product_material VARCHAR(50);
                DECLARE v_trx_source VARCHAR(50);

                DECLARE v_qty_begin FLOAT(8, 5);
                DECLARE v_trx_no VARCHAR(50);
                DECLARE v_trx_date DATE;
                DECLARE v_id_unit_usage INT;
                DECLARE v_qty_balance FLOAT(8, 5);  

                SET v_location = "WWIP";
                SET v_type_product_material = "RAW_MATERIAL";
                SET v_trx_source = "MATERIAL_USAGE";

                /* Cari qty_balance terakhir */
                IF EXISTS (SELECT `qty_balance` 
                           FROM `tbl_trx_stock` 
                           WHERE `id_product_material` = NEW.id_raw_material
                              AND `location` = v_location
                           ORDER BY `id` DESC
                           LIMIT 1) THEN
                    SET v_qty_begin = (SELECT `qty_balance`
                                       FROM `tbl_trx_stock` 
                                       WHERE `id_product_material` = NEW.id_raw_material
                                          AND `location` = v_location
                                       ORDER BY id DESC
                                       LIMIT 1);
                ELSE
                    SET v_qty_begin = 0;
                END IF;
                
                /* Cari doc_no dan doc_date terakhir */
                IF EXISTS (SELECT `doc_no`, `doc_date` 
                           FROM `tbl_trx_matusage_hdr` 
                           WHERE `id` = NEW.id_hdr
                           LIMIT 1) THEN
                    SET v_trx_no = (SELECT `doc_no` 
                                    FROM `tbl_trx_matusage_hdr` 
                                    WHERE `id` = NEW.id_hdr
                                    LIMIT 1);
                    SET v_trx_date = (SELECT `doc_date` 
                                      FROM `tbl_trx_matusage_hdr` 
                                      WHERE `id` = NEW.id_hdr
                                      LIMIT 1);
                ELSE
                    SET v_trx_no = NULL;
                    SET v_trx_date = NULL;
                END IF;

                /* Cari id_unit_usage berdasarkan id_raw_material */
                IF EXISTS (SELECT `id_unit_usage` 
                           FROM `tbl_mst_raw_material` 
                           WHERE `id` = NEW.id_raw_material
                           LIMIT 1) THEN
                    SET v_id_unit_usage = (SELECT `id_unit_usage`
                                           FROM `tbl_mst_raw_material` 
                                           WHERE `id` = NEW.id_raw_material
                                           LIMIT 1);
                ELSE
                    SET v_id_unit_usage = 0;
                END IF;

                SET v_qty_balance = v_qty_begin - NEW.qty_matusage;

                /* https://mysqlserverteam.com/storing-uuid-values-in-mysql-tables/ */
                /* https://stackoverflow.com/questions/25658779/mysql-insert-current-date-only-in-insert-time */
                INSERT INTO `tbl_trx_stock` (`uuid`, `trx_no`, `trx_date`, `id_product_material`, `type_product_material`, `trx_source`, `location`, `stock_status`, `stock_note`, `qty_begin`, `qty_out`, `qty_balance`, `id_unit`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`)
                VALUES (uuid(), v_trx_no, v_trx_date, NEW.id_raw_material, v_type_product_material, v_trx_source, v_location, "I", concat("Insert by ", NEW.user_created, " on ", NEW.datetime_created), v_qty_begin, NEW.qty_matusage, v_qty_balance, v_id_unit_usage, NEW.user_created, NEW.datetime_created, NEW.user_updated, NEW.datetime_updated);
            END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for trigger db_edhil.trg_trx_matusage_dtl_after_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `trg_trx_matusage_dtl_after_update` AFTER UPDATE ON `tbl_trx_matusage_dtl` FOR EACH ROW BEGIN
                DECLARE v_location VARCHAR(50);
                DECLARE v_type_product_material VARCHAR(50);
                DECLARE v_trx_source VARCHAR(50);

                DECLARE v_qty_balance FLOAT(8, 5);
                DECLARE v_trx_no VARCHAR(50);
                DECLARE v_trx_date DATE;
                DECLARE v_id_unit_usage INT;
                DECLARE v_qty_out_new FLOAT(8, 5);
                DECLARE v_qty_out_old FLOAT(8, 5);
                DECLARE v_qty_result FLOAT(8, 5);

                SET v_location = "WWIP";
                SET v_type_product_material = "RAW_MATERIAL";
                SET v_trx_source = "MATERIAL_USAGE";

                /* Cari qty_balance */
                IF EXISTS (SELECT `qty_balance` 
                           FROM `tbl_trx_stock` 
                           WHERE `id_product_material` = OLD.id_raw_material 
                                AND `location` = v_location
                           ORDER BY `id` DESC
                           LIMIT 1) THEN
                    SET v_qty_balance = (SELECT `qty_balance`
                                         FROM `tbl_trx_stock` 
                                         WHERE `id_product_material` = OLD.id_raw_material
                                            AND `location` = v_location
                                         ORDER BY id DESC
                                         LIMIT 1);
                ELSE
                    SET v_qty_balance = 0;
                END IF;

                /* Cari doc_no dan doc_date */
                IF EXISTS (SELECT `doc_no`, `doc_date` 
                           FROM `tbl_trx_matusage_hdr` 
                           WHERE `id` = OLD.id_hdr
                           LIMIT 1) THEN
                    SET v_trx_no = (SELECT `doc_no` 
                                    FROM `tbl_trx_matusage_hdr` 
                                    WHERE `id` = OLD.id_hdr
                                    LIMIT 1);
                    SET v_trx_date = (SELECT `doc_date` 
                                      FROM `tbl_trx_matusage_hdr` 
                                      WHERE `id` = OLD.id_hdr
                                      LIMIT 1);
                ELSE
                    SET v_trx_no = NULL;
                    SET v_trx_date = NULL;
                END IF;

                /* Cari id_unit_usage berdasarkan id_raw_material */
                IF EXISTS (SELECT `id_unit_usage` 
                           FROM `tbl_mst_raw_material` 
                           WHERE `id` = OLD.id_raw_material
                           LIMIT 1) THEN
                    SET v_id_unit_usage = (SELECT `id_unit_usage`
                                           FROM `tbl_mst_raw_material`
                                           WHERE `id` = OLD.id_raw_material
                                           LIMIT 1);
                ELSE
                    SET v_id_unit_usage = 0;
                END IF;

                SET v_qty_out_new = NEW.qty_matusage;
                SET v_qty_out_old = OLD.qty_matusage;
                SET v_qty_result = (v_qty_balance + v_qty_out_old) - v_qty_out_new;

                /* https://mysqlserverteam.com/storing-uuid-values-in-mysql-tables/ */
                /* https://stackoverflow.com/questions/25658779/mysql-insert-current-date-only-in-insert-time */
                INSERT INTO `tbl_trx_stock` (`uuid`, `trx_no`, `trx_date`, `id_product_material`, `type_product_material`, `trx_source`, `location`, `stock_status`, `stock_note`, `qty_begin`, `qty_in`, `qty_out`, `qty_balance`, `id_unit`, `user_created`, `datetime_created`, `user_updated`, `datetime_updated`)
                VALUES (uuid(), v_trx_no, v_trx_date, OLD.id_raw_material, v_type_product_material, v_trx_source, v_location, "U", concat("Update by ", NEW.user_updated, " on ", NEW.datetime_updated, " from qty ", v_qty_out_old, " to ", v_qty_out_new), v_qty_balance, v_qty_out_old, v_qty_out_new, v_qty_result, v_id_unit_usage, NEW.user_created, NEW.datetime_created, NEW.user_updated, NEW.datetime_updated);
            END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Dumping structure for view db_edhil.view_mst_bom_dtl
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_mst_bom_dtl`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_mst_bom_dtl` AS SELECT 
                tbl_mst_bom_dtl.*,
                view_mst_raw_material.material_code,
                view_mst_raw_material.material_name,
                view_mst_raw_material.vpn_no,
                view_mst_raw_material.id_unit_buying,
                view_mst_raw_material.unit_code_buying,
                view_mst_raw_material.unit_name_buying,
                view_mst_raw_material.id_unit_usage,
                view_mst_raw_material.unit_code_usage,
                view_mst_raw_material.unit_name_usage,
                view_mst_raw_material.id_supplier,
                view_mst_raw_material.supplier_code,
                view_mst_raw_material.supplier_name,
                view_mst_raw_material.qty_conversion
            FROM
                tbl_mst_bom_dtl
                LEFT OUTER JOIN view_mst_raw_material ON tbl_mst_bom_dtl.id_raw_material = view_mst_raw_material.id ;

-- Dumping structure for view db_edhil.view_mst_bom_hdr
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_mst_bom_hdr`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_mst_bom_hdr` AS SELECT 
                tbl_mst_bom_hdr.*,
					 view_mst_product.product_code,
                view_mst_product.product_name,
                view_mst_product.cpn_no,
                view_mst_product.model_project,
                view_mst_product.id_product_group,
                view_mst_product.product_group_code,
                view_mst_product.product_group_name,
                view_mst_product.id_unit,
                view_mst_product.unit_code,
                view_mst_product.unit_name,
                view_mst_product.id_customer,
                view_mst_product.customer_code,
                view_mst_product.customer_name,
                view_mst_product.color,
                view_mst_product.type_of_material,
                view_mst_product.gross_weight,
                view_mst_product.net_weight,
                view_mst_product.life_span_num,
                view_mst_product.life_span_time,
                view_mst_product.life_span_num_time,
					 view_mst_product.cavity,
					 view_mst_product.cavity_text,
					 view_mst_product.mp_net_weight,
					 view_mst_product.machine_tonage,
					 view_mst_product.machine_tonage_text,
					 view_mst_product.`process`,
					 view_mst_product.machine_code,
					 view_mst_product.cycle_time_num,
					 view_mst_product.cycle_time_mp,
	             view_mst_product.assy_time_num,
	             view_mst_product.assy_time_mp
            FROM
                tbl_mst_bom_hdr
                LEFT OUTER JOIN view_mst_product ON tbl_mst_bom_hdr.id_product = view_mst_product.id ;

-- Dumping structure for view db_edhil.view_mst_product
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_mst_product`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_mst_product` AS SELECT
                tbl_mst_product.*,
                tbl_mst_product_group.product_group_code,
                tbl_mst_product_group.product_group_name,
                tbl_mst_unit.unit_code,
                tbl_mst_unit.unit_name,
                tbl_mst_customer.customer_code,
                tbl_mst_customer.customer_name,
                CONCAT(tbl_mst_product.life_span_num, ' ' ,IF(tbl_mst_product.life_span_time = 0, 'YEAR', 'MONTH')) AS life_span_num_time,
                CONCAT(tbl_mst_product.cavity, ' CAVITY') AS cavity_text,
                CONCAT(tbl_mst_product.machine_tonage, ' TON') AS machine_tonage_text,
                'FINISH_GOODS' AS type_product
            FROM
                tbl_mst_product 
                LEFT OUTER JOIN tbl_mst_product_group ON tbl_mst_product.id_product_group = tbl_mst_product_group.id
                LEFT OUTER JOIN tbl_mst_unit ON tbl_mst_product.id_unit = tbl_mst_unit.id
                LEFT OUTER JOIN tbl_mst_customer ON tbl_mst_product.id_customer = tbl_mst_customer.id ;

-- Dumping structure for view db_edhil.view_mst_product_material_union
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_mst_product_material_union`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_mst_product_material_union` AS SELECT
                id AS product_material_id,
                material_code AS product_material_code,
                material_name AS product_material_name,
                'RAW_MATERIAL' AS product_material_type,    
                active
            FROM
                view_mst_raw_material
            UNION ALL
            SELECT
                id AS product_material_id,
                product_code AS product_material_code,
                product_name AS product_material_name,
                'FINISH_GOODS' AS product_material_type,
                active
            FROM
                view_mst_product ;

-- Dumping structure for view db_edhil.view_mst_raw_material
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_mst_raw_material`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_mst_raw_material` AS SELECT 
                tbl_mst_raw_material.*,
                tbl_mst_unit_buying.unit_code AS unit_code_buying,
                tbl_mst_unit_buying.unit_name AS unit_name_buying,
                tbl_mst_unit_usage.unit_code AS unit_code_usage,
                tbl_mst_unit_usage.unit_name AS unit_name_usage,
                tbl_mst_supplier.supplier_code,
                tbl_mst_supplier.supplier_name,
                'RAW_MATERIAL' AS type_product
            FROM
                tbl_mst_raw_material
                LEFT OUTER JOIN tbl_mst_unit AS tbl_mst_unit_buying ON tbl_mst_raw_material.id_unit_buying = tbl_mst_unit_buying.id
                LEFT OUTER JOIN tbl_mst_unit AS tbl_mst_unit_usage ON tbl_mst_raw_material.id_unit_usage = tbl_mst_unit_usage.id
                LEFT OUTER JOIN tbl_mst_supplier ON tbl_mst_raw_material.id_supplier = tbl_mst_supplier.id ;

-- Dumping structure for view db_edhil.view_trx_allocfg_dtl
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trx_allocfg_dtl`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_trx_allocfg_dtl` AS SELECT
                tbl_trx_allocfg_dtl.*,
                view_mst_product.product_code,
                view_mst_product.product_name,
                view_mst_product.cpn_no,
                view_mst_product.id_unit,
                view_mst_product.unit_code,
                view_mst_product.unit_name
            FROM
                tbl_trx_allocfg_dtl
                LEFT OUTER JOIN tbl_trx_allocfg_hdr ON tbl_trx_allocfg_dtl.id_hdr = tbl_trx_allocfg_hdr.id
                LEFT OUTER JOIN view_mst_product ON tbl_trx_allocfg_dtl.id_product = view_mst_product.id ;

-- Dumping structure for view db_edhil.view_trx_allocfg_hdr
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trx_allocfg_hdr`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_trx_allocfg_hdr` AS SELECT
                tbl_trx_allocfg_hdr.id,
                tbl_trx_allocfg_hdr.uuid,
                tbl_trx_allocfg_hdr.doc_no,
                tbl_trx_allocfg_hdr.doc_date,
                tbl_trx_allocfg_hdr.doc_time,
                tbl_trx_allocfg_hdr.remarks,
                tbl_trx_allocfg_hdr.active,
                tbl_trx_allocfg_hdr.user_created,
                tbl_trx_allocfg_hdr.datetime_created,
                tbl_trx_allocfg_hdr.user_updated,
                tbl_trx_allocfg_hdr.datetime_updated
            FROM
                tbl_trx_allocfg_hdr ;

-- Dumping structure for view db_edhil.view_trx_do_dtl
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trx_do_dtl`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_trx_do_dtl` AS SELECT
    tbl_trx_do_dtl.*,
    view_mst_product.product_code,
    view_mst_product.product_name,
    view_mst_product.cpn_no,
    view_mst_product.id_unit,
    view_mst_product.unit_code,
    view_mst_product.unit_name
FROM
    tbl_trx_do_dtl
    LEFT OUTER JOIN tbl_trx_do_hdr ON tbl_trx_do_dtl.id_hdr = tbl_trx_do_hdr.id
    LEFT OUTER JOIN view_mst_product ON tbl_trx_do_dtl.id_product = view_mst_product.id ;

-- Dumping structure for view db_edhil.view_trx_do_hdr
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trx_do_hdr`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_trx_do_hdr` AS SELECT
    tbl_trx_do_hdr.id,
    tbl_trx_do_hdr.uuid,
    tbl_trx_do_hdr.doc_no,
    tbl_trx_do_hdr.doc_date,
    tbl_trx_do_hdr.doc_time,
    tbl_trx_do_hdr.vehicle_number,
    tbl_trx_do_hdr.driver_name,
    tbl_trx_do_hdr.loading_time,
    tbl_trx_do_hdr.remarks,
    tbl_trx_do_hdr.active,
    tbl_trx_do_hdr.user_created,
    tbl_trx_do_hdr.datetime_created,
    tbl_trx_do_hdr.user_updated,
    tbl_trx_do_hdr.datetime_updated
FROM
    tbl_trx_do_hdr ;

-- Dumping structure for view db_edhil.view_trx_gr_dtl
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trx_gr_dtl`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_trx_gr_dtl` AS SELECT 
                tbl_trx_gr_dtl.*,
                view_mst_raw_material.material_code,
                view_mst_raw_material.material_name,
                view_mst_raw_material.vpn_no,
                view_mst_raw_material.id_unit_buying,
                view_mst_raw_material.unit_code_buying,
                view_mst_raw_material.unit_name_buying,
                view_mst_raw_material.id_unit_usage,
                view_mst_raw_material.unit_code_usage,
                view_mst_raw_material.unit_name_usage,
                view_mst_raw_material.qty_conversion
            FROM
                tbl_trx_gr_dtl
                LEFT OUTER JOIN view_mst_raw_material ON tbl_trx_gr_dtl.id_raw_material = view_mst_raw_material.id ;

-- Dumping structure for view db_edhil.view_trx_gr_hdr
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trx_gr_hdr`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_trx_gr_hdr` AS SELECT 
                tbl_trx_gr_hdr.*,
                tbl_mst_supplier.supplier_code,
                tbl_mst_supplier.supplier_name
            FROM
                tbl_trx_gr_hdr
                LEFT OUTER JOIN tbl_mst_supplier ON tbl_trx_gr_hdr.id_supplier = tbl_mst_supplier.id ;

-- Dumping structure for view db_edhil.view_trx_matreq_dtl
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trx_matreq_dtl`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_trx_matreq_dtl` AS SELECT 
                tbl_trx_matreq_dtl.*,
                view_mst_raw_material.material_code,
                view_mst_raw_material.material_name,
                view_mst_raw_material.vpn_no,
                view_mst_raw_material.id_unit_buying,
                view_mst_raw_material.unit_code_buying,
                view_mst_raw_material.unit_name_buying,
                view_mst_raw_material.id_unit_usage,
                view_mst_raw_material.unit_code_usage,
                view_mst_raw_material.unit_name_usage,
                view_mst_raw_material.id_supplier,
                view_mst_raw_material.supplier_code,
                view_mst_raw_material.supplier_name,
                view_mst_raw_material.qty_conversion
            FROM
                tbl_trx_matreq_dtl
                LEFT OUTER JOIN view_mst_raw_material ON tbl_trx_matreq_dtl.id_raw_material = view_mst_raw_material.id ;

-- Dumping structure for view db_edhil.view_trx_matreq_hdr
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trx_matreq_hdr`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_trx_matreq_hdr` AS SELECT 
                tbl_trx_matreq_hdr.*
            FROM
                tbl_trx_matreq_hdr ;

-- Dumping structure for view db_edhil.view_trx_matusage_dtl
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trx_matusage_dtl`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_trx_matusage_dtl` AS SELECT
                tbl_trx_matusage_dtl.*,
                view_mst_raw_material.material_code,
                view_mst_raw_material.material_name,
                view_mst_raw_material.vpn_no,
                tbl_mst_unit.unit_code,
                tbl_mst_unit.unit_name
            FROM
                tbl_trx_matusage_dtl
                LEFT OUTER JOIN view_mst_raw_material ON tbl_trx_matusage_dtl.id_raw_material = view_mst_raw_material.id
                LEFT OUTER JOIN tbl_mst_unit ON tbl_trx_matusage_dtl.id_unit = tbl_mst_unit.id ;

-- Dumping structure for view db_edhil.view_trx_matusage_hdr
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trx_matusage_hdr`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_trx_matusage_hdr` AS SELECT
                tbl_trx_matusage_hdr.*
            FROM
                tbl_trx_matusage_hdr ;

-- Dumping structure for view db_edhil.view_trx_prodactual_dtl
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trx_prodactual_dtl`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_trx_prodactual_dtl` AS SELECT
                tbl_trx_prodactual_dtl.*,
                view_mst_product.product_code,
                view_mst_product.product_name,
                view_mst_product.cpn_no,
                view_mst_product.unit_code,
                view_mst_product.unit_name
            FROM
                tbl_trx_prodactual_dtl
                LEFT OUTER JOIN view_mst_product ON tbl_trx_prodactual_dtl.id_product = view_mst_product.id ;

-- Dumping structure for view db_edhil.view_trx_prodactual_hdr
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trx_prodactual_hdr`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_trx_prodactual_hdr` AS SELECT
                tbl_trx_prodactual_hdr.*
            FROM
                tbl_trx_prodactual_hdr ;

-- Dumping structure for view db_edhil.view_trx_prodactual_qty
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trx_prodactual_qty`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_trx_prodactual_qty` AS SELECT
	YEAR(a.prod_actual_date) AS tahun,
	MONTH(a.prod_actual_date) AS bulan,
	DAY(a.prod_actual_date) AS tanggal,
	b.qty_ok AS qty_ok,
	b.qty_reject AS qty_reject,
	b.qty_rework AS qty_rework,
	b.qty_total AS qty_produce,
	b.time_start,
	b.time_finish,
	b.time_total
FROM
	view_trx_prodactual_hdr a
	LEFT OUTER JOIN view_trx_prodactual_dtl b ON a.id = b.id_hdr ;

-- Dumping structure for view db_edhil.view_trx_prodplan_dtl
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trx_prodplan_dtl`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_trx_prodplan_dtl` AS SELECT 
                tbl_trx_prodplan_dtl.*,
                view_mst_product.product_code,
                view_mst_product.product_name,
                view_mst_product.unit_code,
                view_mst_product.unit_name,
                tbl_trx_prodplan_hdr.month,
                tbl_trx_prodplan_hdr.year
            FROM
                tbl_trx_prodplan_dtl
                LEFT OUTER JOIN view_mst_product ON tbl_trx_prodplan_dtl.id_product = view_mst_product.id 
                LEFT OUTER JOIN tbl_trx_prodplan_hdr ON tbl_trx_prodplan_dtl.id_hdr = tbl_trx_prodplan_hdr.id ;

-- Dumping structure for view db_edhil.view_trx_prodplan_hdr
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trx_prodplan_hdr`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_trx_prodplan_hdr` AS SELECT 
                tbl_trx_prodplan_hdr.*
            FROM
                tbl_trx_prodplan_hdr ;

-- Dumping structure for view db_edhil.view_trx_prodplan_qty
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trx_prodplan_qty`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_trx_prodplan_qty` AS SELECT
	YEAR(a.date_prodplan) AS tahun,
	MONTH(a.date_prodplan) AS bulan,
	DAY(a.date_prodplan) AS tanggal,		
	a.qty_prodplan AS qty,
	a.time_start,
	a.time_finish,
	a.time_total
FROM
	tbl_trx_prodplan_dtl a ;

-- Dumping structure for view db_edhil.view_trx_stock
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trx_stock`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_trx_stock` AS SELECT
                tbl_trx_stock.*,
                view_mst_product_material_union.product_material_code,
                view_mst_product_material_union.product_material_name,
                view_mst_product_material_union.active,
                tbl_mst_unit.unit_code,
                tbl_mst_unit.unit_name
            FROM
                tbl_trx_stock
                LEFT OUTER JOIN view_mst_product_material_union ON tbl_trx_stock.id_product_material=view_mst_product_material_union.product_material_id AND tbl_trx_stock.type_product_material=view_mst_product_material_union.product_material_type
                LEFT OUTER JOIN tbl_mst_unit ON tbl_trx_stock.id_unit=tbl_mst_unit.id ;

-- Dumping structure for view db_edhil.view_trx_stock_onhand
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_trx_stock_onhand`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`%` SQL SECURITY DEFINER VIEW `view_trx_stock_onhand` AS SELECT
                `tbl_trx_stock`.`id_product_material`,
                `tbl_trx_stock`.`type_product_material`,
                `view_mst_product_material_union`.`product_material_code`,
                `view_mst_product_material_union`.`product_material_name`,
                `view_mst_product_material_union`.`active`,
                `tbl_trx_stock`.`location`,
                `tbl_trx_stock`.`qty_balance`,
                `tbl_trx_stock`.`id_unit`,
                `tbl_mst_unit`.`unit_code`,
                `tbl_mst_unit`.`unit_name`
            FROM
                `tbl_trx_stock`
                LEFT OUTER JOIN `tbl_mst_unit` ON `tbl_trx_stock`.`id_unit` = `tbl_mst_unit`.`id`
                LEFT OUTER JOIN `view_mst_product_material_union` ON `tbl_trx_stock`.`id_product_material`=`view_mst_product_material_union`.`product_material_id` AND `tbl_trx_stock`.`type_product_material`=`view_mst_product_material_union`.`product_material_type`
            WHERE
                `tbl_trx_stock`.`id` IN 
                (
                    SELECT
                        max(`tbl_trx_stock`.`id`)
                    FROM
                        `tbl_trx_stock`
                    GROUP BY
                        `tbl_trx_stock`.`id_product_material`,
                        `tbl_trx_stock`.`type_product_material`,
                        `tbl_trx_stock`.`location`,
                        `tbl_trx_stock`.`id_unit`
                ) ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
