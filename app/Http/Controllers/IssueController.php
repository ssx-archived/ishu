<?php namespace App\Http\Controllers;

/**
 * Class IssueController
 * @author Scott Wilcox <scott@dor.ky>
 * @website http://github.com/ssx
 * @website http://dor.ky
 * @package App\Http\Controllers
 */
class IssueController extends Controller {
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
    public function getSubmitIssue()
    {
        return \View::make("ishu.submit");
    }

    /**
     * @throws \Exception
     */
    public function postSubmitIssue()
    {
        $validator = \Validator::make(
            \Input::all(),
            array(
                'name_first' => 'required',
                'name_last'  => 'required',
                'twitter'    => 'required',
                'lastfm'     => 'required',
                'uuid'       => 'required',
                'email'      => 'required|email',
                'message'    => 'required'
            )
        );

        if ($validator->passes())
        {
            // Create a new Gitlab instance, we'll build these dynamically shortly
            $objGitlabConnection = new \App\Connections\Providers\GitlabConnection(
                getenv("ISHU_GITLAB_URL"),
                getenv("ISHU_GITLAB_PROJECT_ID"),
                getenv("ISHU_GITLAB_TOKEN")
            );

            // Build our issue message
            $strMessage = "Ishu Submission\n\n";

            // Iterate through the submitted fields
            foreach (\Input::except(["_token"]) as $key => $val)
            {
                $strMessage .= "$key:\n$val\n\n";
            }

            // Create a new issue using the above instance
            $objGitlabConnection->addIssue([
                "title" 		=> \Config::get("ishu.subject"). " from ".\Input::get("email"),
                "description" 	=> $strMessage,
                "labels" 		=> \Config::get("ishu.tags")
            ]);

            // If we've got this far, all is a-okay!
            return \Redirect::to('/thanks');
        } else
        {
            $messages = $validator->messages();
            return \Redirect::to('/')->withInput()->withErrors($messages);
        }
    }

    /**
     * @return mixed
     */
    public function getThanks()
    {
        return \View::make("ishu.thanks");
    }

}
