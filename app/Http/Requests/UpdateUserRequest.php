<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Http\Request as R;
use App\User;

class UpdateUserRequest extends Request {

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
	public function rules(R $request)
	{
		$id = $request->segment(3);

		return [
			'email' =>"required|email|unique:users,email,$id",
		];
	}

}
