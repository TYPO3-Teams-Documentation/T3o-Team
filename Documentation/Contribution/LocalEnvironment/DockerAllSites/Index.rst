.. include:: ../../../Includes.txt
.. highlight:: shell

============================================
Installation of all t3o websites with Docker
============================================


.. contents:: On this page:
    :local:
    :class: compactlist

    :backlinks: top


Installation
============

Mac OS X
--------

#. Download at `Docker for Mac <https://docs.docker.com/docker-for-mac/install/>`__
#. Install it
#. Ready for the container


Requirements for working on t3o on local Docker
-----------------------------------------------

- Running docker
- For SSL connection and DNS you need a `nginx proxy <https://github.com/torvitas/docker-nginx-proxy-configuration>`__
- Use the main docker environment on `t3o GitLab <https://git-t3o.typo3.org/t3o/ter-docker-minimal>`__
- An existing account on GitLab with access to the t3o project
- Make sure that the composer home directory is `~/.composer/` by `export COMPOSER_HOME="~/.composer/"`



Step by step installation for Docker
------------------------------------

#. Go to your local folder where you want to setup, e.g. ~/Docker/
#. Clone the nginx proxy with `git clone https://github.com/torvitas/docker-nginx-proxy-configuration.git nginx-proxy`.
#. To run the nginx proxy, see :ref:`_Nginx-Proxy`.
#. Clone the docker environment with `git clone https://[your typo3.org username]@git-t3o.typo3.org/t3o/ter-docker-minimal.git main-t3o`
#. `cd main-t3o`
#. Get the current development status with `make submodules-develop`
#. `make init up` sets up the docker container and the TYPO3 instances (thx `@helhum <https://helhum.io>`__ for TYPO3 console)
#. Now the basic installation is set up and running.


Important make commands
-----------------------

make up
    Starts all docker containers or recreates them after changes in docker-compose.yml

make stop
    Stops all docker containers

make down
    Destroys all DB data by removing the containers

make clear-cache-[t3o|ter]
    Clears the cache by using TYPO3 console

make update-system-[t3o|ter]
    Runs the commands `composer install`, `install:generatepackagestates 0 1`, `database:updateschema` and `cache:clear --force`

Tips
====

- Look into the `Makefile` in docker root directory for many useful commands to do.
- You can run `composer` directly on your machine but there can be issues. If possible use `composer` directly in the docker container


Questions
=========

Which branches do you use for what?
    The docker repository should always use the `master` branch. T3O and TER use `develop` branch for main development. More to see in the :ref:`Gitlab-Workflow`.

How to update the system after pulling new changes?
    You can use the commands `make update-system-t3o` respectively `make update-system-ter` to do composer install, generate package states file, update database and clear caches.


