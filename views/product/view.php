<?php include ROOT.'/views/layouts/header.php'?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>
                            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                                <?php foreach ($categories as $values):?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a href="/category/<?php echo $values['id'];?>"> 
                                            <?php echo $values['name']; ?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                                 <?php endforeach;?>
                            </div><!--/category-products-->

                        </div>
                    </div>

                    <div class="col-sm-9 padding-right">
                        <div class="product-details"><!--product-details-->
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="view-product">
                                        <img src="<?php echo Product::getImage($product['id']);?>" alt="" />
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="product-information"><!--/product-information-->
                                        <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                                        <h2><?php echo $product['name']?></h2>
                                        <p>Код товара: <?php echo $product['code']?></p>
                                        <span>
                                            <span><?php echo $product['price']?> рублей</span>
                                            <label>Количество:</label>
                                            <input type="text" value="3" />
                                            <button type="button" class="btn btn-fefault cart">
                                                <i class="fa fa-shopping-cart"></i>
                                                В корзину
                                            </button>
                                        </span>
                                        <p><b>Наличие:</b><?php echo Product::getStatusSost($product['status']) ?></p>
                                        <p><b>Состояние:</b> <?php echo Product::getStatusNew($product['is_new'])?></p>
                                        <p><b>Производитель:</b> <?php echo $product['brand']?></p>
                                    </div><!--/product-information-->
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-sm-12">
                                    <h5>Описание товара</h5>
                                   <?php echo $product['description']?>
                                </div>
                            </div>
                        </div><!--/product-details-->

                    </div>
                </div>
            </div>
        </section>
<?php include ROOT.'/views/layouts/footer.php'?>