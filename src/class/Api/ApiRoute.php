<?php

/**
 * API Route Class
 */
class ApiRoute {
  /**
   * HTTP GET Method
   * @var string HTTP GET Method
   */
  public const HTTP_GET = 'GET';

  /**
   * HTTP POST Method
   * @var string HTTP POST Method
   */
  public const HTTP_POST = 'POST';

  /**
   * HTTP PUT Method
   * @var string HTTP PUT Method
   */
  public const HTTP_PUT = 'PUT';

  /**
   * HTTP PATCH Method
   * @var string HTTP PATCH Method
   */
  public const HTTP_PATCH = 'PATCH';

  /**
   * HTTP DELETE Method
   * @var string HTTP DELETE Method
   */
  public const HTTP_DELETE = 'DELETE';

  /**
   * Unique ID
   */
  public string $ID;

  /**
   * Display Name
   */
  public string $Name;
  
  /**
   * HTTP Method (e.g. GET)
   */
  public string $Method;
  
  /**
   * Full Path (e.g. /v/1/0/animals/cat)
   */
  public string $Path;

  /**
   * API ID 
   * @var string The ID of the API this belongs to
   */
  public string $ApiID;

  /**
   * Constructor
   * 
   */
  public function __construct (
    
  ) {

  }
}
