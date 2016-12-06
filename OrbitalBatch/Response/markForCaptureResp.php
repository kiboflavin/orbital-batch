<?php namespace OrbitalBatch\Response;

class markForCaptureResp extends Transaction
{
    public function approved()
    {
        return ($this->parameters->procStatus == 0);
    }

    public function status()
    {
        return $this->parameters->procStatusMessage;
    }
}
