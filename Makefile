PACKAGE = omp-theme
VERSION = 0.1.0

ARCHIVE = $(PACKAGE)-$(VERSION)
BUILDDIR = ./BUILD/$(ARCHIVE)/
DESTDIR = /var/www/wp_ompcouk/wp-content/themes/

all: build

##############################################################################
# INSTALL TO DESTDIR AS IF FINAL PRODUCT - This may require sudo
##############################################################################
install:
	cp -R $(BUILDDIR) $(DESTDIR)
	chown -R www-data:www-data $(DESTDIR)$(ARCHIVE)

distclean:
	rm -rf $(DESTDIR)$(ARCHIVE)


##############################################################################
# INSTALL TO DESTDIR WITH -dev PREPENDED - This may require sudo
##############################################################################
devinstall:
	cp -R $(BUILDDIR) $(DESTDIR)$(ARCHIVE)-dev/
	chown -R www-data:www-data $(DESTDIR)$(ARCHIVE)-dev

devclean:
	rm -rf $(DESTDIR)$(ARCHIVE)-dev


##############################################################################
# BUILDING OF THE THEME
##############################################################################
# Build should build the theme into BUILD asif BUILD was the root of the theme
build: clean prep
	unzip bootstrap/bootstrap-2.2.1.zip -d $(BUILDDIR)
	cp src/*.php $(BUILDDIR)
	cp -R src/images $(BUILDDIR)
	cp -R jquery $(BUILDDIR)
	# Compile the LESS CSS and YUI Compress
	lessc ./src/style.less $(BUILDDIR)style.css.out --yui-compress
	# Append the metadata that WordPress expects to style.css
	cat ./src/wordpress.thememeta $(BUILDDIR)style.css.out > $(BUILDDIR)style.css
	rm $(BUILDDIR)style.css.out
	# Replace {{VERSION}} with the version of the build in all files
	find $(BUILDDIR) -type f | xargs perl -pi -e 's/{{VERSION}}/$(VERSION)/g'
	find $(BUILDDIR) -type f | xargs perl -pi -e 's/{{ARCHIVE}}/$(ARCHIVE)/g'

dist: build
	tar -cjf ./SOURCES/$(ARCHIVE).tar.bz2 -C ./BUILD/ .
	cd ./BUILD/ && zip -9 -r ../SOURCES/$(ARCHIVE).zip ${ARCHIVE} && cd -

clean:
	rm -rf BUILD SOURCES

prep:
	mkdir -p $(BUILDDIR) SOURCES


release: dist
	git tag -a v$(VERSION) -m"Tagging $(VERSION) release of omp-theme"
	git push --tags
