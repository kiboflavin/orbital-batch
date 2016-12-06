<?php namespace OrbitalBatch\Request;

class endOfDay extends Transaction
{
    public function required_fields()
    {
        return array(
            "bin", "merchantID", "terminalID"
        );
    }

    public function valid_fields()
    {
        return array(
            "bin", "merchantID", "terminalID"
        );
    }

}