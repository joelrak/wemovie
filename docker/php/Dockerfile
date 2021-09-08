FROM php:8.0.10-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y unzip nodejs npm

RUN npm install -g yarn \
    yarn add bootstrap --dev

RUN npm install sass-loader@^9.0.1 node-sass --save-dev \
    npm i jquery --save

# Install PHP extensions
#RUN docker-php-ext-install pdo_mysql

# Set timezone
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/Europe/Paris /etc/localtime
RUN "date"

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www