<?php namespace OrbitalBatch\Request;

class customerProfileAdd extends Transaction
{
    public function required_fields()
    {
        return array(
            "bin", "merchantID", "customerProfileOrderOverideInd",
            "customerProfileFromOrderInd"
        );
    }

    public function valid_fields()
    {
        return array(
             "bin", "merchantID", "customerName", "customerRefNum",
             "customerAddress1", "customerAddress2", "customerCity",
             "customerState", "customerZip", "customerEmail", "customerPhone",
             "customerCountryCode", "customerProfileOrderOverideInd",
             "customerProfileFromOrderInd", "orderDefaultDescription",
             "orderDefaultAmount", "customerAccountType", "status",
             "ccAccountNum", "ccExp", "ecpCheckDDA", "ecpBankAcctType",
             "ecpCheckRT", "ecpDelvMethod", "switchSoloCardStartDate",
             "switchSoloIssueNum", "mbType", "mbOrderIdGenerationMethod",
             "mbRecurringStartDate", "mbRecurringEndDate",
             "mbRecurringNoEndDateFlag", "mbRecurringMaxBillings",
             "mbRecurringFrequency", "mbMicroPaymentMaxDollarValue",
             "mbMicroPaymentMaxBillingDays", "mbMicroPaymentMaxTransactions",
             "mbDeferredBillDate", "sDMerchantName", "sDProductDescription",
             "sDMerchantCity", "sDMerchantPhone", "sDMerchantEmail",
             "sDMerchantURL", "euddCountryCode", "euddBankSortCode",
             "euddRIBCode", "billerReferenceNumber",
             "accountUpdaterEligibility" , "euddBankBranchCode", "euddIBAN",
             "euddBIC", "euddMandateSignatureDate", "euddMandateID",
             "euddMandateType"
        );
    }
}