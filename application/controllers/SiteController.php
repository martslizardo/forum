<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiteController extends BaseController
{

	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		if (parent::current_user()) {
			parent::main_page("dashboard");
		} else {
			if (ENVIRONMENT === "production")
				redirect('http://payakapps.com');
			else
				redirect('http://localhost/main');
		}
	}
}
