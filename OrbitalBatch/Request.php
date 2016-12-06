<?php namespace OrbitalBatch;

/**
 * Generates Orbital Batch XML request
 *
 * @package OrbitalBatch
 */
class Request
{
    const SCHEMA_VERSION             = '2.9';

    const TRANS_REQUEST              = 'transRequest';
    const REQUEST_COUNT              = 'RequestCount';
    const BATCH_REQUEST_NO           = 'BatchRequestNo';
    const BATCH_FILE_ID              = 'batchFileID';
    const USERID                     = 'userID';
    const FILE_DATE_TIME             = 'fileDateTime';
    const FILE_ID                    = 'fileID';
    const VERSION                    = 'version';
    
    const AUTHORIZE                  = 'A';
    const AUTHORIZE_MARK_FOR_CAPTURE = 'AC';
    const FORCE_CAPTURE              = 'FC';
    const REFUND                     = 'R';

    private $request;
    private $transactions;

    private $transaction_order = array(
        'void',
        'markForCapture',
        'newOrder',
        'customerProfileAdd',
        'customerProfileChange',
        'customerProfileDelete',
        'customerProfileFetch',
        'accountUpdater',
        'safetechFraudAnalysis',
        'flexCache',
        'endOfDay'
    );

    private $void;
    private $markForCapture;
    private $newOrder;
    private $customerProfileAdd;
    private $customerProfileChange;
    private $customerProfileDelete;
    private $customerProfileFetch;
    private $accountUpdater;
    private $safetechFraudAnalysis;
    private $flexCache;
    private $endOfDay;

    private $industry_type;
    private $bin;
    private $merchant_id;
    private $terminal_id;

    private $userID;
    private $fileDateTime;
    public $fileID;
    private $file_name;

    private $request_count = 1;

    /**
     * Constructor.
     *
     * @param string $username        API username
     * @param string $industry_type   Industry type
     * @param string $bin             Transaction routing
     * @param string $merchant_id     Merchant ID
     * @param string $terminal_id     Salem or PNS
     */
    public function __construct($company, $userid, $industry_type, $bin, $merchant_id, $terminal_id)
    {
        $this->userID           = $userid;
        $this->industry_type    = $industry_type;
        $this->bin              = $bin;
        $this->merchant_id      = $merchant_id;
        $this->terminal_id      = $terminal_id;

        $this->fileDateTime     = $this->generate_fileDateTime();
        $this->fileID           = $company. '_'. $this->fileDateTime;
    }

    /**
     * generate file submission timestamp
     *
     * @return string current timestamp
     */
    private function generate_fileDateTime()
    {
        return strftime("%Y%m%d%H%M");
    }
    
    /**
     * current fileID
     *
     * @return string fileID
     */
    public function fileID()
    {
        return $this->fileID;
    }

    /**
     * Authorize a transaction
     *
     * @param array $transaction Transaction parameters
     */
    public function authorize(array $transaction)
    {
        $transaction['transType']    = self::AUTHORIZE;
        $transaction['bin']          = $this->bin;
        $transaction['industryType'] = $this->industry_type;
        $transaction['merchantID']   = $this->merchant_id;
        $transaction['terminalID']   = $this->terminal_id;

        $this->newOrder[] = new \OrbitalBatch\Request\newOrder($transaction);
    }

    /**
     * Authorize and capture a transaction
     *
     * @param array $transaction Transaction paramters
     */
    public function auth_capture(array $transaction)
    {
        $transaction['transType']    = self::AUTHORIZE_MARK_FOR_CAPTURE;
        $transaction['bin']          = $this->bin;
        $transaction['industryType'] = $this->industry_type;
        $transaction['merchantID']   = $this->merchant_id;
        $transaction['terminalID']   = $this->terminal_id;

        $this->newOrder[] = new \OrbitalBatch\Request\newOrder($transaction);
    }

    /**
     * Refund a transaction
     *
     * @param array $transaction Transaction paramters
     */
    public function refund(array $transaction)
    {
        $transaction['transType']    = self::REFUND;
        $transaction['bin']          = $this->bin;
        $transaction['industryType'] = $this->industry_type;
        $transaction['merchantID']   = $this->merchant_id;
        $transaction['terminalID']   = $this->terminal_id;

        $this->newOrder[] = new \OrbitalBatch\Request\newOrder($transaction);
    }

