<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Student extends Model
{
   
   public function user(){
      return $this->belongsTo(User::class);
   }

   public function users() {
      return $this->belongsToMany(Student::class)->withPivot('comment');
   }

   protected $fillable = ['firstname','lastname','class','description','piture','activeFollowup','user_id'];
      
}
