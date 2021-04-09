#include <SPI.h>
#include <Ethernet.h>
#include "DHT.h" 
#include <SD.h>  
#define         BOOL_PIN                     (2)
#define DHTPIN                               (8)                    //-> pin DHT22
#define DHTTYPE DHT22
DHT dht(DHTPIN, DHTTYPE);
const int chipSelect = 4;

byte mac[] = {
  0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
  
//IPAddress ip(192,168,1,4);
IPAddress ip(xxx,xxx,xxx,xxx);                                      //-> Ip de l'arduino


//char server[] = "192.168.1.3";                                     //->Ip du serveur attribuer par le serveur DHCP
char server[] = "xxx.xxx.xxx.xxx";

EthernetClient client;

void setup() {
 
  // Serial.begin lance la connexion série entre l'ordinateur et l'Arduino.
  Serial.begin(9600);
  dht.begin();
  Serial.print("Initializing SD card...");
if (!SD.begin(chipSelect)) {
Serial.println("Card failed, or not present");
return;
}
Serial.println("card initialized.");
pinMode(BOOL_PIN, INPUT);                        
digitalWrite(BOOL_PIN, HIGH);                    

 
  // start the Ethernet connection
  Ethernet.begin(mac, ip);
    
}

void loop() {
 
  
  float h = dht.readHumidity();
  float t = dht.readTemperature();
  float f = dht.readTemperature(true);
  float indice_tempF = dht.computeHeatIndex(f, h);
  float indice_tempC = dht.convertFtoC(indice_tempF);//-> indice de chaleur calculé en fonction de la temp et l'hum exprimé en C
  Serial.println(t);                                 //il est utilisé pour donner une sensation d'inconfort due à une température et une humidité élevées.
  delay(1000);
  
  File sdcard_file = SD.open("data.txt", FILE_WRITE);
if (sdcard_file) {
sdcard_file.print("Temperature en Celsius: ");
sdcard_file.print(t);sdcard_file.println(" C;");
sdcard_file.print("Humidite: ");
sdcard_file.print(h);sdcard_file.println(" %;");
sdcard_file.print("Indice de chaleur: ");
sdcard_file.print(indice_tempC);sdcard_file.println(" C;");
sdcard_file.println();
sdcard_file.println();
sdcard_file.close();
}  
else {
Serial.println("error opening data.txt");
} 
  
 
  // Connect to the server (your computer or web page)  
  if (client.connect(server, 80)) {
    client.print("GET /write_data.php?"); // This
    client.print("value="); // This
    client.print(t); //print de la variable dans la requête GET
    client.println(" HTTP/1.1"); // Partie de la demande GET
    //client.println("Host: 192.168.1.3");   //->Ip du serveur
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
