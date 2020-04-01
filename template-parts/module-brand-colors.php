<!-- set brand colors -->
<?php $colors = brand_colors();?>
<style>
    /* primary brand color */
	h1,h2,h3,h4,h5,h6 {color:<?php echo $colors[0];?>}
	a {color:<?php echo $colors[0];?>}
	a:hover{color:<?php echo $colors[1];?>}
	a.button {background-color: <?php echo $colors[0];?>;border: solid 1px <?php echo $colors[0];?>;}
	a.button:hover {color: <?php echo $colors[1];?>;border: solid 1px <?php echo $colors[1];?>;}
	.social-media ul li a {color:<?php echo $colors[0];?>}
	.social-media ul li a:hover {color:<?php echo $colors[2];?>}
	.content-with-image img{border:solid <?php echo $colors[2];?> 5px;}
	.content-cta .text-container p {color:<?php echo $colors[0];?>}
	#wrapper-footer .footer-menu-col ul li :before {color:<?php echo $colors[1];?>}
	#hero .carousel-caption p {color:<?php echo $colors[0];?>}
	#hero.header{ border-top: <?php echo $colors[0];?> solid 1px;border-bottom: <?php echo $colors[1];?> solid 15px;}
    /* secondary color */
    ul#main-menu li.menu-item-has-children ul.sub-menu li.current_page_item a {color:<?php echo $colors[1];?>;}
    #mobile-hero-text p {color:<?php echo $colors[1];?>;}
    #blog-post-boxes .post_intro .fa {color:<?php echo $colors[1];?>}
    .featured-image {border-bottom: 5px solid <?php echo $colors[2];?>}
    #single-content .entry-footer .fa {color:<?php echo $colors[1];?>;}
    #right-sidebar .blog-archive ul .fa {color:<?php echo $colors[1];?>;}
    .post-meta .fa {color:<?php echo $colors[1];?>;}
    .pagination .page-item.active .page-link {background-color: <?php echo $colors[0];?>;}
    .pagination .page-item .page-link:hover {background-color: <?php echo $colors[5];?>;color:<?php echo $colors[0];?>}
    /* third brand color */
    @media (min-width: 992px){ul#main-menu li.current_page_item,ul#main-menu li.current-page-ancestor{border-bottom: 1px solid <?php echo $colors[2];?>}}
    /* branded background colors */
    .bgcolor3 {background-color: <?php echo $colors[3];?>;}
    .bgcolor4 {background-color: <?php echo $colors[4];?>;}
    .bgcolor5 {background-color: <?php echo $colors[5];?>;}
</style>