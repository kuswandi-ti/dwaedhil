<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUnitToTableTblTrxStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_trx_stock', function (Blueprint $table) {
            $table->unsignedInteger('id_unit')
                  ->after('qty_balance');
            $table->foreign('id_unit')
                  ->references('id')
                  ->on('tbl_mst_unit')
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
        Schema::table('tbl_trx_stock', function (Blueprint $table) {
            $table->dropColumn(['id_unit']);
        });
    }
}
