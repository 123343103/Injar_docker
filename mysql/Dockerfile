FROM centos
ENV MYSQL_MAX_VERSION 5.7
ENV MYSQL_MIN_VERSION 24
RUN yum -y install gcc gcc-c++ wget cmake make ncurses-devel openssl-devel \
    && cd /usr/local/src \
    && wget https://dev.mysql.com/get/Downloads/MySQL-$MYSQL_MAX_VERSION/mysql-boost-${MYSQL_MAX_VERSION}.${MYSQL_MIN_VERSION}.tar.gz \
    && tar -zxf mysql-boost-${MYSQL_MAX_VERSION}.${MYSQL_MIN_VERSION}.tar.gz \
    && cd /usr/local/src/mysql-${MYSQL_MAX_VERSION}.${MYSQL_MIN_VERSION} \
    && cmake -DCMAKE_INSTALL_PREFIX=/usr/local/mysql \
	   -DWITH_BOOST=boost \
	   -DMYSQL_DATADIR=/usr/local/mysql/data \
	   -DSYSCONFDIR=/usr/local/mysql/etc \
	   -DDEFAULT_CHARSET=utf8 \
	   -DDEFAULT_COLLATION=utf8_general_ci \
    && make \  
    && make install \
    && groupadd mysql \
    && useradd -r -g mysql -s /bin/false mysql \
    && cd /usr/local/mysql \
    && bin/mysqld --initialize-insecure --user=root \
    && yum clean all
COPY my.cnf /usr/local/mysql/etc/my.cnf
EXPOSE 3306
CMD ["/usr/local/mysql/bin/mysqld_safe"]
