<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerOnTblTrxAllocationFgDtlAfterInsert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER `trg_trx_allocfg_dtl_after_insert`
            AFTER INSERT ON `tbl_trx_allocfg_dtl` FOR EACH ROW
            BEGIN
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
        DB::unprepared('DROP TRIGGER `trg_trx_allocfg_dtl_after_insert`');
    }
}
