<?php namespace OrbitalBatch\Request;

class markForCapture extends Transaction
{
    public function required_fields()
    {
        return array(
            "txRefNum", "orderID", "bin", "merchantID", "terminalID",
        );
    }

    public function valid_fields()
    {
        return array(
            "txRefNum", "amount", "orderID", "bin", "merchantID",
            "terminalID", "taxInd", "taxAmount", "pCardOrderID",
            "pCardDestZip", "pCardDestName", "pCardDestAddress",
            "pCardDestAddress2", "pCardDestCity", "pCardDestStateCd",
            "PC3Core", "amexTranAdvAddn1", "amexTranAdvAddn2",
            "amexTranAdvAddn3", "amexTranAdvAddn4", "retryTrace"
        );
    }
}