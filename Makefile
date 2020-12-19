CONTAINER_IMAGE=docker.io/library/ruby:2.7-buster
HTML_PROOFER_OPTIONS=--disable-external --allow-hash-href
undefine BUNDLE_APP_CONFIG # let bundler use config from .bundle; in bash it would be 'unset BUNDLE_APP_CONFIG'

prepare:
	gem install bundler -v "~> 2.0"
	bundle install

build:
	bundle exec jekyll build
	bundle exec htmlproofer _site $(HTML_PROOFER_OPTIONS)

build_in_docker:
	docker pull $(CONTAINER_IMAGE)
	docker run \
		--workdir $(PWD) \
		-v $(PWD):$(PWD) \
		--rm=true \
		--entrypoint=/bin/sh \
		$(CONTAINER_IMAGE) -c 'make prepare && make build'

build_in_podman:
	podman pull $(CONTAINER_IMAGE)
	podman run \
		--workdir $(PWD) \
		-v $(PWD):$(PWD):Z \
		--rm=true \
		--entrypoint=/bin/sh \
		$(CONTAINER_IMAGE) -c 'make prepare && make build'
