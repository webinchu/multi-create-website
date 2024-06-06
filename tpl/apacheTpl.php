<?php
return <<<TPL

<VirtualHost *:$portNew>
     DocumentRoot "$dirPathNew"
     ServerName $domainNew
</VirtualHost>

<VirtualHost *:$port>
     DocumentRoot "$dirPath"
     ServerName $domain
</VirtualHost>

TPL;
