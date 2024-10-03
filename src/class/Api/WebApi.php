<?php

/**
 * Web API Class
 */
class WebApi {
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
   * Constructor
   * 
   */
  public function __construct (
    
  ) {

  }
}
