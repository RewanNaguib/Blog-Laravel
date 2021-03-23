<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {    //what we will send to the mobile team (key) and (value) and we can change the keys and the mobile team will not be affected
        return [
            'id'=> $this -> id,
            'title' => $this -> title,
            'description' => $this -> description,
            'user' => new UserResource ($this -> user)

        ];
    }
}
