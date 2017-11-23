@extends('front.masterPageServicios')

@section('step1')

{!! HTML::style('public/css/base/mobileBase.css') !!} 
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

  <!--[if !mso]><!--><style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Ubuntu:400,700,400italic,700italic);
</style><link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700,400italic,700italic" rel="stylesheet" type="text/css" /><!--<![endif]--><style type="text/css">
.wrapper h1{}.wrapper h1{font-family:Ubuntu,sans-serif}.mso .wrapper h1{font-family:sans-serif !important}.wrapper h2{}.wrapper h2{font-family:Ubuntu,sans-serif}.mso .wrapper h2{font-family:sans-serif !important}.wrapper h3{}.wrapper h3{font-family:Ubuntu,sans-serif}.mso .wrapper h3{font-family:sans-serif !important}.wrapper p,.wrapper ol,.wrapper ul,.wrapper .image{}.wrapper p,.wrapper ol,.wrapper ul,.wrapper .image{font-family:Ubuntu,sans-serif}.mso .wrapper p,.mso .wrapper ol,.mso .wrapper ul,.mso .wrapper .image{font-family:sans-serif !important}.wrapper .btn a{}.wrapper .btn a{font-family:Ubuntu,sans-serif}.mso .wrapper .btn a{font-family:sans-serif !important}.logo div{}.logo div{font-family:Ubuntu,sans-serif}.mso .logo div{font-family:sans-serif 
!important}.title,.webversion,.fblike,.tweet,.linkedinshare,.forwardtoafriend,.link,.address,.permission,.campaign{}.title,.webversion,.fblike,.tweet,.linkedinshare,.forwardtoafriend,.link,.address,.permission,.campaign{font-family:Ubuntu,sans-serif}.mso .title,.mso .webversion,.mso .fblike,.mso .tweet,.mso .linkedinshare,.mso .forwardtoafriend,.mso .link,.mso .address,.mso .permission,.mso .campaign{font-family:sans-serif !important}body,.wrapper,.emb-editor-canvas{}.mso body{background-color:#fff !important}.mso .header,.mso .footer,.mso .one-col-bg,.mso .two-col-bg,.mso .three-col-bg,.mso .one-col-feature-bg{}.hr hr{color:#fff;background-color:#fff}.border{background-color:#11171b}.wrapper h1{color:#80bfc4}.wrapper h2{color:#80bfc4}.wrapper h3{color:#80bfc4}.wrapper p,.wrapper ol,.wrapper ul{color:#e0dce0}.wrapper 
.image{color:#e0dce0}.wrapper a{color:#c5dee0}.wrapper a:hover{color:#a4cbce !important}.wrapper .btn a{background-color:#80bfc4;color:#1e1e1e}.wrapper .btn a:hover{color:#1e1e1e !important}.preheader{background-color:#11171b}.title,.webversion,.footer .inner td{color:#e6e6e6}.wrapper .title a,.wrapper .webversion a,.wrapper .footer a{font-weight:bold;color:#e6e6e6}.wrapper .title a:hover,.wrapper .webversion a:hover,.wrapper .footer a:hover{color:#fff !important}.logo div{color:#e6e6e6}.logo div a{color:#e6e6e6}.logo div a:hover{color:#e6e6e6 !important}.column-bg{background-color:#212a32}.extra-wide .big-feature{background-color:#212a32}.emb-editor-canvas{background-color:#11171b}.emb-editor-canvas .wrapper{}.fblike,.tweet,.linkedinshare,.forwardtoafriend{background-color:#0c1012}
</style>
<meta name="robots" content="noindex,nofollow" />
<meta property="og:title" content="IguanaTrip" />
</head>
<!--[if mso]>
  <body class="mso">
<![endif]-->
<!--[if !mso]><!-->
  <body class="full-padding" style="margin: 0;padding: 0;min-width: 100%;">
<!--<![endif]-->
    <center class="wrapper" style="display: table;table-layout: fixed;width: 100%;min-width: 620px;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;">
      
      <div class="spacer" style="font-size: 1px;line-height: 20px;width: 100%;">&nbsp;</div>
      <table class="header centered" style="border-collapse: collapse;border-spacing: 0;Margin-left: auto;Margin-right: auto;width: 100%;">
        <tbody><tr>
          <td style="padding: 0;vertical-align: top;">&nbsp;</td>
          
          <td><h1 style="font-style: normal;font-weight: 400;Margin-bottom: 16px;Margin-top: 32px;font-size: 30px;line-height: 40px;font-family: Ubuntu,sans-serif;color: #80bfc4;text-align: center;"><span style="color:#d49344">Tu servicio ha sido registrado con &#233;xito</span></h1></td>
          <td style="padding: 0;vertical-align: top;">&nbsp;</td>
        </tr>
      </tbody></table>
      
          <table class="one-col-feature-bg" style="border-collapse: collapse;border-spacing: 0;width: 100%;">
            <tbody><tr>
              <td style="padding: 0;vertical-align: top;" align="center">
                <table class="one-col-feature centered column-bg" style="border-collapse: collapse;border-spacing: 0;Margin-left: auto;Margin-right: auto;background-color: #212a32;table-layout: fixed;width: 600px;" emb-background-style>
                  <tbody><tr>
                    <td class="column" style="padding: 0;vertical-align: top;text-align: left;">
                      
            <div class="image" style="font-size: 12px;mso-line-height-rule: at-least;font-style: normal;font-weight: 400;Margin-bottom: 0;Margin-top: 0;font-family: Ubuntu,sans-serif;color: #e0dce0;" align="center">
              <img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top" style="border: 0;-ms-interpolation-mode: bicubic;display: block;max-width: 900px;" src="public/img/Quito.jpg" alt="" width="600" height="376" />
            </div>
          
                        
                        <table class="contents" style="border-collapse: collapse;border-spacing: 0;table-layout: fixed;width: 100%;">
                          <tbody><tr>
                            <td class="padded" style="padding: 0;vertical-align: top;padding-left: 32px;padding-right: 32px;word-break: break-word;word-wrap: break-word;">
                              
            
          
                            </td>
                          </tr>
                        </tbody></table>
                      
                        
                        <table class="contents" style="border-collapse: collapse;border-spacing: 0;table-layout: fixed;width: 100%;">
                          <tbody><tr>
                            <td class="padded" style="padding: 0;vertical-align: top;padding-left: 32px;padding-right: 32px;word-break: break-word;word-wrap: break-word;">
                              
            <p style="font-style: normal;font-weight: 400;Margin-bottom: 32px;Margin-top: 0;font-size: 14px;line-height: 22px;font-family: Ubuntu,sans-serif;color: #e0dce0;text-align: center;">Recuerda que puedes seguir ingresando tus servicios turisticos completamente gratis (hoteles, restaurantes, agencias de viaje, daytrips, transporte,etc).</p>
          
                            </td>
                          </tr>
                        </tbody></table>
                      
                        
                        <table class="contents" style="border-collapse: collapse;border-spacing: 0;table-layout: fixed;width: 100%;">
                          <tbody><tr>
                            <td class="padded" style="padding: 0;vertical-align: top;padding-left: 32px;padding-right: 32px;word-break: break-word;word-wrap: break-word;">
                              
            <div class="btn btn--center" style="Margin-bottom: 0;Margin-top: 0;text-align: center;">
              <![if !mso]><a style="border-radius: 3px;display: inline-block;font-size: 14px;font-weight: 700;line-height: 24px;padding: 13px 35px 12px 35px;text-align: center;text-decoration: none !important;transition: opacity 0.2s ease-in;color: #ffffff !important;font-family: Ubuntu,sans-serif;background-color: #e08619;" href="#" onclick="window.location.href = '/detalleServicios'">Ingresar otro servicio</a><![endif]>
            <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" href="http://google.com" style="width:214px" arcsize="7%" fillcolor="#E08619" stroke="f"><v:textbox style="mso-fit-shape-to-text:t" inset="0px,12px,0px,11px"><center style="font-size:14px;line-height:24px;color:#FFFFFF;font-family:sans-serif;font-weight:700;mso-line-height-rule:exactly;mso-text-raise:4px">Ingresar otro servicio</center></v:textbox></v:roundrect><![endif]--></div>
          
                            </td>
                          </tr>
                        </tbody></table>
                      
                      <div class="column-bottom" style="font-size: 32px;line-height: 32px;transition-timing-function: cubic-bezier(0, 0, 0.2, 1);transition-duration: 150ms;transition-property: all;">&nbsp;</div>
                    </td>
                  </tr>
                </tbody></table>
              </td>
            </tr>
          </tbody></table>
        
          <div class="separator" style="font-size: 20px;line-height: 20px;">&nbsp;</div>
        
          <table class="two-col-bg" style="border-collapse: collapse;border-spacing: 0;width: 100%;">
            <tbody><tr>
              <td style="padding: 0;vertical-align: top;" align="center">
                <table class="two-col centered" style="border-collapse: collapse;border-spacing: 0;Margin-left: auto;Margin-right: auto;width: 600px;table-layout: fixed;">
                  <tbody><tr>
                    <td class="column first" style="padding: 0;vertical-align: top;text-align: left;width: 290px;">
                      <table class="column-bg" style="border-collapse: collapse;border-spacing: 0;width: 100%;background-color: #212a32;" emb-background-style>
                        <tbody><tr>
                          <td style="padding: 0;vertical-align: top;">
                            
            <div class="image" style="font-size: 12px;mso-line-height-rule: at-least;font-style: normal;font-weight: 400;Margin-bottom: 0;Margin-top: 0;font-family: Ubuntu,sans-serif;color: #e0dce0;" align="center">
              <img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top" style="border: 0;-ms-interpolation-mode: bicubic;display: block;max-width: 480px;" src="public/img/viajeros-1.png" alt="" width="290" height="142" />
            </div>
          
                              
                              <table class="contents" style="border-collapse: collapse;border-spacing: 0;table-layout: fixed;width: 100%;">
                                <tbody><tr>
                                  <td class="padded" style="padding: 0;vertical-align: top;padding-left: 32px;padding-right: 32px;word-break: break-word;word-wrap: break-word;text-align: left;">
                                    
            <h1 style="font-style: normal;font-weight: 400;Margin-bottom: 0;Margin-top: 32px;font-size: 30px;line-height: 40px;font-family: Ubuntu,sans-serif;color: #80bfc4;"><span style="color:#d49344">Listos para una nueva aventura</span></h1><p class="size-11" style="font-style: normal;font-weight: 400;Margin-bottom: 32px;Margin-top: 16px;font-size: 11px;line-height: 19px;font-family: Ubuntu,sans-serif;color: #e0dce0;">El 2016 se har&#225; el lanzamiento mundial del aplicativo p&#250;blico y todos tus servicios podr&#225;n ser vistos por m&#225;s de 20 paises a nivel mundial. No olvides destacar tu servicio posteando descripciones amigables, fotografias de calidad para que los turistas se sientan atraidos visitarte.</p>
          
                                  </td>
                                </tr>
                              </tbody></table>
                            
                              
                              
                            
                            <div class="column-bottom" style="font-size: 32px;line-height: 32px;transition-timing-function: cubic-bezier(0, 0, 0.2, 1);transition-duration: 150ms;transition-property: all;">&nbsp;</div>
                          </td>
                        </tr>
                      </tbody></table>
                    </td>
                    <td class="gutter" style="padding: 0;vertical-align: top;width: 20px;font-size: 1px;line-height: 1px;">&nbsp;</td>
                    <td class="column last" style="padding: 0;vertical-align: top;text-align: left;width: 290px;">
                      <table class="column-bg" style="border-collapse: collapse;border-spacing: 0;width: 100%;background-color: #212a32;" emb-background-style>
                        <tbody><tr>
                          <td style="padding: 0;vertical-align: top;">
                            
            <div class="image" style="font-size: 12px;mso-line-height-rule: at-least;font-style: normal;font-weight: 400;Margin-bottom: 0;Margin-top: 0;font-family: Ubuntu,sans-serif;color: #e0dce0;" align="center">
              <img class="gnd-corner-image gnd-corner-image-center gnd-corner-image-top" style="border: 0;-ms-interpolation-mode: bicubic;display: block;max-width: 480px;" src="public/img/extra-pag-1a.png" alt="" width="290" height="142" />
            </div>
          
                              
                              <table class="contents" style="border-collapse: collapse;border-spacing: 0;table-layout: fixed;width: 100%;">
                                <tbody><tr>
                                  <td class="padded" style="padding: 0;vertical-align: top;padding-left: 32px;padding-right: 32px;word-break: break-word;word-wrap: break-word;text-align: left;">
                                    
            <h1 class="size-30" style="font-style: normal;font-weight: 400;Margin-bottom: 0;Margin-top: 32px;font-size: 30px;line-height: 38px;font-family: Ubuntu,sans-serif;color: #80bfc4;"><span style="color:#d49344">Primero Ecuador</span></h1><h1 class="size-11" style="font-style: normal;font-weight: 400;Margin-bottom: 0;Margin-top: 16px;font-size: 11px;line-height: 19px;font-family: Ubuntu,sans-serif;color: #80bfc4;"><span style="color:#e0dce0">IguanaTrip adem&#225;s de potenciar el recurso turistico tiene el compromiso de ayudar a las comunidades locales para su desarrollo econ&#243;mico con tu ayuda vamos a lograrlo.</span></h1>
          
                                  </td>
                                </tr>
                              </tbody></table>
                            
                            <div class="column-bottom" style="font-size: 32px;line-height: 32px;transition-timing-function: cubic-bezier(0, 0, 0.2, 1);transition-duration: 150ms;transition-property: all;">&nbsp;</div>
                          </td>
                        </tr>
                      </tbody></table>
                    </td>
                  </tr>
                </tbody></table>
              </td>
            </tr>
          </tbody></table>
        
          <div class="separator" style="font-size: 20px;line-height: 20px;">&nbsp;</div>
        
          <table class="one-col-bg" style="border-collapse: collapse;border-spacing: 0;width: 100%;">
            <tbody><tr>
              <td style="padding: 0;vertical-align: top;" align="center">
                <table class="one-col centered column-bg" style="border-collapse: collapse;border-spacing: 0;Margin-left: auto;Margin-right: auto;background-color: #212a32;width: 600px;table-layout: fixed;" emb-background-style>
                  <tbody><tr>
                    <td class="column" style="padding: 0;vertical-align: top;text-align: left;">
                      <div><div class="column-top" style="font-size: 32px;line-height: 32px;transition-timing-function: cubic-bezier(0, 0, 0.2, 1);transition-duration: 150ms;transition-property: all;">&nbsp;</div></div>
                        <table class="contents" style="border-collapse: collapse;border-spacing: 0;table-layout: fixed;width: 100%;">
                          <tbody><tr>
                            <td class="padded" style="padding: 0;vertical-align: top;padding-left: 32px;padding-right: 32px;word-break: break-word;word-wrap: break-word;text-align: left;">
                              
            <center class="divider" style="Margin-bottom: 32px;Margin-top: 0;"><table style="border-collapse: collapse;border-spacing: 0;width: 100%;"><tbody><tr><td style="padding: 0;vertical-align: top;"><img style="border: 0;-ms-interpolation-mode: bicubic;display: block;" src="https://i3.createsend1.com/static/eb/master/09-onyx/images/divider-536@2x.png" alt="" width="536" height="6" /></td></tr></tbody></table></center>
          
                            </td>
                          </tr>
                        </tbody></table>
                      
                        <table class="contents" style="border-collapse: collapse;border-spacing: 0;table-layout: fixed;width: 100%;">
                          <tbody><tr>
                            <td class="padded" style="padding: 0;vertical-align: top;padding-left: 32px;padding-right: 32px;word-break: break-word;word-wrap: break-word;text-align: left;">
                              
            <h1 style="font-style: normal;font-weight: 400;Margin-bottom: 16px;Margin-top: 0;font-size: 30px;line-height: 40px;font-family: Ubuntu,sans-serif;color: #80bfc4;text-align: center;"><span style="color:#e08619">Invita a un amigo</span></h1>
          
                            </td>
                          </tr>
                        </tbody></table>
                      
                        <table class="contents" style="border-collapse: collapse;border-spacing: 0;table-layout: fixed;width: 100%;">
                          <tbody><tr>
                            <td class="padded" style="padding: 0;vertical-align: top;padding-left: 32px;padding-right: 32px;word-break: break-word;word-wrap: break-word;text-align: left;">
                              
            <h3 style="font-style: normal;font-weight: 400;Margin-bottom: 0;Margin-top: 0;font-size: 16px;line-height: 24px;font-family: Ubuntu,sans-serif;color: #80bfc4;text-align: center;">
                 <a onclick="RenderPartialGeneric('reusable.invitar_amigo')" href="#"><img src="{{ asset('public/img/amigo-2.png')}}"></a> 
          </h3><h3 style="font-style: normal;font-weight: 400;Margin-bottom: 12px;Margin-top: 12px;font-size: 16px;line-height: 24px;font-family: Ubuntu,sans-serif;color: #80bfc4;text-align: center;">&nbsp;</h3>
          
                            </td>
                          </tr>
                        </tbody></table>
                      
                        <table class="contents" style="border-collapse: collapse;border-spacing: 0;table-layout: fixed;width: 100%;">
                          <tbody><tr>
                            <td class="padded" style="padding: 0;vertical-align: top;padding-left: 32px;padding-right: 32px;word-break: break-word;word-wrap: break-word;text-align: left;">
                              
            <div style="line-height:20px;font-size:1px">&nbsp;</div>
          
                            </td>
                          </tr>
                        </tbody></table>
                      
                        <table class="contents" style="border-collapse: collapse;border-spacing: 0;table-layout: fixed;width: 100%;">
                          <tbody><tr>
                            <td class="padded" style="padding: 0;vertical-align: top;padding-left: 32px;padding-right: 32px;word-break: break-word;word-wrap: break-word;text-align: left;">
                              
            <center class="divider" style="Margin-bottom: 0;Margin-top: 0;"><table style="border-collapse: collapse;border-spacing: 0;width: 100%;"><tbody><tr><td style="padding: 0;vertical-align: top;"><img style="border: 0;-ms-interpolation-mode: bicubic;display: block;" src="https://i3.createsend1.com/static/eb/master/09-onyx/images/divider-536@2x.png" alt="" width="536" height="6" /></td></tr></tbody></table></center>
          
                            </td>
                          </tr>
                        </tbody></table>
                      
                      <div class="column-bottom" style="font-size: 32px;line-height: 32px;transition-timing-function: cubic-bezier(0, 0, 0.2, 1);transition-duration: 150ms;transition-property: all;">&nbsp;</div>
                    </td>
                  </tr>
                </tbody></table>
              </td>
            </tr>
          </tbody></table>
        
          <div class="separator" style="font-size: 20px;line-height: 20px;">&nbsp;</div>
        
      
    </center>
  
</body></html>
@stop

@section('scripts')


{!! HTML::script('public/js/jsModal/jquery.simplemodal.js') !!}
{!! HTML::script('public/js/jsModal/basic.js') !!}


    

@stop