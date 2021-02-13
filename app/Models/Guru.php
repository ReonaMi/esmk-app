<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Guru extends Authenticatable
{
    use HasFactory;

    protected $table = 'guru';

    protected $primaryKey = 'id_guru';

    protected $fillable = [
        'nama_guru',
        'email_guru',
        'password'
    ];
}
