
.. include:: ../../Includes.txt
.. highlight:: shell

=========================
Repositories and Workflow
=========================

Repositories
============

See https://git-t3o.typo3.org/


.. _Gitlab-Workflow:

Gitlab Workflow
===============

We are using feature branches and Merge Requests to push changes. Here is a short documentation about the workflow:

#. Go to the issue you want to work on in GitLab
#. Press the button "Create branch" for a new remote branch
#. Pull the new branch to your local system (`git pull`)
#. Switch to this branch and commit your changes (`git branch [your-branch]`)
#. Push the changes in this branch (`git push origin [your-branch]`)
#. You are able to force push in this branch with `git push --force`
#. When your changes are ready to go you can go to GitLab and create a Merge Request

