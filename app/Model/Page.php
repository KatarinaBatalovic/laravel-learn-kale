<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public function page(){
        return $this->belongsTo(Page::class);
    }
    public function pages(){
        return $this->hasMany(Page::class);
    }
        public function scopeNotdeleted($query){
        return $query->where('deleted', 0);
    }
    
        public function scopetopLevel($query){
        return $query->where('page_id', 0);
    }
    
       public function scopeActive($query){
        return $query->where('active', 1);
    }
        public function getImage($dimension = NULL){                
        $imagePath = $this->image;
        
        if(!is_null($dimension)){
            $extension = '.' . pathinfo($imagePath, PATHINFO_EXTENSION);
            $imagePath = str_replace($extension, '-' . $dimension . $extension, $imagePath);
        }
        
        return $imagePath;
    }
}
