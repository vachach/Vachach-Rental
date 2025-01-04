<?php

namespace App\Models;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'landlord_id',
        'title',
        'description',
        'address',
        'city',
        'price',
        'house_type',
        'max_occupants',
        'available_from',
        'amenities',
    ];

    /**
     * Casts for specific columns.
     */
    protected $casts = [
        'amenities' => 'array', // JSON format
        'available_from' => 'date',
    ];

    /**
     * Relationship: A house belongs to a landlord (user).
     */
    public function landlord()
    {
        return $this->belongsTo(User::class, 'landlord_id');
    }
}
