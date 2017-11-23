
  
                                  
                                      
                                        <a href="{!!asset('/detalle')!!}/{!!$nombre_atraccion!!}/{!!$atraccion!!}" onclick="$('.{!!$load!!}').LoadingOverlay('show');"class="btn {!!$load!!}" title="+1">
                                            @if(isset($cantidad))
                                            {!!$cantidad!!} <i class="fa fa-thumbs-up"></i> {{ trans('publico/labels.label70')}}</a>
                                            @else
                                                <i class="fa fa-thumbs-up"></i>{{ trans('publico/labels.label70')}}</a>
                                            @endif
                               