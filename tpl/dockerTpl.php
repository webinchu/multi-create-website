FROM registry.cn-guangzhou.aliyuncs.com/uu-love/nginx:stable-slim
ARG appid
RUN mkdir -p /data/app/${appid}
COPY dist* /data/app/${appid}/
