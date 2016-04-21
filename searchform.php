<form method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label for="s" class="sr-only">Search</label>
    <div class="input-group">
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" autocomplete="off" />
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
        </span>
    </div> <!-- .input-group -->
</form>








