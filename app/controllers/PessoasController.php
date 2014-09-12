<?php

class PessoasController extends BaseController {

	/**
	 * Pessoa Repository
	 *
	 * @var Pessoa
	 */
	protected $pessoa;

	public function __construct(Pessoa $pessoa)
	{
		$this->pessoa = $pessoa;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pessoas = $this->pessoa->all();

		return View::make('pessoas.index', compact('pessoas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('pessoas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Pessoa::$rules);

		if ($validation->passes())
		{
			$this->pessoa->create($input);

			return Redirect::route('pessoas.index');
		}

		return Redirect::route('pessoas.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$pessoa = $this->pessoa->findOrFail($id);

		return View::make('pessoas.show', compact('pessoa'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pessoa = $this->pessoa->find($id);

		if (is_null($pessoa))
		{
			return Redirect::route('pessoas.index');
		}

		return View::make('pessoas.edit', compact('pessoa'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Pessoa::$rules);

		if ($validation->passes())
		{
			$pessoa = $this->pessoa->find($id);
			$pessoa->update($input);

			return Redirect::route('pessoas.show', $id);
		}

		return Redirect::route('pessoas.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->pessoa->find($id)->delete();

		return Redirect::route('pessoas.index');
	}

}
