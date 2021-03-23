<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
       
        $rules =  [
            'description'   => 'required|min:10',
            'user_id'       => 'required|exists:users,id',
           
        ];
        //store
        if ($this->getMethod() == 'POST') {
            $rules += ['title'    => 'required|min:3|unique:posts'];
        }
        //update,....
        else {
            $rules += ['title'    => 'required|min:3|unique:posts,title,'.$this->post->id];
        }

        return $rules;


        //  $input = $request->only(['title', 'user_id','description']);    //slugggggggg
        

    }


    public function messages()
    {
        return [

            'title.required' =>'Title must be filled!!' ,

            'title.min' =>'Title must be at least 3 charachters!!' ,

            'title.unique' =>'Title has been already token!!' ,

            'description.required' =>'Description must be filled!!' ,

            'description.min' =>'Description  must be at least 10 charachters!!' ,

            'user_id.exists' =>'This is not a valid post creator!!' ,

        ];

    }
}
