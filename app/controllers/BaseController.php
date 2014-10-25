<?php

use \Illuminate\Support\Facades\Config;
use \wataridori\HktSdk\HKT_SDK;

class BaseController extends Controller {

    /**
     * @var HKT_SDK
     */
    public $hkt_sdk;

    public function __construct()
    {
        $this->hkt_sdk = new HKT_SDK(Config::get('hkt.client_id'), Config::get('hkt.client_secret'));
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
