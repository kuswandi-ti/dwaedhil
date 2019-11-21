<?php

namespace App\Models\Transaction\Production;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

class ProductionPlanningDtl extends Model
{
    protected $table = 'tbl_trx_prodplan_dtl';
    public $timestamps = false;
	
	use Notifiable;
    use Uuid;
	
	protected $fillable = [
        'id_hdr', 'day_prodplan', 'date_prodplan', 'qty_prodplan',
        'user_created', 'datetime_created', 'user_updated', 
        'datetime_updated'
    ];
}
