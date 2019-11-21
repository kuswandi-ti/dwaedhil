<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColumnOnTblTrxProductionPlanningHdr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_trx_prodplan_hdr', function (Blueprint $table) {
            $table->dropForeign('tbl_trx_prodplan_hdr_id_customer_foreign');
            $table->dropColumn('id_customer');
            $table->dropForeign('tbl_trx_prodplan_hdr_id_product_foreign');
            $table->dropColumn('id_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_trx_prodplan_hdr', function (Blueprint $table) {
            $table->unsignedInteger('id_customer')
                  ->after('doc_time');
            $table->foreign('id_customer')
                  ->references('id')
                  ->on('tbl_mst_customer')
                  ->onUpdate('cascade');
            $table->unsignedBigInteger('id_product')
                  ->after('id_customer');;
            $table->foreign('id_product')
                  ->references('id')
                  ->on('tbl_mst_product')
                  ->onUpdate('cascade');
        });
    }
}
