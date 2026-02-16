<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="https://trimatric.com">
    @foreach ($posts as $post)
        <url>
            <loc>{{url($post->slug_url)}}</loc>
            <lastmod>{{ gmdate('Y-m-d\TH:i:s\Z',strtotime($post->updated_at)) }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
</urlset>