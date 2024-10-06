#!/bin/zsh
_SCRIPT_PATH=$(readlink -f $0)

_HOST="localhost:8282"

_BIN_DIR=$(dirname "$_SCRIPT_PATH")
_BASE_DIR=$(dirname "$_BIN_DIR")
_PUB_DIR="${_BASE_DIR}/pub"


echo "\nLEXAR\n"
echo "------------\n"
echo "Host:\n${_HOST}\n"
echo "Base:\n${_BASE_DIR}\n"
echo "Bin:\n${_BIN_DIR}\n"
echo "Webroot:\n${_PUB_DIR}\n"
echo "------------\n"
echo "Starting Web Server...\n"

cd $_PUB_DIR
php -S $_HOST $_PUB_DIR/lexar-www.php --docroot=$_PUB_DIR