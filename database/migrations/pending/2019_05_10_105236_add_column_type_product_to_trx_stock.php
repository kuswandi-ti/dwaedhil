<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTypeProductToTrxStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_trx_stock', function (Blueprint $table) {
            $table->string('type_product_material')->nullable()->after('id_product_material');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_trx_stock', function (Blueprint $table) {
            $table->dropColumn(['type_product_material']);
        });
    }
}
