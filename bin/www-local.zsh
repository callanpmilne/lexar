#!/bin/zsh
_BIN_DIR=$(dirname "$(readlink $0)")
_BASE_DIR=$(dirname "$_BIN_DIR")
_PUB_DIR="${_BIN_DIR}/pub"
echo "\nLEXAR\n---------\n\nDocument Root:\n${_PUB_DIR}\n\nStarting Web Server...\n"
php -S localhost:8282 $_BASE_DIR/pub/lexar-www.php --docroot=$_PUB_DIR