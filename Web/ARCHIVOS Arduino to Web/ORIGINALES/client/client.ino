
#include <Ethernet.h>
#include <SPI.h>

byte mac[] = { 0x00, 0xAA, 0xBB, 0xCC, 0xDE, 0x01 }; // RESERVED MAC ADDRESS
EthernetClient client;


long previousMillis = 0;
unsigned long currentMillis = 0;
long interval = 250000; // READING INTERVAL

int t = 0;	// TEMPERATURE VAR
String data;

void setup() { 
	Serial.begin(9600);

	if (Ethernet.begin(mac) == 0) {
		Serial.println("Failed to configure Ethernet using DHCP");
    // try to congifure using IP address instead of DHCP:
    Ethernet.begin(mac, ip);
	}
 // give the Ethernet shield a second to initialize:
  delay(1000);
  Serial.println("connecting...");

	t = (int) 10; 

	data = "";
}

void loop(){

	currentMillis = millis();
	if(currentMillis - previousMillis > interval) { // READ ONLY ONCE PER INTERVAL
		previousMillis = currentMillis;
		t = (int) 10;
	}

	data = "temp1=";
  data = data + t;
  Serial.println("data="+data);
  
Serial.println("Go to connect!!");
	if (client.connect("www.carvlos.netai.net",80)) { // REPLACE WITH YOUR SERVER ADDRESS
Serial.println("connected");
Serial.println("client.connect(www.carvlos.netai.net,80)");
		client.println("POST /add.php HTTP/1.1"); 
		client.println("Host: carvlos.netai.net"); // SERVER ADDRESS HERE TOO
Serial.println("Host: carvlos.netai.net");
		client.println("Content-Type: application/x-www-form-urlencoded"); 
		client.print("Content-Length: "); 
		client.println(data.length()); 
		client.println(); 
		client.print(data);
Serial.println("data="+data);
	} 

	if (client.connected()) { 
		client.stop();	// DISCONNECT FROM THE SERVER
	}

	delay(10000); // WAIT FIVE MINUTES BEFORE SENDING AGAIN
}



