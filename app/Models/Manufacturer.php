<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'surname', 'phone', 'tax_number', 'tax_office',
        'company_name', 'address', 'city', 'district', 'country', 'image_url', 'path'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getInfoAttribute()
    {
        return [
            'user_id' => $this->user_id,
            'email' => $this->user->email,
            'name' => $this->name,
            'surname' => $this->surname,
            'phone' => $this->phone,
            'tax_number' => $this->tax_number,
            'tax_office' => $this->tax_office,
            'company_name' => $this->company_name,
            'address' => $this->address,
            'city' => $this->city,
            'district' => $this->district,
            'country' => $this->country,
            'image_url' => $this->image_url,
            'path' => $this->path,
        ];
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'manufacturer_id', 'user_id');
    }

}
