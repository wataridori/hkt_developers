<?php

use \Illuminate\Support\Facades\Config;
use \wataridori\HktSdk\HKT_SDK;
use \Illuminate\Support\Facades\Session;

class BaseController extends Controller {

    /**
     * @var HKT_SDK
     */
    public $hkt_sdk;
    protected $current_user_info;

    public function __construct()
    {
        $this->hkt_sdk = new HKT_SDK(Config::get('hkt.client_id'), Config::get('hkt.client_secret'));
        if (!Session::has('current_user_info')) {
            Session::put('current_user_info', '');
        }

        $this->current_user_info = json_decode(Session::get('current_user_info'), true);
    }

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
