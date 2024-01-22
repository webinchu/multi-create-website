<?php
return <<<TPL
<VirtualHost *:$port>
     DocumentRoot "$dirPath"
     ServerName $domain
</VirtualHost>

<VirtualHost *:$port2>
     DocumentRoot "$dirPath2"
     ServerName $domain2
</VirtualHost>

<VirtualHost *:$port3>
     DocumentRoot "$dirPath3"
     ServerName $domain3
</VirtualHost>
TPL;
