
.. include:: ../../Includes.txt
.. highlight:: shell

===============
Martin (marble)
===============


Start Docker-TER machine on Thinkbook
=====================================

#. Shutdown Apache2 to free ports 80 and 443
#. Shutdown MySQL (vorsichtshalber)
#. Open :file:`~/Repositories/git-t3o.typo3.org/t3o` in PhpStorm
#. Start proxy first

   - Make sure ports are not in use::

         ➜  cd ~/Repositories/github.com/torvitas
         # is_ports_are_free.sh is a script by marble
         ➜  ./is_ports_are_free.sh 
         is_ports_are_free 127.0.0.1 80 443
         80 unused
         443 unused
         all ports are free
      
   -  You may remove an existing Docker network `proxy`::
   
         ➜  cd ~/Repositories/github.com/torvitas/nginx-proxy
         ➜  docker network ls        # list
         ➜  docker network rm proxy  # remove

   -  Create Docker network `proxy`::
   
         ➜  cd ~/Repositories/github.com/torvitas/nginx-proxy
         ➜  make init

   -  Start the proxy::
   
         ➜  cd ~/Repositories/github.com/torvitas/nginx-proxy
         ➜  make up

   -  Do live display of server log::
   
         ➜  cd ~/Repositories/github.com/torvitas/nginx-proxy
         ➜  make log
   
#. Repository is https://git-t3o.typo3.org/t3o/ter
#. Clone is  `~//Repositories/git-t3o.typo3.org/t3o/ter`
#. Do::

      ➜  cd ~//Repositories/git-t3o.typo3.org/t3o/ter
      ➜  git reset --hard
      # use TYPO3 user credentials from LDAP for `git pull`
      ➜  git pull
      ➜  git branch -va

#. Update composer::

      ➜  sudo composer selfupdate

#. Start TYPO3::

      ➜  cd ~//Repositories/git-t3o.typo3.org/t3o/ter
      ➜  make init up log
      
#. Open in Browser: https://ter.typo3.127.0.0.1.xip.io/typo3/sysext/install/Start/Install.php

#. Find credientials in file :file:`.env`
