<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTblTrxProdactualDtl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_trx_prodactual_dtl', function (Blueprint $table) {
            $table->bigIncrements('id', true, true);
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('id_hdr');
            $table->foreign('id_hdr')
                  ->references('id')
                  ->on('tbl_trx_prodactual_hdr')
                  ->onUpdate('cascade');
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')
                  ->references('id')
                  ->on('tbl_mst_product')
                  ->onUpdate('cascade');
            $table->float('qty_ok', 12, 5)->default(0);
            $table->float('qty_reject', 12, 5)->default(0);
            $table->float('qty_rework', 12, 5)->default(0);
            $table->float('qty_total', 12, 5)->default(0);
            $table->string('user_created');
            $table->dateTime('datetime_created');
            $table->string('user_updated');
            $table->dateTime('datetime_updated');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_trx_prodactual_dtl');
    }
}
