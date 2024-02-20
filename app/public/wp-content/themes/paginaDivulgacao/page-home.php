<?php 
//Template name: Home
?>
<?php get_header(); ?>

<main>
   <div class="conter_body">
        <div class="about_client_body">
            <div class="filter"></div>
            <h1>Name of event</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim quos harum modi nostrum suscipit minima. Soluta quasi minima nulla, recusandae deserunt, laboriosam quae perferendis iusto eligendi, et id odit. Nisi?</p>
        </div>
        <div class="linear_blue"></div>
        <div class="about_the_company_body">
            <h1>About us</h1>
            <div class="textof_company">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis totam, consequatur dicta reprehenderit illum dolorum. Est quod architecto explicabo eos esse distinctio vel illo ut, quo dicta quasi aperiam rem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt voluptates incidunt minima qui ea aut amet facilis similique, ut, saepe non nulla placeat sed enim quos molestias! Voluptatum, deserunt provident?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione esse rerum illum labore dignissimos, excepturi et aperiam, sit perferendis laudantium iure totam, atque quaerat! Molestiae explicabo nobis accusantium laudantium recusandae!</p>
            </div>
            <a href="">More about</a>
        </div>
        <div class="linear_blue"></div>
        <div class="about_event_cont">
            <h1>Name of event</h1>
            <div class="event">
                <div class="images_event">
                    <?php
                        /*Pegando as fotos do ACF pelo get_field*/
                        $pictures = acf_get_fields("group_65d4e56dee608"); //Pego um objeto que contem todo o field
                        foreach($pictures as $field){
                            $image = get_field($field['name']); //Pego cada imagem pelo nome do campo
                            $size = 'full';
                            if( $image ) {
                                echo wp_get_attachment_image( $image, $size );
                            }
                        }
                    ?>
                </div>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque temporibus doloremque aliquam unde commodi ipsum sequi itaque suscipit aperiam harum corrupti officia laboriosam hic distinctio quod, aspernatur quae perspiciatis! Laboriosam? Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt fugiat sapiente similique minima sequi voluptatum commodi praesentium, unde, quidem nisi ullam! Ducimus consequatur eum sit blanditiis fuga numquam, quae quod. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ea maxime reiciendis fugiat minima nobis? Non reprehenderit sequi adipisci molestiae id. Odit ratione hic saepe, nulla aliquam unde exercitationem itaque sequi! Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa nostrum eius fugiat consectetur repellat repudiandae dolore fuga doloribus tempora? Sint aspernatur delectus cupiditate possimus earum esse odit. Libero, tenetur provident? Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque ut fuga id, excepturi suscipit quam deleniti, enim, repellat quo odit sequi voluptate? Quae quidem id reprehenderit debitis magnam necessitatibus dolores!
                </p>
            </div>
        </div>
        <div class="linear_blue"></div>
   </div>
</main>

<?php get_footer(); ?>

