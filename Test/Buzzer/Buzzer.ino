void setup()  { 
  // declare pin 9 to be an output:
  pinMode(7, OUTPUT);
} 

void loop()  { 
  beep(); 
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

