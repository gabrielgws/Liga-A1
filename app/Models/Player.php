<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'score'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //Relação com as regras
    public function playerRules()
    {
        return $this->hasMany(PlayerRule::class);
    }

    // Método para calcular pontuação
    public function calculateScore()
    {
        $this->score = $this->rules->sum('points');
        $this->save();
    }

    public function rules()
    {
        return $this->belongsToMany(Rule::class, 'player_rules')->withPivot('custom_description');
    }
}
