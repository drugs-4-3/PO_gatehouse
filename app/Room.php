<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function getAllKeys()
    {
        return Key::where('room_id', $this->getAttribute('id'));
    }
}
