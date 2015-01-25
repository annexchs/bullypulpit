<!DOCTYPE html>
<html>

    <head>
    	<link rel="stylesheet" href="<?php echo $this->getThemePath(); ?>/styles/boilerplate.css">
    	<link rel="stylesheet" href="<?php echo $this->getThemePath(); ?>/styles/page.css">
    	<link type="text/css" rel="stylesheet" href="http://fast.fonts.net/cssapi/d38f81fe-0e50-4e5a-a6db-63c08f0c0e5c.css"/>
    	<meta charset="utf-8">
    	<meta name="viewport" content="initial-scale = 1.0,maximum-scale = 1.0">
    	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    	<?php Loader::element('header_required'); ?>
    </head>
    <body>

  <div id="primaryContainer" class="<?php echo $c->getPageWrapperClass()?> primaryContainer clearfix">
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

        <div id="box27" class="clearfix">
            <div id="left-column" class="clearfix">
              <h3>Event</h3>
              <div>
              <?php
              $a = new Area('Page Header');
              $a->display($c);
              ?>
              </div>

              <div>
              <?php
                echo "<h1>",$c->getCollectionName(),"</h1>";
                echo '<h2>',$c->getAttribute('event_subhead'),'</h2>';

                $eventStart = $c->getAttribute('event_start');
                $eventEnd = $c->getAttribute('event_end');
                $eventLocation = $c->getAttribute('job_location');

                echo '<p><strong>',strftime("%A, %B %e",strtotime($eventStart)),'</strong>&ensp;<em>',strftime("%l:%M%P",strtotime($eventStart)),'&nbsp;&mdash;',strftime("%l:%M%P",strtotime($eventEnd)),'</em></p>';
                echo '<p>',$eventLocation,'</p>';
                echo '<p>',$c->getCollectionDescription(),'</p>';
              ?>
              </div>

            </div>
            <div id="box29" class="clearfix">
              <div id="page-sub-nav" class="clearfix">
                <?php
                  $a = new GlobalArea('Global Page Sub Nav');
                  $a->display();
                ?>
              </div>
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
                    66 George St<br />Charleston, SC<br />29424
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
          COPYRIGHT &copy; 2014 COLLEGE OF CHARLESTON. ALL RIGHTS RESERVED. DESIGNED IN CHARLESTON BY <a href="http://www.annexstudio.com" target="_blank">ANNEX STUDIO</a>.<br />
          </p>
      </div>
    </div>
      </div>


    <?php Loader::element('footer_required'); ?>
    </body>
</html>