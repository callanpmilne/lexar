<?php

require_once('../src/class/Note.php');

/**
 * CustomerNote Class
 */
class CustomerNote extends Note {

  /**
   * Customer Note ID
   */
  public string $CustomerNoteID;

  /**
   * Customer ID
   */
  public string $CustomerID;

  /**
   * Recorded Date
   */
  public int $Recorded;
  
  /**
   * Constructor
   * 
   * @param string $CustomerNoteID Customer Note GUID
   * @param string $CustomerID Customer GUID
   * @param int $Recorded Note Recorded Timestamp
   * @param string $NoteID Note UUID
   * @param string $Author UUID of the Authoring User
   * @param string $ContentBody Text Content of the Note
   * @param int $Created Note Created Timestamp
   */
  public function __construct (
    string $CustomerNoteID,
    string $CustomerID,
    int $Recorded,
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
    
    $this->CustomerNoteID = $CustomerNoteID;
    $this->CustomerID = $CustomerID;
    $this->Recorded = $Recorded;
  }

}
