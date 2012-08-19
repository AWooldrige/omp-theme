install: clean build
	rm -rf /var/www/onmyplate-co-uk/wp-content/themes/omp-dev
	cp -R ./ /var/www/onmyplate-co-uk/wp-content/themes/omp-dev
	chown -R www-data:www-data /var/www/onmyplate-co-uk/wp-content/themes/omp-dev

build:
	unzip bootstrap.zip

clean:
	rm -rf bootstrap/
