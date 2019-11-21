<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mst_product_group', function (Blueprint $table) {
            $table->increments('id', true, true);
			$table->uuid('uuid')->unique();
			$table->string('product_group_code');
            $table->string('product_group_name');
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
        Schema::dropIfExists('tbl_mst_product_group');
    }
}
