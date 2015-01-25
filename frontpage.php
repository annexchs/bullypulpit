<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="<?php echo $this->getThemePath() ?>/styles/boilerplate.css" >
        <link rel="stylesheet" href="<?php echo $this->getThemePath() ?>/styles/page.css" >
        <link type="text/css" rel="stylesheet" href="http://fast.fonts.net/cssapi/d38f81fe-0e50-4e5a-a6db-63c08f0c0e5c.css"/>
    	<meta charset="utf-8">
    	<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0">
    	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    	<?php Loader::element('header_required'); ?>
    </head>
    <body>

    <div id="primaryContainer" class="primaryContainer clearfix">
        <div id="box" class="clearfix">
            <div id="box1" class="clearfix">
                <?php
                $a = new GlobalArea('Site Logo');
                $a->display();
                ?>
            </div>
            <div id="box2" class="clearfix">
                <p id="text">
                <?php
                    $a = new GlobalArea('Sponsor Location');
                    $a->display();
                ?>
                </p>
                    <div id="box3" class="clearfix">
                    <?php
                    $a = new GlobalArea('CofC Top Logo');
                    $a->display();
                    ?>
                    </div>
            </div>
            <div id="box5" class="clearfix">
                <nav id="primary-nav" role="nav">
                  <?php
                  $nav = new GlobalArea('Main Nav');
                  $nav->display();
                  ?>
                </nav>
                <p class="mobile-nav">
                  <svg version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                  	 viewBox="0 0 32 32" enable-background="new 0 0 32 32" width="14" height="14" xml:space="preserve">
                    <rect x="16" y="5" fill="#660000" width="14" height="5"/>
                    <rect x="2" y="14" fill="#660000" width="28" height="5"/>
                    <rect x="2" y="23" fill="#660000" width="28" height="5"/>
                    <rect x="2" y="5" fill="#012639" width="12" height="5"/>
                  </svg>
                  Menu
                </p>
                <nav id="mobile-only-nav">
                  <?php
                    $a = new GlobalArea('Global Page Sub Nav');
                    $a->display();
                  ?>
                  <div id="mobile-nav-collapse">Close Menu</div>
                </nav>
                <script type="text/javascript">
                  $(".mobile-nav").click( function() {
                    $("#mobile-only-nav").toggleClass("mobile-nav-is-active");
                  });
                  $("#mobile-nav-collapse").click( function() {
                    $("#mobile-only-nav").toggleClass("mobile-nav-is-active");
                  });
                </script>
            </div>
        </div>
        <div id="frontpage-hero" class="clearfix">
            <?php
            $ab = new Area('Main Picture');
            $ab->display($c);
            ?>
            <div id="frontpage-headline" class="clearfix">
              <?php
              $a = new Area('Frontpage Headline');
              $a->display($c);
              ?>
            </div>

            <?php
                Loader::model('page_list');
                $nh = Loader::helper('navigation');
                $pl = new PageList();
                $pl->filterByPath('/events_list', $includeAllChildren = true);
                $pl->filterByIsFeatured(1);
                $pl->sortByDisplayOrder();
                $pages = $pl->get($itemsToGet = 1, $offset = 0);
                $p = $pages[0];

                if( !is_null($p)) {
                    $eventStart = $p->getAttribute('event_start');
                    $eventEnd = $p->getAttribute('event_end');
                    echo '<div id="box8" class="clearfix">';
                    echo '<div id="box9" class="clearfix">';
                    echo '<p id="text7">';
                    echo 'Event';
                    echo '</p>';
                    echo '<p id="text8">',$p->getCollectionName(),'</p>';
                    echo '<p id="text9">',$p->getAttribute('event_subhead'),'</p>';
                    echo '<p id="text10">',strftime("%A, %B %e",strtotime($eventStart)),'<br>',strftime("%l:%M%P",strtotime($eventStart)),'&nbsp;&mdash;',strftime("%l:%M%P",strtotime($eventEnd)),'<br>',$p->getAttribute('job_location'),'</p>';
                    echo '<p id="text11">',$p->getCollectionDescription(),'</p>';
                    echo '<p id="text12"><a href="',$nh->getLinkToCollection($p),'">Learn More...</a></p>';
                    echo '</div>';
                    echo '</div>';
                }
            ?>
        </div>
        <?php
            //This function chops up a blog post title
            function blogChop($strToChop) {

                $exploded = explode(" ",$strToChop);
                $looper = 0;
                $toPost = "";
                $numOfChars = 0;
                $n = 0;
                while($looper!=1) {
                    if($numOfChars + strlen($exploded[$n]) < 17) {
                        $toPost = $toPost . " " . $exploded[$n];
                    }
                    else {
                        $toPost .= "...";
                        $looper = 1;
                    }

                    $numOfChars += strlen($exploded[$n]);
                    $n++;
                }

                return $toPost;
            }
        ?>
        <?php
            Loader::model('page_list');
            $nh1 = Loader::helper('navigation');
            $pl1 = new PageList();
            $pl1->filterByPath('/updates', $includeAllChildren = true);
            $pl1->sortByPublicDateDescending();
            $pages1 = $pl1->get($itemsToGet = 1, $offset = 0);
            $p1 = $pages1[0];
        ?>
        <div id="box10" class="clearfix">
            <div id="box11" class="clearfix header-block-wrapper">
                <div id="box12" class="clearfix">
                    <a href="<?php echo $nh1->getLinkToCollection($p1);?>">
                        <div id="box13" class="clearfix">
                            <p class="header-block-type"></p>
                            <?php
                                $postTitle = $p1->getCollectionName();
                                $toPost = "";

                                if(strlen($postTitle)>20) {
                                    $toPost = blogChop($postTitle);
                                }
                                else {
                                    $toPost = $postTitle;
                                }

                                echo '<p class="header-block-headline">',$toPost,'</p>';
                            ?>
                        </div>
                    </a>
                </div>
            </div>
            <div id="box14" class="clearfix header-block-wrapper">
                <div id="box15" class="clearfix">
                    <a href="<?php $p2=$pages1[1]; echo $nh1->getLinkToCollection($p2);?>">
                        <div id="box16" class="clearfix">
                            <p class="header-block-type"></p>
                            <?php
                                $postTitle = $p2->getCollectionName();
                                $toPost = "";

                                if(strlen($postTitle)>20) {
                                    $toPost = blogChop($postTitle);
                                }
                                else {
                                    $toPost = $postTitle;
                                }

                                echo '<p class="header-block-headline" style="color: black">',$toPost,'</p>';
                            ?>
                        </div>
                    </a>
                </div>
            </div>
            <div id="box17" class="clearfix header-block-wrapper">
                <div id="box18" class="clearfix">
                    <a href="<?php $p3=$pages1[2]; echo $nh1->getLinkToCollection($p3);?>">
                        <div id="box19" class="clearfix">
                            <p class="header-block-type"></p>
                            <?php
                                $postTitle = $p3->getCollectionName();
                                $toPost = "";

                                if(strlen($postTitle)>20) {
                                    $toPost = blogChop($postTitle);
                                }
                                else {
                                    $toPost = $postTitle;
                                }

                                echo '<p class="header-block-headline">',$toPost,'</p>';
                            ?>
                        </div>
                    </a>
                </div>
            </div>
            <div id="box20" class="clearfix">
                <div id="box21" class="clearfix">
                    <a href="../concrete/index.php/events-list">
                        <div id="box22" class="clearfix" >
                            <p class="header-block-headline">See all Series events...</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div id="box23" class="clearfix">
            <div id="box24" class="clearfix">
                <div id="box25" class="clearfix">
                    <p id="text15">
                    Latest News &raquo;
                    </p>
                    <p id="text16">
                    <?php
                      $politicoHeadline = simplexml_load_file('http://www.politico.com/rss/politicopicks.xml');
                      $link = $politicoHeadline->channel[0]->item[0]->link;
                      $title = $politicoHeadline->channel[0]->item[0]->title;
                      echo '<a href="'.$link.'">'.$title.' - politico.com</a>';
                    ?>
                    </p>
                </div>
                <div id="box26" class="clearfix">
                <!-- Begin MailChimp Signup Form -->
                    <div id="mc_embed_signup">
                    <form action="//bullypulpitseries.us9.list-manage.com/subscribe/post?u=46e6b87b15af88c35630ce95e&amp;id=eb4e002fc3" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div id="mc_embed_signup_scroll">
                        <p id="text17" for="mce-EMAIL">SIGNUP FOR EMAIL UPDATES</p>
                        <label id="formgroup">
                            <input id="textinput" type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email@domain.com" >
                        </label>
                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;"><input type="text" name="b_46e6b87b15af88c35630ce95e_eb4e002fc3" tabindex="-1" value=""></div>
                        <div class="clear"><input id="input" type="submit" value="GO" name="Subscribe" id="mc-embedded-subscribe" class="button"></div>
                        </div>
                    </form>
                    </div>
                <!--End mc_embed_signup-->
                </div>
            </div>
        </div>
        <div id="box27" class="clearfix">
            <div id="left-column" class="clearfix">

              <?php
              $a = new Area('Blog Content');
              $a->display($c);
              ?>

            </div>
            <div id="box29" class="clearfix">

              <?php
                Loader::model('page_list');
                $nh1 = Loader::helper('navigation');
                $ln1 = new PageList();
                $ln1->filterByPath('/link-blocks', $includeAllChildren = true);
                $ln1->sortByDisplayOrder();
                $links1 = $ln1->get($itemsToGet = 6, $offset = 0);

                foreach ($links1 as $link){

                  echo '<div class="box30" class="clearfix">';
                  echo '<div class="box31" class="clearfix">';
                  echo '<div class="box32" class="clearfix">';
                  echo '<a href="',$link->getAttribute('link_block_url'),'" target="_blank"><p class="text26">',$link->getAttribute('link_block_text'),'</p></a>';
                  echo '</div></div></div>';

                };
              ?>


            </div>
        </div>
        <div id="box33" class="clearfix">
            <div id="box34" class="clearfix">
                <div id="box35" class="clearfix">
                    <p id="text27">
                    contact us
                    </p>
                    <p id="text28">
                    66 George Street<br />Charleston, S.C.<br />29424
                    </p>
                    <div id="text29">
                    <?php
                      $a = new GlobalArea('Phone Number');
                      $a->display();
                    ?>
                    </div>
                    <div id="text30">
                    <?php
                      $a = new GlobalArea('Email Address');
                      $a->display();
                    ?>
                    </div>

                </div>
                <div id="box36" class="clearfix">
                    <p id="text31">
                    about the bully pulpit
                    </p>
                    <div id="text32">
                    <?php
                      $a = new GlobalArea('About the Series');
                      $a->display();
                    ?>
                    </div>


                </div>
                <div id="box37" class="clearfix">
                </div>
                <p id="text33">
                COPYRIGHT &copy; 2014 COLLEGE OF CHARLESTON. ALL RIGHTS RESERVED. DESIGNED IN CHARLESTON BY <a href="http://www.annexstudio.com" target="_blank" >ANNEX STUDIO</a>.<br />
                </p>
            </div>
        </div>
    </div>
    <?php Loader::element('footer_required'); ?>
    </body>
</html>