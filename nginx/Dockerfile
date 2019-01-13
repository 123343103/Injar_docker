FROM centos
ENV LANG en_US.utf8
ENV NGINX_VERSION 1.14.0
RUN yum -y install wget gcc pcre-devel zlib-devel make \
    && cd /usr/local/src \
    && wget http://nginx.org/download/nginx-${NGINX_VERSION}.tar.gz \
    && tar -zxf nginx-${NGINX_VERSION}.tar.gz \
    && cd /usr/local/src/nginx-$NGINX_VERSION \
    && ./configure --prefix=/usr/local/nginx \
    && make \  
    && make install \
    && yum clean all \
    && rm -f /usr/local/nginx/conf/nginx.conf \
    && rm -f /usr/local/nginx/conf/fastcgi_params
RUN ln -sf /usr/share/zoneinfo/Asia/Shanghai /etc/localtime \
    && echo 'Asia/Shanghai' > /etc/timezone
COPY nginx.conf /usr/local/nginx/conf/nginx.conf
COPY fastcgi_params /usr/local/nginx/conf/fastcgi_params
EXPOSE 80
CMD ["/usr/local/nginx/sbin/nginx","-g","daemon off;"]
