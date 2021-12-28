<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];

    public function departments()
    {
        return $this->belongsToMany(Department::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
