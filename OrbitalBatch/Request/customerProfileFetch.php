<?php namespace OrbitalBatch\Request;

class customerProfileFetch extends Transaction
{
    public function required_fields()
    {
        return array(
            "bin", "merchantID"
        );
    }

    public function valid_fields()
    {
        return array(
            "bin", "merchantID", "customerName", "customerRefNum",
            "ccAccountNum", "euddIBAN"
        ); 
    }
}