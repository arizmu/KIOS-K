<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Loket extends Model
{
    use hasUuids;
    protected $table = 'lokets';
    protected $fillable = ['id', 'loket', 'keterangan', 'is_active', 'created_at', 'updated_at', 'user_aktive'];

}
