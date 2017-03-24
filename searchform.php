<div class="row">
    <div class="col-sm-12">
        <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <div class="input-group">
                <input type="text" class="form-control field" name="s" id="s" placeholder="Search for...">
                <span class="input-group-btn">
                    <button class="btn btn-default submit" type="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'twentyeleven' ); ?>">Go!</button>
                </span>
            </div><!-- /input-group -->
        </form>
    </div>        
</div><!-- /.col-lg-6 -->