select email from user inner join thing on user.id=thing.id_user where mac='f0:de:f1:39:7f:17' ;
# select mac from user inner join thing on user.id=thing.id_user where email='m.holzarte@company.fr' ;
# select user.firstname , user.lastname,service.name from user inner join subscribe on user.id=subscribe.id_user inner join service on subscribe.id_service=service.id ;
select user.firstname , user.lastname,service.name from user ,service where user.id=suscribe.id_user and service.id=subscribe.service_user ;
select count (*) from service where type="smarthome";
select id_user , count(mac)  from platform_iot.thing group by id_user ;
select user.firstname , user.lastname, count (mac) as nbr from user join thing onn user.id=thing.id_user group by user.id ;
select user.firstname , user.lastname, from user join thing on user.id=thing.id_user group by user.id having count(mac>1) ;
select libelle from bureau_etude.composant inner join bureau_etude.
