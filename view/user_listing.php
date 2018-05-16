<main class="content">
    <div class="listing-grid">
        <div class="section-heading">
            <h2>List of your posted rooms</h2>
            <!--style="font-style:normal;line-height:19px;font-size:36px;height:56px;margin-top:23px;"><?php echo isset($this->result) ? "We found <strong style='color: #f4476b'>" . sizeof($this->listings) . "</strong> rooms for you" : "Available Rooms" ?></p>-->
        </div>
        <div class="listing-item border-dotted">
            <div class="add-listing-button-wrapper">
                <button onclick="location.href='user_listing_edit.php'" type="button" class="add-listing-button">
                    <span class="unselectable">Add</span>
                </button>
            </div>
        </div>
        <div class="listing-item">
            <img src="" alt="Listing Image">
            <div class="listing-info">
                <h2>Nice 3 room apartment in Basel</h2>
                <h3>Basel, Basel-Stadt</h3>
                <p>Die freundliche, top renovierte 2 Zimmer Wohnung befindet sich an zentraler Lage im 4.OG mit Lift.
                    Die Wohnung verfügt über ein neues Bad und eine moderne Küche mit Glaskeramik, Geschirrspüler,
                    Luftabzug, Laminat-Böden, wie auch über ein Kellerabteil. Waschküche und Trockenraum zur
                    Mitbenützung.
                </p>
                <div class="listing-details">
                    <ul>
                        <li>Rent: 1500 CHF</li>
                        <li>Size: 150 m2</li>
                        <li>Rooms: 4</li>
                        <li>From: 01.06.2018</li>
                    </ul>
                </div>
            </div>
            <div class="options">
                <a href="user_listing_edit.php">
                    <i class="fa fa-edit"></i>Edit</a>
                <a href="listing_detail.php">
                    <!-- the link above needs to be changed with the real one -->
                    <i class="fa fa-trash"></i>Delete</a>
            </div>
        </div>
    </div>
</main>
