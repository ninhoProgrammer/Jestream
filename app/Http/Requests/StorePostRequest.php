<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
	{
		if ($this->user() && $this->user_id == $this->user()->id)
		{
			return true;
		}
		return false;
	}
	
	public function rules()
	{
		$rules = [
			'title' => 'required',
			'slug' => 'required|unique:posts',
			'status' => 'required|in:0,1',
			'image' => 'image' // Max 2MB
		];
		
		if($this->status == 2) {
			$rules = array_merge($rules, [
				'category_id' => 'required',
				'tags' => 'required',
				'extract' => 'required',
				'body' => 'required'
			]);
		}
		
		return $rules;
	}
}
