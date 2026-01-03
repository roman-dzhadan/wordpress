FROM docker.io/library/wordpress:php8.5-apache

# Enable Apache SSL module
RUN a2enmod ssl

# Create SSL directory
RUN mkdir -p /etc/apache2/ssl

# Generate self-signed certificate
RUN openssl req -x509 -nodes -days 3650 \
    -newkey rsa:2048 \
    -keyout /etc/apache2/ssl/self.key \
    -out /etc/apache2/ssl/self.crt \
    -subj "/CN=localhost"

# Replace default SSL vhost
COPY apache-ssl.conf /etc/apache2/sites-available/default-ssl.conf

# Enable SSL site
RUN a2ensite default-ssl

# Expose HTTPS (internal use only)
EXPOSE 443
