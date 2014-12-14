<?php namespace App\Connections\Contracts;

/**
 * Interface ConnectionContract
 * @author Scott Wilcox <scott@dor.ky>
 * @website http://github.com/ssx
 * @website http://dor.ky
 * @package App\Connections\Contracts
 */
interface ConnectionContract {
    /**
     * @param $mxdParams
     * @return mixed
     */
    public function addIssue($mxdParams);
}
