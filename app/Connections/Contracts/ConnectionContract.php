<?php namespace App\Connections\Contracts;

/**
 * Interface ConnectionContract
 * @author Scott Wilcox <scott@dor.ky>
 * @package App\Connections\Contracts
 */
interface ConnectionContract {
    /**
     * @param $mxdParams
     * @return mixed
     */
    public function addIssue($mxdParams);
}
