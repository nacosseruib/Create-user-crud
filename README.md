    HOW TO DEPLOY/HOST LARAVEL APPLICATION ON SERVER
    ----------------------------------------------------
    - If the app. is Laravel-Vue, Go into the laravel-vue project and build the production version of the app. else ignore this step.

    - Make sure that hidden files are visible then compress everything or the entire project folder

    - Go to your cpanel, create a folder for your new app in the root (not public_html)

    - Upload and extract the compressed file into the new folder you just created

    - Move the content of the public folder except .htaccess into the root of the new folder you just made

    - Create a new .htaccess file in the root of this same folder and add these:

    <IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews
    </IfModule>

    RewriteEngine On

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)/$ /$1 [L,R=301]

    # Handle Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    - Edit the index.php file in this same folder by changing:

require DIR.'/../vendor/autoload.php'; to require DIR.'/vendor/autoload.php';

require_once DIR.'/../bootstrap/app.php'; to require_once DIR.'/bootstrap/app.php';

    - Create a subdomain for this app and set the document root to the folder we created and placed all the laravel files into this folder. Open your domain and your website will start working.
