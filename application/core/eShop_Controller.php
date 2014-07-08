<?php

class eShop_Controller extends CI_Controller
{
	protected $data;

	public function __construct()
	{
		parent::__construct();

		$this->data = new stdClass;

		$this->data->meta = [
			[
				'charset' => 'utf-8',
			],
		];

		$this->data->styles = [
			'normalize',
			'foundation/foundation',
			'foundation/icons/foundation-icons',
			'common',
		];

		$this->data->scripts = [
			'vendor/modernizr',
			'vendor/jquery',
			'foundation/foundation.min',
			'foundation.init',
		];
	}
}