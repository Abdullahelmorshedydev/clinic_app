<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $path = 'uploads/doctors';

    protected $table = 'doctors';

    protected $fillable = [
        'user_id',
        'bio',
        'major_id',
        'image',
        'status',
    ];

    public static $status = ['active', 'deactive'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getImageAttribute($value)
    {
        if ($value == 'major.jpg') {
            return asset('uploads/default_images/' . $value);
        } else {
            return asset($this->path . '/' . $value);
        }
    }
}
