EXPOSE 80 443
EXPOSE 8080
EXPOSE 11211/tcp 11211/udp

FROM registry.cn-guangzhou.aliyuncs.com/uu-love/nginx:stable-slim
ARG appid
RUN mkdir -p /data/app/${appid}
COPY dist* /data/app/${appid}/

RM dist* /data/app/${appid}/

docker build -f /path/Dockerfile

RUN ["executable", "param1", "param2"]
RUN apk update
RUN ["/etc/execfile", "arg1", "arg2"]

CMD echo "This is a test." | wc -l
CMD ["/usr/bin/wc","--help"]

FROM ubuntu
ENTRYPOINT ["ls", "/usr/local"]
CMD ["/usr/local/tomcat"]

ENV myName John Doe
ENV myDog Rex The Dog
ENV myCat=fluffy

FROM openjdk:8-jre
WORKDIR /app
ADD demo-0.0.1-SNAPSHOT.jar app.jar
EXPOSE 8081
ENTRYPOINT ["java", "-jar"]
CMD ["app.jar"]

