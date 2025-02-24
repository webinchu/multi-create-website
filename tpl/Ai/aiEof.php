<?php

<<<EOF
#!/bin/sh

echo "start build core project ..."

CGO_ENABLED=0 GOOS=linux GOARCH=amd64 go build -o core main.go


echo "scp file to remote service ..."

scp core root@8.134.124.148:/www/app/backup/
scp config/biz.yaml root@8.134.124.148:/www/app/core/config
#scp config/app.yaml root@8.134.124.148:/www/app/core/config


echo "开始重启服务中..."
ssh root@8.134.124.148 /www/app/core/publish.sh

echo "服务重启完成!"

echo "clear build ..."

go env -w GOOS=darwin

go env -w GOARCH=amd64

echo "clear build file ..."

rm -f core


EOF;
