<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTrxProductionPlanningDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_trx_prodplan_dtl', function (Blueprint $table) {
            $table->bigIncrements('id', true, true);
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('id_hdr');
            $table->foreign('id_hdr')
                  ->references('id')
                  ->on('tbl_trx_prodplan_hdr')
                  ->onUpdate('cascade');
            $table->integer('day_prodplan')->nullable()->comment('1, 2, 3, ...');
            $table->date('date_prodplan')->nullable()->comment('1/1/2019, 1/2/2019, ...');
            $table->float('qty_prodplan', 12, 5)->default(0);
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
        Schema::dropIfExists('tbl_trx_prodplan_dtl');
    }
}
