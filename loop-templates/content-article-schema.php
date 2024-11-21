<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "NewsArticle",
      "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "<?php the_permalink(); ?>"
      },
      "headline": "<?php the_title(); ?>",
      "image": [
        "<?php the_post_thumbnail_url(); ?> "
      ],
      "datePublished": "<?php echo the_time('Y-m-d h:i:s'); ?>",
      "dateModified": "<?php echo the_modified_time('Y-m-d h:i:s'); ?>",
      "author": {
        "@type": "Person",
        "name": "<?php the_author(); ?>"
      },
      "publisher": {
        "@type": "Organization",
        "name": "Arcane Eye",
        "logo": {
          "@type": "ImageObject",
          "url": "https://arcaneeye.com/wp-content/uploads/2020/05/istock-1050788020-1.svg"
        }
      }
    }
</script>