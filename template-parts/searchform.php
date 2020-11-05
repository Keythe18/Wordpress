<form method="get" id="searchform" action="<?php bloginfo ('home'); ?>/">
    <p>
        <input type="text" value="<?php the_search_query(); ?>" name="search" id="search" placeholder="Que recherchez-vous ?"/>
    </p>
</form>