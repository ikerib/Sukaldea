SUKALDEA
================================

Symfony 2.1.7 vs Sharepoint RSS
-------------------------------

### Azalpenak

Web zerbitzu hau erabiliz, Sharepoint-en dugun intraneteko datuak kontsumitzen dira, eguneroko menuarena ain zuzen.

Datuak CURL bidez irakurtzen dira, eta JSON bezala bueltatu.

### Instalazioa
    Repo hau deskargatu git clone bidez
    composer install
    Web serbitzaria konfiguratu
    app/config/config.yml fitxategian datu hauek sartu:
      parameters:
        myurl: "http://www.mysite.com/_layouts/listfeed.aspx?List=ListUUID"
        myuser: "DomainUser"
        mypass: "DomainPassword"

    Zerrendako UUID zenbakiak {} artean joan behar du.
    Zerrendako UUID zenbakia lortzeko, nahi duzun Sharepoint zerrendara jo, Akzioak -> RSS jarioa
    php app/console cache:clear --env=prod --no-debug

### Egitekoak:
    Soberan dauden zerbitzu/konponenteak ezabatu edo eta Silex-era pasatu.

    Kodea refaltorizatu edozein zerrenda UUID delarik ere erabil daiteken.


=====================================================================

### Descripción

Mediante este servicio web, se consumen datos de nuestra intranet en Sharepoint, el menu diario del comedor para ser más exactos.

Los datos se leen mediante CURL y son devueltos en JSON.

### Instalación
    Clonar este repositorio mediante git clone
    composer install
    Configurar servidor web
    en el fichero app/config/config.yml añadir lo siguiente:
      parameters:
        myurl: "http://www.mysite.com/_layouts/listfeed.aspx?List=ListUUID"
        myuser: "DomainUser"
        mypass: "DomainPassword"

    El UUID de la lista tiene que ir entre {}
    Para obtener el UUID de la lista, ir a la página deseada en Sharepoint y pulsar en Acciones -> Ver fuente RSS
    php app/console cache:clear --env=prod --no-debug

### A realizar:

    Quitar aquellos servicios/componentes que sobran o pasarlo a Silex.

    Refactoriraz el código para que sea posible usarlo con cualquier UUID de lista.


=====================================================================

### Description

Web service that consumes data from our Sharepoint intranet, the daily menu to be exact.

Data is reade by CURL and it returns JSON.

### Install
    Clone this repo with git clone
    composer install
    configure web server
    Add this info to app/config/confyg.yml
      myurl: "http://www.mysite.com/_layouts/listfeed.aspx?List=ListUUID"
        myuser: "DomainUser"
        mypass: "DomainPassword"

    The UUID into {}
    To obtain UUID go to the desired sharepoint list and click Action -> Get Source RSS
    php app/console cache:clear --env=prod --no-debug

### Todo:

    Remove unused components/services or port it to Silex.

    Refactor the code to be able to use any list UUID.