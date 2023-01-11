import paho.mqtt.client as mqtt
import mysql.connector
import time
import RPi.GPIO as GPIO
from mfrc522 import SimpleMFRC522

reader = SimpleMFRC522()

mydb = mysql.connector.connect(
 host = "Database server name",
 user = "Database user name",
 password= "Database user password",
 database = "Database name")
TempOutside = 0
Tempinside = 0
Huminside = 0
TempInside = float(Tempinside)
HumInside = float(Huminside)

mycursor = mydb.cursor()
def on_connect(client, userdata, flags, rc):
    
    print("Connected with result code "+str(rc))

    # Subscribing in on_connect() means that if we lose the connection and
   # client.subscribe("/SmartHouse/esp8266/temperature")
    #client.subscribe("/SmartHouse/esp8266/humidity")
    client.subscribe("/SmartHouse/Arduino_Mega/temperature")
    client.subscribe("/SmartHouse/Arduino_Mega/humidity")
    client.subscribe("/SmartHouse/Arduino_Mega/temperatureOutside")
    client.subscribe("/SmartHouse/Arduino_Mega/Dumu")
    

        
def on_message(client, userdata, message):
    global TempOutside,TempInside,HumInside
    #if(TempInside | HumInside <1.0):
     #   client.subscribe("/SmartHouse/Arduino_Mega/temperature")
     #   client.subscribe("/SmartHouse/Arduino_Mega/humidity")
     #   client.subscribe("/SmartHouse/Arduino_Mega/temperatureOutside")
        
    #time.sleep(60)
    if(message.topic == '/SmartHouse/Arduino_Mega/humidity'):
        HumInside = float(message.payload)
        print("Message topic: " + message.topic + "Message: " + str(message.payload))
    if(message.topic =='/SmartHouse/Arduino_Mega/temperature'):
        TempInside = float(message.payload)
        print("Message topic: " + message.topic + "Message: " + str(message.payload))
    if(message.topic =='/SmartHouse/Arduino_Mega/temperatureOutside'):
        TempOutside = float(message.payload)
        print("Message topic: " + message.topic + "Message: " + str(message.payload))
#     print("Temp:"+str(TempInside) + "Hum: " + str(HumInside))
    sql = "INSERT INTO collecteddata (TempOutside,TempInside,HumInside)VALUES(%s,%s,%s)"
    val = (TempOutside,TempInside,HumInside)
    mycursor.execute(sql, val)
    mydb.commit()
    #print("Received message '" + str(message.payload) + "' on topic '" + message.topic)
    

def main():
    mqtt_client = mqtt.Client()
    mqtt_client.on_connect = on_connect
    mqtt_client.on_message = on_message

    mqtt_client.connect('localhost', 1883, 60) 
    # Connect to the MQTT server and process messages in a background thread. 
    mqtt_client.loop_start() 

    

if __name__ == '__main__':
    print('MQTT to InfluxDB bridge')
    main()
