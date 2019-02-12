
.. include:: ../../Includes.txt
.. highlight:: shell

============================
How to Create a Karma Source
============================


Overview
========

Karma is created using the `KarmaService`. This service handles storing and retrieval of Karma, as well as summation and caching. All karma earned is stored as objects of the `KarmaLedger` class, but this class and the `KarmaLedgetRepository` should not normally be accessed directly.

All Karma has a *Source*, *Issuer*, and *Issuer Action*.

- **Source:** This is the top-level Karma type. A karma source can have multiple issuers and is issuer-agnostic. For example, "Code Contribution" can be the source of karma covering code contribution on any platform, such as GitHub, Bitbucket, GitLab, etc. We show badges and totals calculated per karma source and do not mention the issuer. Each karma source has a <=16 char alphanumerical identifier called the *karma source code*.
- **Issuer:** A karma issuer is mostly interesting from a developer perspective. It is a specific interface to a platform where karma is generated. For example, an interface to GitHub could be a karma issuer. Each karma issuer has a <=32 char alphanumerical identifier.
- **Issuer Action:** A specific action that generates a specific karma amount. For example, a commmit or merge on GitHub could be an issuer action. Each karma issuer action has a <=32 char alphanumerical identifier.


TypoScript Definition
=====================

Karma sources, issuers, and issuer actions are defined in TypoScript. Sources should ideally be defined in the Karma extension itself, and issuers and issuer actions in their own extensions.

.. code-block:: typoscript
   :linenos:

      plugin.tx_karma.settings {
         issuers {
            # The issuer code is "userProfileChange"
            userProfileChange {
               # The issuer action code is "newUserWasCreated"
               newUserWasCreated {
                  # Each issuer action is related to a karma source
                  sourceCode = useraction
                  label = Created User
                  valueEarned = 10
               }
            }
         }

         sourceCodes {
            # The karma source code is "useraction"
            useraction {
               label = typo3.org User
               # This is an example for future use. Badges have not yet been implemented
               badges {
                  # >=100 karma points from this source will give the user an "Active User" badge
                  100 {
                     icon = EXT:karma/Resources/Public/Icons/ActiveUserBadge.svg
                     label = Active User
                  }
                  # >=500 karma points from this source will give the user an "Eclectic User" badge
                  500 {
                     icon = EXT:karma/Resources/Public/Icons/EclecticUserBadge.svg
                     label = Eclectic User
                  }
               }
            }
         }
      }


PHP Implementation
==================

An example implementation of a karma issuer can be found in `T3o\Karma\Utility\UserProfileChangeKarmaIssuerUtility`.

.. code-block:: php
   :linenos:

      $this->karmaService->triggerKarmaIssuerActionForUser(
         self::ISSUER_CODE,
         __FUNCTION__,
         $frontendUser
      );

It is recommended to make the issuer code into a lower camel case version of the class name. In this case, the issuer code for `UserProfileChangeKarmaIssuerUtility` is `userProfileChange`. The issuer action name is the method name, i.e. `newUserWasCreated`.


SOAP API
========

We should create a SOAP API.
