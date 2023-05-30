<?php
/**
 * Template name: Home
 */


 get_header(); ?>
 
<main>
    <section class="h-[522px] max-h-[unset] md:max-h-[640px] lg:max-h-[unset] md:h-screen bg-center bg-cover relative" style="background-image: url('/wp-content/themes/doove-theme/img/local/image1.png');">
        <video class="w-full h-full object-cover absolute top-0 right-0 -z-10" autoplay="" loop="" muted="" playsinline="">
        <source src="https://player.vimeo.com/video/831162641?h=c385849a37&muted=1&autoplay=1&dnt=1&loop=1&transparent=0&background=1&app_id=122963">
        </video>
        <iframe class="w-full h-full object-cover absolute top-0 right-0 -z-10" src="https://player.vimeo.com/video/831162641?h=c385849a37&muted=1&autoplay=1&dnt=1&loop=1&transparent=0&background=1&app_id=122963" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        
        
        <div class="container flex h-full items-center pt-[41px] md:pt-[35.5px] lg:pt-[34px]">
            <h1 class="text-22 leading-30 max-w-[206px] md:text-40 md:leading-46 md:max-w-[373px] lg:text-61 lg:leading-70 lg:max-w-[569px] xl:text-70 xl:leading-80 xl:max-w-[653px] font-satoshi text-black font-semibold">Lizzy van Drom</h1>
        </div>
    </section>
    <?php the_content(); ?>
</main>
<?php get_footer(); ?>



