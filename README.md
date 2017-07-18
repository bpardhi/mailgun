Bulk mail using Mailgun
===

Scripts for the php for sending emails using the Mailgun API.
This script fetch the emails from database and send them bulk mail by using Mailgun API.

This packages supports:
* Send reminder mail to users who have opted for the course.
* Send mail to users who have opted for course but payment is not completed.


This script requires [Mailgun API](https://github.com/mailgun/mailgun-php).

Usage
===

#Usage index.php is an homepage and allows to select operations:
* Enter the name for Campaign.
* Select from dropdown to send whom you want to send mail.

#Usage config.php is an configuration and allows to change the configurations for:
* database
* Mailgun credentials

#Usage mail.php is php script allows to send bulk mail.
