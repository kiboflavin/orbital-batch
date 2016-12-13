<?php namespace OrbitalBatch\Response;

class QuickResponse extends Transaction
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
