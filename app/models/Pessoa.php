<?php

class Pessoa extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'nome' => 'required',
		'profissao' => 'required'
	);
}
