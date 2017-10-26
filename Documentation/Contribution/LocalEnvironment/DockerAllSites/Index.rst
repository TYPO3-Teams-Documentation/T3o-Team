.. include:: ../../../Includes.txt
.. highlight:: shell

================================================
How to install all the T3O websites using Docker
================================================


.. contents:: On this page:
   :backlinks: top
   :class: compactlist
   :local:


Installation
============

Mac OS X
--------

.. rst-class:: bignums

#. Download `Docker for Mac <https://docs.docker.com/docker-for-mac/install/>`__

#. Run the installer


Requirements to join T3O development using Docker
-------------------------------------------------

-  Make sure Docker is working.

-  Provide an SSL connection and a DNS. Use the `nginx proxy
   <https://github.com/torvitas/docker-nginx-proxy-configuration>`__
   to achieve this.

-  Use the **main docker environment** (named "ter-docker-minimal") of
   `T3O GitLab <https://git-t3o.typo3.org/t3o/ter-docker-minimal>`__.

-  Log in to `GitLab <https://git-t3o.typo3.org/users/sign_in>`__ with your
   `TYPO3 credentials <https://typo3.org/>`__.

-  Make sure you have access the the T3O repositories at Gitlab. Ask a project
   administrator for admission.

-  Set :file:`~/.composer/` as Composer home directory. Set the environment
   variable to do so: `export COMPOSER_HOME="~/.composer/"`.


.. _Docker-Basic-Installation:

Step by step: Basic Installation using Docker
---------------------------------------------

.. rst-class:: bignums

#. Go to a local folder where you want to setup things, for example
   :file:`~/Docker/`.

#. Clone the :ref:`Nginx-Proxy`::

      git clone https://github.com/torvitas/docker-nginx-proxy-configuration.git nginx-proxy

#. Start the :ref:`Nginx-Proxy`.

#. Clone the docker environment::

      git clone https://[your typo3.org username]@git-t3o.typo3.org/t3o/ter-docker-minimal.git main-t3o

#. Change directory::

      cd main-t3o

#. Catch up with the current development status::

      make submodules-develop

#. Set up the docker container and the TYPO3 instances::

      `make init up`

   (thx `@helhum <https://helhum.io>`__ for TYPO3 console)


At this point the **basic installation** should be up up and running.


Important `make` commands
-------------------------

make up
   Starts all docker containers or recreates them after changes in
   :file:`docker-compose.yml`

make stop
   Stops all docker containers

make down
   Destroys all DB data by removing the containers

make clear-cache-[t3o|ter]
   Clears the cache by using TYPO3 console

make update-system-[t3o|ter]
   Runs the commands `composer install`, `install:generatepackagestates 0 1`,
   `database:updateschema` and `cache:clear --force`



Tips
====

-  Study :file:`Makefile` in the root directory to learn about many useful
   commands.

-  You *can* run `composer` directly on your machine - but that may be an issue.
   Instead, run `composer` directly in the Docker container.


Questions
=========

Which branches are used for what?
   The docker repository should always use the `master` branch. T3O and TER use
   `develop` branch for main development. Check :ref:`Gitlab-Workflow` for
   more information.

How do I update the system after pulling new changes?
   You can use the commands `make update-system-t3o` and
   `make update-system-ter` to do composer install, generate package states
   file, update database and clear caches.

