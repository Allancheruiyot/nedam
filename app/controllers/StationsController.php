<?php

class StationsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$stations = Stations::where('organization_id',Confide::user()->organization_id)->get();
		return View::make('stations.index', compact('stations'));
	}


	/**
	 * Show the form for creating a new station.
	 *
	 * @return Response
	 */
	public function create()
	{   
		$stations = Stations::where('organization_id',Confide::user()->organization_id)->get();
		return View::make('stations.create', compact('stations'));
	}


	/**
	 * Store a newly created station in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Stations::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$stations = new Stations;

		$stations->station_name = Input::get('station_name');
		$stations->location = Input::get('location');
		$stations->description = Input::get('description');
		$stations->organization_id = Confide::user()->organization_id;
		$stations->save();

		return Redirect::route('stations.index')->withFlashMessage('Station has been successfully created!');
	}


	/**
	 * Display the specified station.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$stations = Stations::findOrFail($id);

		return View::make('stations.show', compact('stations'));
	}


	/**
	 * Show the form for editing the specified station.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$stations = Stations::find($id);

		return View::make('stations.edit', compact('stations'));
	}


	/**
	 * Update the specified station in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$stations = Stations::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Stations::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$stations->station_name = Input::get('station_name');
		$stations->location = Input::get('location');
		$stations->description = Input::get('description');
		$stations->update();

		return Redirect::route('stations.index')->withFlashMessage('Station has been successfully updated!');

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Stations::destroy($id);


		return Redirect::route('stations.index')->withFlashMessage('Station has been successfully Deleted!');
	}


	public function assign($id){
     
    return View::make('stations.assign', compact('stations'));
	}


}
