<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewDoDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_trx_do_dtl 
            AS
            SELECT
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
                LEFT OUTER JOIN view_mst_product ON tbl_trx_do_dtl.id_product = view_mst_product.id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW view_trx_do_dtl");
    }
}
