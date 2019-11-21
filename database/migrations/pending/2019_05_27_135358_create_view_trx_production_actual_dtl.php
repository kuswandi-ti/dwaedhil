<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTrxProductionActualDtl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_trx_prodactual_dtl 
            AS
            SELECT
                tbl_trx_prodactual_dtl.*,
                view_mst_product.product_code,
                view_mst_product.product_name,
                view_mst_product.cpn_no,
                view_mst_product.unit_code,
                view_mst_product.unit_name
            FROM
                tbl_trx_prodactual_dtl
                LEFT OUTER JOIN view_mst_product ON tbl_trx_prodactual_dtl.id_product = view_mst_product.id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW view_trx_prodactual_hdr");
    }
}
