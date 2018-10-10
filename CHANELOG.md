## 1.4 Helping developers to build from the project

This release will be more about helping developers with usefull boiler plate functions. This will assist them
to create a new project from this one quickly.

 - Fixed a bug where dom(selector).prop(..) would not set a value
 - Updated the comments in dom.js for later documentation.
 - Added dom(selector).removeAttr()
 

## 1.3 Small new features

This update will fix some small things to make the package more easy to use overall.
It will also make the whole footprint of the package smaller.

 - Tested and fixed a last few bugs, then released. Fixing #12
 - Updated Faker to version 1.7 and Ratchet to 0.4.1. Fixing #5
 - Added auto reconnect (if server restarts or if the internet goes down). Fixing #6
 - Empty text should not be sent, now there will be a css animation for the input box. Fixing #22
 - Updated the comments for JSDOCS3, fixing #14
 - Removed the dependency on jQuery because its slowly dieing. Fixing #9
 - Updated LICENSE.md to reflect the copyright of 2018, fixing #11
 - Updated the javascript code to ES2015, fixing #13
 - Closed issue to add .gitignore. We already had it. Closed and ignored #16
 - Updated CHANGELOG.md to be more detailed about bugs being fixed. Fixing #12
 - Added the License inside the README.md file. fixing #10
  
 
## 1.2 Small changes

After doing some research on windows 10 i found one limitation. Windows does not allow the default configured 0.0.0.0 as a valid host to connect to. This update will update the default code to host on localhost (127.0.0.1) and connect to localhost as well.

- CHAT_SERVER_IP is now deprecated as from now we will use a more generic name like CHAT_SERVER_HOST.
- Fixing a bug that made the chat to not work on windows 10, fixing #2

## 1.1 Multi chat!

 - In this release i have added private chat!, Fixing #1

## 1.0 Initial Release
  
This is the first stable release of mysql_websocket_chat. This project features basic websocket chat with configurable database setup to log chat message.




