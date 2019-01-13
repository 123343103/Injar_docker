FROM centos
ENV LANG en_US.utf8
ENV PHP_VERSION 5.6.39
ENV XDEBUG_VERSION 2.5.5
RUN yum -y install gcc gcc-c++ wget git make zip unzip autoconf libxml2 libxml2-devel curl libcurl libcurl-devel openssl openssl-devel zlib zlib-devel gd gd-devel freetype freetype-devel libpng libpng-devel libjpeg-turbo libjpeg-turbo-devl \
    && cd /usr/local/src \
    && wget http://cn2.php.net/get/php-${PHP_VERSION}.tar.gz/from/this/mirror \
    && tar -zxf mirror \
    && cd /usr/local/src/php-$PHP_VERSION \
    && ./configure --prefix=/usr/local/php \
		--enable-fpm \
		--enable-mysqlnd \
		--with-mysql \
		--with-mysqli \
		--with-pdo-mysql \
		--enable-mbstring \
		--enable-ftp \
		--enable-soap \
		--enable-zip \
		--enable-opcache \
		--with-curl \
		--with-openssl \
		--with-zlib \
		--with-gd \
		--with-freetype-dir \
		--with-png-dir \
		--with-jpeg-dir \
    && make \  
    && make install \
    && ln -s /usr/local/php/bin/php /usr/local/bin/php \
    && yum clean all
RUN cd /usr/local/src \ 
	&& wget https://xdebug.org/files/xdebug-${XDEBUG_VERSION}.tgz \
	&& tar -zxf xdebug-${XDEBUG_VERSION}.tgz \
	&& cd /usr/local/src/xdebug-${XDEBUG_VERSION} \
	&& /usr/local/php/bin/phpize \
	&& ./configure --with-php-config=/usr/local/php/bin/php-config \
	&& make \
	&& make install
RUN ln -sf /usr/share/zoneinfo/Asia/Shanghai /etc/localtime \
    && echo 'Asia/Shanghai' > /etc/timezone
COPY php-fpm.conf /usr/local/php/etc/php-fpm.conf
COPY www.conf /usr/local/php/etc/php-fpm.d/www.conf
COPY php.ini /usr/local/php/lib/php.ini
COPY composer /usr/local/bin
EXPOSE 9000
CMD ["/usr/local/php/sbin/php-fpm","-F"]
