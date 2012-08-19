install:
	rm -rf /var/www/onmyplate-co-uk/wp-content/themes/omp-dev
	cp -R ./ /var/www/onmyplate-co-uk/wp-content/themes/omp-dev
	chown -R www-data:www-data /var/www/onmyplate-co-uk/wp-content/themes/omp-dev
