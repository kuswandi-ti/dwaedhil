<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTrxProductionPlanningHeader extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_trx_prodplan_hdr', function (Blueprint $table) {
            $table->bigIncrements('id', true, true);
            $table->uuid('uuid')->unique();
            $table->string('doc_no')->unique();
            $table->date('doc_date')->nullable();
            $table->string('doc_time')->nullable();
            $table->unsignedInteger('id_customer');
            $table->foreign('id_customer')
                  ->references('id')
                  ->on('tbl_mst_customer')
                  ->onUpdate('cascade');
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')
                  ->references('id')
                  ->on('tbl_mst_product')
                  ->onUpdate('cascade');
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();
            $table->text('remarks')->nullable();
            $table->char('active', 1)->default('1');
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
        Schema::dropIfExists('tbl_trx_prodplan_hdr');
    }
}
