@section('review')

<link rel="stylesheet" href="{{ asset('public/public_components/css/animate.min.css')}}">
@if(count($reviews)==0)
<script>

    $('.moreReviews').css("display", "none");


</script>
@endif

<?php $array = array(); ?>
@for ($x = 0; $x < count($reviews); $x++)
<?php
$array[$x] = $reviews[$x]->confirmation_rev_code;
?>

@endfor

<?php $totalCodigos = (array_unique($array));
?>


@foreach($totalCodigos as $codigos)


<?php
$calificacion = array();
$tipoRev = array();
$nombre = "";
$email = "";
?>

@foreach ($reviews as $rev)

@if($rev->confirmation_rev_code==$codigos)

<?php
$calificacion[] = ($rev->calificacion * $rev->peso_review);
if (session('locale') == 'es') {
    $tipoRev[] = $rev->tipo_review . ": " . $rev->calificacion;
} else {
    $tipoRev[] = $rev->tipo_review_eng . ": " . $rev->calificacion;
}



$nombre = $rev->nombre_reviewer;
$email = $rev->email_reviewer;
?>

@endif  


@endforeach



<li class="comment">
    <div class="author-img">
        <span><img src="{{ asset('public/img/positivo.png')}}" alt=""></span>
    </div>
    <div class="comment-content">
        @if($nombre!="")
        <h5 class="comment-author-name"><a style="cursor: pointer">{!!$nombre!!}</a></h5>
        @elseif($email)
        <h5 class="comment-author-name"><a style="cursor: pointer">{!!$email!!}</a></h5>
        @endif
<?php $Totalcalificacion = 0;
?>
        @foreach ($calificacion as $calif)
        <?php $Totalcalificacion = $Totalcalificacion + $calif;
        ?>

        @endforeach

<?php $Resumencalificacion = "";
?>
        @foreach ($tipoRev as $tip)
        <?php $Resumencalificacion = $Resumencalificacion . $tip . " ";
        ?>

        @endforeach

<?php $Resumencalificacion = $Resumencalificacion . " =" . $Totalcalificacion; ?>
        <span style="cursor: pointer" data-toggle="tooltip" title="{!!$Resumencalificacion!!}" class="star-rating">
            <span data-stars="{!!$Totalcalificacion!!}"></span>
        </span>
<?php $date = date_create($rev->created_at); ?>
        <span class="comment-date">{!!date_format($date, 'j F ')!!}</span>
        <div class="description">
            <p>{!!$rev->text_review!!}</p>
        </div>
    </div>
</li>


@endforeach







<script>

    $('.btn-write-review').on('click', function () {
        $('.var_comment').css("display", "none");
    });

    $(".btn-back-reviews").click(function () {
        $('.var_comment').css("display", "block");

    });
    // star rating
    $(".star-rating").each(function () {
        var stars = $(this).children("span").data("stars");
        if (stars) {
            $(this).children("span").css("width", stars * 2 * 10 + "%");
        }
    });

</script>
@endsection