Zorbus Bootstrap Edition
========================

* mkdir app/cache app/logs web/uploads
* setfacl -R -m u:`whoami`:rwx -m u:apache:rwx app/cache app/logs web/uploads
* setfacl -dR -m u:`whoami`:rwx -m u:apache:rwx app/cache app/logs web/uploads