    /**
     * Send "End of day" transaction to settle today's batch
     *
     */
    public function endOfDay()
    {
        $transaction['bin']        = $this->bin;
        $transaction['merchantID'] = $this->merchant_id;
        $transaction['terminalID'] = $this->terminal_id;

        $this->endOfDay[] = new \OrbitalBatch\Request\endOfDay($transaction);
    }

    /**
     * Capture an authorized transaction
     *
     * @param array $transaction Transaction paramters
     */
    public function markForCapture(array $transaction)
    {
        $transaction['bin']        = $this->bin;
        $transaction['merchantID'] = $this->merchant_id;
        $transaction['terminalID'] = $this->terminal_id;

        $this->markForCapture[] = new \OrbitalBatch\Request\markForCapture($transaction);
    }

    public function profile_add(array $transaction)
    {
        $transaction['bin']        = $this->bin;
        $transaction['merchantID'] = $this->merchant_id;

        $this->customerProfileAdd[] = new \OrbitalBatch\Request\customerProfileAdd($transaction);
    }

    public function profile_change(array $transaction)
    {
        $transaction['bin']        = $this->bin;
        $transaction['merchantID'] = $this->merchant_id;

        $this->customerProfileChange[] = new \OrbitalBatch\Request\customerProfileChange($transaction);
    }

    public function profile_delete(array $transaction)
    {
        $transaction['bin']        = $this->bin;
        $transaction['merchantID'] = $this->merchant_id;

        $this->customerProfileDelete[] = new \OrbitalBatch\Request\customerProfileDelete($transaction);
    }

    public function profile_fetch(array $transaction)
    {
        $transaction['bin']        = $this->bin;
        $transaction['merchantID'] = $this->merchant_id;

        $this->customerProfileDelete[] = new \OrbitalBatch\Request\customerProfileFetch($transaction);
    }

    public function gen_batchFileID($dom)
    {
        $batch_file_id_element = $dom->createElement(self::BATCH_FILE_ID);
        $batch_file_id_node = $dom->appendChild($batch_file_id_element);

        $userid_element = $dom->createElement(self::USERID, $this->userID);
        $batch_file_id_node->appendChild($userid_element);

        $filedatetime_element = $dom->createElement(self::FILE_DATE_TIME, $this->fileDateTime);
        $batch_file_id_node->appendChild($filedatetime_element);
        
        $fileid_element = $dom->createElement(self::FILE_ID, $this->fileID);
        $batch_file_id_node->appendChild($fileid_element);
        
        $version_element = $dom->createElement(self::VERSION, self::SCHEMA_VERSION);
        $batch_file_id_node->appendChild($version_element);

        return $batch_file_id_node;
    }

    /**
     * create batch XML text

     * @return string XML document
     */
    public function createBatch()
    {
        $dom = new \DOMDocument('1.0', 'utf-8');
        $dom->formatOutput = TRUE;

        $trans_request_element = $dom->createElement(self::TRANS_REQUEST);
        $trans_request_node = $dom->appendChild($trans_request_element);

        # add batchFileID block
        $trans_request_node->appendChild($this->gen_batchFileID($dom));
        
        # add stored transactions in order
        foreach ($this->transaction_order as $trans_type) {

            # if there are transactions of this type
            if (! empty($this->{$trans_type})) {

                # recurse through stored transactions
                foreach ($this->{$trans_type} as $tr) {

                    $request_no_attr = $dom->createAttribute(self::BATCH_REQUEST_NO);
                    $request_no_attr->value = $this->request_count++;

                    $trans_type_element = $dom->createElement($trans_type);
                    $trans_type_element->appendChild($request_no_attr);

                    $trans_type_node = $trans_request_node->appendChild($trans_type_element);

                    # recurse through fields, add them in the right order
                    foreach ($tr->valid_fields() as $field) {

                        # add the field if its specified
                        if (isset($tr->parameters[$field])) {
                            $item = $dom->createElement($field, $tr->parameters[$field]);
                            $trans_type_node->appendChild($item);
                        }
                    }
                }
            }
        }

        $request_count_attr = $dom->createAttribute(self::REQUEST_COUNT);
        $request_count_attr->value = $this->request_count - 1;
        $trans_request_element->appendChild($request_count_attr);

        return $dom->saveXML();
    }
}