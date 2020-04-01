<?php
$text = get_sub_field('text');
$button = get_sub_field('button_target');
$button_url = $button['url'];
$button_title = $button['title'];
$button_target = $button['target'] ? $link['target'] : '_self';
?>
<div class="container">
    <div class="row">
            <div class="col-md-12 text-container">
                <div class="text-container">
                    <p><?php echo $text;?></p>
                </div>
                <div class="button-container">
                    <a class="button" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
