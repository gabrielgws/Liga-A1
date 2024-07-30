<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerRule extends Model
{
    use HasFactory;

    protected $fillable = ['player_id', 'rule_id'];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }

    public function rule()
    {
        return $this->belongsTo(Rule::class);
    }
}
