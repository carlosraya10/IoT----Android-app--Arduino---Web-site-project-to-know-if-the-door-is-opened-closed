/*
 * Rojo 3.3V
 * Amarillo GND
 * Blanco A0
 * Infrared Proximity Sensor
 */

int dist;
void setup() {
  Serial.begin(9600);
}

void loop() {
  dist = analogRead(0);
  if(dist > 400)
    {
      Serial.println(dist);
    }else{
     //Serial.println();
    }
  //Serial.println(analogRead(2));
  //Serial.println(analogRead(0));
  delay(150);
}
