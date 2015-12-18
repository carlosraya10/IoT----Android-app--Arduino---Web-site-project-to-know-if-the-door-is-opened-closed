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
      Serial.println(dist);
  delay(300);
}
