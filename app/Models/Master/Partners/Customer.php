<?php

namespace App\Models\Master\Partners;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use App\Traits\Uuid;

class Customer extends Model
{
    protected $table = 'tbl_mst_customer';
    public $timestamps = false;
	
	use Notifiable;
    use Uuid;
	
	protected $fillable = [
        'customer_code', 'customer_name', 
		'address_title_1', 'address_address_1', 
		'address_city_1', 'address_phone_1', 'address_fax_1', 'address_email_1', 
		'address_person_name_1', 'address_person_phone_1', 'address_person_email_1',
		'address_title_2', 'address_address_2', 
		'address_city_2', 'address_phone_2', 'address_fax_2', 'address_email_2', 
		'address_person_name_2', 'address_person_phone_2', 'address_person_email_2',
		'active', 'user_created', 'datetime_created',
        'user_updated', 'datetime_updated'
    ];
}
