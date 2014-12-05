<?php

class Company extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'name'      => 'required',
        'phone'     => 'required',
        'address'   => 'required',
	];

	// Don't forget to fill this array
	protected $fillable = ['name','phone','address','working_time','coordinates'];

}