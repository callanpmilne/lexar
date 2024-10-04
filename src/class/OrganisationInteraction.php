<?php

require_once('../src/class/Note.php');

/**
 * OrganisationInteraction Class
 */
class OrganisationInteraction extends Note {

  /**
   * Organisation Interaction ID
   */
  public string $OrganisationInteractionID;

  /**
   * Organisation ID
   */
  public string $OrganisationID;

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
   * @param string $OrganisationInteractionID Organisation Interaction GUID
   * @param string $OrganisationID Organisation GUID
   * @param int $StartTime Interaction Start Timestamp
   * @param int $EndTime Interaction Start Timestamp
   * @param string $MediumID Medium (Messenger Service, etc) GUID
   * @param string $NoteID Note UUID
   * @param string $Author UUID of the Authoring User
   * @param string $ContentBody Text Content of the Note
   * @param int $Created Note Created Timestamp
   */
  public function __construct (
    string $OrganisationInteractionID,
    string $OrganisationID,
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
    
    $this->OrganisationInteractionID = $OrganisationInteractionID;
    $this->OrganisationID = $OrganisationID;
    $this->StartTime = $StartTime;
    $this->EndTime = $EndTime;
    $this->MediumID = $MediumID;
  }

}
