<?php namespace App\Connections\Providers;

use App\Connections\Contracts\ConnectionContract;

/**
 * Class PushoverConnect
 * @author Scott Wilcox <scott@dor.ky>
 * @package App\Connections\Providers
 */
class PushoverConnect implements ConnectionContract {
    /**
     * @param $mxdParams
     */
    public function addIssue($mxdParams)
    {
        // Send issue to pushover
    }
}
