#!/bin/sh

sudo -u postgres dropuser examenvuelos
sudo -u postgres dropdb examenvuelos
sudo -u postgres psql -c "create user examenvuelos password 'examenvuelos' superuser;"
sudo -u postgres createdb -O examenvuelos examenvuelos

