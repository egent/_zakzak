<?php

class CompaniesController extends \BaseController {

	/**
	 * Display a listing of companies
	 *
	 * @return Response
	 */
	public function index()
	{
		$companies = Company::all();

		return View::make('companies.index', compact('companies'));
	}

	/**
	 * Show the form for creating a new company
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('companies.create');
	}

	/**
	 * Store a newly created company in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Company::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Company::create($data);

		return Redirect::route('companies.index');
	}

	/**
	 * Display the specified company.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$company = Company::findOrFail($id);

		return View::make('companies.show', compact('company'));
	}

	/**
	 * Show the form for editing the specified company.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$company = Company::find($id);

		return View::make('companies.edit', compact('company'));
	}

	/**
	 * Update the specified company in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$company = Company::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Company::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$company->update($data);

		return Redirect::route('companies.index');
	}

	/**
	 * Remove the specified company from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Company::destroy($id);

		return Redirect::route('companies.index');
	}

}
