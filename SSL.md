https://support.oneidentity.com/virtual-directory-server/kb/96142/error-ssl-routines-ssl3_read_bytes-sslv3-alert-certificate-unknown-ssl-alert-number-46-3

Make sure php_openssl is loaded!

Resolution
Resolution 1:
Install a new certificate into the Virtual Directory Server that has been issued by a certificate authority trusted by the client.

Resolution 2:
To resolve this error while leaving the existing configuration for the Virtual Directory Server in place, perform the following:
NOTE: The following is performed on a Windows XP Workstation

1. On the client workstation, click “Start” | “Run”
2. Type “MMC” and click “Ok”
3. Select “File” | “Add/Remove Snap-In” from the top menu
4. Click “Add”
5. Select “Certificates” and click “Add”
6. Select “Computer Account” and click “Next”
7. Ensure “Local Computer” is selected and click “Finish”
8. Click “Close”
9. Click “Ok”
10. Expand “Certificates (Local Computer)” | “Trusted Root Certificate Authorities”
11. Right click on the sub key “Certificates” and select “Import”
12. Click “Next” on the import wizard
13. Browse and select the PEM file and click “Ok”. Click “Next”
14. Ensure that “Place all certificates in the following store” is selected and “Trusted Root Certification Authorities” is shown. Click “Next”
15. Click “Finish”
16. Click “Ok” to the popup letting you know that the import was successful

Once the certificate is trusted on the client from performing the above, try to use the client to connect over SSL.