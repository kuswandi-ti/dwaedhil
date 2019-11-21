<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerOnTblTrxMaterialRequestDtlAfterInsert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER `trg_trx_matreq_dtl_after_insert` 
            AFTER INSERT ON `tbl_trx_matreq_dtl` FOR EACH ROW 
            BEGIN
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
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `trg_trx_matreq_dtl_after_insert`');
    }
}
