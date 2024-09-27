<?php

/**
 * Payment Class
 */
class Payment {

  /**
   * Payment ID
   */
  public string $ID;

  /**
   * Payment Amount
   */
  public int $Amount;

  /**
   * Payment Currency
   */
  public string $CurrencyID;

  /**
   * Payment Fee Amount
   */
  public int $FeeAmount;

  /**
   * Payment Fee Currency
   */
  public string $FeeCurrencyID;

  /**
   * Payment Processor ID
   */
  public string $PaymentProcessorID;

  /**
   * Received Date
   */
  public int $Received;

  /**
   * Payment
   * 
   * @param string $ID 
   * @param int $Amount 
   * @param string $CurrencyID 
   * @param int $FeeAmount 
   * @param string $FeeCurrencyID 
   * @param string $PaymentProcessorID 
   * @param int $Received
   */
  public function __construct (
    string $ID,
    int $Amount,
    string $CurrencyID,
    int $FeeAmount,
    string $FeeCurrencyID,
    string $PaymentProcessorID,
    int $Received
  ) {
    $this->ID = $ID;
    $this->Amount = $Amount;
    $this->CurrencyID = $CurrencyID;
    $this->FeeAmount = $FeeAmount;
    $this->FeeCurrencyID = $FeeCurrencyID;
    $this->PaymentProcessorID = $PaymentProcessorID;
    $this->Received = $Received;
  }

  public function getSubTotal (
    string $decimalSeparator = ''
  ) {
    $subTotal = intval($this->Amount) - intval($this->FeeAmount);
    preg_match(
      '/^([0-9]{1,})([0-9]{2})$/U', 
      strval($subTotal), 
      $matches
    );

    $decimalPlaces = 2;

    return number_format(
      floatval("$matches[1].$matches[2]"),
      $decimalPlaces,
      $decimalSeparator
    );
  }

  public function getFeeAmount (
    string $decimalSeparator = ''
  ) {
    preg_match(
      '/^([0-9]{1,})([0-9]{2})$/U', 
      $this->FeeAmount, 
      $matches
    );

    $decimalPlaces = 2;

    return number_format(
      floatval("$matches[1].$matches[2]"),
      $decimalPlaces,
      $decimalSeparator
    );
  }

  public function getAmount (
    string $decimalSeparator = ''
  ) {
    preg_match(
      '/^([0-9]{1,})([0-9]{2})$/U', 
      $this->Amount, 
      $matches
    );

    $decimalPlaces = 2;

    return number_format(
      floatval("$matches[1].$matches[2]"),
      $decimalPlaces,
      $decimalSeparator
    );
  }

}
