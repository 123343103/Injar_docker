FROM centos
ENV NODE_VERSION v10.15.0
RUN yum -y install wget gcc gcc-c++ which make \
    && cd /usr/local/src \
    && wget https://nodejs.org/dist/${NODE_VERSION}/node-${NODE_VERSION}.tar.gz \
    && tar -zxf node-${NODE_VERSION}.tar.gz \
    && cd /usr/local/src/node-${NODE_VERSION} \
    && ./configure --prefix=/usr/local/node \
    && make \  
    && make install \
    && yum clean all
RUN ln -s /usr/local/node/bin/node /usr/local/bin/node \
	&& ln -s /usr/local/node/bin/npm /usr/local/bin/npm
WORKDIR /yingjia_adminjs
EXPOSE 3000