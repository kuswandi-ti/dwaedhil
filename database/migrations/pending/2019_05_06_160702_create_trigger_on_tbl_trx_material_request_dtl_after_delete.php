<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerOnTblTrxMaterialRequestDtlAfterDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER `trg_trx_matreq_dtl_after_delete` 
            AFTER DELETE ON `tbl_trx_matreq_dtl` FOR EACH ROW 
            BEGIN
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
        DB::unprepared('DROP TRIGGER `trg_trx_matreq_dtl_after_delete`');
    }
}
