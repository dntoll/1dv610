##Test case 1.1, Navigate to Page 
Normal navigation to page, page is shown.

Todays date is shown as: [Day of week], the [day of month numeric]th of [Month as text] [year 4 digits]. The time is [Hour]:[minutes]:[Seconds].
Example: "Monday, the 8th of July 2015, The time is 10:59:21".

###Input:
 * Clear existing cookies
 * Navigate to site.
 
###Output:
 * The text "Not logged in", is shown.
 * A form for login is shown
 * Todays date and time is shown in correct format.
 
![After Input](images/notLoggedIn.png)

***

##Test case 1.2: Failed login without any entered fields
Make sure login cannot happen without entering any fields

###Input:
 * Testcase 1.1
 * Make sure both username and password is empty
 * Press "login" button
 
###Output:
 * The text "Not logged in", is shown.
 * Feedback: “Username is missing” is shown
 * A form for login is shown

![After Input](images/usernameIsMissing.png)

***

##Test case 1.3: Failed login with only username
Make sure login cannot happen without entering both fields

###Input:
 * Testcase 1.1
 * Enter a username "Admin" and let password be empty
 * Press "login" button
 
###Output:
 * The text "Not logged in", is shown.
 * Feedback: “Password is missing” is shown
 * A form for login is shown.
 * "Admin" is filled in as username

![After Input](images/MissingPassword.png)

***


##Test case 1.4: Failed login with only password
Make sure login cannot happen without entering both fields

###Input:
 * Testcase 1.1
 * Enter a password "Password" and let UserName be empty
 * Press "login" button
 
###Output:
 * The text "Not logged in", is shown.
 * Feedback: “Username is missing” is shown
 * A form for login is shown.
 * Password is empty

![After Input](images/usernameIsMissing.png)

***

##Test case 1.5: Failed login with wrong password but existing username
Make sure login cannot happen without correct password

###Input:
 * Testcase 1.1
 * Enter a password "password" <-(NOTE THE LITTLE 'p') and let UserName be "Admin"
 * Press "login" button
 
###Output:
 * The text "Not logged in", is shown.
 * Feedback: "Wrong name or password" is shown
 * A form for login is shown.
 * Password is empty
 * "Admin" is filled in as username

![After Input](images/WrongNameOrPass.png)

***

##Test case 1.6: Failed login with existing password but wrong username
Make sure login cannot happen without correct username even if some user has that password

###Input:
 * Testcase 1.1
 * Enter a password "Password" and let UserName be "admin" <-[Note the little 'a']
 * Press "login" button
 
###Output:
 * The text "Not logged in", is shown.
 * Feedback: "Wrong name or password" is shown
 * A form for login is shown.
 * Password is empty
 * "admin" is filled in as username

![After Input](images/WrongUserName.png)

***

##Test case 1.7: Successful login with correct Username and Password
Make sure login will happen if correct username and password is used

###Input:
 * Testcase 1.1
 * Enter a password "Password" and let UserName be "Admin"
 * Press "login" button
 
###Output:
 * The text "Logged in", is shown.
 * Feedback: "Welcome" is shown
 * A button for logout is shown.
 * (No login form)

![After Input](images/LoginCorrect.png)

***

##Test case 1.8: Still logged in after reload
Make sure we are kept logged in after a reload of the page 

###Input:
 * Testcase 1.7
 * Reload the page without entering any information. (Select URL and press enter)
 
###Output:
 * The text "Logged in", is shown.
 * No feedback is shown
 * A button for logout is shown.


![After Input](images/StillLoggedIn.png)

##Test case 1.8.1: Still logged in after reload with resend of information (f5)
Make sure we are kept logged in after a reload of the page 

###Input:
 * Testcase 1.7
 * Reload the page without entering any information. (Resend POST information with f5)
 
###Output:
 * The text "Logged in", is shown.
 * No feedback is shown
 * A button for logout is shown.


![After Input](images/StillLoggedIn.png)

***

##Test case 1.9: Logged in in another Window
Make sure we are logged in all windows and tabs of the same browser

###Input:
 * Testcase 1.7
 * Open another browser window or tab and enter the same adress as in Test case 1.1
 
###Output:
 * The text "Logged in", is shown.
 * No feedback is shown
 * A button for logout is shown.


![After Input](images/TwoTabsLoggedIn.png)

***

##Test case 2.1: Logout
Make sure we are logged out after pressing logout

###Input:
 * Testcase 1.7
 * Press "logout" button
 
###Output:
 * The text "Not logged in", is shown.
 * The feedback "Bye bye!" is shown
 * An empty form for login is shown.


![After Input](images/LoggedOut.png)

***

