<?php namespace OrbitalBatch\Response;

class customerProfileResp extends Transaction
{
    public function approved()
    {
        return ($this->parameters->profileProcStatus == 0);
    }

    public function status()
    {
        return $this->parameters->profileProcStatusMessage;
    }
}
