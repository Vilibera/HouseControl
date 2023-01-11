#!/usr/bin/env python
import mysql.connector
from  time import sleep
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)
GPIO.setup(35, GPIO.OUT)
from mfrc522 import SimpleMFRC522

mydb = mysql.connector.connect(
 host = "Database server name",
 user = "Database user name",
 password= "Database user password",
 database = "Database name")

reader = SimpleMFRC522()
mycursor = mydb.cursor()

try:
        id, text = reader.read()
        mycursor.execute("Select SecCode FROM security where SecCode = "+str(id))
        result = mycursor.fetchall()
        for row in result:          
           status = row[0]
        if (mycursor.rowcount >0):
            if(status==str(id)):
                print("atrakinta")
                GPIO.output(35,True)
                sleep(5)
            else:
                print("Neatrakinta")
                GPIO.output(35,False)
        else:
             print("Neatrakinta")          
        mydb.close()   
finally:
        GPIO.cleanup()

   
     

    





