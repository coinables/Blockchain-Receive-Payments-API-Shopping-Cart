######################################
# Blockchain Receive Payments API v2 #
#     Open Shopping Cart             #
######################################

No account with blockchain.info required however you will need an API key. 
Request one here: https://api.blockchain.info/v2/apikey/request/

Blockchain.info's new Receive Payments API uses HD addresses to generate unique addresses for taking bitcoin payments. 
Since these addresses are deterministic no payment forwarding is needed like the previous version of the API. 
All you need is a API key and an extended public key (BIP 32)

1. Download the files in the repository
2. Create and configure a database on your webserver (How to: http://www.fastcomet.com/tutorials/cpanel/create-database)
3. Import the included SQL database files using PHPmyadmin or similar database manager (How to: https://www.namecheap.com/support/knowledgebase/article.aspx/9143/29/how-to-import-and-export-database-in-cpanel-access-denied-create-database-dbname-error-and-how-to-fix-it
4. Open the config.php file and update the fields

That's it!

Access the admin panel to manage your orders and products with login.php
The password to access the admin page is set in your config.php
