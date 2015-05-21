<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Tukangjamu;
use \Validator, \Input, \Redirect, \Session;
use Illuminate\Http\Request;

class TukangjamuController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tukangjamuku = Tukangjamu::all();

		return view('tukangjamu.index')->with('tukangjamu', $tukangjamuku);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tukangjamu.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
            'nama'       => 'required',
            'email'      => 'required|email',
            'kualitas_jamu' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('tukangjamu/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $tukangjamuku = new Tukangjamu;
            $tukangjamuku->nama       = Input::get('nama');
            $tukangjamuku->email      = Input::get('email');
            $tukangjamuku->kualitas_jamu = Input::get('kualitas_jamu');
            $tukangjamuku->save();

            // redirect
            Session::flash('message', 'Berhasil membuat tukang jamu!');
            return Redirect::to('tukangjamu');
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$tukangjamuku = Tukangjamu::find($id);

        return view('tukangjamu.show')
            ->with('tukangjamu', $tukangjamuku);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tukangjamuku = Tukangjamu::find($id);

        return view('tukangjamu.edit')
            ->with('tukangjamu', $tukangjamuku);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
            'nama'       => 'required',
            'email'      => 'required|email',
            'kualitas_jamu' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('tukangjamu/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // simpan
            $tukangjamuku = Tukangjamu::find($id);
            $tukangjamuku->nama       = Input::get('nama');
            $tukangjamuku->email      = Input::get('email');
            $tukangjamuku->kualitas_jamu = Input::get('kualitas_jamu');
            $tukangjamuku->save();

            // redirect
            Session::flash('message', 'Berhasil mengganti tukang jamu!');
            return Redirect::to('tukangjamu');
        }
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$tukangjamuku = Tukangjamu::find($id);
        $tukangjamuku->delete();

        // redirect
        Session::flash('message', 'Berhasil menghapus tukang jamu!');
        return Redirect::to('tukangjamu');
	}

}
