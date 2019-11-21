<?php

namespace App\Models\Transaction\Production;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

class MaterialRequestDtl extends Model
{
    protected $table = 'tbl_trx_matreq_dtl';
    public $timestamps = false;
	
	use Notifiable;
    use Uuid;
	
	protected $fillable = [
        'id_hdr', 'id_raw_material', 'id_unit', 'qty_matusage',
        'user_created', 'datetime_created', 'user_updated', 
        'datetime_updated'
    ];
}
