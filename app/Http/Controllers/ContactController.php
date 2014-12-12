<?php namespace App\Http\Controllers;

/**
 * Class ContactController
 * @author Scott Wilcox <scott@dor.ky>
 * @website http://github.com/ssx
 * @website http://dor.ky
 * @package App\Http\Controllers
 */
class ContactController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function getContact()
    {
        return \View::make("ishu.contact");
    }
}
