#!/bin/bash
rm -rf var &&

#keygen part
mkdir -p "config/jwt" &&
rm -f config/jwt/private.pem &&
rm -f config/jwt/public.pem &&
openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pass pass:fuj-api1 -pkeyopt rsa_keygen_bits:4096 &&
openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem -pubout -passin pass:fuj-api1