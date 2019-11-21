<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewTblTrxBomHdr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
            CREATE VIEW view_trx_bom_hdr 
            AS
            SELECT 
                tbl_mst_bom_hdr.*,
                    view_mst_product.product_code,
                    view_mst_product.product_name,
                    view_mst_product.cpn_no,
                    view_mst_product.model_project,
                    view_mst_product.id_product_group,
                    view_mst_product.product_group_code,
                    view_mst_product.product_group_name,
                    view_mst_product.id_unit,
                    view_mst_product.unit_code,
                    view_mst_product.unit_name,
                    view_mst_product.id_customer,
                    view_mst_product.customer_code,
                    view_mst_product.customer_name,
                    view_mst_product.color,
                    view_mst_product.type_of_material,
                    view_mst_product.gross_weight,
                    view_mst_product.net_weight,
                    view_mst_product.life_span_num,
                    view_mst_product.life_span_time,
                    view_mst_product.life_span_num_time,
                    view_mst_product.cavity,
                    view_mst_product.cavity_text,
                    view_mst_product.mp_net_weight,
                    view_mst_product.machine_tonage,
                    view_mst_product.machine_tonage_text,
                    view_mst_product.process,
                    view_mst_product.machine_code,
                    view_mst_product.cycle_time_num,
                    view_mst_product.cycle_time_mp,
                    view_mst_product.assy_time_num,
                    view_mst_product.assy_time_mp
            FROM
                tbl_mst_bom_hdr
                LEFT OUTER JOIN view_mst_product ON tbl_mst_bom_hdr.id_product = view_mst_product.id
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement("DROP VIEW view_trx_bom_hdr");
    }
}
