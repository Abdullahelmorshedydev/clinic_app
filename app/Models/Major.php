<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $path = 'uploads/majors';

    protected $table = 'majors';

    protected $fillable = [
        'image',
        'name',
        'status',
    ];

    public static $status = ['active', 'deactive'];

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
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
