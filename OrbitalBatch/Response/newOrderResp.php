<?php namespace OrbitalBatch\Response;

class newOrderResp extends Transaction
{
    public function approved()
    {
        return ($this->parameters->procStatus == 0 && $this->parameters->approvalStatus == 1);
    }

    public function status()
    {
        return $this->parameters->procStatusMessage;
    }
}
