<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Position extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'description'];

    protected $searchableFields = ['*'];

    public function officials()
    {
        return $this->hasMany(Official::class);
    }
}
