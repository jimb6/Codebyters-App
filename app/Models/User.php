<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'age',
        'contact_number',
        'email',
        'address_id',
        'password',
    ];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function officials()
    {
        return $this->hasMany(Official::class);
    }

    public function alumni()
    {
        return $this->hasMany(Alumnus::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('super-admin');
    }
}
