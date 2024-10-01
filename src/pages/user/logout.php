<?php

/**
 * User Logout Page
 */

userOnlyPage(); // Redirect if not logged in

session_destroy(); // End user session

inlineRedirect('/logout/success'); // Redirect to logout success page
