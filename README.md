# Common_Gateway_Interface
The Common Gateway Interface (CGI) is a standard that facilitates communication between web servers and external databases or information sources.

In this I have created a submission form which takes your information and one picture and then using CGI with Perl, it shows next page.
I have create form in HTML with the help of Bootstrap.
For php calling using POST method, I have utlized ajax in jquery, by which picture is saved on the server side, to be used by CGI to show client.

# How to use it?
I personally used Xampp for this by which I created my own mini web server. In Xampp you need to copy submit-cgi.pl to cgi-bin folder and Form.html, Form.css and index.php to htdocs folder. You also need to create a folder in htdocs named 'uploads', where picture will be saved.
