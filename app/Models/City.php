<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $primaryKey = 'city_id';
    public $timestamps = false;

    protected $fillable = [
        'city_id',
        'province_id',
        'type',
        'city_name',
        'postal_code'
    ];

    protected $casts = [
        'city_id' => 'string',
        'province_id' => 'string',
    ];

    public function scopeOfId(Builder $query, int $id): void
    {
        $query->where('city_id', $id);
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'province_id');
    }
}
