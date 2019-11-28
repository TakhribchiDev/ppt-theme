<form role="search" method="get" class="form-inline header-search-form" action="//localhost:3000/">
	<label>
		<span class="sr-only">جستجو برای:</span>
		<input type="search" class="form-control search-box" placeholder="دنبال چی می گردی؟" value="<?php echo get_search_query(); ?>" name="s" title="search">
	</label>
	<button type="submit" class="search-submit"><i class="ppt-icon ppt-search"></i></button>
</form>