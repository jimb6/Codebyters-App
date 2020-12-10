<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use SoftDeletes;
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'acronym', 'institute_id'];

    protected $searchableFields = ['*'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }
}
