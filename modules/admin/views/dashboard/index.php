<?php

use yii\helpers\Url;

$this->title = 'Dashboard';
$this->params['title'] = 'dashboard';

?>
<div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-user-plus"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Mijozlar</span>
                <span class="info-box-number">2131 <small>ta</small></span>
            </div>

        </div>

    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-bullhorn"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Hamkorlar</span>
                <span class="info-box-number">1231 ta</span>
            </div>

        </div>

    </div>


    <div class="clearfix visible-sm-block"></div>
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-cubes"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Portfolio</span>
                <span class="info-box-number">234 ta</span>
            </div>

        </div>

    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Xabarlar</span>
                <span class="info-box-number">234 ta</span>
            </div>

        </div>

    </div>

</div>


<div class="row">

    <div class="col-md-8">

        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Xabarlar</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                class="fa fa-times"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="table-responsive">
                    <table class="table no-margin">
                        <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Name</th>
                            <th>Message</th>
                            <th>email</th>
                        </tr>
                        </thead>
                        <?php //foreach(ContactUs::find()->limit(5)->orderBy('created_at DESC')->all() as $xabar){?>
                        <tr>
                            <td><?php //echo xabar->id?></td>
                            <td><?php //echo html::a($xabar->name,url::to(['/contactus/view','id'=>$xabar->id]),['data-pjax'=>0])?></td>
                            <td><?php //echo substr($xabar->message,0,100)?></td>
                            <td><?php //echo Html::a($xabar->email,'tel:'.$xabar->email)?></td>
                        </tr>
                        <?php //}?>
                    </table>
                </div>

            </div>

            <div class="box-footer clearfix">

                <a href="<?= url::to(['/contactus/index']) ?>" class="btn btn-sm btn-default btn-flat pull-right"
                   data-pjax="0">View All
                    Orders</a>
            </div>

        </div>

    </div>

    <!-- <div class="col-md-4">


                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Recently Added Products</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                            class="fa fa-times"></i></button>
                                </div>
                            </div>

                            <div class="box-body">
                                <ul class="products-list product-list-in-box">
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="<?= url::to('dist/img/default-50x50.gif') ?>" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Samsung TV
                                                <span class="label label-warning pull-right">$1800</span></a>
                                            <span class="product-description">
                                                Samsung 32" 1080p 60Hz LED Smart HDTV.
                                            </span>
                                        </div>
                                    </li>

                                    <li class="item">
                                        <div class="product-img">
                                            <img src="<?= url::to('dist/img/default-50x50.gif') ?>" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Bicycle
                                                <span class="label label-info pull-right">$700</span></a>
                                            <span class="product-description">
                                                26" Mongoose Dolomite Men's 7-speed, Navy Blue.
                                            </span>
                                        </div>
                                    </li>

                                    <li class="item">
                                        <div class="product-img">
                                            <img src="<?= url::to('dist/img/default-50x50.gif') ?>" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">Xbox One <span
                                                    class="label label-danger pull-right">$350</span></a>
                                            <span class="product-description">
                                                Xbox One Console Bundle with Halo Master Chief Collection.
                                            </span>
                                        </div>
                                    </li>

                                    <li class="item">
                                        <div class="product-img">
                                            <img src="<?= url::to('dist/img/default-50x50.gif') ?>" alt="Product Image">
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">PlayStation 4
                                                <span class="label label-success pull-right">$399</span></a>
                                            <span class="product-description">
                                                PlayStation 4 500GB Console (PS4)
                                            </span>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                            <div class="box-footer text-center">
                                <a href="javascript:void(0)" class="uppercase">View All Products</a>
                            </div>

                        </div>

                    </div> -->

</div>