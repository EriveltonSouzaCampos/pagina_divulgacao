<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php bloginfo('name') ?> -
    <?php the_title(); ?>
    </title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header>
        <div class="conter_header">
            <div class="header">
                <span><?php the_custom_logo()?></span>
                <div class="header_links">
                    <a href="">About us</a>
                    <a href="">About Event</a>
                    <a href="">Contact Us</a>
                </div>
            </div>
        </div>
    </header>