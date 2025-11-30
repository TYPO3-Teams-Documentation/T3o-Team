.. include:: ../Includes.rst.txt
.. highlight:: shell

.. _t3o-faq:

===
FAQ
===

.. contents:: On this page:
   :backlinks: top
   :class: compactlist
   :local:

Frequently Asked Questions and troubleshooting guide for TYPO3.org development.

Getting Started
===============

**Q: How do I get access to the TYPO3.org repositories?**

A: You need a TYPO3.org account that corresponds to your GitLab username. Manage your account at `my.typo3.org <https://my.typo3.org/>`_. If you can't access GitLab, log in to https://typo3.org/ once to sync your account with LDAP.

**Q: Do I need special permissions for all projects?**

A: No, most projects only require standard GitLab access. However, **extensions.typo3.org (TER) requires a signed NDA** due to GDPR compliance (user data protection).

**Q: Which branch should I work on?**

A: For all projects, work in feature branches created from:

- ``develop`` branch for website projects
- ``master`` branch for extensions

**Q: How do I contact the T3O team?**

A: Contact Thomas Löffler (@spoonerweb) in TYPO3 Slack or use the #t3o-team channel.

DDEV Environment
================

**Q: DDEV start fails with npm processes error**

A: Remove the ``node_modules`` folder and clear npm cache::

    rm -rf vendor/t3o/t3olayout/Build/node_modules
    ddev exec npm cache clear --force

**Q: How do I update my local database?**

A: Use the sync command, but be careful as it replaces your entire database::

    ddev sync-database

.. warning::
   This command will **replace** your existing database with the latest dump. Any local changes will be lost.

**Q: Can I access the backend after database sync?**

A: Yes, a backend user is automatically created:

- Username: ``admin``
- Password: ``password``

**Q: How do I compile frontend assets?**

A: Use the build command::

    ddev build-frontend

**Q: Where can I access Mailpit for testing emails?**

A: Mailpit is available at: https://[your-project].ddev.site:8026

Authentication & Access
=======================

**Q: Why can't I login with my LDAP user in the frontend?**

A: LDAP login is disabled in local development due to data protection issues. Create a local frontend user instead through the backend.

**Q: My GitLab authentication fails**

A: Check your ``auth.json`` file configuration:

1. Ensure the file exists (copy from ``auth.json.example``)
2. Verify both ``http-basic`` and ``gitlab-api`` sections are configured
3. Check that username/password and username/token match your GitLab account
4. Verify the personal access token is not expired

**Q: What's the difference between http-basic and gitlab-api in auth.json?**

A: Both sections serve different purposes:

- ``http-basic``: Username/password for basic Git operations (clone, pull, push)
- ``gitlab-api``: Username/token for API access (database downloads, CI/CD artifacts)

**Q: How do I get a GitLab token?**

A: Go to GitLab → User Settings → Access Tokens → Create a token with ``read_repository`` and ``read_api`` permissions.

Database & Content
==================

**Q: Where do I get the database dump?**

A: Database dumps are available via GitLab CI/CD artifacts:

- **typo3.org**: ``https://git.typo3.org/api/v4/projects/133/jobs/artifacts/develop/download?job=Get%20dump%20for%20local%20environment``
- **Other projects**: URLs will be provided later

**Q: Why are images not loading?**

A: This is normal. The filefill extension loads assets on-demand from production servers. Images will appear when requested. Check your filefill configuration if images consistently fail to load.

**Q: How does filefill work?**

A: When a file is requested that doesn't exist locally, filefill:

1. Checks configured production domains
2. Downloads the file from production
3. Serves it locally for future requests

**Q: My local changes to content are lost after database sync**

A: This is expected behavior. The ``ddev sync-database`` command replaces your entire database with the production dump. Make content changes in the backend after sync, or work on template/code changes instead.

Extensions & Development
========================

**Q: How do I install additional extensions?**

A: Use Composer::

    composer require typo3/cms-extension-name

**Q: Where are the frontend templates?**

A: Templates are in the ``t3olayout`` extension:

