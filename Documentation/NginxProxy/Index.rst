

.. include:: ../Includes.txt

.. _Nginx-Proxy:

===============
Nginx-Proxy
===============


Both the :ref:`Relaunch-2017-typo3-org` and the :ref:`Launch-2017-ter-typo3-org`
require that the nginx proxy is running before the Docker containers that make up
the respective installation can be run.


First run
=========

Clone to :file:`nginx-proxy`::

   git clone https://github.com/torvitas/docker-nginx-proxy-configuration nginx-proxy

Make sure ports 80 and 443 on `localhost` are not in use.
On Linux you can use `netcat` for this::

   ➜  ~ netcat -nvz  127.0.0.1 80 443
   Connection to 127.0.0.1 80 port [tcp/*] succeeded!
   Connection to 127.0.0.1 443 port [tcp/*] succeeded!

   # oops, ports 80 and 443 are in use

Stop whatever service is running there (example)::

   ➜  ~ sudo service apache2 stop
   * Stopping web server apache2

Try again::

   ➜  ~ netcat -nvz  127.0.0.1 80 443
   netcat: connect to 127.0.0.1 port 80 (tcp) failed: Connection refused
   netcat: connect to 127.0.0.1 port 443 (tcp) failed: Connection refused

   # fine: ports seem to be unused

The proxy will try to create a network named `proxy`. If a network named `proxy`
already exists, you can remove it this way::

   # check what networks exist
   ➜ docker network ls

   # remove network 'proxy'
   ➜  docker network remove proxy

Run init once::

   ➜  cd nginx-proxy
   ➜  nginx-proxy git:(master) ✗ make init
   docker network create proxy
   6b53bb691cf4c51e288c926bc1604315d542c17928b820b122d14edf246c9b6d

Build and run the proxy::

   ➜  cd nginx-proxy
   ➜  nginx-proxy git:(master) ✗ make up
   docker-compose build
   Building nginx
   Step 1/9 : FROM jwilder/nginx-proxy
    ---> ec705df62f93
   ...
   docker-compose up -d
   Creating network "nginxproxy_default" with the default driver
   Creating nginxproxy_nginx_1
   Creating nginxproxy_ssl_1
   docker-compose ps
         Name             Command             State              Ports
   -------------------------------------------------------------------------
   nginxproxy_nginx   /usr/bin/entrypo   Up                 0.0.0.0:443->443
   _1                 int forego ...                        /tcp, 0.0.0.0:80
                                                            ->80/tcp
   nginxproxy_ssl_1   /usr/local/lib/s   Exit 0
                      sl/entrypo ...

Start a live display of the log::

   ➜  cd nginx-proxy
   ➜  make log

Usual usage
===========

Start and show log::

   ➜  cd nginx-proxy
   ➜  make up log

Bring the proxy down::

   ➜  cd nginx-proxy
   ➜  make down




Helpful Docker commands
=======================

List networks (example)::

   ➜  nginx-proxy git:(master) ✗ docker network ls

   NETWORK ID          NAME                             DRIVER              SCOPE
   efc1f4a220ab        dockerlemp_default               bridge              local
   7c378dc864ec        host                             host                local
   5e737532c2bc        nginxproxy_default               bridge              local
   b78cef79020d        none                             null                local
   cee8ef510137        proxy                            bridge              local
   f38d8e2a64d2        ter_default                      bridge              local

Remove one or more networks::

   ➜  docker network remove --help
   ➜  docker network rm NETWORK [NETWORK ...

   # example, in our case:
   ➜  docker network rm proxy



Checking ports
==============

Here is a helper script to check ports::

   #!/bin/bash

   HOST=${1:-127.0.0.1}
   PORTS=${@:2}
   PORTS=${PORTS:-80 443}

   echo is_ports_are_free $HOST $PORTS

   function is_ports_are_free {
      # is_ports_are_free 127.0.0.1
      local result=0
      for port in ${@:2}
      do
         nc -z $1 $port
         if [ $? -eq 0 ]; then
            result=1
            echo "${port} in use"
         else
            echo "${port} unused"
         fi
      done
      return $result
   }

   is_ports_are_free $HOST "$PORTS"
   if [ $? -eq 0 ]; then
      echo "all ports are free"
      exit 0
   else
      echo "some or all ports are used"
      exit 1
   fi

Example::

   ➜  bash  is_ports_are_free.sh  127.0.0.1  80 443 3306
   is_ports_are_free 127.0.0.1 80 443 3306
   80 unused
   443 unused
   3306 in use
   some or all ports are used

