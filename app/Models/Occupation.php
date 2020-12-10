<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Occupation extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'description'];

    protected $searchableFields = ['*'];

    public function alumni()
    {
        return $this->belongsToMany(Alumnus::class);
    }
}
