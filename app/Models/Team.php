<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Owner;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'name',
        'information',
        'is_active',
    ];

    public function owner()
    {
        return $this->belongsTo(Owner::class); //従テーブルから関連する主テーブルのレコードを取り出す
    }
}
