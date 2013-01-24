SUKALDEA
================================

Symfony 2.1.7 vs Sharepoint RSS
-------------------------------

### Azalpenak

Web zerbitzu hau erabiliz, Sharepoint-en dugun intraneteko datuak kontsumitzen dira, eguneroko menuarena ain zuzen.

Datuak CURL bidez irakurtzen dira, eta JSON bezala bueltatu.

### Egitekoak:
    Soberan dauden zerbitzu/konponenteak ezabatu edo eta Silex-era pasatu.

    Kodea refaltorizatu edozein zerrenda UUID delarik ere erabil daiteken.


=====================================================================

### Descripción

Mediante este servicio web, se consumen datos de nuestra intranet en Sharepoint, el menu diario del comedor para ser más exactos.

Los datos se leen mediante CURL y son devueltos en JSON.


### A realizar:

    Quitar aquellos servicios/componentes que sobran o pasarlo a Silex.

    Refactoriraz el código para que sea posible usarlo con cualquier UUID de lista.


=====================================================================

### Description

Web service that consumes data from our Sharepoint intranet, the daily menu to be exact.

Data is reade by CURL and it returns JSON.


### Todo:

    Remove unused components/services or port it to Silex.

    Refactor the code to be able to use any list UUID.