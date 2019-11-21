<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductGroupIdToProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_mst_product', function (Blueprint $table) {
            $table->unsignedInteger('id_product_group')
                  ->after('product_name');
            $table->foreign('id_product_group')
                  ->references('id')
                  ->on('tbl_mst_product_group')
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
            $table->dropColumn('id_product_group');
        });
    }
}
