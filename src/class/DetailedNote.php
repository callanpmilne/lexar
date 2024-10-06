<?php

require_once('../src/class/Note.php');

/**
 * Detailed Note Class
 */
class DetailedNote extends Note {

  public const SUBJECT_ORG = 'ORG';
  
  public const SUBJECT_CUST = 'CUST';

  /**
   * Note GUID
   */
  public string $NoteID;

  /**
   * @var string Author Name
   */
  public string $AuthorName;

  /**
   * @var string Subject Name
   */
  public string $SubjectName;

  /**
   * @var string Subject Type (ORG/CUST)
   */
  public string $SubjectType;

  /**
   * @var string Subject ID (OrgID or CustomerID)
   */
  public string $SubjectID;
  
  /**
   * Constructor
   * 
   * @param string $ID Note GUID
   * @param string $Author 
   * @param string $ContentBody 
   * @param string $Created 
   * @param string $AuthorName
   * @param string $SubjectName
   * @param string $SubjectType
   * @param string $SubjectID
   */
  public function __construct (
    string $Author,
    string $ContentBody,
    string $ID,
    int $Created,
    string $AuthorName,
    string $SubjectName,
    string $SubjectType,
    string $SubjectID
  ) {
    parent::__construct(
      $Author,
      $ContentBody,
      $ID,
      $Created
    );

    $this->AuthorName = $AuthorName;
    $this->SubjectName = $SubjectName;
    $this->SubjectType = $SubjectType;
    $this->SubjectID = $SubjectID;
  }

  /**
   * getAdminViewSubjectLink
   * 
   * @return string URL to the Subject's (admin) view page
   */
  public function getAdminViewSubjectLink(
    // no args
  ): string {
    if ($this->subjectIsOrg()) {
      return sprintf(
        '%s/%s',
        '/admin/view/org',
        $this->SubjectID
      );
    }

    return sprintf(
      '%s/%s',
      '/admin/view/customer',
      $this->SubjectID
    );
  }

  /**
   * subjectIsOrg
   * 
   * @return bool TRUE if Subject Type is DetailedNote::SUBJECT_ORG
   */
  public function subjectIsOrg (
    // no args
  ): bool {
    return $this->SubjectType === self::SUBJECT_ORG;
  }
}
