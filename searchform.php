<form class="l-header__form" method="get" action="<?php echo esc_url( home_url()); ?>">
<input class="l-header__form__box" type="search"  name="s" id="s"value="<?php if(get_search_query()) echo get_search_query() ?>">
<i class="fas fa-search" aria hidden="true"></i>
<input class="l-header__form__botton" type="submit"  value="検索"></form>