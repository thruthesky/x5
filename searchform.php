
<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div class="input-group">
		<input type="text" name="s" id="s" value="<?php get_search_query();?>" class="form-control" placeholder="Search Title/Content"/>
		<span class="input-group-btn">
			<input type="submit" id="searchsubmit" value="Go!" class="btn btn-danger" />
		</span>
	</div>
</form>