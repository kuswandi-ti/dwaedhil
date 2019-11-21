<?php

namespace App\Models\Master\Products;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

class BillOfMaterialDtl extends Model
{
    protected $table = 'tbl_mst_bom_dtl';
    public $timestamps = false;
	
	use Notifiable;
    use Uuid;
	
	protected $fillable = [
        'id_hdr', 'id_raw_material', 'qty_usage', 'remarks', 'percent_rejection', 
        'active', 'user_created', 'datetime_created',
        'user_updated', 'datetime_updated'
    ];
}
