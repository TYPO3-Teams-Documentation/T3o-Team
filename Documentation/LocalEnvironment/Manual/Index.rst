.. include:: ../../Includes.rst.txt
.. highlight:: shell

.. _manual-setup-guide:

============
Manual Setup
============

.. contents:: On this page:
   :backlinks: top
   :class: compactlist
   :local:

This guide covers setting up a local development environment without DDEV for TYPO3.org projects.

Prerequisites
=============

**Web Server Requirements**

- PHP 8.1 or higher
- MariaDB or MySQL database
- Web server (Apache/Nginx)
- Node.js 18 LTS or higher (for frontend asset building)
- All TYPO3 12.4 LTS requirements

**Optional for TER Project**

- Solr Server 6.6 (for extensions.typo3.org search functionality)

**Access Requirements**

- GitLab account corresponding to your TYPO3.org username
- For TER project: Signed NDA required due to GDPR compliance

Installation
============

Clone Repository
----------------

.. rst-class:: bignums

#. Clone your desired project repository::

    # For typo3.org
    git clone https://git.typo3.org/services/t3o-sites/typo3.org/typo3.org.git
    cd typo3.org

#. Create a virtual host pointing to the ``html`` subdirectory

#. Copy the authentication template::

    cp auth.json.example auth.json

#. Edit ``auth.json`` and add your GitLab credentials:

   ..  literalinclude:: ../_codesnippets/auth.json
       :caption: auth.json
       :language: json

   **Required fields:**

   - ``http-basic``: Basic authentication for Git operations
   - ``gitlab-api``: API access for database synchronization and CI/CD artifacts
   - ``project-id``: Project ID for database dumps (133 = typo3.org, 134 = extensions.typo3.org)

Database Setup
--------------

.. rst-class:: bignums

#. Create a local database for your project

#. Download the database dump from GitLab::

    # For typo3.org
    curl -H "PRIVATE-TOKEN: your-gitlab-token" \
         "https://git.typo3.org/api/v4/projects/133/jobs/artifacts/develop/download?job=Get%20dump%20for%20local%20environment" \
         -o database.zip

#. Extract and import the database::

    unzip database.zip
    mysql -u your-user -p your-database < DB.sql

**Database URLs for Projects:**

- typo3.org: ``https://git.typo3.org/api/v4/projects/133/jobs/artifacts/develop/download?job=Get%20dump%20for%20local%20environment``
- Other projects: URLs will be provided later

TYPO3 Configuration
===================

Additional Configuration
------------------------

Create ``config/system/additional.php``:

..  literalinclude:: ../_codesnippets/additional.php
    :caption: config/system/additional.php
    :language: php


Filefill Configuration
======================

Add filefill configuration to your ``additional.php``:

..  literalinclude:: ../_codesnippets/filefill.php
    :caption: Filefill configuration (add to additional.php)
    :language: php

This configuration allows the filefill extension to load assets from production servers when they're not available locally.

**Project-specific configurations:**

- typo3.org: Configuration shown above
- Other projects: Configurations will be provided later

Composer Setup
==============

.. rst-class:: bignums

#. Install PHP dependencies::

    composer install

Frontend Assets
===============

CSS and JavaScript Setup
-------------------------

.. rst-class:: bignums

#. Verify Node.js version (must be Node.js 18 LTS or higher)::

    node --version

#. Install npm dependencies::

    npm install --prefix=vendor/t3o/t3olayout/Build/

#. Build assets::

    npm run build --prefix=vendor/t3o/t3olayout/Build/

.. note::
   If you prefer not to build assets locally, the latest compiled files are included in the database dump download.

Backend Access
==============

Creating a Backend User
------------------------

Create a backend administrator user using the TYPO3 CLI command:

.. rst-class:: bignums

#. Run the backend user creation command::

    php vendor/bin/typo3 backend:createadmin

#. Follow the interactive prompts to set:

   - Username (e.g., ``admin``)
   - Password (choose a secure password)
   - Email address

#. Login to the backend at ``https://your-local-site.local/typo3/`` with your created credentials

Database Import Details
=======================

The database import includes:

- Complete page tree and content
- Backend user: ``admin`` / ``password``
- All necessary TYPO3 configuration
- Extension settings

File Assets
===========

Thanks to the filefill extension by Nicole Cordes, you don't need to download the complete fileadmin directory. Assets are loaded on-demand from production servers.

**How it works:**

- When a file is requested that doesn't exist locally
- Filefill checks the configured domains
- Downloads the file from production
- Serves it locally for future requests

Solr Setup (TER Only)
=====================

For extensions.typo3.org, you need a Solr server:

.. rst-class:: bignums

#. Install Solr 6.6 locally

#. Configure Solr connection in TYPO3 backend

#. Index the extension data

.. note::
   Detailed Solr configuration will be provided later.

Troubleshooting
===============

Common Issues
-------------

**Composer authentication fails**
  Check your ``auth.json`` file and GitLab token permissions.

**Database import fails**
  Verify your database credentials and ensure the database exists.

**Files not loading**
  Check filefill configuration and internet connectivity to production servers.

**Cannot create backend user**
  Use the TYPO3 CLI command: ``php vendor/bin/typo3 backend:createadmin``

**Permission errors**
  Set proper file permissions for web server user::

    chown -R www-data:www-data html/
    chmod -R 755 html/

Getting Help
============

- Check the :doc:`../../FAQ/Index` for more solutions
- Ask in TYPO3 Slack #typo3-org channel
- Review TYPO3 documentation: https://docs.typo3.org/