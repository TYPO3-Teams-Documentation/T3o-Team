
.. include:: ../../Includes.txt
.. highlight:: shell

====
LDAP
====


Group Specification
===================

In LDAP it’s possible to set n attributes named isMemberOf for each user.
This attribute will be used to set users in different groups.

General syntax:

`<domain>.<type>.<name>.<role>`

Examples:

* typo3.org.team.certification.leader (Leader of Certification Team)
* typo3.com.partner.agency.contact (Contact person of partner company defined in LDAP record)
* typo3.org.team.security.member (Member of Security Team)

Possible domains:
typo3.org, typo3.com

Possible types:
team, partner,...

Possible roles:
leader, member, contact
