<?php namespace OrbitalBatch\Request;

class void extends Transaction
{
    public function required_fields()
    {
        return array(
            "industryType", "transType", "bin", "merchantID", "terminalID",
            "orderID"
        );
    }

    public function valid_fields()
    {
        return array(
            "txRefNum", "txRefIdx", "adjustedAmount", "bin", "merchantID",
            "terminalID", "orderID", "reversalRetryNumber"
        );
    }

}