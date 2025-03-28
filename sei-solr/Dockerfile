FROM rockylinux:9.3

ENV TERM=xterm
ENV SOLR_VERSION=9.6.1

ADD assets/ \
   repo_url/repo/solr-${SOLR_VERSION}/solr-${SOLR_VERSION}.tgz \
   repo_url/repo/msttcore-fonts-2.0-3/pacoteslinux_msttcore-fonts-2.0-3.noarch.rpm \
   /tmp/

RUN ls -lh /tmp && sh /tmp/install.sh && rm -rf /tmp/*

EXPOSE 8983
CMD ["/command.sh"]