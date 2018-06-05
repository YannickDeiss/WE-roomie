<?php
use view\TemplateView;
?>


<main class="content">
    <div class="listing-grid">
        <div class="section-heading">
            <h2>Search Results <?php echo "  &mdash;  We found " . sizeof($this->listings) . " rooms"?></h2>
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
                        <li>Size: <?php echo TemplateView::noHTML($listing->getSquaremeters()); ?> m<sup>2</sup></li>
                        <li>Rooms: <?php echo TemplateView::noHTML($listing->getNumberofrooms()); ?> </li>
                        <li>From: <?php echo TemplateView::noHTML($listing->getMoveindate()); ?></li>
                    </ul>
                </div>
            </div>
            <div class="options">
                <a href='<?php echo $GLOBALS["ROOT_URL"]; ?>/search/<?php echo $listing->getId(); ?>'>
                    <i class="fa fa-share-square"></i>View Details</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</main>
