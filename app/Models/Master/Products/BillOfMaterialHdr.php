<?php

namespace App\Models\Master\Products;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

class BillOfMaterialHdr extends Model
{
    protected $table = 'tbl_mst_bom_hdr';
    public $timestamps = false;
	
	use Notifiable;
    use Uuid;
	
	protected $fillable = [
        'status_bom', 'id_product', 'prepared_by', 'date_of_issue', 'revision', 
        'color', 'active', 'user_created', 'datetime_created',
        'user_updated', 'datetime_updated'
    ];
}
