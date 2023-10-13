# Makefile for Composer commands

.PHONY: install update require remove status

install:
	composer install

update:
	composer update

require:
	composer require $(package)

remove:
	composer remove $(package)

status:
	git status