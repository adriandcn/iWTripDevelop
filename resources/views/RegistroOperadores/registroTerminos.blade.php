@extends('front.masterPageServicios')

@section('step1')

<div style='display:none'>
    <img src="{!! asset('public/img/x.png')!!}" alt='' />
</div>
<style>
    #simplemodal-container a.modalCloseImg {
        background:url("{!! asset('public/img/x.png')!!}") no-repeat;
        width:25px; height:29px; display:inline; z-index:1200; position:absolute; top:-15px; right:-16px; cursor:pointer;}
</style>
<div id="basic-modal-content" class="cls loadModal"></div>

<div class="rowerror">
</div>

<div class="row-step4">
    <div id="title-box-header">
        <div id="title-box-type" style="cursor:pointer;"onclick="window.location.href = '{!!asset('/servicios')!!}'">
            
          <?php
                  $prefix="";
        $operadorName="";

          switch (session('tip_oper')) {
    case 1:
        $prefix="Soy un ";
        $operadorName="Negocio";
        break;
    case 2:
        $prefix="Soy una ";
        $operadorName="Agencia";
        break;
    case 3:
        $prefix="Soy solo";
        $operadorName="Yo";
        break;
    
}
?>
           
            <h2 class="head-title">
    {!!$prefix!!}             <strong>{!!$operadorName!!}</strong>
            </h2>
        </div>
        <div id="description-box-type">
            Términos y condiciones de uso
        </div>
    </div>
    <div id="space"></div>
     <div id="title-box-header-navigation">
        
           <h2 class="head-title-navigation">
   <a class="button-step4" onclick="window.location.href = '{!!asset('/servicios')!!}'"> 
       <strong><img src="{!! asset('public/img/flecha-1.png')!!}" height="15px" width="15px" /> Paso 1 </strong></a>
               
            </h2>
    </div>
    
    
    
    <div id="space"></div>
    {!! Form::open(['url' => route('upload-postoperador'),  'id'=>'registro_step1']) !!}

    <div class="wrapper uwa-font-aa">
        <div class="form-group-step2">
            <p style="text-align: center;"><span style="font-size:16px;">T&eacute;rminos y condiciones</span></p>
