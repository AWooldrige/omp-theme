PACKAGE = omp-theme
VERSION = 0.1.0
RELEASE = 1

ARCHIVE = $(PACKAGE)-$(VERSION)
BUILDDIR = ./BUILD/$(ARCHIVE)/
DESTDIR = /var/www/onmyplate-co-uk/wp-content/themes/

install: distclean build
	cp -R $(BUILDDIR) $(DESTDIR)
	chown -R www-data:www-data $(DESTDIR)$(ARCHIVE)

devinstall: build devclean
	cp -R $(BUILDDIR) $(DESTDIR)$(ARCHIVE)-dev/
	chown -R www-data:www-data $(DESTDIR)$(ARCHIVE)-dev

distclean:
	rm -rf $(DESTDIR)$(ARCHIVE)

devclean:
	rm -rf $(DESTDIR)$(ARCHIVE)-dev

# Build should build the theme into BUILD asif BUILD was the root of the theme
build: clean prep
	unzip bootstrap.zip -d $(BUILDDIR)
	cp src/*.php $(BUILDDIR)
	# Compile the LESS CSS and YUI Compress
	lessc ./src/style.less $(BUILDDIR)style.css.out --yui-compress --silent
	# Append the metadata that WordPress expects to style.css
	cat ./src/wordpress.thememeta $(BUILDDIR)style.css.out > $(BUILDDIR)style.css
	rm $(BUILDDIR)style.css.out
	# Replace {{VERSION}} with the version of the build in all files
	find $(BUILDDIR) -type f | xargs perl -pi -e 's/{{VERSION}}/$(VERSION)/g'

dist: build
	tar -zvcf ./SOURCES/$(ARCHIVE)-$(RELEASE).tar.gz -C ./BUILD/ .

clean:
	rm -rf BUILD SOURCES

prep:
	mkdir -p $(BUILDDIR) SOURCES
