<div id="ez-toc-container" class="ez-toc-v2_0_17 ez-toc-wrap-right counter-hierarchy ez-toc-grey">
    <div class="ez-toc-title-container">
      <p class="ez-toc-title">Table of Contents</p>
    </div>
    <nav>
      <ul class="ez-toc-list ez-toc-list-level-1">
        <?php if( have_rows('table_of_contents_builder') ): while( have_rows('table_of_contents_builder') ): the_row(); 
          $race_toc = get_sub_field('races');
          $background_toc = get_sub_field('backgrounds');
          $feats_toc = get_sub_field('feats');
          $spells_toc = get_sub_field('spells');
          $multiclass_toc = get_sub_field('multiclass');
        endwhile; endif;
        ?>
        <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#what-is-this-guide">What is this guide?</a></li>
        <?php if (has_post_parent()):?>
          <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#what-is">What is the <?php the_title(); ?>?</a></li>
        <?php endif; ?>
        <?php if (! has_post_parent()):?>
          <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#overview">D&D 5e <?php the_title(); ?> Overview</a></li>
        <?php endif; ?>
        <?php if ($race_toc):?>
          <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#best-races">Best Races for <?php the_title(); ?> </a></li>
        <?php endif; ?>
        <?php if ($background_toc):?>
          <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#best-backgrounds" >Best Backgrounds for <?php the_title(); ?></a></li>
        <?php endif; ?>
        <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#class-progression" ><?php the_title(); ?> Class Progression</a>
          </li>
        <?php if ($feats_toc):?>
          <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#best-feats" >Best Feats for <?php the_title(); ?></a></li>
        <?php endif; ?>
        <?php if ($spells_toc):?>
          <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#best-spells" >Best Spells for <?php the_title(); ?></a></li>
        <?php endif; ?>
        <?php if ($multiclass_toc):?>
          <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#multiclass-options" >Best Multiclass options for <?php the_title(); ?></a></li>
        <?php endif; ?>
        <?php if (has_post_parent()):?>
          <li class="ez-toc-page-1 ez-toc-heading-level-2"><a class="ez-toc-link ez-toc-heading-1" href="#example-build" >Example Build</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </div>