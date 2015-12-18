// VU METER

int soundPin = A0;

void setup() {
  // put your setup code here, to run once:
Serial.begin(9600); 
}

void loop() {
  // put your main code here, to run repeatedly:
int value = analogRead(soundPin);
 int topLED = 1 + abs(value) / 10;
 for (int i =0; i < topLED; i++)
 {
  //Serial.print("*");
 }
 if (value > 350){
   Serial.println();
   Serial.println(value); // print value for checking purposes
    //delay(3000);
 }
 delay(100);
}
