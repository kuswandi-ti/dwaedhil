<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRawMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* https://stackoverflow.com/questions/47728909/laravel-migration-errno-150-foreign-key-constraint-is-incorrectly-formed?rq=1 */
        Schema::create('tbl_mst_raw_material', function (Blueprint $table) {
            $table->bigIncrements('id', true, true);
            $table->uuid('uuid')->unique();
            $table->string('material_code');
            $table->string('material_name')->nullable();
            $table->unsignedInteger('id_unit_buying');
            $table->foreign('id_unit_buying')->references('id')->on('tbl_mst_unit')->onUpdate('cascade');
            $table->unsignedInteger('id_unit_usage');
            $table->foreign('id_unit_usage')->references('id')->on('tbl_mst_unit')->onUpdate('cascade');
            $table->float('qty_conversion', 8, 2)->default(0);
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
        Schema::dropIfExists('tbl_mst_raw_material');
    }
}
