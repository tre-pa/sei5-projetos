FROM alpine-3.21

WORKDIR /opt/app

RUN apk add -f --no-cache \ 
  libreoffice \ 
  openjdk17-jdk \
  font-terminus \
  font-inconsolata \
  font-dejavu \
  font-noto \
  font-noto-cjk \
  font-awesome \
  font-noto-extra

COPY ./jod-converter/jodconverter-4.4.8.jar .

COPY ./jod-converter/application.yaml .

ENTRYPOINT ["java", "-Xmx2G", "-jar", "jodconverter-4.4.8.jar"]
