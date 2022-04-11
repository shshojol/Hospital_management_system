<?php include 'template/header.php'; ?>
<?php
    $sql_gallery_view = "SELECT * FROM gallery";
    $result_gallery_view = $conn->query($sql_gallery_view);
?>
<!-- Our Gallery -->
<section class="ulockd-service-three">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3 text-center">
                <div class="ulockd-srvc-title-two hvr-float-shadow">
                    <h2 class="text-uppercase"><span class="text-thm1">Photo Gallery</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Masonry Filter -->
                <ul style="text-align: center;" class="list-inline masonry-filter text-left">
                    <li><a href="#" class="active" data-filter="*">All</a></li>
                    <li><a href="#" data-filter=".1" class="">Emergency</a></li>
                    <li><a href="#" data-filter=".2" class="">Dental</a></li>
                    <li><a href="#" data-filter=".3" class="">Surgery</a></li>
                    <li><a href="#" data-filter=".4" class="">Care</a></li>
                    <li><a href="#" data-filter=".5" class="">Test</a></li>
                </ul>
                <!-- End Masonry Filter -->

                <!-- Masonry Grid -->
                <div id="grid" class="masonry-gallery grid-4 clearfix">

                    <!-- Masonry Item -->
                    <?php
                        while($row_gallery = mysqli_fetch_assoc($result_gallery_view)){
                    ?>
                    <div class="isotope-item <?php echo $row_gallery['category']; ?>">
                        <div class="gallery-thumb">
                            <img class="img-responsive img-whp" src="admin/upload/gallery/<?php echo $row_gallery['image']; ?>" alt="project">
                            <div class="overlayer">
                                <div class="lbox-caption">
                                    <div class="lbox-details">
                                        <h5><?php echo $row_gallery['title']; ?></h5>
                                        <ul class="list-inline">
                                            <li><a class="popup-img" href="admin/upload/gallery/<?php echo $row_gallery['image']; ?>" title="Gallery Photos"><span class="flaticon-add-square-button"></span></a></li>
                                            <li><a class="link-btn" href="#" ><span class="flaticon-link-symbol"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                   

                    <!-- Masonry = Masonry Item -->
                </div>
                <!-- Masonry Gallery Grid Item -->
            </div>
        </div>
    </div>
</section>

<?php include 'template/footer.php'; ?>