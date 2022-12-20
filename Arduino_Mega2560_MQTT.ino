
#define MQ2pin (0)
#include "DHT.h"
#include <SPI.h>
#include <OneWire.h>
#include <Ethernet.h>
#include <DallasTemperature.h>
#include <Wire.h>
#include <Keypad.h>
#include <Password.h>
#include "U8glib.h"
#include <PubSubClient.h>

#define DHTPIN 7
#define ONE_WIRE_BUS 8
#define DHTTYPE DHT11
#define ROW_MAX 12; // screan 

OneWire oneWire(ONE_WIRE_BUS);


DHT dht(DHTPIN, DHTTYPE);
DallasTemperature sensors(&oneWire);
const byte ROWS = 4; //four rows
const byte COLS = 4; //three columns

char keys[ROWS][COLS] = {
  {'1', '2', '3', 'A'},
  {'4', '5', '6', 'B'},
  {'7', '8', '9', 'C'},
  {'*', '0', '#', 'D'}
};
byte rowPins[ROWS] = {34, 35, 36, 37}; //connect to the row pinouts of the keypad
byte colPins[COLS] = {38, 39, 40, 41}; //connect to the column pinouts of the keypad

Keypad keypad = Keypad( makeKeymap(keys), rowPins, colPins, ROWS, COLS );
Password password = Password( "1234" );
const char topic[] = "/SmartHouse/Arduino_Mega/temperatureOutside";
char Sviesa;
const int buzzer = 6;
const int Dumu = A0;
int detector = 0;
long previousTime =0;
const int DumuMax = 30;
static char temperatureOuts[7];
static char humidityTemp[7];
static char temperatureTemp[7];
static char MQ2signalizacija[7];
unsigned long time;
const int RELAY1 = A14;
const int RELAY2 = A15;
IPAddress ip(192, 168, 0, 177);

long now = millis();
long lastMeasure = 0;
char server[] = "ipaddress";
const char* mqtt_server = "ipaddress";
int port = 1883;
EthernetClient client1;
EthernetClient client3;
//-----------------------------------------------------


void callback(String topic, byte* message, unsigned int length) {
  Serial.print("Message arrived on topic: ");
  Serial.print(topic);
  Serial.print(". Message: ");
  String messageTemp;

  for (int i = 0; i < length; i++) {
    Serial.print((char)message[i]);
    messageTemp += (char)message[i];
  }
  Serial.println();


  Serial.println();
}

// Initiate instances -----------------------------------

EthernetClient ethClient;
PubSubClient client(mqtt_server, port, callback, ethClient);

//-----------------------------------------------
//MQTT CLIENT TEST




U8GLIB_ST7920_128X64 u8g(30, 31, 33, U8G_PIN_NONE);

// Creat a set of new characters

byte mac[] = {0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED}; //Nustatome MAC adresą



/* Setup for Ethernet and RFID */
void setup() {
  Serial.begin(9600);
  pinMode(RELAY1, OUTPUT);
  pinMode(RELAY2, OUTPUT);
  pinMode(Dumu, INPUT);
  sensors.begin();
  dht.begin();
  u8g.begin();
  digitalWrite(buzzer, OUTPUT);
  client.setServer(mqtt_server, port);
  client.setCallback(callback);
  Ethernet.begin(mac);
  if (client.connect("Arduino_Mega_Client")) {
    //if (client.connect((char*) clientName.c_str(), mqtt_username, mqtt_password)) {
    Serial.println("connected");
    // subscribe to topic
  }


  u8g.setFont(u8g_font_5x8);
  u8g.setColorIndex(1);
  Ethernet.begin(mac);
  if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP");
    Ethernet.begin(mac, ip);

  }
   digitalWrite(RELAY1,HIGH);
    digitalWrite(RELAY2,HIGH);
}
void reconnect() {

  // Loop until we're reconnected
  while (!client.connected()) {
    Serial.print("Attempting MQTT connection...");

    if (client.connect("Arduino_Mega_Client"))  {
      Serial.println("connected");
//      client.subscribe("SmartHosue/Arduino_Mega/6");
//      client.subscribe("SmartHouse/Arduino_Mega/7");
      u8g.drawStr(0, 40, "Connected to server");
      u8g.setPrintPos(100, 30);
    } 
    else {
      u8g.drawStr(0, 40, "Not connected to server");
      u8g.setPrintPos(100, 30);
      Serial.print("failed, rc=");
      Serial.print(client.state());
      Serial.println(" try again in 5 seconds");
      delay(15000);
    }
  }
}

//------------------------------------------------------------------------------
void error() {

  u8g.drawStr(0, 20, "Not Connected Realiu");

}



void draw() {
  DumuDetektorius();
  readTemperature();
 
  //u8g.drawFrame(0,0,128,31);
  //u8g.drawFrame(0,33,128,31);

  u8g.drawStr(0, 10, "Temperatura namuose");
  u8g.drawStr( 100, 10, temperatureTemp);


  //u8g.drawUTF8(70, 28, DEGREE_SYMBOL);


  u8g.drawStr(0, 20, "Dregme namuose");
  u8g.drawStr( 100, 20, humidityTemp);
  u8g.drawStr(120, 20, "%");

//  u8g.drawStr(0, 30, "Temperatura lauke");
//  u8g.setPrintPos(100, 30);
//  u8g.print( temperatureOuts, 2);

  u8g.drawStr(0, 30, "Temperatura lauke");
  u8g.drawStr( 100, 30, temperatureOuts);
//if (client.connected()){
//  u8g.drawStr(0, 40, "Connected to server");
//  u8g.setPrintPos(100, 30);
// }
// if (!client.connected()){
//   u8g.drawStr(0, 40, "Not connected to server");
//   u8g.setPrintPos(100, 30);
// }
 if(detector<300)
 {
  u8g.drawStr(0, 50, "ALARM OFF");
//  u8g.setPrintPos(100, 40);
  
 }
 if(detector>300)
 {
  u8g.drawStr(0, 50, "ALARM ON!!");
//  u8g.setPrintPos(100, 40);
  
 }
 

}

