<?php namespace App\Connections\Providers;

use App\Connections\Contracts\ConnectionContract;

/**
 * Class HelpScoutConnection
 * @author Scott Wilcox <scott@dor.ky>
 * @website http://github.com/ssx
 * @website http://dor.ky
 * @package App\Connections\Providers
 */
class HelpScoutConnection implements ConnectionContract {
    /**
     * @param $mxdParams
     */
    public function addIssue($mxdParams)
    {
        // Send issue to Helpscout
    }
}
