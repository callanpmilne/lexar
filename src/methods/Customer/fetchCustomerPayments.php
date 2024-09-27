<?php

require_once('../src/class/CustomerPayment.php');
require_once('../src/constants/currency.php');
require_once('../src/constants/payment.php');

/**
 * Fetch Customer Payments
 * 
 * @param string $CustomerID Customer ID
 * @return CustomerPayment[] Customer Payment List
 */
function fetchCustomerPayments (
  string $CustomerID
) {
  $mockCustomerPaymentID = '2f490478-5d4a-41dd-99ed-4c7db3a61627';
  $mockPaymentID = 'b0fd6237-02d5-44c2-a666-7eef9d6d4f17';
  $mockPaymentDate = time() - 86400;

  $mockDescription = 'Example/Mock Payment';

  $mockAmount = 7500;
  $mockFeeAmount = 1500;

  $mockCurrencyID = UUID_CURRENCY_USD;
  $mockPaymentProcessorID = UUID_PAYMENT_BANK;

  $mockPayment = new CustomerPayment(
    $mockCustomerPaymentID,  // CustomerPayment.ID
    $CustomerID,             // CustomerPayment.CustomerID
    $mockDescription,        // CustomerPayment.Description
    $mockPaymentDate,        // CustomerPayment.Recorded

    $mockPaymentID,          // Payment.ID
    $mockAmount,             // Payment.Amount
    $mockCurrencyID,         // Payment.CurrencyID
    $mockFeeAmount,          // Payment.FeeAmount
    $mockCurrencyID,         // Payment.FeeCurrencyID
    $mockPaymentProcessorID, // Payment.PaymentProcessorID
    $mockPaymentDate         // Payment.Received
  );

  return array(
    $mockPayment
  );
}
