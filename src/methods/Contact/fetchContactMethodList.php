<?php

/**
 * Fetch ContactMethod List
 * 
 * @return ContactMethod[] ContactMethod List
 */
function fetchContactMethodList () {

  $dbconn = $GLOBALS['dbh'];

  pg_prepare(
    $dbconn, 
    "select_all_contact_methods", 
    'SELECT * FROM public."ContactMethods"'
  );

  $result = pg_execute(
    $dbconn, 
    "select_all_contact_methods", 
    array()
  );

  $result = array_map(function ($cat) {

    if (is_null($cat['Modified'])) {
      return new ContactMethod(
        $cat['ID'],
        $cat['Medium'],
        $cat['Identifier'],
        $cat['Added']
      );
    }

    return new ContactMethod(
      $cat['ID'],
      $cat['Medium'],
      $cat['Identifier'],
      $cat['Added'],
      $cat['Modified'] || null
    );

  }, pg_fetch_all($result));

  return $result;
}

/**
 * Fetch Child ContactMethod List
 * 
 * @param string $parentID
 * @return ContactMethod[] ContactMethod List
 */
function fetchChildContactMethodList (
  ?string $ParentID = null
) {
  
  $sth = $dbh->prepare('SELECT * 
    FROM `ContactMethods`
    WHERE `ParentID` = ?');
  
  $sth->bindParam(1, $ParentID, PDO::PARAM_STR, 256);
  
  $sth->execute();

  $result = array_map(function ($cat) {
    return new ContactMethod(
      $cat['ID'],
      $cat['Name'],
      $cat['Path'],
      $cat['ParentID']
    );
  }, $sth->fetchAll(PDO::FETCH_ASSOC));

  return $result;
}