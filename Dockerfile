# Use version of Ruby from Github pages: https://pages.github.com/versions/
FROM ruby:2.7-alpine

WORKDIR /srv/jekyll

RUN apk update && apk add --no-cache build-base gcc cmake git bash

# Use version of Bundler from Github pages: https://pages.github.com/versions/
RUN gem install --user-install bundler -v "2.3.10"