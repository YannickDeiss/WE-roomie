<?php
use view\TemplateView;
?>


<main class="content">
    <div class="listing-grid">
        <div class="section-heading">
            <h2>List of your posted rooms</h2>
            <!--style="font-style:normal;line-height:19px;font-size:36px;height:56px;margin-top:23px;"><?php echo isset($this->result) ? "We found <strong style='color: #f4476b'>" . sizeof($this->listings) . "</strong> rooms for you" : "Available Rooms" ?></p>-->
        </div>
        <div class="listing-item border-dotted">
            <div class="add-listing-button-wrapper">
                <button onclick="location.href='<?php echo $GLOBALS["ROOT_URL"]; ?>/listing/create'" type="button" class="add-listing-button">
                    <span class="unselectable">Add</span>
                </button>
            </div>
        </div>
        <?php

        foreach ($this->listings as $listing): ?>
        <div class="listing-item">
            <img src="" alt="Listing Image">
            <div class="listing-info">
                <h2><?php echo TemplateView::noHTML($listing->getTitle()); ?></h2>
                <h3>Basel, Basel-Stadt</h3>
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
