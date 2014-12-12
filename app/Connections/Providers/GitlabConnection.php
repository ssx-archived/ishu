<?php namespace App\Connections\Providers;

use App\Connections\Contracts\ConnectionContract;
use GuzzleHttp\Client as GuzzleClient;

/**
 * Class GitlabConnection
 * @author Scott Wilcox <scott@dor.ky>
 * @package App\Connections\Providers
 */
class GitlabConnection implements ConnectionContract {

    /**
     * @var string
     */
    private $strApiVersion = "v3";
    /**
     * @var
     */
    private $strUrlBase;
    /**
     * @var string
     */
    private $strUrlWithProject;
    /**
     * @var
     */
    private $strToken;
    /**
     * @var
     */
    private $intProjectId;
    /**
     * @var GuzzleClient
     */
    private $guzzle;

    /**
     * @param $strUrlBase
     * @param $intProjectId
     * @param $strToken
     * @throws \Exception
     */
    public function __construct($strUrlBase, $intProjectId, $strToken)
    {
        // Create a guzzle instance
        $this->guzzle = new GuzzleClient();

        // Store our configuration parameters
        $this->strUrlBase           = $strUrlBase;
        $this->strUrlWithProject    = $this->strUrlBase."/api/".$this->strApiVersion."/projects/".$intProjectId;
        $this->strToken             = $strToken;
        $this->intProjectId         = $intProjectId;

        try {
            $response = $this->guzzle->get($this->strUrlBase."/api/".$this->strApiVersion."/user?private_token=".$this->strToken);
            if ($response->getStatusCode() != 200)
            {
                throw new \Exception("The API URL or token provided is not valid.");
            }
        } catch (\Exception $e)
        {
            throw new \Exception("The API URL or token provided is not valid.");
        }
    }


    /**
     * @param $mxdParams
     * @return mixed
     * @throws \Exception
     */
    public function addIssue($mxdParams)
    {
        $response = $this->guzzle->post($this->strUrlWithProject."/issues?private_token=".$this->strToken, ['body' => $mxdParams]);
        if ($response->getStatusCode() == 201)
        {
            return $response->json();
        } else
        {
            throw new \Exception("Bad HTTP response received for request.");
        }
    }
}
