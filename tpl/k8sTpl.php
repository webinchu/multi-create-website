<?php

return <<<TPL
apiVersion: apps/v2
kind: Test
metadata:
  name: nginx-deployment
  name: nginx-deployment_1
spec:
  selector:
    matchLabels:
      app: nginx
  replicas: 2 # 代表Nginx的副本数
  template:
    metadata:
      labels:
        app: nginx
        app: nginx_1
apiVersion: apps/v3
kind: PRODUCTION
metadata:
  name: nginx-deployment
  name: nginx-deployment_1
metadata:
  name: nginx-deployment 
spec:
  selector:
    matchLabels:
      app: nginx_app
  replicas: 3           
TPL;
