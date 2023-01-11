import mysql.connector
import time
import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BOARD)
GPIO.setwarnings(False)
GPIO.setup(36, GPIO.OUT)


config ={
    'host': 'Database server name',
    'user': 'Database user name',
    'password':'Database user password',
    'database' : 'Database name'
}
mydb = mysql.connector.connect(**config)

status = ""

while True:
    mydb = mysql.connector.connect(**config)
    sql = "Select Status FROM lights Where DeviceName = 'LedB' AND Date = (select max(Date) from lights)"
    mycursor = mydb.cursor()
    mycursor.execute(sql)
    result = mycursor.fetchall()
    for row in result:
        status = row[0]
    if(status =='on'):
        GPIO.output(36,True)
    if(status=='off'):
        GPIO.output(36,False)
    mydb.close()


