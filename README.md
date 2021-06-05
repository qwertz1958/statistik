# warenwirtschaftNG

### Nutzung der Routen
##### Abfrage / Eingabe einer deutschsprachigen ISBN

***Es wird über die ISBN geprüft ob sich die Metadaten des Buches in unserem Datenbestand befinden.
Bei einer erfolgreichen Überprüfung wird das Buch in unseren Lagerbestand aufgenommen.
Bei einer negativen Überprüfung müssen die Metadaten des Buches in den Datenbestand eingepflegt werden bevor man das Buch in den Lagerbestand übergeben kann.***

    URL: localhost/praktikum/warenwirtschaftng/public/eingeben
    
    Pflichtfelder: ISBN, bereich, box, zustand

#### Einpflegen der Metadaten eines neuen Buches in den Datenbestand
***Die Metadaten werden mit den Informationen über ISBN, Titel und Verlag in den Datenbestand übergeben***

    URL: localhost/praktikum/warenwirtschaftng/public/einpflegen
    
    Pflichtfelder: ISBN, title, verlag

#### Kundensuche
***Es wird eine unscharfe Kundensuche durchgeführt und die Kundendaten sollen in einer Tabelle ausgegeben werden***

    URL: localhost/praktikum/warenwirtschaftng/public/kundensuche
    
    Pflichtfelder: last_name
