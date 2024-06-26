<?php

return <<<TPL
apiVersion: apps/v2
kind: Test
metadata:
  name: nginx-deployment
spec:
  selector:
    matchLabels:
      app: nginx
  replicas: 2 # 代表Nginx的副本数
  template:
    metadata:
      labels:
        app: nginx
    spec:
      containers:
      - name: nginx
        image: nginx:latest
        ports:
        - containerPort: 81 
apiVersion: apps/v3
kind: PRODUCTION
metadata:
  name: nginx-deployment              
TPL;
