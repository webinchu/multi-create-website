# 暴露端口
EXPOSE 80 443
EXPOSE 8080
EXPOSE 11211/tcp 11211/udp

# 基础镜像
FROM registry.cn-guangzhou.aliyuncs.com/uu-love/nginx:stable-slim

# 设置动态参数
ARG appid
RUN mkdir -p /data/app/${appid}
COPY dist* /data/app/${appid}/
RUN rm -rf dist* /data/app/${appid}/

# 构建镜像
# docker build -f /path/Dockerfile .

# 示例命令
RUN apk update
RUN ["executable", "param1", "param2"]
RUN ["/etc/execfile", "arg1", "arg2"]

# 默认命令
CMD ["sh", "-c", "echo 'This is a test.' | wc -l"]
CMD ["/usr/bin/wc", "--help"]

# 使用 Ubuntu 镜像
FROM ubuntu
ENTRYPOINT ["ls", "/usr/local"]
CMD ["/usr/local/tomcat"]

# 环境变量
ENV myName="John Doe" \
myDog="Rex The Dog" \
myCat="fluffy"

# 使用 OpenJDK 镜像
FROM openjdk:8-jre
WORKDIR /app
ADD demo-0.0.1-SNAPSHOT.jar app.jar
EXPOSE 8081
ENTRYPOINT ["java", "-jar"]
CMD ["app.jar"]
