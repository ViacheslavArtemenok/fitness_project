#!/bin/bash

openssl req -x509 -sha256 -nodes -days 365 -newkey rsa:2048 -keyout aggfitness.tk.key -out aggfitness.tk.crt
