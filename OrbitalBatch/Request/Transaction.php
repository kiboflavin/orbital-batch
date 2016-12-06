<?php namespace OrbitalBatch\Request;

class Transaction {
	
	public $parameters;

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;

        $this->validate();
    }

    protected function required_fields()
    {
        return array();
    }

    protected function valid_fields()
    {
        return array();
    }

	protected function validate()
    {
        # check that all required fields are provided
        foreach ($this->required_fields() as $key) {
            if (! array_key_exists($key, $this->parameters)) {
                throw new \OrbitalBatch\Exception("Required parameter \"{$key}\" missing in Transaction object");
            }
        }

        # check that all provided fields are valid
        $valid_fields = $this->valid_fields();
		foreach (array_keys($this->parameters) as $key) {
			if (! in_array($key, $valid_fields)) {
                throw new \OrbitalBatch\Exception("Invalid parameter \"{$key}\" in Transaction object"); 
			}
		}

        return TRUE;
	}
}