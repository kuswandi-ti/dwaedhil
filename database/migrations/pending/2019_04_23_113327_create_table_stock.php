<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_trx_stock', function (Blueprint $table) {
            $table->bigIncrements('id', true, true);
            $table->uuid('uuid')->unique();
            $table->string('trx_no')->nullable()->comment('Document Number Transaction');
            $table->date('trx_date')->nullable()->comment('Document Date Transaction');
            $table->bigInteger('id_product_material')->nullable()->comment('Bisa dari Product FG atau dari Raw Material');
            $table->string('trx_source')->nullable()->comment('GR_RAW_MATERIAL, ...');
            $table->string('location')->nullable()->comment('Warehouse Raw Material HIL (WRM), Warehouse WIP Edrola (WWIP), Warehouse FG (WFG)');
            $table->string('stock_status')->nullable()->comment('I=Insert, U=Update, D=Delete');
            $table->string('stock_note')->nullable();
            $table->float('qty_begin', 12, 5)->default(0);
            $table->float('qty_in', 12, 5)->default(0);
            $table->float('qty_out', 12, 5)->default(0);
            $table->float('qty_opname', 12, 5)->default(0);
            $table->float('qty_balance', 12, 5)->default(0);
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
        Schema::dropIfExists('tbl_trx_stock');
    }
}
