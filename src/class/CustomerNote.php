<?php

// Load generateUuid() function for generating Note IDs
require_once('../src/methods/generateUuid.php');

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
   * Create Customer Note
   * 
   * Creates and returns a new CustomerNote object with $CustomerNoteID, $Recorded, $NoteID and
   * $Created pre-populated.
   * 
   * @param string $CustomerID UUID of the Customer this note attaches to
   * @param string $Author UUID of the Authoring User
   * @param string $ContentBody Text Content of the Note
   * @param ?string $CustomerNoteID CustomerNote UUID
   * @param ?int $Recorded CustomerNote Recorded Timestamp
   * @param ?string $NoteID Note UUID
   * @param ?int $Created Note Created Timestamp
   * @return CustomerNote A fully instantiated Note object
   */
  public static function CreateCustomerNote (
    string $CustomerID,
    string $Author,
    string $ContentBody,
    ?string $CustomerNoteID = null,
    ?int $Recorded = null,
    ?string $NoteID = null,
    ?int $Created = null
  ) {
    // Generate a new UUID if $CustomerNoteID is null
    $CustomerNoteID = !is_null($CustomerNoteID) ? $CustomerNoteID : generateUuid();

    // Create corresponding Note instance
    $note = Note::Create(
      $Author,
      $ContentBody,
      isset($NoteID) && $NoteID ? $NoteID : null,
      isset($Created) && $Created ? $Created : null
    );

    // Instantiate CustomerNote for result
    $customerNote = new CustomerNote(
      $CustomerNoteID,
      $CustomerID,
      $note->Created,
      $note->ID,
      $note->Author,
      $note->ContentBody,
      $note->Created
    );

    // Return the new Customer Note
    return $customerNote;
  }
  
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
