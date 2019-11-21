<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBillOfMaterialDtl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mst_bom_dtl', function (Blueprint $table) {
            $table->bigIncrements('id', true, true);
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('id_hdr');
            $table->foreign('id_hdr')
                  ->references('id')
                  ->on('tbl_mst_bom_hdr')
                  ->onUpdate('cascade');                        
            $table->unsignedBigInteger('id_raw_material');
            $table->foreign('id_raw_material')
                  ->references('id')
                  ->on('tbl_mst_raw_material')
                  ->onUpdate('cascade');
            $table->float('qty_usage', 12, 5)->default(0);
            $table->text('remarks')->nullable();
            $table->float('percent_rejection', 8, 2)->default(0);
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
        Schema::dropIfExists('tbl_mst_bom_dtl');
    }
}
