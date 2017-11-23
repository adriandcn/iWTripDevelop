<?php echo '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($usuarioServicioCache as $servicio)
@if($servicio->nombre_servicio!="")

    <url>
        @if($servicio->id_catalogo_servicio==11)
        <loc>https://iwanatrip.com/trip/{{htmlspecialchars(htmlentities($servicio->nombre_servicio))}}/{{$servicio->id}}</loc>
        @else
        <loc>https://iwanatrip.com/detalle/{{htmlspecialchars(htmlentities($servicio->nombre_servicio))}}/{{$servicio->id}}</loc>
        @endif
        <lastmod>{{ gmdate(DateTime::W3C, strtotime($servicio->updated_at)) }}</lastmod>
        <changefreq>daily</changefreq>
       <priority>1.0</priority>
    </url>
@endif
@endforeach
</urlset>

