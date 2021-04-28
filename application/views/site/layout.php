<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--[if lt IE 7 ]><html class="ie ie6" dir="ltr" lang="en-US" ><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" dir="ltr" lang="en-US" ><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" dir="ltr" lang="en-US" ><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html dir="ltr" lang="en-US">
<!--<![endif]-->

<head>
    <?php $this->load->view('site/head'); ?>
</head>

<body>
    <div id="header" class="no-mobile">
        <?php $this->load->view('site/header'); ?>
    </div>

    <div class="header-mobile no-desktop">

        <div class="head_top_mb">
            <div class="container">
                <div class="info_header_mb">
                    <div class="logo-mobile">
                        <a href="<?= base_url() ?>"><img src="<?= public_url('site/img/logo.png') ?>"
                                alt="Logo f5c mobile"></a>
                    </div>
                    <div class="cart_login">
                        <a class="cart_mb" href="<?= base_url('gio-hang.html') ?>"><img
                                src="<?= public_url('site/img/cart.png') ?>"></a>
                        <a class="login_mb" href="<?= base_url('user/login') ?>"><img
                                src="<?= public_url('site/img/user.png') ?>"> Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav_search_mb">
            <div class="container">
                <div class="ok_mb_sn">
                    <div class="form_search_mb">
                        <form method="get" action="<?= base_url('search.html') ?>">
                            <div class="form_sm_r">
                                <input class="txt_search_mb" type="text" name="text-search"
                                    placeholder="Tìm kiếm theo từ khóa">
                                <button class="btn_s_mb" type="submit"><img
                                        src="<?= public_url('site/img/search.png') ?>"></button>
                            </div>
                        </form>
                    </div>
                    <div class="nav_mb">

                        <div id="mySidenav" class="sidenav">
                            <a style="border-bottom: 0;" href="javascript:void(0)" class="closebtn"
                                onclick="closeNav()">&times;</a>
                            <?php if($allCategory && !empty($allCategory)): ?>
                            <?php foreach($allCategory as $row): ?>
                            <a href="<?= $row['link'] ?>"><i class="fa <?= $row['class_icon'] ?>"></i>
                                <?= $row['name']; ?></a>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <span class="icon_mb_nav" style="font-size:30px;cursor:pointer"
                            onclick="openNav()">&#9776;</span>

                    </div>
                </div>

            </div>
        </div>


    </div>

    <div id="main">
        <?php $this->load->view($temp,$this->data); ?>


        <section class="thong-tin">
            <div class="container">
                <div class="row">
                    <?php foreach($menuPage as $row): ?>
                    <?php 
            $s['where'] = ['parent_id'=>$row->id];
            $s['limit'] = [5,0];
            $itemNews = $this->menu_model->get_list($s);
            ?>
                    <div class="col-lg-3 col-sm-4" style="width:20%">
                        <div class="panel">
                            <div class="panel-heading">
                                <a style="color:#fff"
                                    href="<?= str_replace('{base_url}','https://f5c.vn/',$row->url) ?>"
                                    title='<?= $row->title; ?>'>
                                    <?= $row->title; ?></a>
                            </div>
                            <?php if(!empty($itemNews)): ?>
                            <ul class="list-group">
                                <?php foreach($itemNews as $n): ?>
                                <li><a
                                        href="<?= str_replace('{base_url}','https://f5c.vn/',$n->url) ?>"><?= $n->title; ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>

                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- <section class="list_keyword">
  <div class="container">
    <h3 class="keyword_home_title">Từ khóa tìm kiếm nhiều</h3>
    <div class="keyword_search">
      <?php foreach($listSearch as $row): ?>
      <a title="Xem sản phẩm với từ khóa" href="<?= base_url('search.html?cat=0&text-search='.$row->keyword) ?>"><?= $row->keyword; ?> ( <?= $row->total ?> )</a>
    <?php endforeach ?>
    </div>
  </div>
</section>
-->
    </div>

    <div id="footer">
        <?php $this->load->view('site/footer'); ?>
    </div>

    <section class="sticky_compare_sec">
        <div class="sticky_compare">
            <div class="close_compare"><a id="dong_ss">Đóng</a></div>
            <div class="container">
                <div class="row" id="list_com">
                </div>
                <div class="btn_sss">
                    <form method="post" action="<?= base_url('compare/index') ?>" id="frmCompare">
                        <a class="btn_sosanh" id="btnSS">So sánh</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
