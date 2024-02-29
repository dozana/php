# Step 1 - Install PHP

  ## Install Homebrew
  /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"

  ## Install PHP
  brew install php
  php -v

  ## IF PHP is not excutable update it's path
  nano ~/.zshrc
  export PATH="/usr/local/opt/php/bin:$PATH"
  source ~/.zshrc
  php -v


# Step 2 - Install Composer

  ## Download Composer
  php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

  ## Composer installer
  php composer-setup.php

  ## Move Composer to a directory in your PATH
  sudo mv composer.phar /usr/local/bin/composer

  ## Verify the installation
  composer -v


# Step 3 -  Install PHPMailer:
Web:     https://packagist.org/packages/phpmailer/phpmailer
Command: composer require phpmailer/phpmailer


# Step 4 - Temp Mail

Mail: tmp.php.mail@gmail.com
Pass: Mail1234


# Step 5 - Mailtrap - auth using gmail
Web: https://mailtrap.io/home


# Step 6 - PHPMailer

https://github.com/phpmailer/phpmailer



# After changing something run command:
composer dump-autoload -o
