#include <WiFiClient.h>
#include <ESP8266WiFi.h>
#include <ESP8266mDNS.h>
#include <ESP8266WebServer.h>
#include "DHT.h"
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
#include <SPI.h>
#include <MFRC522.h>
#include <PubSubClient.h>
#define DHTTYPE DHT11   // DHT 22  (AM2302), AM2321

const char* ssid = "wifi name";
const char* password = "wifi password";

// Change the variable to your Raspberry Pi IP address, so it connects to your MQTT broker
const char* mqtt_server = "ipaddress";

// Initializes the espClient
WiFiClient espClient;
PubSubClient client(espClient);

// DHT Sensor
const int DHTPin = D3;
#define ON_Board_LED 2  //--> Defining an On Board LED, used for indicators when the process of connecting to a wifi router
#define SS_PIN D2  //--> SDA / SS is connected to pinout D2
#define RST_PIN D1  //--> RST is connected to pinout D1
MFRC522 mfrc522(SS_PIN, RST_PIN);  //--> Create MFRC522 instance.  SPI.begin();      //--> Init SPI bus
// Initialize DHT sensor.
DHT dht(DHTPin, DHTTYPE);

// Timers auxiliar variables
long now = millis();
long lastMeasure = 0;

int readsuccess;
byte readcard[4];
char str[32] = "";
String StrUID;
String Sauga, postData;
void setup_wifi() {
  WiFi.mode(WIFI_STA);
  delay(10);
  // We start by connecting to a WiFi network
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("WiFi connected - ESP IP address: ");
  Serial.println(WiFi.localIP());
}


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

void reconnect() {
  
  // Loop until we're reconnected
  while (!client.connected()) {
    Serial.print("Attempting MQTT connection...");
    
    if (client.connect("ESP8266Client")) {
      Serial.println("connected");  
      client.subscribe("SmartHosue/esp8266/4");
      client.subscribe("SmartHouse/esp8266/5");
    } else {
      Serial.print("failed, rc=");
      Serial.print(client.state());
      Serial.println(" try again in 5 seconds");
      delay(15000);
    }
  }
}

void setup() {
  
  dht.begin();
    SPI.begin();      //--> Init SPI bus
  mfrc522.PCD_Init(); //--> Init MFRC522 card

  WiFi.begin(ssid, password); //--> Connect to your WiFi router
  Serial.println("");

  pinMode(ON_Board_LED, OUTPUT);
  digitalWrite(ON_Board_LED, HIGH); //--> Turn off Led On Board
  Serial.begin(115200);
  setup_wifi();
  client.setServer(mqtt_server, 1883);
  client.setCallback(callback);
  Serial.println("Please tag a card or keychain to see the UID !");
  Serial.println("");
}
//int getid() {
//  
//if (!mfrc522.PICC_IsNewCardPresent()) {
// // Serial.println("IS NEW card presentet");
//    return 0;
//  }
//  if (!mfrc522.PICC_ReadCardSerial()) {
//    return 0;
//  }
//
//  Serial.print("THE UID OF THE SCANNED CARD IS : ");
//
//  for (int i = 0; i < 4; i++) {
//    readcard[i] = mfrc522.uid.uidByte[i]; //storing the UID of the tag in readcard
//    array_to_string(readcard, 4, str);
//    StrUID = str;
//  }
//  mfrc522.PICC_HaltA();
//  return 1;
//}

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//

//----------------------------------------Procedure to change the result of reading an array UID into a string------------------------------------------------------------------------------//
//void array_to_string(byte array[], unsigned int len, char buffer[]) {
//  for (unsigned int i = 0; i < len; i++)
//  {
//    byte nib1 = (array[i] >> 4) & 0x0F;
//    byte nib2 = (array[i] >> 0) & 0x0F;
//    buffer[i * 2 + 0] = nib1  < 0xA ? '0' + nib1  : 'A' + nib1  - 0xA;
//    buffer[i * 2 + 1] = nib2  < 0xA ? '0' + nib2  : 'A' + nib2  - 0xA;
//  }
//  buffer[len * 2] = '\0';
//}
void loop() {
 
  if (!client.connected()) {
    reconnect();
  }
  if(!client.loop())
    client.connect("ESP8266Client");
//    if(Sauga!=NULL)
//  {
//    Serial.println(Sauga);
//  }
    //getid();
  //Serial.println(Sauga);
//  now = millis();
//  // Publishes new temperature and humidity every 10 seconds
//  if (now - lastMeasure > 10000) {
//     
   
    lastMeasure = now;
    // Sensor readings may also be up to 2 seconds 'old' (its a very slow sensor)
    float h = dht.readHumidity();
    // Read temperature as Celsius (the default)
    float t = dht.readTemperature();
    // Read temperature as Fahrenheit (isFahrenheit = true)
    float f = dht.readTemperature(true);

    // Check if any reads failed and exit early (to try again).
    if (isnan(h) || isnan(t) || isnan(f)) {
      Serial.println("Failed to read from DHT sensor!");
      return;
    }

    // Computes temperature values in Celsius
    //float hic = dht.computeHeatIndex(t, h, false);
    static char temperatureTemp[7];
    dtostrf(t, 6, 2, temperatureTemp);
    
    static char humidityTemp[7];
    dtostrf(h, 6, 2, humidityTemp);

    // Publishes Temperature and Humidity values
    client.publish("/SmartHouse/Arduino_Mega/temperature", temperatureTemp);
    client.publish("/SmartHouse/Arduino_Mega/humidity", humidityTemp);
    
    Serial.print("Humidity: ");
    Serial.print(h);
    Serial.print("\t Temperature: ");
    Serial.print(temperatureTemp);
    Serial.print(" *C ");
     Serial.println("");
//  }
delay(10000);
}
