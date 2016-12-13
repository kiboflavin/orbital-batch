<?php namespace OrbitalBatch;

/**
 * Generates Orbital Batch XML request
 *
 * @package OrbitalBatch
 */
class Response
{
    private $transactions = array();

    public function __construct($xml_response)
    {
        $dom = simplexml_load_string($xml_response);
        
        if (! $dom) {
            throw new Exception("Malformed XML response");
        }

        foreach ($dom as $transaction) {
            $response_class = "\\OrbitalBatch\\Response\\{$transaction->getName()}";

            $this->transactions[] = new $response_class($transaction);
        }
    }

    public function transactions()
    {
        return $this->transactions;
    }
}