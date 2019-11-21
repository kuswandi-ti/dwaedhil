<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTrxMaterialUsageDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_trx_matusage_dtl', function (Blueprint $table) {
            $table->bigIncrements('id', true, true);
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('id_hdr');
            $table->foreign('id_hdr')
                  ->references('id')
                  ->on('tbl_trx_matusage_hdr')
                  ->onUpdate('cascade');
            $table->unsignedBigInteger('id_raw_material');
            $table->foreign('id_raw_material')
                  ->references('id')
                  ->on('tbl_mst_raw_material')
                  ->onUpdate('cascade');
            $table->unsignedInteger('id_unit');
            $table->foreign('id_unit')
                  ->references('id')
                  ->on('tbl_mst_unit')
                  ->onUpdate('cascade');
            $table->float('qty_matusage', 12, 5)->default(0);
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
        Schema::dropIfExists('tbl_trx_matusage_dtl');
    }
}
