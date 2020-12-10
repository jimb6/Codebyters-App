<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Institute extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'acronym', 'color_theme'];

    protected $searchableFields = ['*'];

    public function programs()
    {
        return $this->hasMany(Course::class);
    }
}
