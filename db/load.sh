#!/bin/sh

SCRIPT=$(readlink -f "$0")
DIR=$(dirname "$SCRIPT")
psql -U examenvuelos examenvuelos < $DIR/examenvuelos.sql

