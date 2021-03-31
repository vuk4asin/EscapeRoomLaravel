<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;

class Reservation extends Model
{
    use HasFactory;
            
    protected $fillable = ['game_id', 'time', 'date', 'created_at', 'updated_at'];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
