<?php namespace OrbitalBatch\Response;

class endOfDayResp extends Transaction
{
    public function approved()
    {
        return ($this->parameters->procStatus == 0);
    }
}
