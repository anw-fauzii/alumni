<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;
    protected $table = "testimoni";
    protected $fillable = [
        'user_id',
        'testimoni',
        'kritik',
        'saran',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
