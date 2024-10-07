<?php

require_once('../src/class/Customer.php');

/**
 * Detailed Customer Class
 */
class DetailedCustomer extends Customer {

  /**
   * Customer GUID
   */
  public string $ID;

  /**
   * Customer Name
   */
  public string $Name;

  /**
   * Summary of AccountID
   * @var string
   */
  public string $AccountID;

  /**
   * Summary of AccountName
   * @var string
   */
  public string $AccountName;

  /**
   * Summary of AccountOpened
   * @var int
   */
  public int $AccountOpened;

  /**
   * Summary of TotalPaymentsAmount
   * @var int
   */
  public int $TotalPaymentsAmount;

  /**
   * Summary of TotalFeesAmount
   * @var int
   */
  public int $TotalFeesAmount;

  /**
   * Summary of AccountClosed
   * @var 
   */
  public ?int $AccountClosed = null;

  /**
   * Summary of LastPaymentTimestamp
   * @var 
   */
  public ?int $LastPaymentTimestamp = null;
  
  /**
   * Constructor
   * 
   * @param string $ID Customer GUID
   * @param string $Name Customer Name
	 * @param string $AccountID
	 * @param string $AccountName
	 * @param int $AccountOpened
	 * @param int $TotalPaymentsAmount
	 * @param int $TotalFeesAmount
	 * @param ?int $AccountClosed
	 * @param ?int $LastPaymentTimestamp
   */
  public function __construct (
    string $ID,
    string $Name,
	  string $AccountID,
	  string $AccountName,
	  int $AccountOpened,
	  int $TotalPaymentsAmount = 0,
	  int $TotalFeesAmount = 0,
	  ?int $AccountClosed = null,
	  ?int $LastPaymentTimestamp = null
  ) {
    parent::__construct(
      $ID,
      $Name
    );

    $this->ID = $ID;
    $this->Name = $Name;
    $this->AccountID = $AccountID;
    $this->AccountName = $AccountName;
    $this->AccountOpened = $AccountOpened;
    $this->TotalPaymentsAmount = $TotalPaymentsAmount;
    $this->TotalFeesAmount = $TotalFeesAmount;
    $this->AccountClosed = $AccountClosed;
    $this->LastPaymentTimestamp = $LastPaymentTimestamp;
  }

  /**
   * getLastPaymentDate
   * 
   * Returns the last payment date in the format specified in the `$dateFormat` argument.
   * 
   * @param string $dateFormat
   * @return string Formatted date or empty string if no last payment date
   */
  public function getLastPaymentDate(
    string $dateFormat = 'Y-m-d H:i:s'
  ): string {
    if (is_null($this->LastPaymentTimestamp)) {
      return '-';
    }

    return date(
      $dateFormat,
      $this->LastPaymentTimestamp
    );
  }

  /**
   * getAccountOpenedDate
   * 
   * Returns the date the account was opened, in the format specified in the `$dateFormat`
   * arg.
   * 
   * @param string $dateFormat
   * @return string Formatted date or empty string if no account for the customer
   */
  public function getAccountOpenedDate(
    string $dateFormat = 'Y-m-d H:i:s'
  ): string {
    if (is_null($this->AccountOpened) || !$this->AccountOpened) {
      return '-';
    }

    return date(
      $dateFormat,
      $this->AccountOpened
    );
  }

  /**
   * Matches
   * 
   * @param string $query The text string to match
   * @return bool TRUE if anything on this Customer matches $query
   */
  public function matches (
    string $query
  ): bool {
    if (stripos($this->AccountName, $query) > -1) {
      return true;
    }

    if (stripos($this->AccountID, $query) > -1) {
      return true;
    }

    return parent::matches($query);
  }
}
