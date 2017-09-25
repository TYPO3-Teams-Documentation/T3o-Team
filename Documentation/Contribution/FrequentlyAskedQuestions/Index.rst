.. include:: ../../Includes.txt
.. highlight:: shell

======
Docker
======


.. contents:: On this page:
    :local:
    :class: compactlist

    :backlinks: top

.. _FAQ:

Frequently asked questions
==========================

If you encounter problems with the local environment,
just add your questions (and if you have the answer as well)


which branch do I need to work in?
----------------------------------

For all projects you need to work in a feature branch, see :ref:`Gitlab-Workflow`.


make init up throws exception that an extension is not activated
----------------------------------------------------------------

Symptom::

   [ BadFunctionCallException ]
    #1365429656: TYPO3 Fatal Error: Extension key "ext_key" is NOT loaded!
    thrown in file typo3/sysext/core/Classes/Utility/ExtensionManagementUtility.php
    in line 132

Solution::

   ➜ Switch inside your local environment if needed
   ➜ Change to the root directory of our project (where `htdocs` is the subdirectory)
   ➜ bin/typo3cms install:generatepackagestates 0 1


I have a too old php version
----------------------------

Symptom::

   composer says to me that the php version is not up to date

Solution::

   ➜ Switch inside your local environment if needed
   ➜ Update the php version

