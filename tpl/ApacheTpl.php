<?php
return <<<TPL
<VirtualHost *:80>
     DocumentRoot "$dirPath"
     ServerName $domain
</VirtualHost>

<VirtualHost *:80>
     DocumentRoot "$dirPath"
     ServerName test02.example.com
</VirtualHost>
TPL;
