<?php
namespace App\Http\Controllers\Validations;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StatisticsRequest extends FormRequest {

	/**
	 * Baboon Script By [it v 1.6.32]
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Baboon Script By [it v 1.6.32]
	 * Get the validation rules that apply to the request.
	 *
	 * @return array (onCreate,onUpdate,rules) methods
	 */
	protected function onCreate() {
		return [
             'name'=>'required|string',
             'number'=>'required|numeric',
		];
	}

	protected function onUpdate() {
		return [
             'name'=>'required|string',
             'number'=>'required|numeric',
		];
	}

	public function rules() {
		return request()->isMethod('put') || request()->isMethod('patch') ?
		$this->onUpdate() : $this->onCreate();
	}


	/**
	 * Baboon Script By [it v 1.6.32]
	 * Get the validation attributes that apply to the request.
	 *
	 * @return array
	 */
	public function attributes() {
		return [
             'name'=>trans('admin.name'),
             'number'=>trans('admin.number'),
		];
	}

	/**
	 * Baboon Script By [it v 1.6.32]
	 * response redirect if fails or failed request
	 *
	 * @return redirect
	 */
	public function response(array $errors) {
		return $this->ajax() || $this->wantsJson() ?
		response([
			'status' => false,
			'StatusCode' => 422,
			'StatusType' => 'Unprocessable',
			'errors' => $errors,
		], 422) :
		back()->withErrors($errors)->withInput(); // Redirect back
	}



}