##Test case 2.2: Logout by closing the browser
Make sure we are logged out after closing the browser

###Input:
 * Testcase 1.7
 * Close the browser (every tab)
 * Restart the browser
 * Navigate to the URL
 
###Output:
 * See testcase 1.1


![After Input](images/notLoggedIn.png)

***

##Test case 2.3: Logged out in every window
Make sure that we are REALLY logged out...

###Input:
 * Testcase 1.9
 * press logout in one window/tab
 * go to the other window/tab and reload (by selecting URL and press enter)
 
###Output:
 * First tab: "Bye bye!"
 * second tab: "No feedback"
 * Both tabs: login form is shown
 * Both tabs: "Not logged in"

###Tab 1
![After Input](images/LoggedOut.png)

###Tab 2
![After Input](images/notLoggedIn.png)

***

##Test case 2.4: Logout cannot happen if not logged in
Make sure we are logged out after closing the browser

###Input:
 * Testcase 1.7 
 * Press logout
 * Resend the POST information by reloading with F5

###Output:
 * See testcase 1.1
 * No message is shown


##Test case 3.1, Login with "Keep me logged in" 
Normal navigation to page, page is shown.


###Input:
 * Clear existing cookies
 * Navigate to site.
 * Test case 1.1 Navigate to page
 * Enter Username "Admin"
 * Enter Password "Password"
 * Select "Keep me logged in"
 
###Output:
 * The text "Logged in", is shown.
 * The feedback "Welcome and you will be remembered" is shown
 * A logout button is shown
 * Client has cookies for username and password, username is "Admin", password is a random string, unreadable
 
![After Input](images/loginwithkeep.png)
![After Input](images/cookies.png)

##Test case 3.2, Reload removes feedback

###Input:
 * Test case 3.1
 * Reload page
 
###Output:
 * The text "Logged in", is shown.
 * No feedback is shown
 * A logout button is shown
 * Client has cookies for username and password, username is "Admin", password is a random string, unreadable
 
![After Input](images/StillLoggedIn.png)
![After Input](images/cookies.png)


##Test case 3.3, Login by cookies

###Input:
 * Test case 3.1
 * Stop the session by closing the browser window (or remove the session cookie called "PHPSESSID" )
 * (Re)load the page before the cookies end date
 
###Output:
 * The text "Logged in", is shown.
 * Feedback "Welcome back with cookie" is shown
 * A logout button is shown
 * Client still has cookies for username and password, username is "Admin", password is a random string, unreadable
 
![After Input](images/LoginByCookies.png)
![After Input](images/cookies.png)

##Test case 3.4, Failed login by manipulated cookies
Make sure login attempts fail if cookies are manipulated.

###Input:
 * Test case 3.1
 * Remove the PHPSESSID cookie
 * Change the content of the password cookie (For example by FireBug plugin for Firefox)
 * Reload the page by selecting URL and press Enter

###Output
 * Feedback "Wrong information in cookies"
 * The text "Not logged in" is shown
 * Cookies for login is removed (only PHPSESSID cookie is left)
 
![After Input](images/WrongInformationInCookies.png)

##Test case 3.5, Failed login by manipulated "to old" cookie
Make sure login attempts fail if cookies are manipulated to last longer.

###Input:
 * Test case 3.1
 * Remove the PHPSESSID cookie
 * Change the expiration-time of the username and password cookies (For example by FireBug plugin for Firefox)
 * Wait until the original expiration time has gone out.
 * Reload the page by selecting URL and press Enter

###Output
 * Feedback "Wrong information in cookies"
 * The text "Not logged in" is shown
 * Cookies for login is removed (only PHPSESSID cookie is left)
 
![After Input](images/WrongInformationInCookies.png)

##Test case 3.6, Stop session hijacking
Make sure a session cookie is not valid in another browser.

###Input:
 * Start two different browsers (B1 and B2), for example one FireFox and one Chrome browser.
 * B1. Test case 1.7 (Login)
 * B2. Test case 1.1 (Navigate to page)
 * B1. Copy the PHPSESSID cookie values 
 * B2. Create a copy of the PHPSESSID cookie from B2 by changing its value to the same line
 * B2. Reload the page in B2 

###Output
 * B2. No Feedback given
 * B2. The text "Not logged in" is shown
 * B1. Still logged in...
 
##Test case 3.7, Cookies are randomly generated
Make sure a cookie-password are not based on the true users password.

###Input:
 * Test case 3.1, Login with "Keep me logged in" 

###Output
 * Check the password cookie, it should look random and may not contain the true password
 
##Test case 3.8, Cookie Passwords are temporary
Make sure a cookie password are not the same every time...

