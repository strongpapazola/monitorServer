apt install git python3 python3-pip -y
python3 -m pip install requests
rm -r monitorServe
git clone https://github.com/strongpapazola/monitorServe

source monitorServe/config

if [ $MODE == 'client' ];then
 read -p 'Enter name this server : ' USERNAME
 mkdir /opt
 rm -r /opt/monitorServe
 cp -r monitorServe/client /opt/monitorServe
 cp monitorServe/client/monitorServe.service /etc/systemd/system/
 sed -i "s/name = ''/name = '$USERNAME'/g" /opt/monitorServe/monitorServe.py
 systemctl enable monitorServe.service
 systemctl start monitorServe.service
 systemctl restart monitorServe.service
elif [ $MODE == 'master' ];then
 apt install apache2 -y
 cp -r monitorServe/master $WEBDIR/monitorServe
 read -p 'EDIT BASEURL [enter]' enter
 nano $WEBDIR/monitorServe/application/config/config.php
 read -p 'EDIT database login [enter]' enter
 nano $WEBDIR/monitorServe/application/config/database.php
 read -p 'Create Database [enter]' enter
 mysql -u root -p -e 'CREATE DATABASE monitorserve;'
 read -p 'Import Database [enter]' enter
 mysqldump -u root -p monitorserve < monitorServe/monitorserve.sql
else
 echo 'setup monitorServe/config'
fi