<p>Los t&eacute;rminos y condiciones aplican a todos los servicios directos (a trav&eacute;s de IguanaTrip) o indirectos (a trav&eacute;s de los distribuidores) disponibles online, a trav&eacute;s de cualquier dispositivo m&oacute;vil, por correo electr&oacute;nico o por tel&eacute;fono. Al acceder, navegar y utilizar nuestro sitio web o cualquiera de nuestras aplicaciones disponibles a trav&eacute;s de plataformas online y/o realizar una reserva, aceptas haber le&iacute;do, entendido y estar de acuerdo con los t&eacute;rminos y condiciones que se muestran a continuaci&oacute;n (incluyendo el fragmento referente a la privacidad).</p>
<p>&nbsp;</p>
<p>Estas p&aacute;ginas, su contenido, estructura, infraestructura y el servicio de reservas de tours online que proporcionan a trav&eacute;s de este sitio web (el &ldquo;servicio&rdquo;) pertenecen y son gestionadas y suministradas por IguanaTrip (&quot;iguanatrip.com&quot;, &quot;nos&quot;, &quot;nosotros&rdquo; o &quot;nuestro&quot;). Solo pueden ser utilizadas con fines personales y no comerciales, conforme a los t&eacute;rminos y condiciones especificados a continuaci&oacute;n.</p>
<p>&nbsp;</p>
<p style="margin-left:10.9pt;"><strong><img height="1" src="file:///C:/Users/Adrian/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png" width="1" /></strong><strong>1. &Aacute;mbito de nuestro servicio</strong></p>
<p>&nbsp;</p>
<p>A trav&eacute;s de este sitio web, nosotros (IguanaTrip &nbsp;y sus afiliados) proporcionamos una plataforma online por medio de la cual todos los tipos de tours (por ejemplo, daytrips, weektours, adventure trips, etc&hellip;&hellip;) ofertan sus giras tur&iacute;sticas/no tur&iacute;sticas y los usuarios de la p&aacute;gina web pueden realizar reservas. Al llevar a cabo una reserva mediante IguanTrip.com, estableces una relaci&oacute;n contractual directa (legalmente vinculante) con el establecimiento en el que has reservado. Desde el momento en que realizas tu reserva, nosotros actuamos &uacute;nicamente como intermediarios entre t&uacute; y el establecimiento, trasmitiendo los datos de la reserva al establecimiento y envi&aacute;ndote un correo electr&oacute;nico de confirmaci&oacute;n en representaci&oacute;n del establecimiento.</p>
<p>&nbsp;</p>
<p>La informaci&oacute;n que mostramos est&aacute; basada en la informaci&oacute;n que nos proporcionan los establecimientos. Los establecimientos tienen acceso a una extranet mediante la cual se hacen totalmente responsables de actualizar las tarifas, la disponibilidad y los otros datos que aparecen en nuestro sitio web. Aunque intentamos que nuestro servicio sea lo m&aacute;s preciso posible, no podemos verificar ni garantizar que toda la informaci&oacute;n sea exacta, completa o correcta. Tampoco nos hacemos responsables de errores (como errores manifiestos y tipogr&aacute;ficos), interrupciones (debido a ca&iacute;das temporales y/o parciales del servidor o a reparaciones, actualizaciones y mantenimiento de nuestro sitio web u otros motivos), informaci&oacute;n imprecisa, enga&ntilde;osa o falsa, o falta de informaci&oacute;n. El establecimiento es responsable en todo momento de la precisi&oacute;n, la exactitud y la correcci&oacute;n de la informaci&oacute;n (tanto descriptiva como referente a tarifas y disponibilidad) que aparece en nuestro sitio web. Nuestro sitio web no constituye ni debe ser visto como una recomendaci&oacute;n o promoci&oacute;n de la calidad, el nivel de servicio, la calificaci&oacute;n o clasificaci&oacute;n (por estrellas) de cualquier establecimiento disponible.</p>
<p>&nbsp;</p>
<p>Nuestros servicios son &uacute;nicamente para uso personal y no comercial. Por lo tanto, no est&aacute; permitido revender, realizar deep-links, utilizar, copiar, monitorizar (por ejemplo, spider, scrape), mostrar, bajar o reproducir el contenido, la informaci&oacute;n, el software, los productos o los servicios disponibles en nuestro sitio web para cualquier actividad comercial o competitiva.</p>
<p>&nbsp;</p>
<p style="margin-left:10.9pt;"><strong><img height="1" src="file:///C:/Users/Adrian/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png" width="1" /></strong><strong>2. Precios, tarifas tachadas y precio m&iacute;nimo garantizado</strong></p>
<p>&nbsp;</p>
<p>Los precios que aparecen en nuestro sitio web son muy competitivos. Todos los precios del sitio web de IguanaTrip.com son por excursi&oacute;n completa, y se muestran con IVA y otros impuestos incluidos (sujetos a cambio de dichos impuestos), a no ser que se indique de otra forma en nuestro sitio web o en el correo electr&oacute;nico de confirmaci&oacute;n.</p>
<p>&nbsp;</p>
<p>En ocasiones, en nuestro sitio web hay una tarifa m&aacute;s barata que otra para un servicio espec&iacute;fico de expedici&oacute;n. Estas tarifas creadas por los operadores pueden tener restricciones y condiciones especiales, por ejemplo, restricciones en la cancelaci&oacute;n y el reembolso. Consulta los datos del tour y la tarifa minuciosamente para conocer las condiciones antes de realizar la reserva.</p>
<p>&nbsp;</p>
<p>Para asegurarnos de realizar una comparaci&oacute;n justa, siempre usaremos las mismas condiciones de reserva (r&eacute;gimen de comidas, condiciones de cancelaci&oacute;n y tipo de tour). Esto quiere decir que consigues la misma expedici&oacute;n por un precio m&aacute;s bajo en comparaci&oacute;n con otras fechas de entrada en el mismo periodo del a&ntilde;o.</p>
<p>&nbsp;</p>
<p>El cambio de monedas s&oacute;lo tiene valor informativo. No muestra una cantidad precisa ni actualizada, puesto que los tipos de cambio pueden variar.</p>
<p>&nbsp;</p>
<p>Los errores evidentes (erratas incluidas) no son vinculantes.</p>
<p>Todas las ofertas especiales y promociones est&aacute;n marcadas como tal.</p>
<p>&nbsp;</p>
<p style="margin-left:10.9pt;"><strong><img height="1" src="file:///C:/Users/Adrian/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png" width="1" /></strong><strong>3. Privacidad y cookies</strong></p>
<p>IguanTrip.com respeta tu privacidad. Consulta nuestra pol&iacute;tica de privacidad y cookies para obtener m&aacute;s informaci&oacute;n.</p>
<p>&nbsp;</p>
<p style="margin-left:10.9pt;"><strong><img height="1" src="file:///C:/Users/Adrian/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png" width="1" /></strong><strong>4. Servicio gratuito</strong></p>
<p>Nuestro servicio es gratuito porque, a diferencia de otros, no cobramos por nuestro servicio ni a&ntilde;adimos suplementos (de reserva) al precio de las excursiones.</p>
<p>Los operadores del servicio pagan una comisi&oacute;n (un porcentaje peque&ntilde;o del precio del tour) a IguanaTrip.com despu&eacute;s de que el cliente asistido (y haya pagado) el servicio.</p>
<p>&nbsp;</p>
<p style="margin-left:10.9pt;"><strong><img height="1" src="file:///C:/Users/Adrian/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png" width="1" /></strong><strong>5. Tarjeta de cr&eacute;dito o transferencia bancaria</strong></p>
<p>En algunos casos, hay operadores que ofrecen la posibilidad de pagar las reservas (en su totalidad o de forma parcial, seg&uacute;n las condiciones de pago del operador) al operador durante el proceso de reserva mediante un sistema de pago seguro online (siempre que tu banco lo ofrezca y lo soporte). El pago se procesa de forma segura directamente desde tu tarjeta de cr&eacute;dito/d&eacute;bito o desde tu cuenta a la cuenta del establecimiento mediante un procesador de pago externo.</p>
<p>&nbsp;</p>
<p>En el caso de algunas tarifas (no reembolsables) u ofertas especiales, el operador puede requerir que el pago se realice por adelantado mediante transferencia bancaria (si est&aacute; disponible) o mediante tarjeta de cr&eacute;dito. En ese caso, tu tarjeta de cr&eacute;dito puede ser pre-autorizada o se le puede realizar alg&uacute;n cargo (a veces sin opci&oacute;n a reembolso) una vez hecha la reserva. Por favor, consulta minuciosamente la informaci&oacute;n del servicio para conocer las condiciones especiales antes de realizar la reserva.</p>
<p>&nbsp;</p>
<p>En caso de fraude o uso no autorizado de la tarjeta de cr&eacute;dito por parte de terceros, la mayor&iacute;a de bancos y empresas emisoras de tarjetas de cr&eacute;dito cubren todos los gastos resultantes de dicho fraude o mal uso, que en ocasiones puede estar sujeto a una cantidad deducible (normalmente de 50 EUR o el equivalente en la moneda local). En caso de que la empresa emisora de la tarjeta de cr&eacute;dito o el banco te cargue a ti dicha cantidad deducible debido a transacciones no autorizadas resultantes de una reserva realizada en nuestro sitio web, te abonaremos dicha cantidad (hasta un m&aacute;ximo de 50 EUR o el equivalente en la moneda local). Para poder indemnizarte, informa de este fraude a la empresa emisora de tu tarjeta de cr&eacute;dito (seg&uacute;n sus normas y procedimientos de informaci&oacute;n) y ponte en contacto con nosotros inmediatamente por correo electr&oacute;nico (customer.relations@iguanatrip.com). En el asunto del correo, escribe &ldquo;fraude tarjeta de cr&eacute;dito&rdquo; y facil&iacute;tanos pruebas del cargo de la cantidad deducible (p.ej: pol&iacute;tica de la empresa emisora de la tarjeta de cr&eacute;dito). Esta indemnizaci&oacute;n se aplica a las reservas realizadas mediante tarjeta de cr&eacute;dito utilizando el servidor seguro de IguanaTrip.com y al uso no autorizado de tu tarjeta de cr&eacute;dito en el servidor seguro, por falta o negligencia nuestra, del cual t&uacute; no seas responsable.</p>
<p>&nbsp;</p>
<p style="margin-left:10.9pt;"><strong><img height="1" src="file:///C:/Users/Adrian/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png" width="1" /></strong><strong>6. Cancelaci&oacute;n</strong></p>
<p>Al realizar una reserva a un operador, aceptas sus condiciones de cancelaci&oacute;n y no asistencia (no show), as&iacute; como otros t&eacute;rminos y condiciones adicionales (entrega) del operador que puedan afectar a tu reserva o tu excursi&oacute;n. Aqu&iacute; se incluyen los servicios y/o productos ofertados por el operador (consulta los t&eacute;rminos y condiciones de entrega directamente en el operador del servicio). Las condiciones generales de cancelaci&oacute;n y no asistencia de cada operador est&aacute;n a tu disposici&oacute;n en nuestro sitio web, tanto en las p&aacute;ginas de informaci&oacute;n del establecimiento como durante el proceso de reserva y en el e-mail de confirmaci&oacute;n. Ten en cuenta que algunas tarifas u ofertas especiales no permiten cambios ni cancelaciones. Consulta los datos de cada servicio para ver las condiciones antes de realizar la reserva. Ten en cuenta que una reserva que requiera el pago de un dep&oacute;sito o el pago por adelantado (total o parcial) puede ser cancelada (sin necesidad de aviso previo) en el momento en el que (el resto de) las cantidades pendientes de pago no puedan ser cobradas en su totalidad en la fecha pertinente, de acuerdo con las condiciones de pago del establecimiento y las condiciones de la reserva. Los retrasos en el pago, los datos bancarios err&oacute;neos, los datos de las tarjetas de cr&eacute;dito o d&eacute;bito, las tarjetas de cr&eacute;dito o d&eacute;bito no v&aacute;lidas o con saldo insuficiente son de tu responsabilidad y podr&iacute;as no beneficiarte de la devoluci&oacute;n o reembolso del pago por adelantado (en servicios no reembolsables) si se diera alguno de estos casos, a menos que el establecimiento as&iacute; lo acepte o permita en sus condiciones de cancelaci&oacute;n y pago por adelantado.</p>
<p>&nbsp;</p>
<p>Si deseas revisar, modificar o cancelar tu reserva, consulta el e-mail de confirmaci&oacute;n y sigue las instrucciones indicadas. Ten en cuenta que se podr&aacute;n aplicar suplementos por cancelaci&oacute;n conforme a las condiciones de cancelaci&oacute;n, pago (por adelantado) y no show (si no te presentas) del establecimiento o que podr&iacute;as no beneficiarte de la devoluci&oacute;n de la cantidad pagada (por adelantado). Te recomendamos que leas dichas condiciones con detenimiento antes de realizar la reserva y que recuerdes hacer los pagos posteriores a tiempo ya que pueden ser necesarios para la reserva.</p>
<p>&nbsp;</p>
<p style="margin-left:10.9pt;"><strong><img height="1" src="file:///C:/Users/Adrian/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png" width="1" /></strong><strong>7. Correspondencia adicional</strong></p>
<p>Al hacer una reserva, aceptas recibir (i) un e-mail, que podemos enviarte poco antes de tu fecha de llegada, donde encontrar&aacute;s informaci&oacute;n sobre el destino y otros datos y ofertas (entre ellas ofertas de terceros, siempre y cuando hayas aceptado recibirlas), que sean relevantes para tu reserva y destino. Tambi&eacute;n aceptas recibir (ii) un e-mail, que podemos enviarte despu&eacute;s de tu estancia en el establecimiento, invit&aacute;ndote a completar un formulario de opini&oacute;n. Consulta nuestra pol&iacute;tica de privacidad y cookies para m&aacute;s informaci&oacute;n acerca de c&oacute;mo podemos ponernos en contacto contigo.</p>
<p>&nbsp;</p>
<p style="margin-left:10.9pt;"><strong><img height="1" src="file:///C:/Users/Adrian/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png" width="1" /></strong><strong>8.&nbsp;Ranking, estrellas y comentarios</strong></p>
<p>La clasificaci&oacute;n de los operadores que aparece por defecto en nuestro sitio web es por Recomendados (o similares) y lo llamamos &quot;ranking por defecto&quot;. Tambi&eacute;n ofrecemos otras formas de clasificar los establecimientos. El ranking por defecto se crea a trav&eacute;s de un sistema autom&aacute;tico de clasificaci&oacute;n (algoritmo) y se basa en diversos criterios.</p>
<p>Los comentarios pueden (a) visualizarse en la p&aacute;gina de informaci&oacute;n del establecimiento en nuestro sitio web con el fin de compartir tu opini&oacute;n sobre el nivel del servicio y la calidad del servicio con (futuros) clientes. IguanaTrip.com tambi&eacute;n los puede (b) utilizar (de forma parcial o completa) seg&uacute;n su criterio (ej. para marketing, promoci&oacute;n o mejora del servicio) en nuestro sitio web o en plataformas sociales, newsletters, ofertas especiales, aplicaciones u otros canales utilizados o que sean propiedad de IguanaTrip.com. Nos reservamos el derecho de adaptar, rechazar o eliminar los comentarios que creamos oportunos. Los comentarios tienen la consideraci&oacute;n de una encuesta y no incluyen ofertas comerciales, invitaciones ni incentivos de ning&uacute;n tipo.</p>
<p>&nbsp;</p>
<p style="margin-left:10.9pt;"><strong><img height="1" src="file:///C:/Users/Adrian/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png" width="1" /></strong><strong>9. Exenci&oacute;n de responsabilidad</strong></p>
<p>Conforme a las limitaciones indicadas en estos t&eacute;rminos y condiciones, y en la medida que est&eacute; permitido por la ley, solo nos hacemos responsables de los da&ntilde;os directos que sufras, pagues o contraigas a causa de defectos atribuibles a nuestras obligaciones en referencia a nuestros servicios, hasta una cantidad total del coste total de tu reserva, como se indica en el correo electr&oacute;nico de confirmaci&oacute;n (ya sea por un suceso o por una serie de sucesos).</p>
<p>Sin embargo, y en la medida en que est&eacute; permitido por la ley, ni nosotros ni ninguno de nuestros directores, empleados, representantes, subsidiarios, empresas afiliadas, distribuidores, afiliados, licenciatarios, apoderados u otras personas involucradas en el proceso de creaci&oacute;n, patrocinio y promoci&oacute;n del sitio web y sus contenidos ser&aacute; responsable de: (i) p&eacute;rdidas o da&ntilde;os punitivos, especiales, indirectos o consecuentes, p&eacute;rdidas de producci&oacute;n, de beneficios, ingresos, contratos, as&iacute; como de p&eacute;rdidas o da&ntilde;os de clientes o de reputaci&oacute;n y p&eacute;rdidas de demandas; (ii) errores relacionados con la descripci&oacute;n de la informaci&oacute;n (incluida la informaci&oacute;n sobre precios, disponibilidad y clasificaciones) del operador en nuestro sitio web; (iii) servicios prestados o productos ofertados por el operador u otros socios de negocio; (iv) p&eacute;rdidas, da&ntilde;os o costes (directos, indirectos, consecuentes o punitivos) que sufras, contraigas o pagues, surgidos o relativos al uso, indisponibilidad o retraso de nuestro sitio web; o (v) cualquier tipo de perjuicio (personal), muerte, da&ntilde;o de la propiedad u otros da&ntilde;os, p&eacute;rdidas y gastos (directos o indirectos, consecuentes o punitivos) que sufras, contraigas o pagues, ya sea a causa de actos (legales), errores, infracciones, negligencias (evidentes), mala conducta profesional deliberada, omisiones, incumplimientos, representaci&oacute;n err&oacute;nea, responsabilidad extracontractual objetiva o (completa o parcialmente) atribuible al operador o a otros socios de negocio (incluyendo cualquiera de sus empleados, directores, personal, apoderados, representantes o empresas afiliadas) cuyos productos o servicios (directa o indirectamente) est&eacute;n disponibles, se oferten o promocionen en o a trav&eacute;s de nuestra p&aacute;gina web, incluyendo cualquier cancelaci&oacute;n (parcial), overbooking, huelga, fuerza mayor u otro acto que escape a nuestro control.</p>
<p>&nbsp;</p>
<p>Tanto si el operador del tour te cobra (o te ha cobrado) por su servicio como si nosotros facilitamos el pago del precio del paquete, aceptas que el operador es, a todos los efectos, el responsable de la recogida, retenci&oacute;n, env&iacute;o y pago de los impuestos aplicables sobre el precio total del servicio a las autoridades fiscales pertinentes. IguanaTrip.com no es responsable del env&iacute;o, recogida, retenci&oacute;n o pago de los impuestos sobre el precio total de la habitaci&oacute;n a las autoridades fiscales pertinentes.</p>
<p>&nbsp;</p>
<p>Al subir fotos u otras im&aacute;genes a nuestro sistema (por ejemplo, al enviar un comentario) certificas, garantizas y confirmas que est&aacute;s en posesi&oacute;n del copyright de la foto/imagen y que est&aacute;s de acuerdo con que IguanaTrip.com utilice dicha foto o imagen en sus webs (m&oacute;viles), apps y materiales promocionales (online y offline), as&iacute; como en cualquier publicaci&oacute;n que IguanaTrip.com considere apropiada. Est&aacute;s garantizando a IguanaTrip.com un derecho no-exclusivo, universal, irrevocable, incondicional y permanente, as&iacute; como la licencia para utilizar, reproducir, mostrar, hacer reproducir, distribuir, sublicenciar, comunicar y facilitar las fotos/im&aacute;genes en la forma que IguanaTrip.com considere apropiada. Al subir estas fotos/im&aacute;genes, la persona que las sube acepta la responsabilidad legal y moral sobre todas y cada una de las reclamaciones legales realizadas por un tercero (incluyendo, pero no limit&aacute;ndose a, los propietarios de los operadores) a ra&iacute;z del uso y publicaci&oacute;n de las fotos/im&aacute;genes por parte de IguanaTrip.com. IguanaTrip.com no posee ni avala de forma alguna las fotos/im&aacute;genes que se suben. La veracidad, validez y derecho de uso de todas las fotos/im&aacute;genes la asumir&aacute; la persona que ha subido la foto, y nunca ser&aacute; responsabilidad de IguanaTrip.com. IguanaTrip.com niega cualquier responsabilidad u obligaci&oacute;n sobre las fotograf&iacute;as publicadas. La persona que ha subido las fotos garantiza que las fotos/im&aacute;genes no contienen ning&uacute;n virus, troyano o archivos infectados, as&iacute; como ning&uacute;n material pornogr&aacute;fico, ilegal, obsceno, ofensivo, censurable o inapropiado, y que no infringe los derechos (de propiedad intelectual, de copyright o de privacidad) de terceros. Cualquier foto/imagen que no cumpla con los requisitos mencionados no ser&aacute; publicada y/o puede ser eliminada por IguanaTrip.com en cualquier momento y sin previo aviso.</p>
<p>&nbsp;</p>
<p style="margin-left:10.9pt;"><strong><img height="1" src="file:///C:/Users/Adrian/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png" width="1" /></strong><strong>10. Derechos de propiedad intelectual</strong></p>
<p>Si no se indica lo contrario, el software necesario para nuestros servicios o utilizado en nuestro sitio web y los derechos de propiedad intelectual (incluidos los copyrights) de los contenidos y la informaci&oacute;n, as&iacute; como el material de nuestro sitio web pertenecen a IguanaTrip.com, sus proveedores o distribuidores.</p>
<p>IguanTrip.com se reserva exclusivamente la propiedad de todos los derechos, t&iacute;tulo e inter&eacute;s en (todos los derechos de propiedad intelectual de) (la apariencia (incluyendo la infraestructura) de) la p&aacute;gina web donde el servicio tiene disponibilidad (incluyendo los comentarios de los clientes y el contenido traducido), y no tienes derecho a copiar, recopilar, enlazar a, publicar, promocionar, vender, integrar, utilizar, combinar o utilizar el contenido (incluidas las traducciones y los comentarios de los clientes) o nuestra marca sin un permiso por escrito nuestro. En la medida que quieras usar (completamente o parcialmente) nuestro contenido (traducido) (incluyendo los comentarios de los clientes) o seas propietario de cualquier derecho de propiedad intelectual de la p&aacute;gina web o cualquier contenido (traducido) o comentarios de los clientes, por la presente, transfieres y cedes todos los derechos de propiedad intelectual a IguanTrip.com. Cualquier tipo de uso indebido o cualquier tipo de acci&oacute;n o comportamiento anteriormente mencionado constituir&aacute; una infracci&oacute;n de nuestros derechos de propiedad intelectual (incluyendo el copyright y el derecho de base de datos).</p>
<p>&nbsp;</p>
<p style="margin-left:10.9pt;"><strong><img height="1" src="file:///C:/Users/Adrian/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png" width="1" /></strong><strong>11. Miscel&aacute;nea</strong></p>
<p>En la medida en que lo permita la ley, estos t&eacute;rminos y condiciones y la prestaci&oacute;n de nuestros servicios se regir&aacute;n e interpretar&aacute;n de acuerdo a la legislaci&oacute;n ecuatoriana, y cualquier controversia que surja por estos t&eacute;rminos y condiciones generales o por nuestros servicios se presentar&aacute; &uacute;nicamente ante los tribunales competentes de &Aacute;msterdam, en los Pa&iacute;ses Bajos.</p>
<p>&nbsp;</p>
<p>La versi&oacute;n original en espanol de estos t&eacute;rminos y condiciones ha sido traducida a otros idiomas. La versi&oacute;n traducida es una traducci&oacute;n de cortes&iacute;a y no oficial, por lo tanto no se pueden extraer derechos de la traducci&oacute;n. En caso de disputa sobre el contenido o la interpretaci&oacute;n de los t&eacute;rminos y condiciones, as&iacute; como en el supuesto de conflictos, contradicciones o discrepancias entre la versi&oacute;n en espa&ntilde;ol y el resto de versiones en otros idiomas, la versi&oacute;n en espa&ntilde;ol de estos t&eacute;rminos prevalece y es concluyente en la medida en que est&eacute; permitido por la ley. Podr&aacute;s consultar la versi&oacute;n en espa&ntilde;ol en nuestro sitio web (seleccionando el idioma) o pedirnos por escrito que te la enviemos.</p>
<p>Si alguna disposici&oacute;n de estos t&eacute;rminos y condiciones es o se convierte en inv&aacute;lida o no vinculante, seguir&aacute;s estando vinculado al resto de disposiciones mencionadas. Si esto ocurriese, la disposici&oacute;n no v&aacute;lida deber&aacute; cumplirse hasta el m&aacute;ximo permitido por la ley aplicable y, en la medida de lo posible, se aceptar&aacute; un efecto similar al de las disposiciones inv&aacute;lidas o no vinculantes, conforme al contenido y objeto de estos t&eacute;rminos y condiciones.</p>
<p>&nbsp;</p>
<p style="margin-left:10.9pt;"><strong><img height="1" src="file:///C:/Users/Adrian/AppData/Local/Temp/msohtmlclip1/01/clip_image001.png" width="1" /></strong><strong>12. Sobre IguanTrip.com. y las empresas filiales</strong></p>
<p>IguanTrip.com presta el servicio de reserva de tours online. Se trata de una sociedad privada de responsabilidad limitada constituida seg&uacute;n la legislaci&oacute;n de los Ecuador y con sede social en Quito.</p>
<p>&nbsp;</p>
<p>La sede de IguanTrip.com se encuentra en Quito, Ecuador, y cuenta con varios grupos de empresas afiliadas (las &quot;empresas filiales&quot;) en todo el mundo. Estas empresas filiales proporcionan &uacute;nicamente un apoyo interno a y en beneficio de IguanTrip.com. Algunas empresas filiales espec&iacute;ficas prestan servicios limitados de apoyo de atenci&oacute;n al cliente (solo por tel&eacute;fono). Las empresas filiales no cuentan con ninguna p&aacute;gina web (y de ninguna manera controlan, gestionan, mantienen ni son propietarias de la p&aacute;gina web). Las empresas filiales no tienen poder ni autoridad para prestar el servicio, representar a IguanTrip.com o firmar un contrato en su nombre. No tienes ninguna relaci&oacute;n (legal o contractual) con las empresas filiales. Las empresas filiales no operan y no est&aacute;n autorizadas para actuar como ning&uacute;n tipo de agente de proceso o servicio de IguanTrip.com. IguanTrip.com no acepta ni asume ning&uacute;n otro domicilio en ning&uacute;n lugar, ubicaci&oacute;n u oficina del mundo (tampoco en la oficina de sus empresas filiales), queno sea su domicilio social de Quito.</p>
<p>&nbsp;</p><p>&nbsp;</p>
<div align="center">

                    <a href="eng"><img src="{{ asset('public/img/index-logo.png')}}" width="270" height="258" alt="IguanaTrip" /></a> 
                </div>
        </div>

    </div>

    
                
</div>


@stop