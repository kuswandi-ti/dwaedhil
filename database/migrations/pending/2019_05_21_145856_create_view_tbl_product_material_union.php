<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTblProductMaterialUnion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_mst_product_material_union 
            AS
            SELECT
                id AS product_material_id,
                material_code AS product_material_code,
                material_name AS product_material_name,
                'RAW_MATERIAL' AS product_material_type,    
                active
            FROM
                view_mst_raw_material
            UNION ALL
            SELECT
                id AS product_material_id,
                product_code AS product_material_code,
                product_name AS product_material_name,
                'FINISH_GOODS' AS product_material_type,
                active
            FROM
                view_mst_product 
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW view_mst_product_material_union");
    }
}
