<?php

// Load generateUuid() function for generating Note IDs
require_once('../src/methods/generateUuid.php');

/**
 * Note Class
 */
class Note {

  /**
   * GUID
   */
  public string $ID;

  /**
   * Author
   */
  public string $Author;

  /**
   * Content Body
   */
  public string $ContentBody;

  /**
   * Created Date
   */
  public string $Created;

  /**
   * Create Note
   * 
   * Creates and returns a new Note object with $ID and $Created pre-populated.
   * 
   * @param string $Author UUID of the Authoring User
   * @param string $ContentBody Text Content of the Note
   * @param string $ID Note UUID
   * @param int $Created Note Created Timestamp
   * @return Note A fully instantiated Note object
   */
  public static function Create (
    string $Author,
    string $ContentBody,
    ?string $ID = null,
    ?int $Created = null
  ) {
    // Generate a new UUID if $ID is null
    $ID = !is_null($ID) ? $ID : generateUuid();

    // Use the current timestamp as created date if $Created is null
    $Created = !is_null($Created) ? $Created : time();

    // Create a new instance of Note
    $note = new Note(
      $ID,
      $Author,
      $ContentBody,
      $Created
    );

    var_dump($note);

    // Return the new Note
    return $note;
  }
  
  /**
   * Constructor
   * 
   * @param string $ID Note UUID
   * @param string $Author UUID of the Authoring User
   * @param string $ContentBody Text Content of the Note
   * @param int $Created Note Created Timestamp
   */
  public function __construct (
    string $ID,
    string $Author,
    string $ContentBody,
    int $Created
  ) {
    $this->ID = $ID;
    $this->Author = $Author;
    $this->ContentBody = $ContentBody;
    $this->Created = $Created;
  }

  /**
   * Set Content Body
   * 
   * Update the content body for this Note instance
   * 
   * @param string $newValue The new body of text
   * @return self
   */
  public function setContentBody (string $newValue) {
    $this->ContentBody = $newValue;

    return $this;
  }

  /**
   * Rebirth
   * 
   * Re-sets the ID for this Note to a (most likely) fresh one.
   * 
   * @return self This same note instance, only with a different ID
   */
  public function rebirth () {
    $this->ID = generateUuid();

    return $this;
  }

}
