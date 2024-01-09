<?php
return <<<TPL
<VirtualHost *:$port>
     DocumentRoot "$dirPath"
     ServerName $domain
</VirtualHost>
TPL;
