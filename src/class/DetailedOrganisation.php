<?php

require_once('../src/class/Organisation.php');

/**
 * Detailed Organisation Class
 */
class DetailedOrganisation extends Organisation {
  /**
   * @var string $AccountID AccountID
   */
  public string $AccountID;

  /**
   * @var string $AccountName AccountName
   */
  public string $AccountName;

  /**
   * @var int $AccountOpened AccountOpened
   */
  public int $AccountOpened;

  /**
   * @var int $TotalPaymentsAmount TotalPaymentsAmount
   */
  public int $TotalPaymentsAmount;

  /**
   * @var int $TotalFeesAmount TotalFeesAmount
   */
  public int $TotalFeesAmount;

  /**
   * @var ?int $AccountClosed AccountClosed
   */
  public ?int $AccountClosed = null;

  /**
   * @var ?int $LastPaymentTimestamp LastPaymentTimestamp
   */
  public ?int $LastPaymentTimestamp = null;
  
  /**
   * Constructor
   * 
   * @param string $ID Customer GUID
   * @param string $Name Customer Name
	 * @param int $Added Date Org Added
	 * @param string|null $ParentID Parent Org ID
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
    int $Added,
    string|null $ParentID,
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
      $Name,
      $Added,
      $ParentID
    );

    $this->AccountID = $AccountID;
    $this->AccountName = $AccountName;
    $this->AccountOpened = $AccountOpened;
    $this->TotalPaymentsAmount = $TotalPaymentsAmount;
    $this->TotalFeesAmount = $TotalFeesAmount;
    
    if (!is_null($AccountClosed)) {
      $this->AccountClosed = $AccountClosed;
    }

    if (!is_null($LastPaymentTimestamp)) {
      $this->LastPaymentTimestamp = $LastPaymentTimestamp;
    }
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
}
