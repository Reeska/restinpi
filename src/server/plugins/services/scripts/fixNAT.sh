#!/bin/bash
# FixNAT
# (Re)open port in router for net service

IP=$(ifconfig | sed -En 's/127.0.0.1//;s/.*inet (addr:)?(([0-9]*\.){3}[0-9]*).*/\2/p')

upnpc -r 22 tcp             # SSH
upnpc -a $IP 80 8080 tcp    # Apache
upnpc -r 9091 tcp           # Transmission
upnpc -r 443 tcp            # Shellinabox through Apache