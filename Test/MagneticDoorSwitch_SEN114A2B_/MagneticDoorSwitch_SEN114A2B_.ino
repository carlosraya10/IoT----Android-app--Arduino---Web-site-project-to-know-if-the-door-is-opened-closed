/*
 * Rojo 3.3V
 * Amarillo GND
 * Blanco A0
 * 
 */

int dist;
void setup() {
  Serial.begin(9600);
}

void loop() {
  dist = analogRead(0);
  if(dist == 694 or dist == 695 ) //If the value is 694 or 695 both pieces are together.
    {
      Serial.println(dist);
    }else{
     //Serial.println();
    }
  delay(100);
}
