<?php

require_once('../src/class/Payment.php');

/**
 * Account Payment Class
 */
class AccountPayment extends Payment {

  /**
   * Account Payment ID
   */
  public string $AccountPaymentID;

  /**
   * Customer ID
   */
  public string $CustomerID;

  /**
   * Description
   */
  public string $Description;

  /**
   * Customer Payment
   * 
   * @param string $AccountPaymentID Unique ID for this Customer Payment
   * @param string $CustomerID Identifies the Customer this Payment was made for
   * @param string $Description 
   * @param string $ID 
   * @param int $Amount 
   * @param string $CurrencyID 
   * @param int $FeeAmount 
   * @param string $FeeCurrencyID 
   * @param string $PaymentProcessorID 
   * @param int $Received
   */
  public function __construct (
    string $AccountPaymentID,
    string $CustomerID,
    string $Description,
    string $ID,
    int $Amount,
    string $CurrencyID,
    int $FeeAmount,
    string $FeeCurrencyID,
    string $PaymentProcessorID,
    int $Received
  ) {

    parent::__construct(
      $ID,
      $Amount,
      $CurrencyID,
      $FeeAmount,
      $FeeCurrencyID,
      $PaymentProcessorID,
      $Received
    );

    $this->AccountPaymentID = $AccountPaymentID;
    $this->CustomerID = $CustomerID;
    $this->Description = $Description;

  }

}
