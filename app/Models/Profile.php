<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
    use HasFactory;

    protected $fillable = ['cin','birth_date'];

    // définir la relation avec user.
    public function user(){
        return $this->belongsTo(User::class);
    }
}
