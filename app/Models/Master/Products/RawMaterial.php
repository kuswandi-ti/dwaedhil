<?php

namespace App\Models\Master\Products;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

use App\Models\Master\Products\Unit;

class RawMaterial extends Model
{
    protected $table = 'tbl_mst_raw_material';
    public $timestamps = false;

    use Notifiable;
    use Uuid;

    protected $fillable = [
        'material_code', 'material_name', 'vpn_no', 'id_unit_buying', 'id_unit_usage',
        'id_supplier', 'qty_conversion', 'active', 'user_created', 'datetime_created',
        'user_updated', 'datetime_updated'
    ];

    public function tbl_mst_unit()
    {
    	return $this->hasOne('Unit');
    }
}
