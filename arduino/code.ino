#include <ArduinoJson.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include "DHT.h"

#define DHTTYPE DHT11



const char *ssid = "Alpha402";
const char *password = "MohamedJinas123";
const String API_URL = "http://192.168.8.101:8000/api/sensor_readings";

DHT dht(D5, DHTTYPE);


void setup() 
{
  Serial.begin(9600);

  // Connect to Wi-Fi network with SSID and password
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.print(".");
  }
  // Print local IP address and start web server
  Serial.println("");
  Serial.println("WiFi connected.");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());

  dht.begin();
}

void loop() 
{
  if (WiFi.status() == WL_CONNECTED) { 
    delay(10000);
  
  
    SendPostRequest(1,"temperature",);
   
    }
}

void SendPostRequest(int& sensor_id, const String& type, const float& reading)
{
    String postData;
    StaticJsonDocument<200> doc;
    doc["sensor_id"] = sensor_id;
    doc["reading"] = reading;
    doc["type"] = type;
    serializeJsonPretty(doc, postData);

    
    HTTPClient http;
    http.begin(API_URL);
    http.addHeader("Content-Type", "application/json"); 
    int httpCode = http.POST(postData);
    http.end();

    Serial.println(postData);
    Serial.print("Status code: ");
    Serial.print(httpCode);
    delay(1000);
    Serial.println();
    
}

 
