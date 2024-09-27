<?php

require_once('../src/class/Note.php');

/**
 * CustomerInteraction Class
 */
class CustomerInteraction extends Note {

  /**
   * Customer Interaction ID
   */
  public string $CustomerInteractionID;

  /**
   * Customer ID
   */
  public string $CustomerID;

  /**
   * Interaction Start Time
   */
  public int $StartTime;

  /**
   * Interaction End Time
   */
  public int $EndTime;

  /**
   * Medium ID
   */
  public string $MediumID;
  
  /**
   * Constructor
   * 
   * @param string $CustomerInteractionID Customer Interaction GUID
   * @param string $CustomerID Customer GUID
   * @param int $StartTime Interaction Start Timestamp
   * @param int $EndTime Interaction Start Timestamp
   * @param string $MediumID Medium (Messenger Service, etc) GUID
   * @param string $NoteID Note UUID
   * @param string $Author UUID of the Authoring User
   * @param string $ContentBody Text Content of the Note
   * @param int $Created Note Created Timestamp
   */
  public function __construct (
    string $CustomerInteractionID,
    string $CustomerID,
    int $StartTime,
    int $EndTime,
    string $MediumID,
    string $NoteID,
    string $Author,
    string $ContentBody,
    int $Created
  ) {
    parent::__construct(
      $NoteID,
      $Author,
      $ContentBody,
      $Created
    );
    
    $this->CustomerInteractionID = $CustomerInteractionID;
    $this->CustomerID = $CustomerID;
    $this->StartTime = $StartTime;
    $this->EndTime = $EndTime;
    $this->MediumID = $MediumID;
  }

}
