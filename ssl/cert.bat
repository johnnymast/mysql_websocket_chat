@REM @echo off
@echo off
@set PATH=%PATH%;%~dp0bin

if [%1]==[] (
  echo Usage: Must supply a domain
  exit /B 0
)


set DOMAIN=%1

@REM cd certs

@REM echo Create Root CA file
@REM openssl genrsa -des3 -out CA.key 2048
@REM openssl req -x509 -new -nodes -key CA.key -sha256 -days 1825 -out CA.pem

echo Create Domain cert
openssl genrsa -out %DOMAIN%.key 2048
openssl req -new -key %DOMAIN%.key -out %DOMAIN%.csr


(
echo authorityKeyIdentifier=keyid,issuer
echo basicConstraints=CA:FALSE
echo keyUsage = digitalSignature, nonRepudiation, keyEncipherment, dataEncipherment
echo subjectAltName = @alt_names
echo [alt_names]
echo DNS.1 = %DOMAIN%
) > %DOMAIN%.ext

openssl x509 -req -in %DOMAIN%.csr -CA ./CA.pem -CAkey ./CA.key -CAcreateserial -out %DOMAIN%.crt -days 825 -sha256 -extfile %DOMAIN%.ext