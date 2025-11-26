<?php

namespace App\Models\assessment;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';

    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

}