- t3olayout extension: ``vendor/t3o/t3olayout/``
- Project-specific extensions: ``extensions/`` directory
- Vendor extensions: ``vendor/`` directory

**Q: How do I debug TYPO3 issues?**

A: Enable debug mode in your ``additional.php``::

    'SYS' => [
        'displayErrors' => 1,
        'devIPmask' => '*',
        'exceptionalErrors' => E_ALL,
    ],

**Q: Frontend assets are not building**

A: Try these steps:

1. Check Node.js version: ``ddev exec node --version`` (should be 18.x or higher) or ``node --version`` for manual setup
2. Clear npm cache: ``ddev exec npm cache clear --force``
3. Remove node_modules: ``rm -rf vendor/t3o/t3olayout/Build/node_modules``
4. Rebuild: ``ddev build-frontend``

**Q: Wrong Node.js version error**

A: Frontend assets require Node.js 18 LTS or higher:

- **DDEV**: Node.js 18 is included automatically
- **Manual setup**: Install Node.js 18 LTS from https://nodejs.org/

Project-Specific Issues
=======================

**Q: Solr is not working for extensions.typo3.org**

A: For DDEV environments:

1. Solr should start automatically
2. Check Solr admin at port 8983
3. Verify Solr core configuration in TYPO3 backend

**Q: How do I access the TER (extensions.typo3.org) project?**

A: You need:

1. Standard GitLab access
2. **Signed NDA** due to GDPR compliance
3. Contact project maintainers for the NDA process

**Q: What if I need help with a specific project?**

A: Each project has its own documentation:

- :doc:`../Projects/Typo3Org/Index`
- :doc:`../Projects/ExtensionsTypo3Org/Index`
- :doc:`../Projects/VotingTypo3Org/Index`
- :doc:`../Projects/MyTypo3Org/Index`

Performance & Optimization
===========================

**Q: My local environment is slow**

A: Try these optimizations:

1. Allocate more memory to Docker
2. Use Docker Desktop's filesystem optimization
3. Disable unnecessary services
4. Check database query performance

**Q: How do I optimize images?**

A: Use appropriate formats:

- WebP for modern browsers
- Optimize file sizes before upload
- Use responsive images when possible

**Q: Database operations are slow**

A: Check:

1. Database indexes
2. Query optimization
3. Available memory
4. Disk space

Common Error Messages
=====================

**Q: "Could not connect to database"**

A: Check your database configuration in ``additional.php``:

- Verify hostname, username, password
- Ensure database exists
- Check database server is running

**Q: "Trusted hosts pattern mismatch"**

A: Add this to your ``additional.php``::

    'SYS' => [
        'trustedHostsPattern' => '.*',
    ],

**Q: "Extension not found"**

A: Run::

    composer install

**Q: "Permission denied" errors**

A: Check file permissions::

    # For DDEV
    ddev exec chown -R www-data:www-data /var/www/html/

    # For manual setup
    chown -R www-data:www-data html/

Development Workflow
====================

**Q: How do I create a merge request?**

A: Follow the :doc:`../Workflow/Index`:

1. Create issue or find existing one
2. Create branch from GitLab interface
3. Work locally on the branch
4. Push changes and create merge request

**Q: What coding standards should I follow?**

A: Follow TYPO3 Core coding standards:

- PSR-12 for PHP
- TYPO3 CGL (Coding Guidelines)
- Use meaningful commit messages
- Write tests for new functionality

**Q: How do I test my changes?**

A: Test locally:

1. Verify functionality works
2. Check responsive design
3. Test in different browsers
4. Ensure no PHP errors or warnings

Still Need Help?
================

**Resources**

- TYPO3 Slack: #t3o-team or #t3o-ter-team channel
- TYPO3 Documentation: https://docs.typo3.org/
- DDEV Documentation: https://ddev.readthedocs.io/

**Contacts**

- Thomas Löffler (@spoonerweb): General T3O questions
- Project maintainers: Check individual project repositories
- Community: TYPO3 Slack channels

**Reporting Issues**

- Use project-specific issue trackers
- Provide detailed error messages
- Include steps to reproduce
- Mention your environment (DDEV/manual, OS, etc.)
