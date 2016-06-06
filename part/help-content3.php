<?php
wp_enqueue_style('help-content3', td() . '/css/help-content3.css');
?>
<section class="spy help content-three" >
    <div>
        <h2><?php _text('Send an Inquiry')?></h2>
        <form>
            <div class="line">
                <label for="user_login"><?php _text('Name')?><span>*</span></label>
                <div class="text">
                    <input type="text" name="name" maxlength="64" id="name" tabindex="101" placeholder="<?php _text('Name...')?>">
                </div>
            </div>
            <div class="line">
                <label for="user_login"><?php _text('Email')?><span>*</span></label>
                <div class="text">
                    <input type="text" name="email" maxlength="64" id="email" tabindex="101" placeholder="<?php _text('Email Address...')?>">
                </div>
            </div>
            <div class="line">
                <label for="user_login"><?php _text('Phone')?></label>
                <div class="text">
                    <input type="text" name="phone" maxlength="64" id="phone" tabindex="101" placeholder="<?php _text('Phone Number...')?>">
                </div>
            </div>
            <div class="line">
                <label for="user_login"><?php _text('Message')?><span>*</span></label>
                <div class="text">
                    <textarea name="message" id="message" tabindex="101" rows="5" placeholder="<?php _text('Enter your inquiry here...')?>"></textarea>
                </div>
            </div>
            <div id="content-four"></div>
            <div class="line submit">
                <input type="submit" tabindex="121" value="<?php _text('Inquery Submit')?>">
            </div>
        </form>
    </div>
</section>