void readTemperature()
{
  sensors.requestTemperatures(); 
 float c =sensors.getTempCByIndex(0);
  dtostrf(c,3,2,temperatureOuts);
  float t = dht.readTemperature();
  dtostrf(t, 3, 1, temperatureTemp);

  float h = dht.readHumidity();
  dtostrf(h, 3, 1, humidityTemp);

   if ( isnan(c) || isnan(h) || isnan(t)) {
      Serial.println("Failed to read temperature and humidity from sensors!");
      return;
    }
}



/* Infinite Loop */
void loop() {
  now = millis();
  u8g.firstPage();
  do {
    draw();
  } while ( u8g.nextPage() );
  if (!client.connected()) {
    reconnect();
    
  }
  if (!client.loop())
    client.connect("ESP8266Client");

  // Publishes new temperature and humidity every 10 seconds
  if (now - lastMeasure > 10000) {
     lastMeasure = now;
    //readTemperature();
    Data_sending_dht11();
    DumuDetektorius();
  }
  detector = analogRead(Dumu);
  float dum = analogRead(Dumu);
  elektra();
  elektra2();
  DumuDetektorius();
}


void Data_sending_dht11()
{
  //client.publish("/SmartHouse/Arduino_Mega/temperature", temperatureTemp);
 // client.publish("/SmartHouse/Arduino_Mega/humidity", humidityTemp);
  client.publish("/SmartHouse/Arduino_Mega/temperatureOutside", temperatureOuts);
  Serial.println("Data send successfully to mqtt server");
}

void Siuntimas_Dumu()   //Prisijungimas prie MYSQL
{
   
   client.publish("/SmartHouse/Arduino_Mega/Dumu", MQ2signalizacija);
  
 

}
//
//
//void keypads(void) {
//    char key = keypad.getKey();
//  u8g.setFont(u8g_font_osb18);
//  u8g.setPrintPos(0, 18);
//  u8g.print(key);
//
//
//}
//
//void Signalizacija()
//{
//  for (int i = 1700; i < 2000; i++) {
//    tone(buzzer, i);
//    Serial.println(i);
//    delay(10);
//
//  }
//  for (int i = 2000; i > 1700; i--) {
//    tone(buzzer, i);
//    delay(10);
//  }
//}

void DumuDetektorius()
{
  
  detector = analogRead(Dumu);
  float dum = analogRead(Dumu);
   dtostrf(dum, 3, 0, MQ2signalizacija);
       Serial.print("Dumu koncentracija= ");
      Serial.println(detector);
  // Jeigu koncentracija daugiau negu 30
  if (detector > DumuMax)
  {
    Siuntimas_Dumu();

    //Signalizacija kaukia kol medziagu koncentracija daugiau nei 300
    while (detector > DumuMax)
    {

       // String line = client1.readStringUntil('\r');
       //Serial.println(line);
      detector = analogRead(Dumu);
      Serial.print("Dumu koncentracija= ");
      Serial.println(detector);
     tone(buzzer, 800, 800);
     delay(100);
      tone(buzzer, 600, 800);
       delay(100);
if (detector<DumuMax )
      {

        break;
      }

    }
  }
  else
  {
    digitalWrite(buzzer, LOW);
    noTone(buzzer);

  }

}
void elektra()
{

//  client.subscribe(topic);
   //Serial.println(topic);
  
 if(client1.connect(server, 80))
 {
  Serial.println("Connected Elektra");
  client1.println("GET /PHPWeb/Lamp.php ");
  client1.println("HTTP/1.1");
  client1.println("Host: 192.168.1.107 ");
  client1.println("Connection: close");
  String line = client1.readStringUntil('\n');
    if(line=="on")
      digitalWrite(RELAY1,LOW);
    else
      digitalWrite(RELAY1,HIGH);
 }
 else
 Serial.println("Not connected elektra!");
}

void elektra2()
{

//  client.subscribe(topic);
   //Serial.println(topic);
  
 if(client3.connect(server, 80))
 {
  Serial.println("Connected Elektra");
  client3.println("GET /PHPWeb/Lamp2.php ");
  client3.println("HTTP/1.1");
  client3.println("Host: 192.168.1.107 ");
  client3.println("Connection: close");
  String line1 = client3.readStringUntil('\n');
    if(line1=="on")
      digitalWrite(RELAY2,LOW);
    else
      digitalWrite(RELAY2,HIGH);
 }
 else
 Serial.println("Not connected elektra!");
}
//
//  void dumai()
//{
//
// if(client1.connect(server, port))
// {
//  Serial.println("Connected Dumai");
//  client1.println("GET /PHPWeb/DumuKoncentracija.php ");
//  client1.println("HTTP/1.1");
//  client1.println("Host: 192.168.0.81 ");
//    client1.println("Connection: close");
// }
// else
// Serial.println("Not connected!");
//}


void Perspejimas(void) {


  //u8g.drawFrame(0,0,128,31);
  //u8g.drawFrame(0,33,128,31);

  u8g.drawStr(0, 10, "SIGNALIZACIJA IJUNGTA");

}
//void pinkodas()
//{
//  char key = keypad.getKey();
// if (key=="1234"){
//
//  }
//}
