#!/usr/bin/python
import subprocess
from  time import sleep

y=(0.1)

subprocess.Popen(["python",'/home/pi/Desktop/VetiliatoriusSmart.py'])
sleep(y)
subprocess.Popen(["python",'/home/pi/Desktop/Uzraktas.py'])
sleep(y)
subprocess.Popen(["python",'/home/pi/Desktop/BaltaLed.py'])
sleep(y)
subprocess.Popen(["python",'/home/pi/Desktop/RaudonaLed.py'])
sleep(y)
subprocess.Popen(["python",'/home/pi/Desktop/ZaliasLedas.py'])
sleep(y)
subprocess.Popen(["python",'/home/pi/Desktop/MelynasLed.py'])
sleep(y)
print("All jobs completed!")
