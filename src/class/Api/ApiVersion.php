<?php

/**
 * API Version Class
 */
class ApiVersion {
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
   * Host (e.g. localhost)
   */
  public string $Host;
  
  /**
   * API Route Path Prefix (e.g. myapi/)
   */
  public string $RoutePrefix;

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
