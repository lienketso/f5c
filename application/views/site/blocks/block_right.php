                        <div class="widget-area" role="complementary">
                            <aside class="widget">
                                <h4><?= ($lang=='vn') ? 'Danh mục tin' : 'Categories' ?></h4>
                                <ul>
                                    <?php foreach($allCategory as $row): ?>
                                    <li><a href="<?= catnews_url($row->cat_name); ?>"><?= $row->name; ?></a>
                                    </li>
                                <?php endforeach; ?>

                                </ul>
                            </aside>

                            <aside class="widget">
                                <h4><?= ($lang=='vn') ? 'Tìm kiếm' : 'Search' ?></h4>
                                <div class="content">
                                    <form class="form wp-searchform" method="get">
                                        <input name="search" value="" placeholder="Search for..." type="text">
                                        <button type="submit" class="fa fa-search"></button>
                                    </form>
                                </div>
                            </aside>
                            <aside class="widget">
                                <h4><?= ($lang=='vn') ? 'Sản phẩm HOT' : 'Hot Products' ?></h4>
                                <div class="product-sidebar">
                                    <?php foreach($productSidebar as $row): ?>
                                    <div class="list-hot">
                                        <div class="img-p-hot">
                                            <a href="<?= product_url($row->slug,$row->id); ?>"><img src="<?= $row->image ?>" alt="<?= $row->name; ?>"></a>
                                        </div>
                                        <div class="desc-p-hot">
                                            <h5><?= $row->name; ?></h5>
                                            <p><?= catchuoi($row->description,50) ?></p>
                                            <a href="<?= product_url($row->slug,$row->id); ?>" class="btn btn-default"><?= ($lang=='vn') ? 'Xem thêm' : 'View more'; ?></a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                    
                                </div>
                            </aside>
                         
                        </div>
                    </div>