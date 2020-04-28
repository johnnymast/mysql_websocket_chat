## 1.5 Add more security to the chats



## 1.4 Helping developers to build from the project

This release will be more about helping developers with useful boiler plate functions. This will assist them
to create a new project from this one quickly.

For more information about the project, you can visit our new wiki right here on GitHub.

 - Fixed some grammar issues
 - Cleaned up the code according to PSR1 and PSR2
 - Added GitHub Actions
 - Added checks for css via stylelint
 - Added javascript checks via eslint
 - Fixed a few typo's
 - Updated the layout of the private messages.
 - Added an indicator of who the user is typing to. The channel or a user.
 - Made the text of the active user bold red in client list and chat area.
 - Improved comments for JSDOC3
 - Added JSDOC development dependence.
 - Added more instructions to README.md.
 - Renamed CHAT_SERVER_HOST to WEBSOCKET_SERVER_IP for clarity.
 - Renamed CHAT_SERVER_PORT to WEBSOCKET_SERVER_PORT for clarity.
 - Moved the index.php and js files and css files to its own public folder.
 - Fixed a bug where dom(selector).prop(..) would not set a value 
 - Updated the comments in dom.js for later documentation. Fixing #31
 - Added dom(selector).removeAttr(). Fixing #25
 - Removed external dependence bootstrap-theme.min.css from the project.
 - Scripts and Stylesheets are now relative to the directory your hosting it in. So that the project can be hosted in sub directories for example chat/index.php. Fixing #29 and #28.
 - Cleaned up the HTML code. fixing #30


## 1.3 Small new features

This update will fix some small things to make the package more easy to use overall.
It will also make the whole footprint of the package smaller.

 - Tested and fixed a last few bugs, then released. Fixing #12
 - Updated Faker to version 1.7 and Ratchet to 0.4.1. Fixing #5
 - Added auto reconnect (if server restarts or if the internet goes down). Fixing #6
 - Empty text should not be sent, now there will be a css animation for the input box. Fixing #22
 - Updated the comments for JSDOC3, fixing #14
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




