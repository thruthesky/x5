<?php
wp_enqueue_style('enrollment-content2', td() . '/css/enrollment-content2.css');
function _check_value($n, $v) {
	if ( isset($_REQUEST[$n]) ) {
		if ( $_REQUEST[$n] == $v ) {
			echo ' checked="1"';
		}
	}
}
?>
<script>

    //var form_action = "<?php echo home_url()?>/enrollment?mode=form_elements_submit";
    function form_elements_submit() {
        //  $("form[name='frmAGS_pay']").prop('action', form_action);
        document.forms['payment'].submit();
    }

    window.addEventListener('load',function(){
        $(function(){
            document.forms['payment'].submit();
        });
        $('form[name="payment"]').change(function(){

            var prices = {
                '25': [ 0, 0, 79000, 95000, 120000, 135000 ],
                '50' : [ 0, 0, 130000, 150000, 170000, 230000 ]
            };



            var selected_mins = $('.times input[type="radio"]:checked').val();
            var selected_days = $('.times input[type="radio"]:checked').val();

            var amount = prices[ selected_mins ][ selected_days ];

            $('form [name="amount"]').val( amount );



            $(this).submit();
            if ( $('#auto_credit').prop('checked') ) {
                $('.auto-credit-desc').show();
            }
            else {
                $('.auto-credit-desc').hide();
            }
        });
        $('form [name="amount_input"]').keyup(function(){
            $('form[name="payment"]').submit();
        });

        $('.input-amount-text').click(function() {
            $('form [name="amount_input"]').show();
            $('form [name="amount"]').prop('checked', false);
        });

        $('form [name="amount"]').change(function() {
            $('form [name="amount_input"]')
                .val('0')
                .hide();
        });

    });


</script>
<section class="enrollment content-two">
	<div>
		<form name="payment" action="<?php echo home_url()?>/enrollment" target="hiframe_payment">
			<input type="hidden" name="layout" value="no">
			<input type="hidden" name="mode" value="AGS_pay">
            <input type="hidden" name="amount" value="0">
			<div class="content row">
				<div class="col-sm-3">
					<div class="cover">
						<div class="picture">
							<img src="<?php img_e() ?>enrollment-icon1.png">
						</div>
						<div class="desc">
							<?php _text('Minutes')?>
						</div>
						<div class="items times">
							<label for="min_25" class="text">
								<input id="min_25" type="radio" name="time" value="25">
								<?php _text('25mins')?>
							</label>
							<label for="min_50" class="text">
								<input id="min_50" type="radio" name="time" value="50">
								<?php _text('50mins')?>
							</label>

							<?php _text('or')?>


							<label for="input-amount" class="input-amount-text">
								<?php _text('Input payment amount')?>
							</label>

							<input id="input-amount" type="text" name="amount_input" value="0" size="" style="display:none;">
						</div>
					</div>
				</div>

				<div class="col-sm-3">
					<div class="cover">
						<div class="picture">
							<img src="<?php img_e() ?>enrollment-icon2.png">
						</div>
						<div class="desc">
							<?php _text('How To Pay')?>
						</div>
						<div class="items">
							<label for="onlycardselfnormal" class="text">
								<input id="onlycardselfnormal" type="radio" name="method" value="onlycardselfnormal"<?php _check_value('method', 'onlycardselfnormal'); ?>>
								<?php _text('credit card')?>
							</label>
							<label for="onlyicheselfnormal" class="text">
								<input id="onlyicheselfnormal" type="radio" name="method" value="onlyicheselfnormal"<?php _check_value('method', 'onlyicheselfnormal'); ?>>
								<?php _text('online banking')?>
							</label>
							<label for="onlyvirtualselfnormal" class="text">
								<input id="onlyvirtualselfnormal" type="radio" name="method" value="onlyvirtualselfnormal"<?php _check_value('method', 'onlyvirtualselfnormal'); ?>>
								<?php _text('offline banking')?>
							</label>
							<?php
							/*
							?>
							<label for="auto_credit" class="text">
								<input id="auto_credit" type="radio" name="method" value="auto_credit"<?php _check_value('method', 'auto_credit'); ?>>
								<?php _text('auto credit ( 20% discount )')?>
							</label>
							<?php
							*/
							?>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="cover">
						<div class="picture">
							<img src="<?php img_e() ?>enrollment-icon3.png">
						</div>
						<div class="desc">
							<?php _text('Days')?>
						</div>
						<div class="items days">
							<label for="day_5" class="text">
								<input id="day_5" type="radio" name="days" value="5" checked>
								<?php _text('5 days')?>
							</label>
							<label for="day_4" class="text">
								<input id="day_4" type="radio" name="days" value="4">
								<?php _text('4 days')?>
							</label>
							<label for="day_3" class="text">
								<input id="day_3" type="radio" name="days" value="3">
								<?php _text('3 days')?>
							</label>
							<label for="day_2" class="text">
								<input id="day_2" type="radio" name="days" value="2">
								<?php _text('2 days')?>
							</label>
						</div>
					</div>
				</div>
				<div class="col-sm-3 curriculum">
					<div class="cover">
						<div class="picture">
							<img src="<?php img_e() ?>enrollment-icon4.png">
						</div>
						<div class="desc">
							<?php _text('Discounted Curriculum')?>
						</div>
						<div class="items">



							<?php
							$data = yaml_load_file( get_part_location( 'curriculum', 'yml' ) );

							$k = 0;
							foreach( $data as $name => $off ) {
								$k ++;
								if ( strpos($off,'*') ) {
									$off = trim($off,' *');
									$checked = ' checked=1';
								}
								else {
									$checked = null;
								}
								?>
								<label for="Curriculum<?php echo $k?>" class="text">
									<input id="Curriculum<?php echo $k?>" type="radio" name="curriculum" value="<?php echo "$off:$name"?>"<?php echo $checked?>>
									<?php _text($name)?>
								</label>
								<?php
							}
							?>

						</div>
					</div>
				</div>
			</div>

			<div class="auto-credit-desc" style="display:none;">
				<?php _text('Notice: When auto credit selected, discounted amount will be returned after a month.')?>
			</div>

			<iframe name="hiframe_payment" width="100%" height="500" src="javascript:'';" border="0" frameborder="0" scrolling="no"></iframe>

		</form>
	</div>
</section>
