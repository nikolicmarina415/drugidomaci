<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'email', 'director', 'city_id', 'company_type_id'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function companyType()
    {
        return $this->belongsTo(CompanyType::class);
    }
}
