<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($offres as $o)
     <url>
        <loc>www.findjob.com/offres/{{ $o->id }}</loc>
        <lastmod>{{ $o->created_at->toAtomString() }}</lastmod>
     </url>
    @endforeach
</urlset> 