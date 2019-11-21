<?php

namespace App\Models\Transaction\Production;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

class AllocationFGDtl extends Model
{
    protected $table = 'tbl_trx_allocfg_dtl';
    public $timestamps = false;
	
	use Notifiable;
    use Uuid;
	
	protected $fillable = [
        'id_hdr', 'id_product', 'qty_alloc', 'user_created', 'datetime_created', 
        'user_updated', 'datetime_updated'
    ];
}
