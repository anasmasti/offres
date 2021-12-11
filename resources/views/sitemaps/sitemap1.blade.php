<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($produits as $p)
     <url>
        <loc>www.gestion-des-ventes.com/produits/{{ $p->idpro }}</loc>
        <lastmod>{{ $p->created_at->toAtomString() }}</lastmod>
     </url>
    @endforeach
</urlset> 