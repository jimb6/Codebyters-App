<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'point_value'];

    protected $searchableFields = ['*'];

    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }
}
