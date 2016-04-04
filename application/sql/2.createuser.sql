-- create user.
CREATE USER smartorder IDENTIFIED BY 'cD6Mndy6';  --chage password

-- set user grant.
GRANT ALL PRIVILEGES ON smartorder.* TO smartorder@localhost IDENTIFIED BY 'cD6Mndy6';