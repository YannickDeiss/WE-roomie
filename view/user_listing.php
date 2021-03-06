<?php
use view\TemplateView;
?>


<main class="content">
    <div class="listing-grid">
        <div class="section-heading">
            <h2>List of your posted rooms &mdash; <?php echo " Currently <strong style='color: #f96f5d;'>" . sizeof($this->listings) . " </strong> Rooms posted"?></h2>
            <ul>
                <li class="active">
                    <a href='<?php echo $GLOBALS["ROOT_URL"]; ?>/user/edit'>
                        <i class="fas fa-edit"></i>
                        <span>Edit Profile</span>
                    </a>
                </li>
                <li>
                    <a href='<?php echo $GLOBALS["ROOT_URL"]; ?>/user/emailListings'>
                        <i class="fas fa-envelope"></i>
                        <span>Send List</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="listing-item border-dotted">
            <div class="add-listing-button-wrapper">
                <button onclick="location.href='<?php echo $GLOBALS["ROOT_URL"]; ?>/listing/create'" type="button" class="add-listing-button">
                    <span class="unselectable">Add</span>
                </button>
            </div>
        </div>

        <?php

            foreach ($this->listings as $listing):
                $street = $listing->getStreet();?>

        <div class="listing-item">
            <img src="<?php echo TemplateView::noHTML($listing->getImage1()); ?>" alt="Listing Image">
            <div class="listing-info">
                <h2><?php echo TemplateView::noHTML($listing->getTitle()); ?></h2>

                <h3><?php echo TemplateView::noHTML($listing->getStreet() . " " . $listing->getStreetNumber() . (isset($street) ? ", " . $listing->getCity(): $listing->getCity() . " " . $listing->getCanton   ))?></h3>
                
                <p><?php echo TemplateView::noHTML($listing->getDescription()); ?>
                </p>
                <div class="listing-details">
                    <ul>
                        <li>Rent: <?php echo TemplateView::noHTML($listing->getPrice()); ?> CHF</li>
                        <li>Size: <?php echo TemplateView::noHTML($listing->getSquaremeters()); ?>&nbsp;m<sup>2</sup></li>
                        <li>Rooms: <?php echo TemplateView::noHTML($listing->getNumberofrooms()); ?> </li>
                        <li>From: <?php echo TemplateView::noHTML($listing->getMoveindate()); ?></li>
                    </ul>
                </div>
            </div>
            <div class="options">
                <a href='<?php echo $GLOBALS["ROOT_URL"]; ?>/search/<?php echo $listing->getId(); ?>'>
                    <i class="fa fa-share-square"></i>Preview</a>
                <a href='<?php echo $GLOBALS["ROOT_URL"]; ?>/listing/edit?id=<?php echo $listing->getId(); ?>'>
                    <i class="fa fa-edit"></i>Edit</a>
                <a href='<?php echo $GLOBALS["ROOT_URL"]; ?>/listing/delete?id=<?php echo $listing->getId(); ?>'>
                    <!-- the link above needs to be changed with the real one -->
                    <i class="fa fa-trash"></i>Delete</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</main>
