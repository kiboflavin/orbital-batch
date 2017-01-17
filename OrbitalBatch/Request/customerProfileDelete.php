<?php namespace OrbitalBatch\Request;

class customerProfileDelete extends Transaction
{
    public function required_fields()
    {
        return array(
            "bin", "merchantID", "customerRefNum"
        );
    }

    public function valid_fields()
    {
        return array(
             "bin", "merchantID", "customerName", "customerRefNum"
        );
    }
}