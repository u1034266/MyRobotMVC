initialize:
	@echo '==== initialize project ===='
	@curl -sS https://getcomposer.org/installer | php
	@mv composer.phar /usr/local/bin/composer
	@chmod +x /usr/local/bin/composer
	@composer require phpunit/phpunit --dev

reset_perms:
	@echo '==== Resetting file permissions ===='
	@chmod -R 777 *