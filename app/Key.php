<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{

    /**
     * @return bool
     */
    public function isAvailable()
    {
        if (GivenKeys::where('key_id', $this->getAttribute('id'))->count()) {
            return GivenKeys::where('key_id', $this->getAttribute('id'))->whereNull('hand_back_time')->count() == 0;
        }
        return true;
    }
}
