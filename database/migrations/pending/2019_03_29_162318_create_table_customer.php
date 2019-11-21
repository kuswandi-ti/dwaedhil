<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_mst_customer', function (Blueprint $table) {
            $table->increments('id', true, true);
            $table->uuid('uuid')->unique();
			$table->string('customer_code');
            $table->string('customer_name');
			$table->string('address_title_1');
			$table->text('address_address_1')->nullable();
			$table->string('address_city_1')->nullable();
			$table->string('address_phone_1')->nullable();
			$table->string('address_fax_1')->nullable();
			$table->string('address_email_1');
			$table->string('address_person_name_1')->nullable();
			$table->string('address_person_phone_1')->nullable();
			$table->string('address_person_email_1')->nullable();			
			$table->string('address_title_2');
			$table->text('address_address_2')->nullable();
			$table->string('address_city_2')->nullable();
			$table->string('address_phone_2')->nullable();
			$table->string('address_fax_2')->nullable();
			$table->string('address_email_2');
			$table->string('address_person_name_2')->nullable();
			$table->string('address_person_phone_2')->nullable();
			$table->string('address_person_email_2')->nullable();			
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
        Schema::dropIfExists('tbl_mst_customer');
    }
}
