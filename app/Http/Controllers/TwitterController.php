<?php namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Models\User as User;

/**
 * Class TwitterController
 * @author Scott Wilcox <scott@dor.ky>
 * @website http://github.com/ssx
 * @website http://dor.ky
 * @package App\Http\Controllers
 */
class TwitterController extends BaseController {
    private $client_id;
    private $client_secret;
    private $callback;

    public function __construct()
    {
        $this->middleware('guest');

        $this->client_id      = \Config::get("services.twitter.client_id");
        $this->client_secret  = \Config::get("services.twitter.client_secret");
        $this->callback       = \Config::get("services.twitter.redirect");
    }

    public function redirectToTwitter()
    {
        $connection     = new \TwitterOAuth($this->client_id, $this->client_secret);
        $request_token  = $connection->getRequestToken($this->callback);
        $redirect_url   = $connection->getAuthorizeURL($request_token, false);

        Session::put("request_oauth_token", $request_token['oauth_token']);
        Session::put("request_oauth_token_secret", $request_token['oauth_token_secret']);

        return Redirect::to($redirect_url);
    }

    public function returnFromTwitter()
    {
        $aryInput           = \Input::all();
        $connection         = new \TwitterOAuth($this->client_id, $this->client_secret, Session::get("request_oauth_token"), Session::get("request_oauth_token_secret"));
        $token_credentials  = $connection->getAccessToken($aryInput["oauth_verifier"]);
        $connection         = new \TwitterOAuth($this->client_id, $this->client_secret, $token_credentials['oauth_token'], $token_credentials['oauth_token_secret']);
        $account            = $connection->get('account/verify_credentials');

        $aryToUpdate = [
            'last_login'            => Carbon::now(),
            'username'              => $account->screen_name,
            'fullname'              => $account->name,
            'oauth_token'           => $token_credentials['oauth_token'],
            'oauth_token_secret'    => $token_credentials['oauth_token_secret'],
            'image_url'             => $account->profile_image_url,
            'count_statuses'        => $account->statuses_count,
            'count_followers'       => $account->followers_count,
            'count_following'       => $account->friends_count
        ];

        $User = User::findOrNew($token_credentials["user_id"]);
        $User->update($aryToUpdate);

        return \Redirect::to("/");
    }
}
