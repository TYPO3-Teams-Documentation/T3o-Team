
.. include:: ../Includes.txt
.. highlight:: rst

=================
How to contribute
=================

Main chapters:

.. toctree::
   :titlesonly:

   Workflow/Index
   LocalEnvironment/Others/Index
   LocalEnvironment/Ddev/Index
   LocalEnvironment/DockerAllSites/Index
   FrequentlyAskedQuestions/Index


==============
Getting access
==============

To get access to our repositories, please contact
Thomas Löffler (@spoonerweb) in Slack.

Repositories
------------
You can find all needed Repositories at our `Gitlab server
<https://gitlab.typo3.org/>`__.

To gain access to these repos you need to have a typo3.org account.

There are repositories for extensions and for websites. For all websites you
need the extension `t3olayout`. This extension holds the basic layout and content
elements of each website.

In this example we will guide you through the process of setting up an
installation for typo3.org.

We provide the needed assets for this project (database).
The assets from fileadmin are loaded via the extension `filefill` (thx to Nicole Cordes)

You can download these assets in every pipeline of Gitlab - so you dont have to take
care of contents and stuff at all. This ensures that you will have an installation with the
latest content up and running. The only thing is that you need to create a backend-user.