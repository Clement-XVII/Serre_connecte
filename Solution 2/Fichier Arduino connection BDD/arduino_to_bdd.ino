#include <SPI.h>
#include <Ethernet.h>
#include "DHT.h"   

#define DHTPIN 8
#define DHTTYPE DHT22
DHT dht(DHTPIN, DHTTYPE);

byte mac[] = {
  0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
  
//IPAddress ip(192,168,1,116);
IPAddress ip(xxx,xxx,xxx,xxx);                                      //-> Ip de l'arduino


//char server[] = "192.168.1.46";                                     //->Ip du serveur
char server[] = "xxx.xxx.xxx.xxx";

EthernetClient client;

void setup() {
 
  // Serial.begin lance la connexion série entre l'ordinateur et l'Arduino.
  Serial.begin(9600);
  dht.begin();
 
  // start the Ethernet connection
  Ethernet.begin(mac, ip);
    
}

void loop() {
 
  
  float h = dht.readHumidity();
  float t = dht.readTemperature();
  float f = dht.readTemperature(true);
  float hi = dht.computeHeatIndex(f, h);
  
 
  // Connect to the server (your computer or web page)  
  if (client.connect(server, 80)) {
    client.print("GET /write_data.php?"); // This
    client.print("value="); // This
    client.print(t); //print de la variable dans la requête GET
    client.println(" HTTP/1.1"); // Partie de la demande GET
    //client.println("Host: 192.168.1.46");   //->Ip du serveur
    client.println("Host: xxx.xxx.xxx.xxx");   //->Ip du serveur
    client.println("Connection: close"); // Partie de la demande GET indiquant au serveur que nous avons terminé de transmettre le message
    client.println(); 
    client.println(); 
    client.stop();    // Fermeture de la connexion au serveur

  }

  else {
    // Si l'Arduino ne peut pas se connecter au serveur
    Serial.println("--> connection failed\n");
  }
 
  delay(1000);
}
