<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'postal_code', 'province_id'];

    protected $searchableFields = ['*'];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function province()
    {
        return $this->belongsTo(Province::class);
    }
}
