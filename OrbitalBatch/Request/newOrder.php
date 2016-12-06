<?php namespace OrbitalBatch\Request;

class newOrder extends Transaction
{
    public function required_fields()
    {
        return array(
            "industryType", "transType", "bin", "merchantID", "terminalID",
            "orderID"
        );
    }

    public function valid_fields()
    {
        return array(
            "industryType", "transType", "bin", "merchantID", "terminalID",
            "cardBrand", "ccAccountNum", "ccExp", "authenticationECIInd",
            "switchSoloIssueNum", "switchSoloCardStartDate", "ecpCheckRT",
            "ecpCheckDDA", "ecpBankAcctType", "ecpAuthMethod",
            "ecpDelvMethod", "avsZip", "avsAddress1", "avsAddress2",
            "avsCity", "avsState", "avsName", "avsPhone", "avsCountryCode",
            "avsDestName", "avsDestAddress", "avsDestAddress2",
            "avsDestCity", "avsDestState", "avsDestZip",
            "avsDestCountryCode", "avsDestPhone", "useCustomerRefNum",
            "addProfileFromOrder", "customerRefNum",
            "customerProfileOrderOverideInd", "verifyByVisaCAVV",
            "verifyByVisaXID", "priorAuthCd", "orderID", "amount", "comments",
            "shippingRef", "taxInd", "taxAmount", "pCardOrderID",
            "pCardDestZip", "pCardDestName", "pCardDestAddress",
            "pCardDestAddress2", "pCardDestCity", "pCardDestStateCd",
            "PC3Core", "amexTranAdvAddn1", "amexTranAdvAddn2",
            "amexTranAdvAddn3", "amexTranAdvAddn4", "mcSecureCodeAAV",
            "retryTrace", "sDMerchantName", "sDProductDescription",
            "sDMerchantCity", "sDMerchantPhone", "sDMerchantEmail",
            "sDMerchantURL", "recurringInd", "euddCountryCode",
            "euddBankSortCode", "euddRIBCode", "bmlCustomerIP",
            "bmlCustomerEmail", "bmlShippingCost", "bmlTNCVersion",
            "bmlCustomerRegistrationDate", "bmlCustomerTypeFlag",
            "bmlItemCategory", "bmlPreapprovalInvitationNum",
            "bmlMerchantPromotionalCode", "bmlCustomerBirthDate",
            "bmlCustomerSSN", "bmlCustomerAnnualIncome",
            "bmlCustomerResidenceStatus", "bmlCustomerCheckingAccount",
            "bmlCustomerSavingsAccount", "bmlProductDelvType", "mbType",
            "mbOrderIdGenerationMethod", "mbRecurringStartDate",
            "mbRecurringEndDate", "mbRecurringNoEndDateFlag",
            "mbRecurringMaxBillings", "mbRecurringFrequency",
            "mbMicroPaymentMaxDollarValue", "mbMicroPaymentMaxBillingDays",
            "mbMicroPaymentMaxTransactions", "mbDeferredBillDate",
            "txRefNum", "billerReferenceNumber", "accountUpdaterEligibility",
            "useStoredAAVInd", "ecpActionCode", "ecpCheckSerialNumber",
            "ecpTerminalCity", "ecpTerminalState", "ecpImageReferenceNumber",
            "customerAni", "avsPhoneType", "avsDestPhoneType",
            "customerEmail", "customerIpAddress", "emailAddressSubtype",
            "customerBrowserName", "shippingMethod", "fraudAnalysis",
            "cardIndicators", "paymentInd", "euddBankBranchCode", "euddIBAN",
            "euddBIC", "euddMandateSignatureDate", "euddMandateID",
            "euddMandateType", "txnSurchargeAmt"
        );
    }
}