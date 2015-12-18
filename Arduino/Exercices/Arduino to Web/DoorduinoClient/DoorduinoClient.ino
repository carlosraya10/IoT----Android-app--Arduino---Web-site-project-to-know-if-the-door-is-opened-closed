

byte mac[] = { 0x00, 0xAA, 0xBB, 0xCC, 0xDE, 0x01 }; // RESERVED MAC ADDRESS


#define DHTPIN 2 // SENSOR PIN
#define DHTTYPE DHT11 // SENSOR TYPE - THE ADAFRUIT LIBRARY OFFERS SUPPORT FOR MORE MODELS
//DHT dht(DHTPIN, DHTTYPE);

////************** VALUES **************
long previousMillis = 0;
unsigned long currentMillis = 0;
long interval = 250000; // READING INTERVAL

int soundPin = A0;

int pro = 0;	// PROXIMITY VAL
int mag = 0;  // MAGNETIC VAL
int mic = 0;  // MICROPHONE VAL
String data = "";

int proLast = 0;  // LAST PROXIMITY VAL
int magLast = 0;  // LAST MAGNETO VAL

//***************************************************************************************

void setup() { 
	//Serial.begin(115200);
  // Open serial communications and wait for port to open:
  Serial.begin(9600);
  while (!Serial) {
    ; // wait for serial port to connect. Needed for native USB port only
  }

//	dht.begin(); 
	delay(10000); // GIVE THE SENSOR SOME TIME TO START
  Serial.println("connecting...");

    //pro = (int) 0; //Reas values
    //mag = (int) 0; //Read values
    //mic = (int) 0; //Read values
    

  //int value = analogRead(soundPin); // A revisar

	//data = "";
}

//***************************************************************************************

void loop(){

delay(10000);
     doPost(0, String (62));
delay(2500);
     doPost(0, String (788));
delay(3500);
     doPost(1, String (695));
delay(200);
     doPost(1, String (723));
delay(1500);
     doPost(2, String (627));

  delay(50000);
}

//***************************************************************************************
void doPost(int sensor, String val){
      //val = "val =" + val; //val=15 to post the variable to the server.
      //val = val + "&mac =" + getMAC(); //Add the mac adress to the String "val".
  
      Serial.println("Go to connect!!");
      //if (client.connect("www.carvlos.netai.net",80)) { // MY SERVER ADDRESS
      delay(3000);
                Serial.println("client.connect(www.carvlos.netai.net,80)");
                
 //Type of sensor to send data where 0 = pro ; 1 = mag ; mic = 2.
          if (sensor == 0){
            //client.println("POST /addPro.php HTTP/1.1");
            Serial.println("POST /addPro.php HTTP/1.1");
          }
          if (sensor == 1){
            //client.println("POST /addMag.php HTTP/1.1");
            Serial.println("POST /addMag.php HTTP/1.1");
          }
          if (sensor == 2){
            //client.println("POST /addMic.php HTTP/1.1");
            Serial.println("POST /addMic.php HTTP/1.1");
          }
          delay(2000);
//Continue with the connection to server
          //client.println("Host: carvlos.netai.net"); // SERVER ADDRESS HERE TOO
                Serial.println("Host: carvlos.netai.net");
                delay(900);
          //client.println("Content-Type: application/x-www-form-urlencoded"); 
                Serial.println("Content-Type: application/x-www-form-urlencoded");
                delay(500);
          //client.print("Content-Length: ");
                Serial.println("Content-Length: ");
                delay(300);
          //client.println(val.length());
                Serial.println("val.length()");
                delay(300);
          //client.println();
          //client.print("val =" + val);
                Serial.println("client.print(val)");
                

                delay(500);
      //if (client.connected()) { 
        Serial.println("client.stop();");  // DISCONNECT FROM THE SERVER
        Serial.println("");
                Serial.println("***********************************************");
                Serial.println("");
      //}
      }

//***************************************************************************************

String getMAC(){

  String macAdress = "";
  macAdress = macAdress + mac[5],HEX;
  macAdress = macAdress + ":" + mac[4],HEX;
  macAdress = macAdress + ":" + mac[3],HEX;
  macAdress = macAdress + ":" + mac[2],HEX;
  macAdress = macAdress + ":" + mac[1],HEX;
  macAdress = macAdress + ":" + mac[0],HEX;

  Serial.println("MAC: " + macAdress);
  
  /*Serial.print("MAC: ");
  Serial.print(mac[5],HEX);
  Serial.print(":");
  Serial.print(mac[4],HEX);
  Serial.print(":");
  Serial.print(mac[3],HEX);
  Serial.print(":");
  Serial.print(mac[2],HEX);
  Serial.print(":");
  Serial.print(mac[1],HEX);
  Serial.print(":");
  Serial.println(mac[0],HEX);*/

   //FROM INTERNET
  //String thisString = String(13, HEX);
  return String( macAdress );
}


void beep (){
  analogWrite(9, 20);      // Almost any value can be used except 0 and 255
  delay(50);          // wait for a delayms ms
  analogWrite(9, 0);       // 0 turns it off
  delay(50);          // wait for a delayms ms
  analogWrite(9, 20);
  delay(50);
  analogWrite(9, 0);
  delay(50);
  analogWrite(9, 20);
  delay(50);
  analogWrite(9, 0);
  delay(50);

  delay(1000);
  
  analogWrite(9, 20);
  delay(200);
  analogWrite(9, 0);
  delay(200);
  analogWrite(9, 20);
  delay(200);
  analogWrite(9, 0);
  delay(200);
  analogWrite(9, 20);
  delay(200);
  analogWrite(9, 0);
  delay(200);
  analogWrite(9, 20);
  delay(200);
  analogWrite(9, 0);
  delay(200);
  analogWrite(9, 20);
  delay(200);
  analogWrite(9, 0);
  delay(200);
  analogWrite(9, 20);
  delay(200);
  analogWrite(9, 0);
  delay(200);
  analogWrite(9, 20);
  delay(200);
  analogWrite(9, 0);
  delay(200);
  analogWrite(9, 20);
  delay(200);
  analogWrite(9, 0);
  delay(200);
  analogWrite(9, 20);
  delay(200);
  analogWrite(9, 0);
  delay(200);
  analogWrite(9, 20);
  delay(200);
  analogWrite(9, 0);
  delay(200);
}




/*
FUNCION PARA OBTENER LA FECHA EN MODO TEXTO
Devuelve: DD-MM-AAAA HH:MM:SS
*//*
String dimeFecha()
  {
  char fecha[20];
  DateTime now = RTC.now(); //Obtener fecha y hora actual.
        
  int dia = now.day();
  int mes = now.month();
  int anio = now.year();
  int hora = now.hour();
  int minuto = now.minute();
  int segundo = now.second();
        
  sprintf( fecha, "%.2d.%.2d.%.4d %.2d:%.2d:%.2d", dia, mes, anio, hora, minuto, segundo);
  return String( fecha );
  }
*/

