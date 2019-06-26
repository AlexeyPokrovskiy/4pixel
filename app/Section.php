<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    /**
     * reletions with model User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->belongsToMany('App\User','user_section');
    }
}
