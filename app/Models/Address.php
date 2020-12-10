<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['city_id'];

    protected $searchableFields = ['*'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
