<?php namespace OrbitalBatch\Response;

class Transaction {
	
	public $parameters;

    public function __construct(\SimpleXMLElement $parameters)
    {
        $this->parameters = $parameters;
    }

    public function __get($var)
    {
        if (property_exists($this->parameters, $var)) {
            return (string)$this->parameters->$var;
        }

        return NULL;
    }

}