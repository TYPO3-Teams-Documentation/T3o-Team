.. include:: ../../../Includes.txt
.. highlight:: shell

=====================================
Setup ddev environment (docker based)
=====================================

.. contents:: On this page:
   :backlinks: top
   :class: compactlist
   :local:


Local installation of one of the typo3.org sites
================================================

Requirements
------------

All you need is composer, ddev and Docker installed.

Repositories
------------
You can find all needed Repositories at our `Gitlab server
<https://git-t3o.typo3.org/>`__.

To gain access to these repos you need to have a typo3.org account. If you are
not able to login to Gitlab, the reason for this might be, that your Username
is not present in our new LDAP environment. To solve this go to
https://typo3.org/ and log in there once.

You will find a repository for each project (typo3.org, extensions.typo3.org,
my.typo3.org). As these repositories share the same template extension (t3olayout)
you will also find this one and all the others. The extensions will be loaded via
composer. Issues (tickets) can be found in this repositories and you will need
to send pull requests to them directly.

In this example we will guide you through the process of setting up an
installation for typo3.org.

We provide the needed assets for this project (fileadmin and database).
You can download these assets in the pipeline of Gitlab
(link will be provided below) - so you dont have to take care of contents and
stuff at all. This ensures that you will have an installation with the
latest content up and running. The only thing is that you need to have a
backend-user. If this isn't the case on stage.typo3.org or typo3.org you need to
create one using the installtool.

Installation
------------

Preparation
~~~~~~~~~~~

.. rst-class:: bignums

#. Install Docker - `find it here <https://www.docker.com/community-edition#/download>`_

#. Install ddev - `find it here <https://ddev.readthedocs.io/en/latest/#installation>`_

#. Install composer - `find it here <https://getcomposer.org/download/>`_


Clone and prepare files
-----------------------

.. rst-class:: bignums

#. Clone your repository (in case for typo3.org -
   `find it here <https://git-t3o.typo3.org/t3o/typo3.org>`_)

#. cd `path/to/your/repository/`

#. Copy the ./auth.json.example to ./auth.json

#. Edit the ./auth.json file and add your gitlab (git-t3o.typo3.org) account

#. `ddev start`

#. Download and extract the ZIP file with assets and DB dump, see `Download and install assets`_

#. Use `ddev import-db` and follow the wizard to import the SQL file into the database

#. Move the fileadmin data from the assets download into your fileadmin folder

#. Browse to `the frontend <https://typo3.org.ddev.local/>`_ or `the backend <https://typo3.org.ddev.local/typo3/>`_


Download and install assets
---------------------------

Download the `database dump and assets (for e.g. typo3.org website) <https://git-t3o.typo3.org/t3o/typo3.org/builds/artifacts/assets/download?job=dump-assets>`_ from GitLab.
If you need the assets from TER, look to :ref:`ter-assets`.
You need a typo3.org account to access this file.


Build CSS and JS
----------------

The CSS and JS are built on every start of ddev. If you need to update them, just run `ddev start`.
If you work on CSS and JS, you are able to use the built-in `npm` in the docker container by

.. rst-class:: bignums

#. Run `ddev ssh`

#. Change directory to `typo3conf/ext/t3olayout/Build/`

#. Run `npm watch`

#. Change CSS and JS, the changes are generated live


Get TYPO3 up and running
------------------------

As there are no backend users in the dump, you need to setup a local admin account.

.. rst-class:: bignums

#. `ddev ssh`

#. `../bin/typo3cms backend:createadmin` and set your username and password in the prompt.


Use built-in Solr server
------------------------

If you want to use the Solr server (important for TER) you need to setup the built-in Solr docker container.
You can access the Solr admin panel: `<typo3.org.ddev.local:8983>`_

.. rst-class:: bignums

#. Clone the Solr core repository into the core directory used by the docker container by `git clone https://git-t3o.typo3.org/t3o/solr-core.git .ddev/solr/mycores/t3o`

#. Restart ddev containers to setup the core in Solr server: `ddev restart`

#. Add this line into the TypoScript root template: `plugin.tx_solr.solr.host = solr`

#. Initialize the Solr connection in the caching menu in the top bar

#. Move to the Solr `Info` backend module to check if the Solr connection is working


Troubleshooting
---------------

The command `ddev start` fails due to npm processes. What can I do?
   You need to remove the folder `node_modules` located in `html/typo3conf/ext/t3olayout/Build/` and clear the npm caches on
   the machine with `ddev exec npm cache clear --force`. After that, `ddev start` should work again.

I can't login in the frontend with my LDAP user.
   First, you need to be sure that the current domain is set correctly in the domain record on your home page.
   On the root page (PID 0) there is a configuration record for the LDAP connection. There you need to set your local host url,
   e.g. `typo3.org.ddev.local`. After setting the correct domain the LDAP frontend login should work with your typo3.org user.

