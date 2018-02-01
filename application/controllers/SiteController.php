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
		foreach ($this->thread->with('user')->get_all() as $post) {
			$post["author"] = $post["user"]["first_name"] . ' ' . $post["user"]["last_name"];
			unset($post["user_id"]);
			unset($post["deleted"]);
			unset($post["company_id"]);
			unset($post["user"]);
			$data['posts'][] = $post;
		}
		if (parent::current_user()) {
			parent::main_page("dashboard");
			redirect('post');
		} else {
			redirect(LOGIN_URL);
		}
	}
}
