<?php

class Test_Controller {

	public function action_index() {
		//Auth::register('Kevin', "newpassweord", "newpassweord", "test@test.com", 2);
		Auth::login('Kevin', "newpassweord");
	}
}