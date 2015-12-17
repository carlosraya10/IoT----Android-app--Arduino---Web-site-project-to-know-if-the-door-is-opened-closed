#include <SPI.h>
#include <Ethernet.h>

byte mac[] = { 0x00, 0xAA, 0xBB, 0xCC, 0xDE, 0x01 }; // RESERVED MAC ADDRESS
EthernetClient client;

#define DHTPIN 2 // SENSOR PIN
#define DHTTYPE DHT11 // SENSOR TYPE - THE ADAFRUIT LIBRARY OFFERS SUPPORT FOR MORE MODELS
//DHT dht(DHTPIN, DHTTYPE);

////************** VALUES **************
long previousMillis = 0;
unsigned long currentMillis = 0;
long interval = 250000; // READING INTERVAL

int soundPin = A0;

int pro = 0;  // PROXIMITY VAL
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

  if (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP"); 
  }

//  dht.begin(); 
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

  //Reset values
  data = "";

  currentMillis = millis();
  if(currentMillis - previousMillis > interval) { // READ ONLY ONCE PER INTERVAL
      previousMillis = currentMillis;
  
      //Read the values of the Infrared Proximity sensor
//1      pro = (int) analogRead(0); //Read values
   //Debe haber un rango menor o igual a 50 entre el valor mayor q arroja la puerta con
    //este valor ˅˅˅                     ˅˅
        if(pro > 400 &&  (proLast > (pro+50) || proLast < 70)    ||    pro < 70 &&  proLast > (pro+50))  //Range between -/+ 50
          {
            proLast = pro;
            Serial.println("pro =" + pro);
            doPost(0, String (pro)); //(sendor,value) SENSOR = Type of sensor where 0 = pro ; 1 = mag ; mic = 2.
          }
          
      //Read the values of the Magnetic Door Switch
//2      mag = (int) analogRead(1); //Read values
        if(mag == 694 or mag == 695 && magLast != 694 && magLast != 695 ) //If the value is 694 or 695 both pieces are together.
          {
            magLast = mag;
            Serial.println("mag =" + mag);
            doPost(1, String (mag)); //(sendor,value) SENSOR = Type of sensor where 0 = pro ; 1 = mag ; mic = 2.
          }else if(mag < 694 || mag > 695 && (magLast == 694 && magLast == 695)){
            magLast = mag;
            Serial.println("mag =" + mag);
            doPost(1, String (mag)); //(sendor,value) SENSOR = Type of sensor where 0 = pro ; 1 = mag ; mic = 2.
          }
    
      //Read the values of the microphone
//3        int mic = analogRead(soundPin); //Read values
        if (mic > 200){
          Serial.println("mic =" + mic);
          doPost(2, String (mic)); //(sendor,value) SENSOR = Type of sensor where 0 = pro ; 1 = mag ; mic = 2.
        }

  }

//test
doPost(0, String (1));
//doPost(1, String (695));
//doPost(2, String (1000));
  delay(10000);
  //delay(300000); // WAIT FIVE MINUTES BEFORE SENDING AGAIN WHERE 30,000 = 30s.

/*//To concatenate the values in only one variable
  Serial.println("data =" + data);
  data = data + "temp1 =" + pro;
  Serial.println("data =" + data);
  data = data + "&hum1 =" + mag;
  Serial.println("data =" + data);
  data = data + "&hum1 =" + mic;
  Serial.println("data =" + data);
  //data = "sound=" + value; //Micro value
  //data = "temp1=" + t + "&hum1=" + h; //ORIGINAL
*/
}

//***************************************************************************************
void doPost(int sensor, String val){
      val = "val=" + val; //val=15 to post the variable to the server.
      val = val + "&mac=" + getMAC(); //Add the mac adress to the String "val".
  
      Serial.println("Go to connect!!");
      if (client.connect("www.carvlos.netai.net",80)) { // MY SERVER ADDRESS
                Serial.println("client.connect(www.carvlos.netai.net,80)");
                
 //Type of sensor to send data where 0 = pro ; 1 = mag ; mic = 2.
          if (sensor == 0){
            client.println("POST /addPro.php HTTP/1.1");
            Serial.println("POST /addPro.php HTTP/1.1");
          }
          if (sensor == 1){
            client.println("POST /addMag.php HTTP/1.1");
            Serial.println("POST /addMag.php HTTP/1.1");
          }
          if (sensor == 2){
            client.println("POST /addMic.php HTTP/1.1");
            Serial.println("POST /addMic.php HTTP/1.1");
          }
//Continue with the connection to server
          client.println("Host: carvlos.netai.net"); // SERVER ADDRESS HERE TOO
                Serial.println("Host: carvlos.netai.net");
          client.println("Content-Type: application/x-www-form-urlencoded"); 
                Serial.println("Content-Type: application/x-www-form-urlencoded");
          client.print("Content-Length: ");
                Serial.println("Content-Length: ");
          client.println(val.length());
                Serial.println("val.length() = "+val.length());
          client.println();
          client.print(val);
          Serial.println("client.print(val)");
          Serial.println("VAL-->" + val);
                Serial.println("");
                Serial.println("***********************************************");
                Serial.println("");
      }
    
      if (client.connected()) { 
        client.stop();  // DISCONNECT FROM THE SERVER
      }
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

