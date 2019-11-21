<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTblMstProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
            CREATE VIEW view_mst_product 
            AS
            SELECT
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
                LEFT OUTER JOIN tbl_mst_customer ON tbl_mst_product.id_customer = tbl_mst_customer.id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement("DROP VIEW view_mst_product");
    }
}
