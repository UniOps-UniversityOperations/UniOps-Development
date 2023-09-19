# UniOps-development

#### In public/.htaccess
Change 4th line to
```RewriteBase /path-to-the-root-directory-from-htdocs-directory/public```

#### Inside app directory

Create .env file
Copy the content in .env.example to .env file
Give relevant database configurations

Change URLROOT to
```http://localhost/root-folder-path-from-htdocs```

Then go to application -> config -> database.php
