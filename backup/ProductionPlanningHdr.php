<?php

namespace App\Models\Transaction\Production;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

class ProductionPlanningHdr extends Model
{
    protected $table = 'tbl_trx_prodplan_hdr';
    public $timestamps = false;
	
	use Notifiable;
    use Uuid;
	
	protected $fillable = [
        'doc_no', 'doc_date', 'doc_time', 'id_customer', 'id_product', 
        'month', 'year', 'remarks', 'active', 'user_created', 'datetime_created',
        'user_updated', 'datetime_updated'
    ];
}