<div class="hotline-pn">
<div class="dropdown">
  <button class="dropbtn">
  <img  src="<?php echo public_url('site/img/hotline.png') ?>">
  </button>
  <div class="dropdown-content">
      <div class=""><span class="title"><i class="fa fa-phone-square"></i>Miền bắc</span> <a class="number-phone" href="tel:0932168866 ">0932 168 866 </a></div>
      <div class=""><span class="title"><i class="fa fa-phone-square"></i>Miền trung </span><a class="number-phone" href="tel:0935666443">0935 666 443 </a></div>
      <div class=""><span class="title"><i class="fa fa-phone-square"></i>Miền nam </span><a class="number-phone" href="tel:0975236688">097 523 6688 </a></div>  
  </div>
</div>
</div>
    <!-- ===facebook, google + fixed bĂªn pháº£i -->
    <!--  <div id="share-fix">
    <div class="share-icon share-google"><a target="_blank" href="https://plus.google.com/u/1/+F5CORP/posts">&nbsp;</a></div>
    <div class="share-icon share-sky"><a  href="skype:f5pro">&nbsp;</a></div>
    <div class="share-icon share-twi"><a  target="_blank"href="https://twitter.com/F5Corp">&nbsp;</a></div>
  </div>
-->

    <style>
    /*style chi cho trang home*/
    @media(max-width: 480px) {
        .dropdown.login {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 5px;
            margin: 0;
            z-index: 999;
            background-color: #F58634;
            color: #fff;
            background-position: left 5px center;
        }

        .dropdown.login a.dropdown-toggle {
            color: #fff;
            margin-left: 37px;
            display: inline-block;
        }

        .dropdown.login .caret {
            display: none;
        }

        .mini-cart {
            position: fixed;
            top: 0;
            right: 10px;
            z-index: 9999;
            color: #fff;
            padding: 5px;
            margin: 0;
            border-right: none;
        }

        .dang-ky {
            display: none;
        }

        .header-top {
            padding-top: 50px;
        }
    }



    </style>
    <!-- <script src='<?= public_url('site/js') ?>/jquery.zoom.js'></script>
    <script>
    $(document).ready(function() {
        $('.ex1').zoom();
    });
    </script> -->
    <script type="text/javascript">
    $(document).ready(function() {
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideDown("400");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideUp("400");
                $(this).toggleClass('open');
            }
        );

        //------------
        $('.xemthem').on('click', function(e) {
            e.preventDefault();
            let _this = $(e.currentTarget);
            let uid = _this.attr('data-uid');
            $('.parem-ul ')
            $('#' + uid).addClass('boauto');
        });

        //ajax lấy quận huyện
        $('#changeCity').on('change', function(e) {
            e.preventDefault();
            let _this = $(e.currentTarget);
            let link = _this.attr('data-link');
            let cityid = _this.val();
            $.ajax({
                    type: 'POST',
                    url: link,
                    data: {
                        cityid
                    },
                })
                .done(function(resp) {
                    $('#quanhuyen').html(resp);
                });
        });

        //dành cho sort
        $('.sort_order').on('change', function(e) {
            $('#frmSort').submit();
        })

    });
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('.btn-number').click(function(e) {
            e.preventDefault();
            var fieldName = $(this).attr('data-field');
            var type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());

            var link = $(this).attr('data-link');
            var rowid = $(this).attr('data-rowid');

            if (!isNaN(currentVal)) {
                if (type == 'minus') {
                    var minValue = parseInt(input.attr('min'));
                    if (!minValue) minValue = 1;
                    if (currentVal > minValue) {
                        input.val(currentVal - 1).change();
                        var qty = input.val();
                        $.ajax({
                                type: 'POST',
                                url: link,
                                data: {
                                    rowid,
                                    qty
                                },
                            })
                            .done(function(resp) {
                                $('#total_cart').html(resp);
                                $('#tong_tien').html(resp);
                                $('#tong_tiencuoi').html(resp);
                            });
                    }
                    if (parseInt(input.val()) == minValue) {
                        //$(this).attr('disabled', true);                
                    }
                } else if (type == 'plus') {
                    var maxValue = parseInt(input.attr('max'));
                    if (!maxValue) maxValue = 9999999999999;
                    if (currentVal < maxValue) {

                        input.val(currentVal + 1).change();
                        var qty = input.val();
                        $.ajax({
                                type: 'POST',
                                url: link,
                                data: {
                                    rowid,
                                    qty
                                },
                            })
                            .done(function(resp) {
                                $('#total_cart').html(resp);
                                $('#tong_tien').html(resp);
                                $('#tong_tiencuoi').html(resp);
                            });
                    }
                    if (parseInt(input.val()) == maxValue) {
                        $(this).attr('disabled', true);
                    }
                }
            } else {
                input.val(0);
            }
        });
    });
    </script>

    <script type="text/javascript">
    $(function() {
        //search
        var main = $('#box_search');
        main.find('#text-search').keyup(function(event) {
            // alert(event.which);
            if (event.which == 16 || event.which == 37 || event.which == 38 || event.which == 39 ||
                event.which == 40 || event.which == 32) {
                return false;
            }
            search_auto();
        });
        main.find('#text-search').focusin(function() {
            let val = $('#text-search').val();
            if (val.length > 0) {
                $("#divSuggestion").css({
                    'display': 'block'
                });
            }
        })
        main.find('[name="cat"]').change(function() {
            search_auto();
        });

        function search_auto() {
            var key = main.find('#text-search').val();
            var cat = main.find('[name="cat"]').val();
            if (key != '') {
                $(this).nstUI(
                    $.ajax({
                        type: "GET",
                        url: '<?= base_url('home/search_ajax') ?>',
                        data: 'term=' + key + '&cat=' + cat,
                        beforeSend: function() {

                        },
                        success: function(data) {
                            $("#content_search").html(data);
                            $("#divSuggestion").css({
                                'display': 'block'
                            });
                        }
                    })
                )
            } else {
                $("#content_search").html('<center><strong>Bạn cần nhập từ khóa tìm kiềm...</strong></center>');
            }
        }
        /*
        $( ".form-search" ).mouseleave(function() {
          $("#divSuggestion").css({'display':'none'});
        });
        */

        $("#text-search").focusout(function(e) {       
            setTimeout(function(){  
                $("#divSuggestion").css({
                'display': 'none'
            }); }, 500); 
           
        });


        $('form#box_search').submit(function() {
            var $selected = $('.sp-goi-y').find('a.item-sp-search.selected');
            $href = jQuery.trim($selected.attr('href'));
            if ($href) {
                window.location = $href;
                return false;
            }
        });

        //raty
        jQuery(document.body).on('click', '.top_search', function() {
            var key = $(this).text();
            key = jQuery.trim(key);
            if (key != '') {
                $('#text-search').val(key);
                $('form#box_search').submit();
            }
        });

        $(document).on('keydown', 'body', function(event) {
            if (event.which == 40) {
                var $selected = $('.sp-goi-y').find('a.item-sp-search.selected');
                $text = jQuery.trim($selected.find('.name-sp-search').text());
                if (!$text) {
                    $selected = $('.sp-goi-y a.item-sp-search:first');
                } else {
                    $selected.removeClass('selected');
                    $selected = $selected.next('a.item-sp-search');
                }

                $selected.addClass('selected');
                $text = jQuery.trim($selected.find('.name-sp-search').text());
                if (!$text) {
                    $selected = $('.sp-goi-y a.item-sp-search:first');
                    $selected.addClass('selected');
                }
                $text = jQuery.trim($selected.find('.name-sp-search').text());

                if ($text) {
                    //$('#text-search').val($text);
                }
                return false;

            } else if (event.which == 38) {
                var $selected = $('.sp-goi-y').find('a.item-sp-search.selected');
                $text = jQuery.trim($selected.find('.name-sp-search').text());
                if (!$text) {
                    $selected = $('.sp-goi-y').find('a.item-sp-search:last-child');
                } else {
                    $selected.removeClass('selected');
                    $selected = $selected.prev('a.item-sp-search');
                }

                $selected.addClass('selected');
                $text = jQuery.trim($selected.find('.name-sp-search').text());
                if (!$text) {
                    $selected = $('.sp-goi-y').find('a.item-sp-search:last-child');
                    $selected.addClass('selected');
                }
                $text = jQuery.trim($selected.find('.name-sp-search').text());

                if ($text) {
                    //$('#text-search').val($text);
                }
                return false;
            }
        });
    });
    </script>

    <script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
        $('.sticky_compare').hide();
    });
    </script>
<script lang="javascript">var _vc_data = {id : 5040535, secret : 'fdf53da7cda26d137ff694b5d10d8600'};(function() {var ga = document.createElement('script');ga.type = 'text/javascript';ga.async=true; ga.defer=true;ga.src = '//live.vnpgroup.net/client/tracking.js?id=5040535';var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script>
<script type="text/javascript">
     $('.checkmedi').on('click', function(event) {
        event.preventDefault();
        let _this = $(event.currentTarget);
        let url = _this.attr('data-rollback');
       if($(event.currentTarget).prop('checked')){
        url = _this.attr('data-uri');
               }     
        window.location.href = url;
     })
</script>

<!-- Mã đo lường hitstat -->
<?= $this->site_model->getSettingMeta('site_hitstat'); ?>

</body>

</html>