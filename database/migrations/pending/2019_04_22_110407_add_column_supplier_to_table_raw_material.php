<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSupplierToTableRawMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_mst_raw_material', function (Blueprint $table) {
            $table->unsignedInteger('id_supplier')
                  ->after('id_unit_usage')
                  ->nullable();
            $table->string('vpn_no')
                  ->nullable()
                  ->after('material_name');
            $table->foreign('id_supplier')
                  ->references('id')
                  ->on('tbl_mst_supplier')
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
        Schema::table('tbl_mst_raw_material', function (Blueprint $table) {
            $table->dropColumn(['id_supplier', 'vpn_no']);
        });
    }
}
