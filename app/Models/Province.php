<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $primaryKey = 'province_id';
    public $timestamps = false;

    protected $fillable = [
        'province_id',
        'province'
    ];

    protected $casts = [
        'province_id' => 'string',
    ];

    public function scopeOfId(Builder $query, int $id): void
    {
        $query->where('province_id', $id);
    }
}