###Input:
 * Test case 3.1, Login with "Keep me logged in" 
 * Make note of the first cookie password value
 * Logout, remove all cookies
 * Test case 3.1, Login with "Keep me logged in" 
 * Make note of the second cookie password value

###Output
 * The two password cookie values should not be the same
 
 
 
##Test case 4.1, Show Register Form
When user wants to register a registration form should be shown.

###Input:
 * Test Case 1.1 Navigate to site.
 * Press "Register a new user"
 
###Output:
 * The text "Not logged in", is shown.
 * A form for Registration of a new user is shown
 * A button/link with text "Back to login" is shown.

![After Input](images/tc4.1.png)

***


##Test case 4.2 Back to login

###Input:
 * Test case 4.1. Show Register Form
 * Click "Back to login"

###Output:
 * No feedback message
 * The text "Not logged in", is shown.
 * Form for login is shown

![After Input](images/tc4.2.png)

***

##Testfall 4.3: Register without any credentials fails

###Input:
 * Test case 4.1. Show Register Form
 * Click "Register" button without filling in any fields

###Output:
 * Message "Username has too few characters, at least 3 characters. Password has too few characters, at least 6 characters."
 * The text "Not logged in", is shown.
 * Still shows the register form

![After Input](images/tc4.3.png)

***

##Test case 4.4: Register with empty passwords should fail

###Input:
 * Test case 4.1. Show Register Form
 * Enter a valid name with at least 3 characters not entered before like "admina"
 * Click "Register" button 

###Output:
 * Message: "Password has too few characters, at least 6 characters."
 * The text "Not logged in", is shown.
 * Shows the register form with the name filled in.

![After Input](images/tc4.4.png) 


***

##Test case 4.5: Register with a short username should fail

###Input:
 * Test case 4.1. Show Register Form
 * Enter an invalid name with 2 characters like "ad"
 * Enter a valid password like "Password"
 * Enter the same repeat password like "Password"
 * Click "Register" button 

###Output:
 * Message: "Username has too few characters, at least 3 characters."
 * The text "Not logged in", is shown.
 * Shows the register form with the name filled in, like "ad".
  
![After Input](images/tc4.5.png) 

***

##Test case 4.6: Register with a short password should fail

###Input:
 * Test case 4.1. Show Register Form
 * Enter a valid name with at least 3 characters not entered before like "admina"
 * Enter a invalid password like "Passw"
 * Enter the same repeat password like "Passw"
 * Click "Register" button 

###Output:
 * Message: "Password has too few characters, at least 6 characters."
 * The text "Not logged in", is shown.
 * Shows the register form with the name filled in, like "admina".

![After Input](images/tc4.6.png) 

***

##Test case 4.7: Register with a different passwords should fail

###Input:
 * Test case 4.1. Show Register Form
 * Enter a valid name with at least 3 characters not entered before like "admina"
 * Enter a valid password like "Password"
 * Enter another valid repeat password like "Losenord"
 * Click "Register" button 

###Output:
 * Message: "Passwords do not match."
 * The text "Not logged in", is shown.
 * Shows the register form with the name filled in, like "admina".

![After Input](images/tc4.7.png) 

***

##Test case 4.8: Register with an existing user fails

###Input:
 * Test case 4.1. Show Register Form
 * Enter a valid name with at least 3 characters that is already registered like "Admin"
 * Enter a valid password like "Password"
 * Enter the same valid repeat password like "Password"
 * Click "Register" button 

###Output:
 * Message: "User exists, pick another username."
 * The text "Not logged in", is shown.
 * Shows the register form with the name filled in, like "Admin".

![After Input](images/tc4.8.png) 

***

##Test case 4.9: Register with not allowed characters fails

###Input:
 * Test case 4.1. Show Register Form
 * Enter a username with at least 3 characters and add a html tag around it like, <a>abc</a>
 * Enter a valid password like "Password"
 * Enter the same valid repeat password like "Password"
 * Click "Register" button 

###Output:
 * Message: "Username contains invalid characters."
 * The text "Not logged in", is shown.
 * Shows the register form with the name filled in but without the tag, like "abc".

![After Input](images/tc4.9.png) 
 
***

##Test case 4.10: Successful registration

###Input:
 * Test case 4.1. Show Register Form
 * Enter a username with at least 3 characters not registered before like, abc
 * Enter a valid password like "Password"
 * Enter the same valid repeat password like "Password"
 * Click "Register" button 

###Output:
 * Message: "Registered new user."
 * The text "Not logged in", is shown.
 * Shows the login form with the name filled in.

![After Input](images/tc4.10.png) 

##Test case 4.11: Successful login with newly registered user

###Input
 * Test case 4.10
 * Test case 1.7, but with registered user credentials

###Output
 * See TC1.7
