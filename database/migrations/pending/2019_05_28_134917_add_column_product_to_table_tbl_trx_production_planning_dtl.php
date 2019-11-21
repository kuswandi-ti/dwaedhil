<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnProductToTableTblTrxProductionPlanningDtl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_trx_prodplan_dtl', function (Blueprint $table) {
            $table->unsignedBigInteger('id_product')
                  ->after('id_hdr');
            $table->foreign('id_product')
                  ->references('id')
                  ->on('tbl_mst_product')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_trx_prodplan_dtl', function (Blueprint $table) {
            $table->dropForeign('tbl_trx_prodplan_dtl_id_product_foreign');
            $table->dropColumn('id_product');
        });
    }
}
