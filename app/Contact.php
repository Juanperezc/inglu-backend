<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'gender',
        'status',
        'id_card',
        'last_name',
        'date_of_birth',
        'type'
    ];
    //
    public function toSearchableArray()
    {
      /*   $array = $this->toArray(); */
        return [
          
            'name' => $this->name,
            'last_name' => $this->last_name,
            'address' => $this->address,
           
        ];
    }

    public function searchableAs()
    {
        return 'contacts_index';
    }
}
