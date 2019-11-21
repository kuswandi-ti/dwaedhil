<?php

namespace App\Models\Master\Products;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

use App\Models\Master\Products\Unit;
use App\Models\Master\Products\ProductGroup;
use App\Models\Master\Partners\Customer;

class Product extends Model
{
    protected $table = 'tbl_mst_product';
    public $timestamps = false;
	
	use Notifiable;
    use Uuid;
	
	protected $fillable = [
        'product_code', 'product_name', 'cpn_no', 'model_project', 'id_product_group', 'id_unit', 
        'id_customer', 'description', 'life_span_num', 'life_span_time', 'cavity', 'machine_tonage', 
        'machine_code', 'color', 'type_of_material', 'gross_weight', 'net_weight', 'mp_net_weight', 
        'process', 'cycle_time_num', 'cycle_time_mp', 'assy_time_num', 'assy_time_mp', 'active', 
        'user_created', 'datetime_created', 'user_updated', 'datetime_updated'
    ];

    public function tbl_mst_unit()
    {
    	return $this->hasOne('Unit');
    }

    public function tbl_mst_product_group()
    {
    	return $this->hasOne('ProductGroup');
    }

    public function tbl_mst_customer()
    {
        return $this->hasOne('Customer');
    }
}
