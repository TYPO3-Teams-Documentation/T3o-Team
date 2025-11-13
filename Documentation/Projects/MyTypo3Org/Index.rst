.. include:: ../../Includes.rst.txt
.. highlight:: shell

.. _my-typo3-org-project:

============
my.typo3.org
============

.. contents:: On this page:
   :backlinks: top
   :class: compactlist
   :local:

The TYPO3 user account management platform for community members.

Repository Information
======================

**Repository URL**: *To be provided*

**Branch Strategy**: 
- Main branch: ``develop``
- Feature branches: ``feature/issue-number-description``

**Workflow**: Follow the standard :doc:`../../Workflow/Index`

**Access Requirements**
- Standard GitLab access
- TYPO3.org account required

Project Description
===================

my.typo3.org serves as the central user management platform providing:

**Core Features**
- User registration for new TYPO3.org users
- Profile management and editing
- Basic user data management (name, email, contact information)
- Community feature integration
- Account settings and preferences
- GitLab account synchronization

**User Data Management**
- First and last name
- Email address management
- Contact information
- Community profile settings
- Privacy preferences

**Target Audience**
- All TYPO3 community members
- New users registering for TYPO3.org
- Existing users managing their profiles
- Community administrators

Technical Details
=================

**TYPO3 Version**: 12.4 LTS
**PHP Version**: 8.1+
**Database**: MariaDB

**Key Extensions**
- ``t3olayout``: Common layout and styling
- ``filefill``: Asset loading from production
- Custom user management extensions
- LDAP integration for authentication

**Special Requirements**
- LDAP connectivity for user authentication
- Integration with GitLab for account synchronization

Local Development Setup
=======================

**DDEV Setup (Recommended)**

.. rst-class:: bignums

#. Clone the repository::

    git clone [repository-url-to-be-provided]
    cd my.typo3.org

#. Configure authentication::

    cp auth.json.example auth.json
    # Edit auth.json with your GitLab credentials

#. Start environment::

    ddev start
    ddev sync-database

#. Access the site:
   - Frontend: https://my.typo3.org.ddev.site
   - Backend: https://my.typo3.org.ddev.site/typo3/ (admin/password)

**Manual Setup**

Follow the :doc:`../../LocalEnvironment/Manual/Index` guide with these project-specific details:

- Database dump: URL will be provided later
- Filefill configuration: Will be provided later

Development Guidelines
======================

**User Management Development**
- Secure user data handling
- GDPR compliance for personal data
- User authentication and authorization
- Account verification processes

**Frontend Development**
- Build assets: ``ddev build-frontend`` (DDEV)
- User-friendly profile interfaces
- Responsive design for all devices
- Accessibility compliance

**Backend Development**
- User administration interfaces
- Data export and import functionality
- Account synchronization systems
- User activity logging

**Security Considerations**
- Personal data protection
- Secure authentication mechanisms
- Data encryption for sensitive information
- Privacy compliance (GDPR)

Common Development Tasks
========================

**User Profile Management**
- Profile creation and editing forms
- Data validation and sanitization
- Image upload and management
- Privacy settings configuration

**Account Administration**
- User account creation and verification
- Bulk user management operations
- Account status management
- User data export/import

**Integration Development**
- GitLab account synchronization
- LDAP authentication integration
- Third-party service connections
- API development for external access

Special Considerations
======================

**Data Protection (GDPR)**
- Personal data handling compliance
- User consent management
- Data retention policies
- Right to be forgotten implementation

**Security & Privacy**
- Secure password handling
- Two-factor authentication support
- Account lockout mechanisms
- Privacy-by-design principles

**Performance**
- Efficient user data queries
- Caching for user profiles
- Optimized authentication processes
- Database indexing for user searches

**Integration Requirements**
- LDAP server connectivity
- GitLab API integration
- Email service integration
- External authentication providers

Known Issues & Solutions
========================

**Common Problems**
- LDAP connection issues → Check LDAP server configuration
- GitLab sync failures → Verify API credentials and permissions
- Email delivery problems → Check email service configuration
- Authentication loops → Clear cookies and check session handling

**Development Specific**
- User data privacy → Implement proper data handling procedures
- Database synchronization → Follow user data protection guidelines
- Local LDAP testing → Use development LDAP server or mock services

Getting Help
============

**Project Support**
- Repository issues: Use project issue tracker (when available)
- User management questions: TYPO3 Slack #typo3-org
- LDAP/Authentication: Contact system administrators

**Technical Resources**
- TYPO3 documentation: https://docs.typo3.org/
- GDPR compliance: https://gdpr.eu/
- LDAP integration: TYPO3 LDAP extension documentation

**Contacts**
- Project maintainers: To be identified
- System administrators: For LDAP and infrastructure questions

Development Status
==================

.. note::
   This project is in setup phase. Repository URL, database dump location, and 
   filefill configuration will be provided once available.

**What's Available**
- Project concept and requirements
- Technical specifications
- Development guidelines
- Integration requirements

**Coming Soon**
- Repository access
- Database dumps
- LDAP configuration details
- Development examples

Community Features
==================

**Planned Features**
- Community member directory
- Group and team management
- Event participation tracking
- Contribution history display
- Community badges and achievements

**Integration Points**
- TYPO3.org main site integration
- Extension repository user linking
- Voting platform authentication
- Community forum connections

Next Steps
==========

- **Repository Access**: Wait for repository URL to be provided
- **Setup Environment**: :doc:`../../LocalEnvironment/Index` (when available)
- **Understand Workflow**: :doc:`../../Workflow/Index`
- **Privacy Training**: Familiarize with GDPR requirements
- **Other Projects**: :doc:`../Index` (work on available projects)