<?php

namespace App\Models\assessment;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company'; 

    protected $fillable = [
        'name',
        'email',
        'logo',
        'website',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id');
    }

}
