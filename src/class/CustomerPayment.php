<?php

require_once('../src/class/Payment.php');

/**
 * Customer Payment Class
 */
class CustomerPayment extends Payment {

  /**
   * Customer Payment ID
   */
  public string $CustomerPaymentID;

  /**
   * Customer ID
   */
  public string $CustomerID;

  /**
   * Description
   */
  public string $Description;

  /**
   * Recorded Date
   */
  public int $Recorded;

  /**
   * Customer Payment
   * 
   * @param string $CustomerPaymentID Unique ID for this Customer Payment
   * @param string $CustomerID Identifies the Customer this Payment was made for
   * @param string $Description 
   * @param int $Recorded 
   * @param string $ID 
   * @param int $Amount 
   * @param string $CurrencyID 
   * @param int $FeeAmount 
   * @param string $FeeCurrencyID 
   * @param string $PaymentProcessorID 
   * @param int $Received
   */
  public function __construct (
    string $CustomerPaymentID,
    string $CustomerID,
    string $Description,
    int $Recorded,
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

    $this->CustomerPaymentID = $CustomerPaymentID;
    $this->CustomerID = $CustomerID;
    $this->Description = $Description;
    $this->Recorded = $Recorded;

  }

}
