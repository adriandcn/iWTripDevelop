@section('likes')	

                                
                              
                                
                              <div class="product-action"  style=" margin-left: 40%;">
                                      
                                  
                                      
                                        <a onclick="AjaxContainerRetrunBurnURLikes('{!!asset('/likesSat')!!}/',{!!$atraccion!!},{!!$atraccion!!},'btn-compare')" class="btn btn-compare" title="+1">
                                            @if(isset($likes->satisfechos))
                                            {!!$likes->satisfechos!!} <i class="fa fa-thumbs-up"></i> {{ trans('publico/labels.label70')}}</a>
                                            @else
                                                <i class="fa fa-thumbs-up"></i>{{ trans('publico/labels.label70')}}</a>
                                            @endif
                                    </div>
                                       
                                       @endsection
                                    