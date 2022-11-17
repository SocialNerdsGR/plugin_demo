FROM php:8.1-fpm

# Get user id.
ARG UID=1000

# Setup FPM.
RUN \
  # PHP settings.
  sed -i -e"s/^user\s=\swww-data/user = serveruser/" /usr/local/etc/php-fpm.d/www.conf && \
  sed -i -e"s/^group\s=\swww-data/group = serveruser/" /usr/local/etc/php-fpm.d/www.conf && \
  sed -i -e"s/^;php_admin_value\[memory_limit\]\s=\s32M/php_admin_value[memory_limit] = 256M\nphp_admin_value[max_input_vars] = 5000/" /usr/local/etc/php-fpm.d/www.conf && \
  echo "\ncatch_workers_output = yes\nphp_admin_value[error_log] = /var/log/fpm-php.www.log\nphp_admin_flag[log_errors] = on\n" >> /usr/local/etc/php-fpm.d/www.conf && \
  touch /var/log/fpm-php.www.log && chmod 777 /var/log/fpm-php.www.log && \
  # User.
  useradd -ms /bin/bash serveruser -u $UID && \
  # Extras.
  apt-get update && apt-get install -y \
  git zlib1g-dev libzip-dev unzip && \
  docker-php-ext-install zip && \
  curl -sS https://getcomposer.org/installer | \
  php -- --install-dir=/usr/local/bin --filename=composer

USER serveruser

WORKDIR /home/serveruser/project/code
