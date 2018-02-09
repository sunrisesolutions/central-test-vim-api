# central-test-vim-api
Important note for Apache users

As stated in this link and this one, Apache server will strip any Authorization header not in a valid HTTP BASIC AUTH format.

If you intend to use the authorization header mode of this bundle (and you should), please add those rules to your VirtualHost configuration :

RewriteEngine On
RewriteCond %{HTTP:Authorization} ^(.*)
RewriteRule .* - [e=HTTP_AUTHORIZATION:%1]
