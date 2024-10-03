<?php

/**
 * User Logout Page
 */

userOnlyPage(); // Redirect if not logged in

$globalSession = GlobalSession::getGlobalSession();
$globalSession->end(); // End user session

inlineRedirect('/logout/success'); // Redirect to logout success page
