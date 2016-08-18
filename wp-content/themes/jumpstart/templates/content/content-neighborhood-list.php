<?php

$terms = get_terms( $taxonomy_names, array(
    'orderby'    => 'count',
    'hide_empty' => 0
) );

?>

<div class="small-12 medium-12 large-12 column">

    <p>Filter by:</p>

    <ul>
    
        <?php foreach( $terms as $term ): ?>

    	    <?php

    	    $args = array(
    	        'post_type' => 'neighborhood',
    	        'neighborhoods' => $term->slug,
    	    );
    	    $query = new WP_Query( $args ); ?>

    		<li><?php echo $term->name; ?></li>

            <ul>
                <?php $myposts = get_posts( $args ); ?>
                <?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>

    	<?php endforeach; ?>

    </ul>

</div>
