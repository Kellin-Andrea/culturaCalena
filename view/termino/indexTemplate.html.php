<?php

use mvc\routing\routingClass as routing ?>
<?php
use mvc\view\viewClass as view ?>
<?php
use mvc\i18n\i18nClass as i18n ?>
<?php
use mvc\config\configClass as config ?>
<?php
use mvc\request\requestClass as request ?>
<?php
use mvc\session\sessionClass as session ?>


<header>
  <?php view::includePartial('homepage/menuPrincipal') ?>
</header>
<div class="spacer-big"></div>
<div class="container">
  <div class="row">

    <div class="col-md-6">
      <div class="panel widget widget_text panel-first-child" id="panel-7-3-0-0">	
        <div class="textwidget"></div>
      </div>
      <div class="panel panel-grid widget widget_black-studio-tinymce panel-last-child" id="panel">
        <h3 class="widget-title"><?php echo i18n::__('terms of use') ?></h3>
        <div class="textwidget">
          <p>El uso de la información contenida en este portal implica que cada usuario acepta las siguientes condiciones de uso:

            <p> 1. Generalidades.El portal Cultura Caleña ha publicado este portal con el objetivo de facilitar a los usuarios el acceso a la información relativa a la gestión adelantada en los proyectos y actividades.
            Los datos que aquí se suministran provienen de múltiples fuentes, los cuales están protegidos por la Ley. 
            E portal Cultura Caleña pone este material a disposición de los usuarios en forma individual, como licencia de usuario final, queda por lo tanto prohibida toda comercialización o usufructo de este derecho de acceso.</p>

            <p> 2. Se autoriza el uso de la información contenida en este portal, siempre y cuando se realice la cita textual. 
              Queda en cambio prohibida la copia o reproducción de los datos en cualquier medio electrónico (redes, bases de datos, cd rom, diskettes) que permita la disponibilidad de esta información a múltiples usuarios sin el previo visto bueno del portal Cultura Caleña por medio escrito.</p>

            <p> 3. Calidad de la información. Los datos y la información en general que aparecen en este portal se han introducido siguiendo estrictos procedimientos de control de calidad. No obstante, el portal Cultura Caleña no se responsabiliza por el uso e interpretación realizada por terceros.</p>

            <p> 4. Contenido. El material contenido en el portal consiste principalmente en información sobre la gestión adelantada por el portal Cultura Caleña, no aborda circunstancias específicas relativas a personas concretas.</p>

            <p> 5. Enlaces. El portal contiene enlaces a páginas externas sobre las cuales el portal Cultura Caleña no ejerce control alguno y respecto de las cuales no tiene responsabilidad. En este sentido, el contenido de tales enlaces será únicamente responsabilidad de las entidades respectivas.</p>

            <p> 6. Soporte técnico. Cualquier duda, inquietud o comentario sobre el contenido de este portal puede comunicarse con nosotros atravez de la informacion que se encuentra en contáctenos.</p>

            <p> 7. Esta licencia de uso se rige por la legislación colombiana, independientemente del entorno jurídico del usuario. Cualquier disputa que llegue a surgir en la interpretación de estos términos se resolverá bajo el amparo de la jurisprudencia colombiana.</p>         
            
            <p> Este documento fue actualizada el 15 de julio 2015</p>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="panel-grid" id="pg">
  <?php view::includePartial('homepage/relleno') ?>
</div>
<footer>
  <?php view::includePartial('homepage/footer') ?>
</footer>