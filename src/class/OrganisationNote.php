<?php

// Load generateUuid() function for generating Note IDs
require_once('../src/methods/generateUuid.php');

require_once('../src/class/Note.php');

/**
 * OrganisationNote Class
 */
class OrganisationNote extends Note {

  /**
   * Organisation Note ID
   */
  public string $OrganisationNoteID;

  /**
   * Organisation ID
   */
  public string $OrganisationID;

  /**
   * Recorded Date
   */
  public int $Recorded;

  /**
   * Create Organisation Note
   * 
   * Creates and returns a new OrganisationNote object with $OrganisationNoteID, $Recorded, $NoteID and
   * $Created pre-populated.
   * 
   * @param string $OrganisationID UUID of the Organisation this note attaches to
   * @param string $Author UUID of the Authoring User
   * @param string $ContentBody Text Content of the Note
   * @param ?string $OrganisationNoteID OrganisationNote UUID
   * @param ?int $Recorded OrganisationNote Recorded Timestamp
   * @param ?string $NoteID Note UUID
   * @param ?int $Created Note Created Timestamp
   * @return OrganisationNote A fully instantiated Note object
   */
  public static function CreateOrganisationNote (
    string $OrganisationID,
    string $Author,
    string $ContentBody,
    ?string $OrganisationNoteID = null,
    ?int $Recorded = null,
    ?string $NoteID = null,
    ?int $Created = null
  ) {
    // Generate a new UUID if $OrganisationNoteID is null
    $OrganisationNoteID = !is_null($OrganisationNoteID) ? $OrganisationNoteID : generateUuid();

    // Create corresponding Note instance
    $note = Note::Create(
      $Author,
      $ContentBody,
      isset($NoteID) && $NoteID ? $NoteID : null,
      isset($Created) && $Created ? $Created : null
    );

    // Instantiate OrganisationNote for result
    $organisationNote = new OrganisationNote(
      $OrganisationNoteID,
      $OrganisationID,
      $note->Created,
      $note->ID,
      $note->Author,
      $note->ContentBody,
      $note->Created
    );

    // Return the new Organisation Note
    return $organisationNote;
  }
  
  /**
   * Constructor
   * 
   * @param string $OrganisationNoteID Organisation Note GUID
   * @param string $OrganisationID Organisation GUID
   * @param int $Recorded Note Recorded Timestamp
   * @param string $NoteID Note UUID
   * @param string $Author UUID of the Authoring User
   * @param string $ContentBody Text Content of the Note
   * @param int $Created Note Created Timestamp
   */
  public function __construct (
    string $OrganisationNoteID,
    string $OrganisationID,
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
    
    $this->OrganisationNoteID = $OrganisationNoteID;
    $this->OrganisationID = $OrganisationID;
    $this->Recorded = $Recorded;
  }

}
