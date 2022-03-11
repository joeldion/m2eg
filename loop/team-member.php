<?php
/*
 * Loop: Team member
 */

$id = get_the_ID();
$name = get_the_title();
$job_title = get_post_meta( $id, '_team_member_job_title', true );
$image_1x = get_the_post_thumbnail_url( $id, 'm2eg-team-1x' );
$image_full = get_the_post_thumbnail_url( $id, 'full' );

?>
<div class="team-member">

    <picture class="team-member__image">
        <source srcset="<?php echo $image_1x . ' 1x, ' . $image_full . ' 2x'; ?>">
        <img src="<?php echo $image_1x; ?>" alt="<?php echo $name; ?>">
    </picture>
    <h3 class="team-member__name"><?php echo $name; ?></h3>
    <h4 class="team-member__title"><?php echo $job_title; ?></h4>

</div>
