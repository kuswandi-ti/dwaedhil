<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSomeColumnsToProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_mst_product', function (Blueprint $table) {
            $table->string('description', 255)->nullable()->after('id_unit');
            $table->integer('life_span_num')->default(0)->after('description');
            $table->string('life_span_time')->nullable()->after('life_span_num');
            $table->float('cavity', 8, 2)->default(0)->after('life_span_time');
            $table->float('machine_tonage', 8, 2)->default(0)->after('cavity');
            $table->string('machine_code')->nullable()->after('machine_tonage');
            $table->string('color')->nullable()->after('machine_code');
            $table->string('type_of_material')->nullable()->after('color');
            $table->float('gross_weight', 8, 2)->default(0)->after('type_of_material');
            $table->float('net_weight', 8, 2)->default(0)->after('gross_weight');
            $table->float('mp_net_weight', 8, 2)->default(0)->after('net_weight');
            $table->string('process', 255)->nullable()->after('mp_net_weight');
            $table->float('cycle_time_num', 8, 2)->default(0)->after('process');
            $table->integer('cycle_time_mp')->default(0)->after('cycle_time_num');
            $table->float('assy_time_num', 8, 2)->default(0)->after('cycle_time_mp');
            $table->integer('assy_time_mp')->default(0)->after('assy_time_num');
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
            $table->dropColumn(['description', 'life_span_num', 'life_span_time', 'cavity', 'machine_tonage', 'machine_code', 'color', 'type_of_material', 'gross_weight', 'net_weight', 'mp_net_weight', 'process', 'cycle_time_num', 'cycle_time_mp', 'assy_time_num', 'assy_time_mp']);
        });
    }
}
