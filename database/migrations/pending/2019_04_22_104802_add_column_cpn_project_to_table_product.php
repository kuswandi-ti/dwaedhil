<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnCpnProjectToTableProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_mst_product', function (Blueprint $table) {
            $table->unsignedInteger('id_customer')
                  ->after('id_unit')
                  ->nullable();            
            $table->string('cpn_no')
                  ->nullable()
                  ->after('product_name');
            $table->string('model_project')
                  ->nullable()
                  ->after('back_no');
            $table->foreign('id_customer')
                  ->references('id')
                  ->on('tbl_mst_customer')
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
        Schema::table('tbl_mst_product', function (Blueprint $table) {
            $table->dropColumn(['cpn_no', 'model_project', 'id_customer']);
        });
    }
}
