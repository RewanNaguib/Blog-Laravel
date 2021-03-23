<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {   
         //this will handle  the null of the user names because there are some users without names it will not appear user not found but it will appear null in postman 
        return [
            'id' => $this -> id,
            'name' => $this -> name ,
            'email' => $this -> email,
        ];
    }
}
