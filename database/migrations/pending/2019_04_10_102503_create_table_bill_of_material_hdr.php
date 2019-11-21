<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBillOfMaterialHdr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mst_bom_hdr', function (Blueprint $table) {
            $table->bigIncrements('id', true, true);
            $table->uuid('uuid')->unique();
            $table->string('status_bom')->nullable();
            $table->unsignedBigInteger('id_product');
            $table->string('prepared_by')->nullable();
            $table->date('date_of_issue')->nullable();
            $table->smallInteger('revision')->default(0);
            $table->text('notes')->nullable();
            $table->char('active', 1)->default('1');
            $table->string('user_created');
            $table->dateTime('datetime_created');
            $table->string('user_updated');
            $table->dateTime('datetime_updated');
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
        Schema::dropIfExists('tbl_mst_bom_hdr');
    }
}
