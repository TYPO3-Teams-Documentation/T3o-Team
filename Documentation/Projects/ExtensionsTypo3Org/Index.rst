.. include:: ../../Includes.rst.txt
.. highlight:: shell

.. _extensions-typo3-org-project:

====================
extensions.typo3.org
====================

.. contents:: On this page:
   :backlinks: top
   :class: compactlist
   :local:

The TYPO3 Extension Repository (TER) - the central hub for TYPO3 extensions.

Repository Information
======================

**Repository URL**: https://git.typo3.org/services/t3o-sites/extensions.typo3.org/ter

**Branch Strategy**:

- Main branch: ``develop``
- Feature branches: ``feature/issue-number-description``

**Workflow**: Follow the standard :doc:`../../Workflow/Index`

**⚠️ Special Access Requirements**

- **Signed NDA required** due to GDPR compliance (user data protection)
- Standard GitLab access not sufficient
- Contact project maintainers for NDA process

Project Description
===================

The TYPO3 Extension Repository provides:

**Core Features**

- Extension registration and management
- Extension key management (register, transfer, remove)
- Extension uploads and version management
- Extension browsing and search functionality
- Extension documentation integration
- User ratings and reviews
- Download statistics and analytics

**Target Audience**

- Extension developers
- TYPO3 integrators searching for extensions
- Community members exploring available extensions
- Extension maintainers managing their extensions

Technical Details
=================

**TYPO3 Version**: 12.4 LTS
**PHP Version**: 8.1+
**Database**: MariaDB

**Key Extensions**

- ``t3olayout``: Common layout and styling
- ``filefill``: Asset loading from production
- ``solr``: Search functionality (**required**)
- ``ter``: Extension repository functionality

**⚠️ Solr Requirement**
This project requires Apache Solr for search functionality. Additional configuration is needed beyond the standard setup.

Local Development Setup
=======================

**DDEV Setup (Recommended)**

.. rst-class:: bignums

#. **Access Check**: Ensure you have signed the NDA and have been granted access

#. Clone the repository::

    git clone https://git.typo3.org/services/t3o-sites/extensions.typo3.org/ter.git
    cd ter

#. Configure authentication::

    cp auth.json.example auth.json
    # Edit auth.json with your GitLab credentials

#. Start environment::

    ddev start
    ddev sync-database

#. **Solr Setup**: The built-in Solr server starts automatically
   - Solr Admin: https://extensions.typo3.org.ddev.site:8983
   - No additional configuration needed for basic development

#. Access the site:
   - Frontend: https://extensions.typo3.org.ddev.site
   - Backend: https://extensions.typo3.org.ddev.site/typo3/ (admin/password)

**Manual Setup**

Follow the :doc:`../../LocalEnvironment/Manual/Index` guide with these additional requirements:

**Solr Server Setup**

- Install Apache Solr 6.6 locally
- Configure Solr cores for extension indexing
- Set up Solr connection in TYPO3 backend

**Database and Configuration**

- Database dump: URL will be provided later
- Filefill configuration: Will be provided later

Solr Configuration
==================

**DDEV Environment**

- Solr runs automatically in Docker container
- Pre-configured for development use
- Access admin interface at port 8983

**Manual Environment**

- Install Solr 6.6 manually
- Configure cores for:

  - Extension metadata indexing
  - Extension documentation indexing
  - Extension code search (if applicable)

**Solr Features**

- Full-text search in extensions
- Faceted search by categories, TYPO3 version, etc.
- Search suggestions and autocomplete
- Advanced search filters

Development Guidelines
======================

**Extension Data Management**

- Extensions are imported from external sources
- Local changes may be overwritten during imports
- Focus on frontend/backend functionality rather than data

**Frontend Development**

- Build assets: ``ddev build-frontend`` (DDEV)
- Special attention to search interface
- Responsive design for mobile browsing
- Performance optimization for large datasets

**Search Functionality**

- Test search with various queries
- Verify faceted search filters
- Check search result relevance
- Test autocomplete functionality

**Backend Development**

- Extension management interfaces
- User management for extension developers
- Analytics and reporting features
- Import/export functionality

Common Development Tasks
========================

**Working with Extensions**

- Extension data is imported, not manually created
- Focus on display and search functionality
- Test with various extension types and sizes

**Search Development**

- Modify search templates and logic
- Update Solr configuration if needed
- Test search performance with large datasets
- Implement new search features

**User Management**

- Extension developer accounts
- Permission management
- User registration and verification

Special Considerations
======================

**Data Protection (GDPR)**

- User data handling requires special care
- Privacy policy compliance
- Data retention policies
- User consent management

**Performance**

- Large dataset handling
- Search performance optimization
- Caching strategies for extension data
- Database query optimization

**Security**

- User authentication and authorization
- Extension upload security
- Input validation and sanitization
- Rate limiting for API endpoints

**Import Processes**

- Extension data imports from external sources
- Automated synchronization processes
- Data validation and cleanup
- Error handling for import failures

Known Issues & Solutions
========================

**Common Problems**

- Solr connection issues → Check Solr server status and configuration
- Search not working → Verify Solr indexing and core configuration
- Import failures → Check data sources and import scripts
- Performance issues → Optimize database queries and caching

**Development Specific**

- Large dataset handling → Use pagination and lazy loading
- Search relevance → Tune Solr configuration and boost factors
- Memory issues → Increase PHP memory limit for large operations

Getting Help
============

**⚠️ Access Issues**

- Contact project maintainers for NDA process
- Ensure your GitLab account matches TYPO3.org username

**Technical Support**

- Project-specific issues: Repository issue tracker
- Solr questions: TYPO3 Slack #typo3-solr
- General questions: TYPO3 Slack #t3o-ter-team

**Resources**

- TYPO3 Solr documentation: https://docs.typo3.org/c/typo3/cms-solr/
- Apache Solr documentation: https://solr.apache.org/guide/
- Extension development: https://docs.typo3.org/m/typo3/reference-coreapi/

Next Steps
==========

- **Get NDA Access**: Contact maintainers for required documentation
- **Setup Environment**: :doc:`../../LocalEnvironment/Index`
- **Understand Workflow**: :doc:`../../Workflow/Index`
- **Learn Solr**: Familiarize yourself with Solr administration
- **Explore Projects**: :doc:`../Index`