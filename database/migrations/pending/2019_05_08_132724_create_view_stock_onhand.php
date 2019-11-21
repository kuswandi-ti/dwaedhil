<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewStockOnhand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
            CREATE VIEW view_trx_stock_onhand 
            AS
            SELECT
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
                )
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement("DROP VIEW view_trx_stock_onhand");
    }
}
