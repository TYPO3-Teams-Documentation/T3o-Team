.. include:: ../Includes.rst.txt
.. highlight:: shell

.. _local-environment:

=================
Local environment
=================

.. contents:: On this page:
   :backlinks: top
   :class: compactlist
   :local:

This section covers setting up a local development environment for TYPO3.org projects.

Setup options
=============

Choose your preferred setup method:

**DDEV (Recommended)**
  Docker-based development environment with automated setup and database synchronization.
  
**Manual Setup**
  Traditional setup for custom environments or when DDEV is not available.

.. toctree::
   :titlesonly:

   Ddev/Index
   Manual/Index

Overview
========

Both setup methods provide complete local development environments for TYPO3.org projects with the following shared components:

**GitLab Authentication**
  All setups require proper GitLab credentials in an ``auth.json`` file containing:
  
  - Basic authentication (username/password) for Git operations
  - API access (username/token) for database synchronization and CI/CD artifacts
  
**Filefill Extension (by Nicole Cordes)**
  Automatically loads missing assets on-demand from production servers:
  
  - No need to download complete fileadmin directories
  - Assets are fetched when first requested
  - Subsequent requests serve cached local files

**Database Synchronization**
  Access to current database dumps via GitLab CI/CD artifacts:
  
  - Pre-filled databases with real content and configuration
  - Regular updates from production environments
  - Automated import (DDEV) or manual download (Manual setup)

**Frontend Asset Building**
  CSS and JavaScript compilation for development:
  
  - Node.js 14 required for asset compilation
  - Source files located in ``vendor/t3o/t3olayout/Build/``
  - Automated building (DDEV) or manual npm commands (Manual setup)

Next steps
==========

- **New to DDEV?** → :doc:`Ddev/Index`
- **Prefer manual setup?** → :doc:`Manual/Index`
- **Need project-specific info?** → :doc:`../Projects/Index`
- **Having issues?** → :doc:`../FAQ/Index`