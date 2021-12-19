<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    
    public function profileImage(){
        return($this->image) ? '/storage/' . $this->image : '/storage/profile/L8xAXa95AD2EJGGMjs3D94oHpCHPpljokADrLuyD.png';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }
}
