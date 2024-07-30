<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'points', 'description', 'type'];

    // Relação com os jogadores
    public function playerRules()
    {
        return $this->hasMany(PlayerRule::class);
    }

    // No modelo Rule
    public function players()
    {
        return $this->belongsToMany(Player::class, 'player_rules')->withPivot('custom_description');
    }
}
