FROM nginx:stable-alpine

# Konfiguracja serwera HTTP
COPY docker/nginx/default.conf \
    /etc/nginx/conf.d/default.conf

# Publiczne pliki aplikacji
COPY public/ /app/public/

EXPOSE 80
